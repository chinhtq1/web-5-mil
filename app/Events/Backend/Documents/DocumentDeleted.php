<?php

namespace App\Events\Backend\Documents;

use Illuminate\Queue\SerializesModels;

class DocumentDeleted
{
    use SerializesModels;

    public $document;

    public function __construct($document)
    {
        $this->document = $document;
    }
}
