<?php

namespace App\Http\Controllers\Admin;

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

    public function edit(Liar $liar)
    {
        return view('admin.liar.edit',['liar'=>$liar]);
    }

    public function update(Request $request,Liar $liar)
    {
        $liar->update($request->all());
        $liar->editor = Auth::user()->id;
        $liar->save();
    }

    
}
