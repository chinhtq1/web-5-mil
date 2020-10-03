@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.documents.management') . ' | ' . trans('labels.backend.documents.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.documents.management') }}
        <small>{{ trans('labels.backend.documents.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($document, ['route' => ['admin.documents.update', $document], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-document', 'files' => true]) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.documents.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.documents.partials.documents-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.documents.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.documents.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
