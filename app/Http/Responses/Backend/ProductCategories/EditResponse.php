<?php

namespace App\Http\Responses\Backend\ProductCategories;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ProductCategories\ProductCategory
     */
    protected $productCategory;

    public function __construct($productCategory)
    {
        $this->productCategory = $productCategory;
    }


    public function toResponse($request)
    {
        return view('backend.productcategories.edit')->with([
            'productCategory' => $this->productCategory
        ]);
    }
}
