<?php

namespace App\Events\Backend\DocumentCategories;

use Illuminate\Queue\SerializesModels;

class DocumentCategoryUpdated
{
    use SerializesModels;

    public $documentcategory;

    public function __construct($documentcategory)
    {
        $this->documentcategory = $documentcategory;
    }
}
