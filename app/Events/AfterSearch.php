<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AfterSearch extends Event
{
    use SerializesModels;

    public $liars;
    public $key_word;

    /**
     * Create a new event instance.
     *
     * @param App\Model\Liar $liars
     * @return void
     */
    public function __construct($key_word)
    {
        //
        $this->key_word = $key_word;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
