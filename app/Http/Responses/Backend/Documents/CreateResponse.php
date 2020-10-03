<?php

namespace App\Http\Responses\Backend\Documents;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $status;

    protected $documentCategories;

    public function __construct($status, $documentCategories)
    {
        $this->status = $status;
        $this->documentCategories = $documentCategories;
    }
    public function toResponse($request)
    {
        return view('backend.documents.create')->with([
            'documentCategories' => $this->documentCategories,
            'status'  => $this->status,
        ]);
    }
}
