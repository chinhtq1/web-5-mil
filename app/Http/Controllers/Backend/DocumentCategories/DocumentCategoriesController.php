<?php

namespace App\Http\Controllers\Backend\DocumentCategories;

use App\Models\DocumentCategories\DocumentCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\DocumentCategories\CreateResponse;
use App\Http\Responses\Backend\DocumentCategories\EditResponse;
use App\Repositories\Backend\DocumentCategories\DocumentCategoryRepository;
use App\Http\Requests\Backend\DocumentCategories\ManageDocumentCategoryRequest;
use App\Http\Requests\Backend\DocumentCategories\CreateDocumentCategoryRequest;
use App\Http\Requests\Backend\DocumentCategories\StoreDocumentCategoryRequest;
use App\Http\Requests\Backend\DocumentCategories\EditDocumentCategoryRequest;
use App\Http\Requests\Backend\DocumentCategories\UpdateDocumentCategoryRequest;
use App\Http\Requests\Backend\DocumentCategories\DeleteDocumentCategoryRequest;

/**
 * DocumentCategoriesController
 */
class DocumentCategoriesController extends Controller
{

    protected $documentcategory;


    public function __construct(DocumentCategoryRepository $documentcategory)
    {
        $this->documentcategory = $documentcategory;
    }


    public function index(ManageDocumentCategoryRequest $request)
    {
        return new ViewResponse('backend.documentcategories.index');
    }

    public function create(CreateDocumentCategoryRequest $request)
    {
        return new ViewResponse('backend.documentcategories.create');
    }

    public function store(StoreDocumentCategoryRequest $request)
    {
        $input = $request->except(['_token']);
        $this->documentcategory->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.documentcategories.index'), ['flash_success' => trans('alerts.backend.documentcategories.created')]);
    }

    public function edit(DocumentCategory $documentcategory, EditDocumentCategoryRequest $request)
    {
        return new EditResponse($documentcategory);
    }

    public function update(UpdateDocumentCategoryRequest $request, DocumentCategory $documentcategory)
    {
        $input = $request->except(['_token']);
        $this->documentcategory->update($documentcategory, $input);
        return new RedirectResponse(route('admin.documentcategories.index'), ['flash_success' => trans('alerts.backend.documentcategories.updated')]);
    }

    public function destroy(DocumentCategory $documentcategory, DeleteDocumentCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->documentcategory->delete($documentcategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.documentcategories.index'), ['flash_success' => trans('alerts.backend.documentcategories.deleted')]);
    }

}
