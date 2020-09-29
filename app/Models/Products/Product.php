<?php

namespace App\Models\Products;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use App\Models\Products\Traits\Attribute\ProductAttribute;
use App\Models\Products\Traits\Relationship\ProductRelationship;
use Illuminate\Database\Eloquent\Model;


class Product extends BaseModel
{
    use ModelTrait,
        ProductAttribute,
    	ProductRelationship {
            // ProductAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'publish_datetime',
        'feature_image',
        'base_feature',
        'detail_feature',
        'content',
        'status',

        'meta_title',
        'meta_keywords',
        'meta_description',
        'cannonical_link',

        'created_by',
    ];


    protected $dates = [
        'publish_datetime',
        'created_at',
        'updated_at'
    ];

    protected $table;
    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.products.table');
    }
}
