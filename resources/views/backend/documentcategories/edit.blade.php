@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.documentcategories.management') . ' | ' . trans('labels.backend.documentcategories.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.documentcategories.management') }}
        <small>{{ trans('labels.backend.documentcategories.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($documentcategory, ['route' => ['admin.documentcategories.update', $documentcategory], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-documentcategory']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.documentcategories.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.documentcategories.partials.documentcategories-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.documentcategories.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.documentcategories.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
