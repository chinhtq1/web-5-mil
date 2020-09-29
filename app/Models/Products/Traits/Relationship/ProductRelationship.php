<?php

namespace App\Models\Products\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\ProductCategories\ProductCategory;

/**
 * Class ProductRelationship
 */
trait ProductRelationship
{
    /**
     * Get categories of product
     */
    public function categories()
    {
        return $this->belongsToMany(
            ProductCategory::class,
            'product_map_categories',
            'product_id',
            'category_id'
        );
    }

    /**
     * Get owwner
     */
    public function owner()
    {
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }
}
