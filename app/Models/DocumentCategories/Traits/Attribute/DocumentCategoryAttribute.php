<?php

namespace App\Models\DocumentCategories\Traits\Attribute;

/**
 * Class DocumentCategoryAttribute.
 */
trait DocumentCategoryAttribute
{
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                    ' . $this->getEditButtonAttribute('edit-documentcategory', 'admin.documentcategories.edit') . '
                    ' . $this->getDeleteButtonAttribute('delete-blogcategory', 'admin.documentcategories.destroy') . '
                </div>';
    }

    /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>" . trans('labels.general.active') . '</label>';
        }

        return "<label class='label label-danger'>" . trans('labels.general.inactive') . '</label>';
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status == 1;
    }
}
