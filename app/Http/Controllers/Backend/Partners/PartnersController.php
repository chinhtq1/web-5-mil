<?php

namespace App\Http\Controllers\Backend\Partners;

use App\Models\Partners\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Partners\CreateResponse;
use App\Http\Responses\Backend\Partners\EditResponse;
use App\Repositories\Backend\Partners\PartnerRepository;
use App\Http\Requests\Backend\Partners\ManagePartnerRequest;
use App\Http\Requests\Backend\Partners\CreatePartnerRequest;
use App\Http\Requests\Backend\Partners\StorePartnerRequest;
use App\Http\Requests\Backend\Partners\EditPartnerRequest;
use App\Http\Requests\Backend\Partners\UpdatePartnerRequest;
use App\Http\Requests\Backend\Partners\DeletePartnerRequest;

/**
 * PartnersController
 */
class PartnersController extends Controller
{

    protected $partners;


    public function __construct(PartnerRepository $partners)
    {
        $this->partners = $partners;
    }


    public function index(ManagePartnerRequest $request)
    {
        return new ViewResponse('backend.partners.index');
    }


    public function create(CreatePartnerRequest $request)
    {
        return new ViewResponse('backend.partners.create');
    }

    public function store(StorePartnerRequest $request)
    {
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->partners->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.partners.index'), ['flash_success' => trans('alerts.backend.partners.created')]);
    }

    public function edit(Partner $partner, EditPartnerRequest $request)
    {
        return new EditResponse($partner);
    }

    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $input = $request->except(['_token']);
        $this->partners->update( $partner, $input );
        return new RedirectResponse(route('admin.partners.index'), ['flash_success' => trans('alerts.backend.partners.updated')]);
    }

    public function destroy(Partner $partner, DeletePartnerRequest $request)
    {
        $this->partners->delete($partner);
        return new RedirectResponse(route('admin.partners.index'), ['flash_success' => trans('alerts.backend.partners.deleted')]);
    }
    
}
