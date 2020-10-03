<?php

namespace App\Models\Documents;

use App\Models\BaseModel;
use App\Models\Documents\Traits\Attribute\DocumentAttribute;
use App\Models\Documents\Traits\Relationship\DocumentRelationship;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends BaseModel
{
    use ModelTrait,
        SoftDeletes,
        DocumentAttribute,
    	DocumentRelationship {
            // DocumentAttribute::getEditButtonAttribute insteadof ModelTrait;
        }


    protected $table;

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
        'name',
        'publish_datetime',
        'description',
        'status',
        'file',
        'type',
        'created_by',
    ];

    protected $dates = [
        'publish_datetime',
        'created_at',
        'updated_at'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.documents.table');
    }
}
