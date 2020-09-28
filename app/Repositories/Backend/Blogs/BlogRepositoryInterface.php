<?php


namespace App\Repositories\Backend\Blogs;


interface BlogRepositoryInterface
{
    /* Lấy danh sách bài viết theo danh mục */
    public function getByCategory($category, $per_page, $order_by, $sort);

    /* Lấy random danh sách bài viết */
    public function getRandomBlogList($count);
}
