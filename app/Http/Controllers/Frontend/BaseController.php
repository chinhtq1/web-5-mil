<?php


namespace App\Http\Controllers\Frontend;
use App\Models\BlogCategories\BlogCategory;
use App\Repositories\Backend\BlogCategories\BlogCategoriesRepository;
use App\Repositories\Backend\Blogs\BlogsRepository;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public $menus;
    public function __construct()
    {
        $this->menus = BlogCategory::query()->where('status', 1)->get();
    }
}
