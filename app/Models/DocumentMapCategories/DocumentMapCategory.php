<?php


namespace App\Models\DocumentMapCategories;


use App\Models\BaseModel;

class DocumentMapCategory extends BaseModel
{
    protected $table = 'document_map_categories';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
