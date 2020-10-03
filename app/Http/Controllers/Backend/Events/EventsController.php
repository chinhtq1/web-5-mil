<?php

namespace App\Http\Controllers\Backend\Events;

use App\Http\Responses\Backend\Events\IndexResponse;
use App\Models\Events\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Events\CreateResponse;
use App\Http\Responses\Backend\Events\EditResponse;
use App\Repositories\Backend\Events\EventRepository;
use App\Http\Requests\Backend\Events\ManageEventRequest;
use App\Http\Requests\Backend\Events\CreateEventRequest;
use App\Http\Requests\Backend\Events\StoreEventRequest;
use App\Http\Requests\Backend\Events\EditEventRequest;
use App\Http\Requests\Backend\Events\UpdateEventRequest;
use App\Http\Requests\Backend\Events\DeleteEventRequest;

/**
 * EventsController
 */
class EventsController extends Controller
{
    protected $status = [
        'Published' => 'Published',
        'InActive'  => 'InActive',
    ];

    protected $event;

    public function __construct(EventRepository $event)
    {
        $this->event = $event;
    }


    public function index(ManageEventRequest $request)
    {
        return new IndexResponse($this->status);
    }

    public function create(CreateEventRequest $request)
    {
        return new CreateResponse($this->status);
    }

    public function store(StoreEventRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->event->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.events.index'), ['flash_success' => trans('alerts.backend.events.created')]);
    }

    public function edit(Event $event, EditEventRequest $request)
    {
        return new EditResponse($event, $this->status);
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->event->update( $event, $input );
        return new RedirectResponse(route('admin.events.index'), ['flash_success' => trans('alerts.backend.events.updated')]);
    }

    public function destroy(Event $event, DeleteEventRequest $request)
    {
        //Calling the delete method on repository
        $this->event->delete($event);
        //returning with successfull message
        return new RedirectResponse(route('admin.events.index'), ['flash_success' => trans('alerts.backend.events.deleted')]);
    }
    
}
