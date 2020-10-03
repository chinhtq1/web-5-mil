<?php

namespace App\Http\Responses\Backend\Events;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{

    protected $events;
    protected $status;

    public function __construct($events, $status)
    {
        $this->events = $events;
        $this->status = $status;

    }


    public function toResponse($request)
    {
        return view('backend.events.edit')->with([
            'event' => $this->events,
            'status' => $this->status,
        ]);
    }
}
