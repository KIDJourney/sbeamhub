<?php

namespace App\Http\Controllers\Admin;

use App\Model\Donator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DonatorController extends Controller
{
    //

    public function __construct(Donator $donator, Request $request)
    {
        $this->donator = $donator;
        $this->validator = $validate = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);
    }

    public function index()
    {
        return $this->donator->recent()->all();
    }

    public function show($id)
    {
        return $this->donator->findOrFail($id);
    }

    public function edit($id)
    {
        return view('admin.donator.edit', ['donator' => $this->donator->findOrFail($id)]);
    }

    public function create()
    {
        return view('admin.donator.create');
    }

    public function store(Request $request)
    {
        if ($this->validator->fails()) {
            return action('Admin\DonatorController@create')
                ->withErrors($this->validator)
                ->withInput();
        }

        return Donator::create($request->all() + ['editor' => Auth::user()->id]);
    }

    public function update(Request $request, $id)
    {
        if ($this->validator->fails()) {
            return action('Admin\DonatorController@create')
                ->withErrors($this->validator)
                ->withInput();
        }

        $donator = Donator::findOrFail($id);
        $donator->update($request->all());
        return $donator;
    }
}
