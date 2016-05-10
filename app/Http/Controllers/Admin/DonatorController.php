<?php

namespace App\Http\Controllers\Admin;

use App\Model\Donator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DonatorController extends Controller
{
    //

    public function __construct(Donator $donator)
    {
        $this->donator = $donator;
    }

    public function index()
    {
        return $this->donator->recent()->all();
    }
}
