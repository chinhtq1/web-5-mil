@permission( 'create-productcategory' )
<a href="{{ route( 'admin.productcategories.create' ) }}" class="btn btn-primary">
    <i class="fa fa-plus"></i> {{ trans( 'menus.backend.productcategories.create' ) }}
</a>
@endauth
<a href="{{ route( 'admin.productcategories.index' ) }}" class="btn btn-info">
    <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.productcategories.all' ) }}
</a>
