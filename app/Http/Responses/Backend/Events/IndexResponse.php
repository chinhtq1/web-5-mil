<?php


namespace App\Http\Responses\Backend\Events;


use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function toResponse($request)
    {
        return view('backend.events.index')->with([
            'status'=> $this->status,
        ]);
    }
}
