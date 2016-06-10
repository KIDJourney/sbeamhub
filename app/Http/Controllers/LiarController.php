<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LiarController extends Controller
{
    //

    public function report()
    {
        return view('search.report');
    }
}
