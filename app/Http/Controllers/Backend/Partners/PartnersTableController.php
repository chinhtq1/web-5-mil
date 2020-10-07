<?php

namespace App\Http\Controllers\Backend\Partners;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Partners\PartnerRepository;
use App\Http\Requests\Backend\Partners\ManagePartnerRequest;

/**
 * Class PartnersTableController.
 */
class PartnersTableController extends Controller
{

    protected $partner;

    /**
     * contructor to initialize repository object
     * @param PartnerRepository $partner;
     */
    public function __construct(PartnerRepository $partner)
    {
        $this->partner = $partner;
    }


    public function __invoke(ManagePartnerRequest $request)
    {
        return Datatables::of($this->partner->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($partner) {
                return $partner->status_label;
            })
            ->addColumn('featured_image', function ($partner) {
                return $partner->featured_image_label;
            })
            ->addColumn('created_by', function ($partner) {
                return $partner->user_name;
            })
            ->addColumn('actions', function ($partner) {
                return $partner->action_buttons;
            })
            ->make(true);
    }
}
