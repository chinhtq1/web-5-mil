<?php


namespace App\Http\Controllers\Frontend\Events;

use App\Http\Controllers\Frontend\BaseController;
use App\Repositories\Backend\BlogCategories\BlogCategoriesRepository;
use App\Repositories\Backend\Blogs\BlogsRepository;
use App\Repositories\Backend\Events\EventRepository;
use App\Repositories\Backend\ProductCategories\ProductCategoryRepository;

class EventsController extends BaseController
{
    private $status = [
        'Published' => 'Published',
    ];
    protected $eventRepo;

    public function __construct(
        EventRepository $eventRepository
    )
    {
        parent::__construct();
        $this->eventRepo = $eventRepository;
    }

    public function detail($slug)
    {
        $event = $this->eventRepo->getBySlug($slug);
        return view('frontend.events.single-event')->with([
            'event' => $event,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
        ]);
    }
}
