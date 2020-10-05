<?php

namespace App\Http\Responses\Backend\Setting;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{

    protected $setting;


    public function __construct($setting)
    {
        $this->setting = $setting;
    }


    public function toResponse($request)
    {
        return view('backend.settings.edit')
            ->withSetting($this->setting);
    }
}
