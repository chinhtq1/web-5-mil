<?php


namespace App\Http\Controllers\Frontend;

use App\Models\BlogCategories\BlogCategory;
use App\Models\DocumentCategories\DocumentCategory;
use App\Models\ProductCategories\ProductCategory;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    protected $blogMenus;
    protected $productMenus;
    protected $documentMenus;

    public function __construct()
    {
        $this->blogMenus = BlogCategory::query()->where('status', 1)->get();
        $this->productMenus = ProductCategory::query()->where('status', 1)->get();
        $this->documentMenus = DocumentCategory::query()->where('status', 1)->get();

    }
}
