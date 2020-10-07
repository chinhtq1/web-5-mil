<?php

namespace App\Http\Responses\Backend\Banners;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{

    public function toResponse($request)
    {
        return view('backend.banners.create');
    }
}
