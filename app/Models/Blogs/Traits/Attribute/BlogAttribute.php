<?php

namespace App\Models\Blogs\Traits\Attribute;

/**
 * Class BlogAttribute.
 */
trait BlogAttribute
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">' .
            $this->getEditButtonAttribute('edit-blog', 'admin.blogs.edit') .
            $this->getDeleteButtonAttribute('delete-blog', 'admin.blogs.destroy') .
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
