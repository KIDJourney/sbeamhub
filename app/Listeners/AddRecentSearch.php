<?php

namespace App\Listeners;

use DB;
use App\Events\AfterSearch;
use App\Model\RecentSearch;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class AddRecentSearch
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AfterSearch $event
     * @return void
     */
    public function handle(AfterSearch $event)
    {
        $search = new RecentSearch();

        $search->addRecentSearch($event->key_word);
    }
}
