<?php

namespace App\Http\Controllers\Backend\Subcribes;

use App\Models\Subcribes\Subcribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Subcribes\CreateResponse;
use App\Http\Responses\Backend\Subcribes\EditResponse;
use App\Repositories\Backend\Subcribes\SubcribeRepository;
use App\Http\Requests\Backend\Subcribes\ManageSubcribeRequest;
use App\Http\Requests\Backend\Subcribes\CreateSubcribeRequest;
use App\Http\Requests\Backend\Subcribes\StoreSubcribeRequest;
use App\Http\Requests\Backend\Subcribes\DeleteSubcribeRequest;

/**
 * SubcribesController
 */
class SubcribesController extends Controller
{
    /**
     * variable to store the repository object
     * @var SubcribeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SubcribeRepository $repository;
     */
    public function __construct(SubcribeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Subcribes\ManageSubcribeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSubcribeRequest $request)
    {
        return new ViewResponse('backend.subcribes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSubcribeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Subcribes\CreateResponse
     */
    public function create(CreateSubcribeRequest $request)
    {
        return new CreateResponse('backend.subcribes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSubcribeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSubcribeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.subcribes.index'), ['flash_success' => trans('alerts.backend.subcribes.created')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSubcribeRequestNamespace  $request
     * @param  App\Models\Subcribes\Subcribe  $subcribe
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Subcribe $subcribe, DeleteSubcribeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($subcribe);
        //returning with successfull message
        return new RedirectResponse(route('admin.subcribes.index'), ['flash_success' => trans('alerts.backend.subcribes.deleted')]);
    }
    
}
