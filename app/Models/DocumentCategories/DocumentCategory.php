<?php

namespace App\Models\DocumentCategories;

use App\Models\BaseModel;
use App\Models\DocumentCategories\Traits\Attribute\DocumentCategoryAttribute;
use App\Models\DocumentCategories\Traits\Relationship\DocumentCategoryRelationship;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentCategory extends BaseModel
{
    use ModelTrait,
        SoftDeletes,
        DocumentCategoryAttribute,
        DocumentCategoryRelationship {
        // DocumentCategoryAttribute::getEditButtonAttribute insteadof ModelTrait;
    }

    protected $table;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'created_by',
        'updated_by'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.documentcategories.table');
    }
}
