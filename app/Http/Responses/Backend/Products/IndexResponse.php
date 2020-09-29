<?php

namespace App\Http\Responses\Backend\Products;

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
        return view('backend.products.index')->with([
            'status'=> $this->status,
        ]);
    }
}
