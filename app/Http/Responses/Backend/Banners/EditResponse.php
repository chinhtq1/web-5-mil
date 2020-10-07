<?php

namespace App\Http\Responses\Backend\Banners;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{

    protected $banner;


    public function __construct($banner)
    {
        $this->banner = $banner;
    }


    public function toResponse($request)
    {
        return view('backend.banners.edit')->with([
            'banner' => $this->banner
        ]);
    }
}
