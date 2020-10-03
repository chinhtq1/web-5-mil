<?php

namespace App\Http\Controllers\Backend\Documents;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Documents\DocumentRepository;
use App\Http\Requests\Backend\Documents\ManageDocumentRequest;

/**
 * Class DocumentsTableController.
 */
class DocumentsTableController extends Controller
{

    protected $documents;
    
    public function __construct(DocumentRepository $documents)
    {
        $this->documents = $documents;
    }


    public function __invoke(ManageDocumentRequest $request)
    {
        return Datatables::of($this->documents->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($documents) {
                return $documents->status;
            })
            ->addColumn('publish_datetime', function ($documents) {
                return $documents->publish_datetime->format('d/m/Y h:i A');
            })
            ->addColumn('created_by', function ($documents) {
                return $documents->user_name;
            })
            ->addColumn('created_at', function ($documents) {
                return $documents->created_at->toDateString();
            })
            ->addColumn('actions', function ($documents) {
                return $documents->action_buttons;
            })
            ->make(true);
    }
}
