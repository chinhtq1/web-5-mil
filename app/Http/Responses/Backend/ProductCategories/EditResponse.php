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

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.productcategories.edit')->with([
            'productCategory' => $this->productCategory
        ]);
    }
}
