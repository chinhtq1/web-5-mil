@permission( 'create-documentcategory' )
<a href="{{ route( 'admin.documentcategories.create' ) }}" class="btn btn-primary">
    <i class="fa fa-plus"></i> {{ trans( 'menus.backend.documentcategories.create' ) }}
</a>
@endauth
<a href="{{ route( 'admin.documentcategories.index' ) }}" class="btn btn-info">
        <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.documentcategories.all' ) }}
</a>
