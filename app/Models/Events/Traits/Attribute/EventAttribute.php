<?php

namespace App\Models\Events\Traits\Attribute;

/**
 * Class EventAttribute.
 */
trait EventAttribute
{

    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.
            $this->getEditButtonAttribute('edit-event', 'admin.events.edit').
            $this->getDeleteButtonAttribute('delete-event', 'admin.events.destroy').
            '</div>';
    }
}
