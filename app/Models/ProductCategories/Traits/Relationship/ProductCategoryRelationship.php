<?php

namespace App\Models\ProductCategories\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\Products\Product;

/**
 * Class ProductCategoryRelationship
 */
trait ProductCategoryRelationship
{
    /**
     * ProductCategories creator and updator
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    /**
     * Get Products
     */
    public function products()
    {
        return $this->belongsTo(
            Product::class,
            'product_map_categories',
            'category_id',
            'product_id');
    }
}
