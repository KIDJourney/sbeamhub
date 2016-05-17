<?php

namespace App\Http\Controllers;

use App\Model\RecentSearch;
use Event;
use App\Events\AfterSearch;
use App\Model\Liar;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    //
    public function __construct(Liar $liar)
    {
        $this->liar = $liar;
    }

    public function index()
    {
        return view('search.index');
    }

    public function show(Request $request)
    {   
        $key = $request->get('key');

        Event::fire(new AfterSearch($key));

        return $this->liar->SearchByInfo($key);
    }
}
