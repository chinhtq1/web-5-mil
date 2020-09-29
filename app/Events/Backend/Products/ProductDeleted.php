<?php

namespace App\Events\Backend\Products;

use Illuminate\Queue\SerializesModels;

class ProductDeleted
{
    use SerializesModels;

    public $products;

    /**
     * Create a new event instance.
     *
     * @param $products
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

}
