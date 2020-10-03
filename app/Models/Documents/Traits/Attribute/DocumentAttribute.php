<?php

namespace App\Models\Documents\Traits\Attribute;

/**
 * Class DocumentAttribute.
 */
trait DocumentAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.
            $this->getEditButtonAttribute('edit-document', 'admin.documents.edit').
            $this->getDeleteButtonAttribute('delete-document', 'admin.documents.destroy').
            '</div>';
    }
}
