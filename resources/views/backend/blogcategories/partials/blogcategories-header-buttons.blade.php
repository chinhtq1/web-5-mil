@permission('create-blog-category')
<a href="{{route('admin.blogCategories.create')}}" class="btn btn-primary">
    <i class="fa fa-plus"></i> {{trans('menus.backend.blogcategories.create')}}</a>
@endauth
<a href="{{route('admin.blogCategories.index')}}" class="btn btn-info">
    <i class="fa fa-list-ul"></i> {{trans('menus.backend.blogcategories.all')}}</a>
