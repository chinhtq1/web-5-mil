<?php

namespace App\Http\Responses\Backend\DocumentCategories;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{

    protected $documentcategory;


    public function __construct($documentcategory)
    {
        $this->documentcategory = $documentcategory;
    }

    public function toResponse($request)
    {
        return view('backend.documentcategories.edit')->with([
            'documentcategory' => $this->documentcategory
        ]);
    }
}
