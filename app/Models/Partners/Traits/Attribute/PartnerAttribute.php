<?php

namespace App\Models\Partners\Traits\Attribute;

use Illuminate\Support\Facades\Storage;

/**
 * Class PartnerAttribute.
 */
trait PartnerAttribute
{
    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">' .
            $this->getEditButtonAttribute('edit-partner', 'admin.partners.edit') .
            $this->getDeleteButtonAttribute('delete-partner', 'admin.partners.destroy') .
            '</div>';
    }

    public function getFeaturedImageLabelAttribute()
    {
        $path = Storage::disk('public')->url('img/partner/'.$this->attributes['featured_image']);
        return '<img height="100" src="'.$path.'" >';
    }

    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>" . trans('labels.general.active') . '</label>';
        }

        return "<label class='label label-danger'>" . trans('labels.general.inactive') . '</label>';
    }

    public function isActive()
    {
        return $this->attributes['status'] == 1;
    }
}
