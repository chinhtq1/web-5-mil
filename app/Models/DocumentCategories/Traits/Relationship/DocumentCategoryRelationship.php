<?php

namespace App\Models\DocumentCategories\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\Documents\Document;

/**
 * Class DocumentCategoryRelationship
 */
trait DocumentCategoryRelationship
{
    public function creator()
    {
        return $this->belongsTo(
            User::class,
            'created_by');
    }

    /**
     * Get Blogs
     */
    public function documents() {
        return $this->belongsToMany(
            Document::class,
            'document_map_categories',
            'category_id',
            'document_id');
    }
}
