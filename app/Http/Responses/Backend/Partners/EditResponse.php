<?php

namespace App\Http\Responses\Backend\Partners;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Partners\Partner
     */
    protected $partner;


    public function __construct($partner)
    {
        $this->partner = $partner;
    }


    public function toResponse($request)
    {
        return view('backend.partners.edit')->with([
            'partner' => $this->partner
        ]);
    }
}
