<?php

namespace App\Models\Banners\Traits\Attribute;

use Illuminate\Support\Facades\Storage;

/**
 * Class BannerAttribute.
 */
trait BannerAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">' .
            $this->getEditButtonAttribute('edit-banner', 'admin.banners.edit') .
            $this->getDeleteButtonAttribute('delete-banner', 'admin.banners.destroy') .
            '</div>';
    }

    public function getFeaturedImageLabelAttribute()
    {
        $path = Storage::disk('public')->url('img/banner/'.$this->attributes['featured_image']);
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
