<?php

namespace App\Models\Documents\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\DocumentCategories\DocumentCategory;

/**
 * Class DocumentRelationship
 */
trait DocumentRelationship
{
    public function categories()
    {
        return $this->belongsToMany(DocumentCategory::class, 'document_map_categories', 'document_id', 'category_id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
