<?php

namespace App\Models\BlogMapCategories;

use App\Models\BaseModel;

class BlogMapCategory extends BaseModel
{

    protected $table = 'blog_map_categories';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
