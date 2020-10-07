<?php

namespace App\Http\Controllers\Frontend;


use App\Models\Settings\Setting;
use App\Repositories\Backend\Blogs\BlogsRepository;
use App\Repositories\Backend\Events\EventRepository;
use App\Repositories\Backend\Banners\BannerRepository;

use App\Repositories\Backend\Partners\PartnerRepository;
use App\Repositories\Frontend\Pages\PagesRepository;

/**
 * Class FrontendController.
 */
class FrontendController extends BaseController
{
    private $status = 'Published';

    public function index(
        BlogsRepository $blogsRepository,
        EventRepository $eventRepository,
        BannerRepository $bannerRepository,
        PartnerRepository $partnerRepository
    )
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        $blogs = $blogsRepository->query()->where('show', '=',  1)->where('status','=','Published')->orderBy('publish_datetime')->take(3)->get();
        $events = $eventRepository->query()->where('show', '=',  1)->where('status','=','Published')->orderBy('publish_datetime')->take(3)->get();
        $banners = $bannerRepository->query()->where('status','=',1)->get();
        $partners = $partnerRepository->query()->where('status','=',1)->get();

        return view('frontend.index', [
            'google_analytics' => $google_analytics,
            'blogs' => $blogs,
            'events' => $events,
            'banners' => $banners,
            'partners' => $partners,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
        ]);
    }

    /**
     * show page by $page_slug.
     */
    public function about(PagesRepository $pages)
    {
        $result = $pages->findBySlug('ve-chung-toi');

        return view('frontend.pages.index')
            ->withpage($result);
    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);

        return view('frontend.pages.index')
            ->withpage($result);
    }
}
