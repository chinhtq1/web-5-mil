<?php

namespace App\Http\Responses\Backend\Events;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function toResponse($request)
    {
        return view('backend.events.create')->with([
            'status'         => $this->status,
        ]);
    }
}
