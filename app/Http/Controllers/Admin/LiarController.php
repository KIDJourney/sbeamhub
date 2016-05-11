<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Model\Liar;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LiarController extends Controller
{
    //
    public function index()
    {
        return Liar::all();
    }

    public function show(Liar $liar)
    {
        return $liar;
    }

    public function create(Request $request)
    {
        return view('admin.liar.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'reason' => 'required',
            ]
        );

        if ($validator->fails()) {
            return action('Admin\LiarController@create')
                ->withErrors($validator)
                ->withInput();
        }

        $liar = Liar::create($request->all());
        return $liar->id;
    }


    public function edit(Liar $liar)
    {
        return view('admin.liar.edit', ['liar' => $liar]);
    }

    public function update(Request $request, Liar $liar)
    {
        $liar->update($request->all());
        $liar->editor = Auth::user()->id;
        $liar->save();
    }
}
