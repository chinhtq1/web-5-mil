@permission('create-blog-tag')
<a href="{{route('admin.blogTags.create')}}" class="btn btn-info">
    <i class="fa fa-plus"></i> {{trans('menus.backend.blogtags.create')}}</a>
@endauth
<a href="{{route('admin.blogTags.index')}}" class="btn btn-primary">
    <i class="fa fa-list-ul"></i> {{trans('menus.backend.blogtags.all')}}</a>
