<?php

namespace App\Http\Controllers\Backend\Banners;

use App\Models\Banners\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Banners\CreateResponse;
use App\Http\Responses\Backend\Banners\EditResponse;
use App\Repositories\Backend\Banners\BannerRepository;
use App\Http\Requests\Backend\Banners\ManageBannerRequest;
use App\Http\Requests\Backend\Banners\CreateBannerRequest;
use App\Http\Requests\Backend\Banners\StoreBannerRequest;
use App\Http\Requests\Backend\Banners\EditBannerRequest;
use App\Http\Requests\Backend\Banners\UpdateBannerRequest;
use App\Http\Requests\Backend\Banners\DeleteBannerRequest;

/**
 * BannersController
 */
class BannersController extends Controller
{

    protected $banners;


    public function __construct(BannerRepository $banners)
    {
        $this->banners = $banners;
    }

    public function index(ManageBannerRequest $request)
    {
        return new ViewResponse('backend.banners.index');
    }

    public function create(CreateBannerRequest $request)
    {
        return new ViewResponse('backend.banners.create');
    }

    public function store(StoreBannerRequest $request)
    {
        $input = $request->except(['_token']);
        $this->banners->create($input);
        return new RedirectResponse(route('admin.banners.index'), ['flash_success' => trans('alerts.backend.banners.created')]);
    }

    public function edit(Banner $banner, EditBannerRequest $request)
    {
        return new EditResponse($banner);
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $input = $request->except(['_token']);
        $this->banners->update( $banner, $input );
        return new RedirectResponse(route('admin.banners.index'), ['flash_success' => trans('alerts.backend.banners.updated')]);
    }

    public function destroy(Banner $banner, DeleteBannerRequest $request)
    {
        $this->banners->delete($banner);
        return new RedirectResponse(route('admin.banners.index'), ['flash_success' => trans('alerts.backend.banners.deleted')]);
    }
    
}
