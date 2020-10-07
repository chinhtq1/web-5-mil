<?php

namespace App\Models\Events\Traits\Attribute;

/**
 * Class EventAttribute.
 */
trait EventAttribute
{

    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">' .
            $this->getEditButtonAttribute('edit-event', 'admin.events.edit') .
            $this->getDeleteButtonAttribute('delete-event', 'admin.events.destroy') .
            '</div>';
    }

    public function getShowLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>" . trans('labels.general.show') . '</label>';
        }

        return "<label class='label label-danger'>" . trans('labels.general.not_show') . '</label>';
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->attributes['show'] == 1;
    }
}
