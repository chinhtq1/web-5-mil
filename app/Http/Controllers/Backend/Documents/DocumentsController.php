<?php

namespace App\Http\Controllers\Backend\Documents;

use App\Http\Responses\Backend\Documents\IndexResponse;
use App\Models\DocumentCategories\DocumentCategory;
use App\Models\Documents\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Documents\CreateResponse;
use App\Http\Responses\Backend\Documents\EditResponse;
use App\Repositories\Backend\Documents\DocumentRepository;
use App\Http\Requests\Backend\Documents\ManageDocumentRequest;
use App\Http\Requests\Backend\Documents\CreateDocumentRequest;
use App\Http\Requests\Backend\Documents\StoreDocumentRequest;
use App\Http\Requests\Backend\Documents\EditDocumentRequest;
use App\Http\Requests\Backend\Documents\UpdateDocumentRequest;
use App\Http\Requests\Backend\Documents\DeleteDocumentRequest;

/**
 * DocumentsController
 */
class DocumentsController extends Controller
{

    protected $document;

    protected $status = [
        'Published' => 'Published',
        'InActive'  => 'InActive',
    ];

    public function __construct(DocumentRepository $document)
    {
        $this->document = $document;
    }


    public function index(ManageDocumentRequest $request)
    {
        return new IndexResponse($this->status);
    }

    public function create(CreateDocumentRequest $request)
    {
        $documentCategories = DocumentCategory::getSelectData();
        return new CreateResponse($this->status, $documentCategories);
    }


    public function store(StoreDocumentRequest $request)
    {
        $input = $request->except(['_token']);
        $this->document->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.documents.index'), ['flash_success' => trans('alerts.backend.documents.created')]);
    }

    public function edit(Document $document, EditDocumentRequest $request)
    {
        $documentCategories = DocumentCategory::getSelectData();

        return new EditResponse($document, $this->status, $documentCategories);
    }


    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $input = $request->except(['_token']);
        $this->document->update( $document, $input );
        return new RedirectResponse(route('admin.documents.index'), ['flash_success' => trans('alerts.backend.documents.updated')]);
    }

    public function destroy(Document $document, DeleteDocumentRequest $request)
    {
        $this->document->delete($document);
        return new RedirectResponse(route('admin.documents.index'), ['flash_success' => trans('alerts.backend.documents.deleted')]);
    }
    
}
