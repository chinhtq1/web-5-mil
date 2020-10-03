<?php


namespace App\Http\Controllers\Frontend\Products;

use App\Http\Controllers\Frontend\BaseController;
use App\Repositories\Backend\ProductCategories\ProductCategoryRepository;
use App\Repositories\Backend\Products\ProductRepository;

class ProductController extends BaseController
{
    private $status = [
        'Published' => 'Published',
    ];
    protected $categories = null;

    protected $productCategoryRepo;
    protected $productRepo;

    public function __construct(
        ProductCategoryRepository $productCategoryRepository,
        ProductRepository $productRepository
    )
    {
        parent::__construct();
        $this->productCategoryRepo = $productCategoryRepository;
        $this->productRepo = $productRepository;
        $this->categories = $this->productCategoryRepo->query()->whereStatus(1)->get();
    }

    public function index()
    {
        $products = $this->productRepo->getPaginated(6, $this->status, 'publish_datetime', 'asc');
        return view('frontend.products.index')->with([
            'products' => $products,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
            'categories' => $this->categories,
        ]);
    }

    public function listByCategory($slug)
    {
        $category = $this->productCategoryRepo->getBySlug($slug);
        $products = $this->productRepo->getByCategory($category, 6, 'publish_datetime', 'asc');
        return view('frontend.products.index')->with([
            'products' => $products,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
            'categories' => $this->categories,
            'active_category' => $category
        ]);
    }


    public function detail($slug)
    {
        $product = $this->productRepo->getBySlug($slug);
        $relateProducts = $this->productRepo->getRandomProductList(3)->get();
        return view('frontend.products.single-product')->with([
            'product' => $product,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
            'categories' => $this->categories,
            'related_products' => $relateProducts
        ]);
    }
}
