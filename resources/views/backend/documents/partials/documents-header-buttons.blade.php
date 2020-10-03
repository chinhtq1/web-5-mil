@permission( 'create-document' )
<a href="{{ route( 'admin.documents.create' ) }}" class="btn btn-primary">
    <i class="fa fa-plus"></i> {{ trans( 'menus.backend.documents.create' ) }}
</a>
@endauth
<a href="{{ route( 'admin.documents.index' ) }}" class="btn btn-info">
    <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.documents.all' ) }}
</a>
