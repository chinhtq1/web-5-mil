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
        $this->categories = $this->blogCategoryRepo->getAll();
    }

    public function index() {
        $blogs = $this->blogRepo->findByStatus($this->status)->get();
        return view('frontend.blogs.index')->with([
            'blogs' => $blogs,
            'menus' => $this->menus,
            'categories' => $this->categories,
        ]);
    }

    /**
     * List Post by Category
     * @param $slug
     */
    public function listByCategory($slug)
    {
        $category = $this->blogCategoryRepo->findBySlug($slug);
        $blogs = $this->blogRepo->getByCategory($category);
        return view('frontend.blogs.index')->with([
            'blogs' => $blogs,
            'menus' => $this->menus,
            'categories' => $this->categories,
            'active_category' => $category
        ]);
    }

    public function detail($slug) {
        $blog = $this->blogRepo->findBySlug($slug);
        $relatedBlogs = $this->blogRepo->getRandomBlogList(3);
        return view('frontend.blogs.single-blog')->with([
            'blog' => $blog,
            'menus' => $this->menus,
            'categories' => $this->categories,
            'related_blogs' => $relatedBlogs
        ]);
    }
}
