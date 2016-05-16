<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        return view('user.profile',['user'=>$user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
    }

}
