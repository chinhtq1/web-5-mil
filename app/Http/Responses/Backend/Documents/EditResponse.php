<?php

namespace App\Http\Responses\Backend\Documents;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    protected $document;

    protected $status;

    protected $documentCategories;

    public function __construct($document, $status, $documentCategories)
    {
        $this->document = $document;
        $this->status = $status;
        $this->documentCategories = $documentCategories;
    }


    public function toResponse($request)
    {
        $selectedCategories = $this->document->categories->pluck('id')->toArray();

        return view('backend.documents.edit')->with([
            'document' => $this->document,
            'documentCategories'     => $this->documentCategories,
            'selectedCategories' => $selectedCategories,
            'status'             => $this->status,
        ]);
    }
}
