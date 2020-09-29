<?php

namespace App\Http\Responses\Backend\BlogCategory;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{

    protected $blogCategory;

    public function __construct($blogCategory)
    {
        $this->blogCategory = $blogCategory;
    }

    public function toResponse($request)
    {
        return view('backend.blogcategories.edit')
            ->with('blogcategory', $this->blogCategory);
    }
}
