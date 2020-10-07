<?php

namespace App\Models\Partners;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use App\Models\Partners\Traits\Attribute\PartnerAttribute;
use App\Models\Partners\Traits\Relationship\PartnerRelationship;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends BaseModel
{
    use ModelTrait,
        SoftDeletes,
        PartnerAttribute,
    	PartnerRelationship {
            // PartnerAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    protected $table ;


    protected $fillable = [
        'name',
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
        $this->table = config('module.partners.table');
    }
}
