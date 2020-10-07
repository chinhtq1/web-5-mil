<?php

namespace App\Http\Controllers\Backend\Banners;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Banners\BannerRepository;
use App\Http\Requests\Backend\Banners\ManageBannerRequest;

/**
 * Class BannersTableController.
 */
class BannersTableController extends Controller
{

    protected $banner;


    public function __construct(BannerRepository $banner)
    {
        $this->banner = $banner;
    }


    public function __invoke(ManageBannerRequest $request)
    {
        return Datatables::of($this->banner->getForDataTable())
            ->escapeColumns(['title1'])
            ->addColumn('title2', function ($banners) {
                return $banners->status;
            })
            ->addColumn('status', function ($banners) {
                return $banners->status_label;
            })
            ->addColumn('featured_image', function ($banners) {
                return $banners->featured_image_label;
            })
            ->addColumn('created_by', function ($banners) {
                return $banners->user_name;
            })
            ->addColumn('actions', function ($banners) {
                return $banners->action_buttons;
            })
            ->make(true);
    }
}
