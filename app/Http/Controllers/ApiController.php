<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\RecentSearch;

class ApiController extends Controller
{
    //
    public function recentSearch()
    {
        return RecentSearch::Frequent()->items();
    }

}
