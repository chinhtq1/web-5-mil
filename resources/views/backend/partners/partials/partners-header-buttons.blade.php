
@permission( 'create-partner' )
    <a href="{{ route( 'admin.partners.create' ) }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> {{ trans( 'menus.backend.partners.create' ) }}
    </a>
@endauth

<a href="{{ route( 'admin.partners.index' ) }}" class="btn btn-info">
    <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.partners.all' ) }}
</a>
