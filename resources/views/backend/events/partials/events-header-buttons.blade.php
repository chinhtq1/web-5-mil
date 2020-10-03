@permission( 'create-event' )
<a href="{{ route( 'admin.events.create' ) }}" class="btn btn-primary">
    <i class="fa fa-plus"></i> {{ trans( 'menus.backend.events.create' ) }}
</a>
@endauth
<a href="{{ route( 'admin.events.index' ) }}" class="btn btn-info">
        <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.events.all' ) }}
</a>
