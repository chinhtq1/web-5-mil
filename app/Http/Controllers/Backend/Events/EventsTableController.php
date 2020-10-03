<?php

namespace App\Http\Controllers\Backend\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Events\ManageEventRequest;
use App\Repositories\Backend\Events\EventRepository;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class EventsTableController.
 */
class EventsTableController extends Controller
{

    protected $event;

    public function __construct(EventRepository $event)
    {
        $this->event = $event;
    }


    public function __invoke(ManageEventRequest $request)
    {
        return Datatables::of($this->event->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($events) {
                return $events->status;
            })
            ->addColumn('start_datetime', function ($events) {
                return $events->start_datetime->format('d/m/Y h:i A');
            })
            ->addColumn('end_datetime', function ($events) {
                return $events->end_datetime->format('d/m/Y h:i A');
            })
            ->addColumn('publish_datetime', function ($events) {
                return $events->publish_datetime->format('d/m/Y h:i A');
            })
            ->addColumn('created_by', function ($blogs) {
                return $blogs->user_name;
            })
            ->addColumn('created_at', function ($blogs) {
                return $blogs->created_at->toDateString();
            })
            ->addColumn('actions', function ($blogs) {
                return $blogs->action_buttons;
            })
            ->make(true);
    }
}
