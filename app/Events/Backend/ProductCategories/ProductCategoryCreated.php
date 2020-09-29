<?php

namespace App\Events\Backend\ProductCategories;

use Illuminate\Queue\SerializesModels;

class ProductCategoryCreated
{
    use SerializesModels;

    public $productCategory;

    /**
     * Create a new event instance.
     *
     * @param $productCategory
     */
    public function __construct($productCategory)
    {
        $this->productCategory = $productCategory;
    }

}
