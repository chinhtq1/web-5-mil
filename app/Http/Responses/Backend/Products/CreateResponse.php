<?php

namespace App\Http\Responses\Backend\Products;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    protected $status;

    protected $productCategories;

    public function __construct($status, $productCategories)
    {
        $this->status = $status;
        $this->productCategories = $productCategories;
    }

    public function toResponse($request)
    {
        return view('backend.products.create')->with([
            'productCategories' => $this->productCategories,
            'status'         => $this->status,
        ]);
    }
}
