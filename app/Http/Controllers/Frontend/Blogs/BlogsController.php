<?php


namespace App\Http\Controllers\Frontend\Blogs;
use App\Http\Controllers\Frontend\BaseController;
use App\Repositories\Backend\BlogCategories\BlogCategoriesRepository;
use App\Repositories\Backend\Blogs\BlogsRepository;

class BlogsController extends BaseController
{
    private $status = [
        'Published' => 'Published',
    ];
    protected $categories = null;

    protected $blogCategoryRepo;
    protected $blogRepo;

    public function __construct(
        BlogCategoriesRepository $blogCategoryRepo,
        BlogsRepository $blosRepository
    ){
        parent::__construct();
        $this->blogCategoryRepo = $blogCategoryRepo;
        $this->blogRepo = $blosRepository;
        $this->categories = $this->blogCategoryRepo->query()->whereStatus(1)->get();
    }

    public function index() {
        $blogs = $this->blogRepo->getPaginated(6, $this->status,'publish_datetime', 'asc');
        return view('frontend.blogs.index')->with([
            'blogs' => $blogs,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
            'categories' => $this->categories,
        ]);
    }

    public function listByCategory($slug)
    {
        $category = $this->blogCategoryRepo->getBySlug($slug);
        $blogs = $this->blogRepo->getByCategory($category, 6,'publish_datetime', 'asc' );
        return view('frontend.blogs.index')->with([
            'blogs' => $blogs,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
            'categories' => $this->categories,
            'active_category' => $category
        ]);
    }

    public function detail($slug) {
        $blog = $this->blogRepo->getBySlug($slug);
        $relatedBlogs = $this->blogRepo->getRandomBlogList(3)->get();
        return view('frontend.blogs.single-blog')->with([
            'blog' => $blog,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
            'categories' => $this->categories,
            'related_blogs' => $relatedBlogs
        ]);
    }
}
