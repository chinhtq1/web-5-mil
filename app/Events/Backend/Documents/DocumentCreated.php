<?php

namespace App\Events\Backend\Documents;

use Illuminate\Queue\SerializesModels;

class DocumentCreated
{
    use SerializesModels;

    public $document;

    public function __construct($document)
    {
        $this->document = $document;
    }

}
