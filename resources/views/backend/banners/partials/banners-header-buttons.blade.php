@permission( 'create-banner' )
    <a href="{{ route( 'admin.banners.create' ) }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> {{ trans( 'menus.backend.banners.create' ) }}
    </a>
@endauth

<a href="{{ route( 'admin.banners.index' ) }}" class="btn btn-info">
    <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.banners.all' ) }}
</a>
