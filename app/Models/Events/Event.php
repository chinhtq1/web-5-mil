<?php

namespace App\Models\Events;

use App\Models\BaseModel;
use App\Models\Events\Traits\Attribute\EventAttribute;
use App\Models\Events\Traits\Relationship\EventRelationship;
use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends BaseModel
{
    use ModelTrait,
        SoftDeletes,
        EventAttribute,
    	EventRelationship {
            // EventAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    protected $table ;

    protected $fillable = [
        'name',
        'slug',
        'publish_datetime',
        'start_datetime',
        'end_datetime',
        'description',
        'content',
        'meta_title',
        'cannonical_link',
        'meta_keywords',
        'meta_description',
        'status',
        'featured_image',
        'created_by',
    ];


    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'publish_datetime',
        'start_datetime',
        'end_datetime',
        'created_at',
        'updated_at'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('module.events.table');

    }
}
