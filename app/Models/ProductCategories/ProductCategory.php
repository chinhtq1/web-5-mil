<?php

namespace App\Models\ProductCategories;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use App\Models\ProductCategories\Traits\Attribute\ProductCategoryAttribute;
use App\Models\ProductCategories\Traits\Relationship\ProductCategoryRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends BaseModel
{
    use ModelTrait,
        SoftDeletes,
        ProductCategoryAttribute,
    	ProductCategoryRelationship {
            // ProductCategoryAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table;

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'slug',
        'created_by',
        'updated_by'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.productcategories.table');
    }
}
