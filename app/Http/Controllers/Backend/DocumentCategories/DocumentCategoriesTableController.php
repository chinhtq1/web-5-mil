<?php

namespace App\Http\Controllers\Backend\DocumentCategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DocumentCategories\ManageDocumentCategoryRequest;
use App\Repositories\Backend\DocumentCategories\DocumentCategoryRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class DocumentCategoriesTableController.
 */
class DocumentCategoriesTableController extends Controller
{

    protected $documentcategory;

    /**
     * contructor to initialize repository object
     * @param DocumentCategoryRepository $documentcategory ;
     */
    public function __construct(DocumentCategoryRepository $documentcategory)
    {
        $this->documentcategory = $documentcategory;
    }

    public function __invoke(ManageDocumentCategoryRequest $request)
    {
        return Datatables::of($this->documentcategory->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($documentcategory) {
                return $documentcategory->status_label;
            })
            ->addColumn('created_by', function ($documentcategory) {
                return $documentcategory->user_name;
            })
            ->addColumn('created_at', function ($documentcategory) {
                return Carbon::parse($documentcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($documentcategory) {
                return $documentcategory->action_buttons;
            })
            ->make(true);
    }
}
