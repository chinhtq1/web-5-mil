<?php


namespace App\Http\Controllers\Frontend;
use App\Models\BlogCategories\BlogCategory;
use App\Models\ProductCategories\ProductCategory;
use App\Repositories\Backend\BlogCategories\BlogCategoriesRepository;
use App\Repositories\Backend\Blogs\BlogsRepository;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    protected $blogMenus;
    protected $productMenus;

    public function __construct()
    {
        $this->blogMenus = BlogCategory::query()->where('status', 1)->get();
        $this->productMenus = ProductCategory::query()->where('status', 1)->get();

    }
}
