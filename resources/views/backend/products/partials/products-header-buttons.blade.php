@permission( 'create-product' )
<a href="{{ route( 'admin.products.create' ) }}" class="btn btn-primary">
    <i class="fa fa-plus"></i> {{ trans( 'menus.backend.products.create' ) }}
</a>
@endauth

<a href="{{ route( 'admin.products.index' ) }}" class="btn btn-info">
    <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.products.all' ) }}
</a>
