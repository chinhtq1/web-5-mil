<!-- Create new -->
@permission('create-blog')
<a href="{{route('admin.blogs.create')}}" class="btn btn-primary">
    <i class="fa fa-plus"></i> {{trans('menus.backend.blogs.create')}}</a>
@endauth

<!-- End create New -->
<a href="{{route('admin.blogs.index')}}" class="btn btn-info">
    <i class="fa fa-list-ul"></i> {{trans('menus.backend.blogs.all')}}</a>
