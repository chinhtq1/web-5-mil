<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(config('access.menus_table'))->truncate();
        $menu = [
            'id'                    => 1,
            'type'                  => 'backend',
            'name'                  => 'Backend Sidebar Menu',
            'items'                 => '[
            {"view_permission_id":"view-access-management","icon":"fa-users","open_in_new_tab":0,"url_type":"route","url":"","name":"Access Management","id":11,"content":"Access Management","children":[{"view_permission_id":"view-user-management","open_in_new_tab":0,"url_type":"route","url":"admin.access.user.index","name":"User Management","id":12,"content":"User Management"},{"view_permission_id":"view-role-management","open_in_new_tab":0,"url_type":"route","url":"admin.access.role.index","name":"Role Management","id":13,"content":"Role Management"},
            {"view_permission_id":"view-permission-management","open_in_new_tab":0,"url_type":"route","url":"admin.access.permission.index","name":"Permission Management","id":14,"content":"Permission Management"}]},
            {"view_permission_id":"view-module","icon":"fa-wrench","open_in_new_tab":0,"url_type":"route","url":"admin.modules.index","name":"Module","id":1,"content":"Module"},
            {"view_permission_id":"view-menu","icon":"fa-bars","open_in_new_tab":0,"url_type":"route","url":"admin.menus.index","name":"Menus","id":3,"content":"Menus"},
            {"view_permission_id":"view-page","icon":"fa-file-text","open_in_new_tab":0,"url_type":"route","url":"admin.pages.index","name":"Pages","id":2,"content":"Pages"},
            {"view_permission_id":"edit-settings","icon":"fa-gear","open_in_new_tab":0,"url_type":"route","url":"admin.settings.edit?setting=1","name":"Settings","id":9,"content":"Settings"},
            {"view_permission_id":"view-blog","icon":"fa-commenting","open_in_new_tab":0,"url_type":"route","url":"","name":"Quản lý bài viết","id":15,"content":"Quản lý bài viết","children":[{"view_permission_id":"view-blog-category","open_in_new_tab":0,"url_type":"route","url":"admin.blogCategories.index","name":"Quản lý Danh mục bài viết","id":16,"content":"Quản lý Danh mục bài viết"},{"view_permission_id":"view-blog-tag","open_in_new_tab":0,"url_type":"route","url":"admin.blogTags.index","name":"Quản lý Tag Bài viết","id":17,"content":"Quản lý Tag Bài viết"},{"view_permission_id":"view-blog","open_in_new_tab":0,"url_type":"route","url":"admin.blogs.index","name":"Quản lý bài viết","id":18,"content":"Quản lý bài viết"}]},
            {"view_permission_id":"view-documents-permission","icon":"fa-file","open_in_new_tab":0,"url_type":"route","url":"","name":"Quản lý tài liệu","id":19,"content":"Quản lý tài liệu","children":[{"view_permission_id":"view-documentcategories-permission","open_in_new_tab":0,"url_type":"route","url":"admin.documentcategories.index","name":"Quản lý Danh mục tài liệu","id":20,"content":"Quản lý Danh mục tài liệu"},{"view_permission_id":"view-documents-permission","open_in_new_tab":0,"url_type":"route","url":"admin.documents.index","name":"Quản lý tài liệu","id":21,"content":"Quản lý tài liệu"}]},
            {"view_permission_id":"view-product","icon":"fa-product-hunt","open_in_new_tab":0,"url_type":"route","url":"","name":"Quản lý sản phẩm","id":22,"content":"Quản lý sản phẩm","children":[{"view_permission_id":"view-product-category","open_in_new_tab":0,"url_type":"route","url":"admin.productcategories.index","name":"Quản lý Danh mục sản phẩm","id":23,"content":"Quản lý Danh mục sản phẩm"},{"view_permission_id":"view-product","open_in_new_tab":0,"url_type":"route","url":"admin.products.index","name":"Quản lý sản phẩm","id":24,"content":"Quản lý sản phẩm"}]},
            {"view_permission_id":"view-faq","icon":"fa-question-circle","open_in_new_tab":0,"url_type":"route","url":"admin.faqs.index","name":"Faq Management","id":25,"content":"Faq Management"},
            {"view_permission_id":"view-event-permission","icon":"fa-question-circle","open_in_new_tab":0,"url_type":"route","url":"admin.events.index","name":"Quản lý sự kiện","id":26,"content":"Quản lý sự kiện"}]',
            'created_by'            => 1,
            'created_at'            => Carbon::now(),
        ];

        DB::table(config('access.menus_table'))->insert($menu);
    }
}
