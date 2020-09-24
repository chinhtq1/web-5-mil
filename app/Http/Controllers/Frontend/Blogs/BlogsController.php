<?php


namespace App\Http\Controllers\Frontend\Blogs;
use App\Models\Blogs\Blog;
use App\Repositories\Backend\Blogs\BlogsRepository;
use Illuminate\Routing\Controller;

class BlogsController extends Controller
{
    private $status = [
        'Published' => 'Published',
    ];

    public function index(BlogsRepository $blogsRepository) {
        $blogs = $blogsRepository->findByStatus($this->status)->get();
        return view('frontend.blogs.index')->with([
            'blogs' => $blogs,
        ]);
    }

    public function detail($slug, BlogsRepository $blogsRepository) {
        $blog = $blogsRepository->findBySlug($slug);
        return view('frontend.blogs.single-blog')->with([
            'blog' => $blog,
        ]);
    }
}
