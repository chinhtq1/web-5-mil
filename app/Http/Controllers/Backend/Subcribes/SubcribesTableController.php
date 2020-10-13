<?php

namespace App\Http\Controllers\Backend\Subcribes;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Subcribes\SubcribeRepository;
use App\Http\Requests\Backend\Subcribes\ManageSubcribeRequest;

/**
 * Class SubcribesTableController.
 */
class SubcribesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var SubcribeRepository
     */
    protected $subcribe;

    /**
     * contructor to initialize repository object
     * @param SubcribeRepository $subcribe;
     */
    public function __construct(SubcribeRepository $subcribe)
    {
        $this->subcribe = $subcribe;
    }

    /**
     * This method return the data of the model
     * @param ManageSubcribeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageSubcribeRequest $request)
    {
        return Datatables::of($this->subcribe->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($subcribe) {
                return Carbon::parse($subcribe->created_at)->toDateString();
            })
            ->addColumn('actions', function ($subcribe) {
                return $subcribe->action_buttons;
            })
            ->make(true);
    }
}
