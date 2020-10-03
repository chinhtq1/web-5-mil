<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\BaseController;
use App\Models\Settings\Setting;
use App\Repositories\Backend\Blogs\BlogsRepository;
use App\Repositories\Frontend\Pages\PagesRepository;

/**
 * Class FrontendController.
 */
class FrontendController extends BaseController
{
    private $status = 'Published';

    public function index(BlogsRepository $blogsRepository)
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        $blogs = $blogsRepository->getRandomBlogList(3)->get();

        return view('frontend.index', [
            'google_analytics' => $google_analytics,
            'blogs' => $blogs,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
            ]);
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
