<?php

namespace App\Http\Controllers;

use App\Model\Sale;
use Illuminate\Http\Request;

use App\Http\Requests;

class SaleController extends Controller
{
    //
    public function index()
    {
        return Sale::all();
    }
}
