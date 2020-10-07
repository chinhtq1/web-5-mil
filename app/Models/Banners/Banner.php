<?php

namespace App\Models\Banners;

use App\Models\Banners\Traits\Attribute\BannerAttribute;
use App\Models\Banners\Traits\Relationship\BannerRelationship;
use App\Models\BaseModel;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends BaseModel
{
    use ModelTrait,
        SoftDeletes,
        BannerAttribute,
    	BannerRelationship {
            // BannerAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    protected $table ;

    protected $fillable = [
        'title1',
        'title2',
        'featured_image',
        'status',
        'created_by',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.banners.table');
    }
}
