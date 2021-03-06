<?php

namespace App\Events\Backend\Events;

use Illuminate\Queue\SerializesModels;

class EventUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $events;


    public function __construct($events)
    {
        $this->events = $events;
    }
}
