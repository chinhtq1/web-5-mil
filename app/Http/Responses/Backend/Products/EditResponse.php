<?php

namespace App\Http\Responses\Backend\Products;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{

    protected $products;

    protected $status;

    protected $productCategories;

    public function __construct($products, $status, $productCategories)
    {
        $this->products = $products;
        $this->status = $status;
        $this->productCategories = $productCategories;
    }

    public function toResponse($request)
    {
        $selectedCategories = $this->products->categories->pluck('id')->toArray();
        return view('backend.products.edit')->with([
            'product'               => $this->products,
            'productCategories'     => $this->productCategories,
            'selectedCategories' => $selectedCategories,
            'status'             => $this->status,
            ]);
    }
}
