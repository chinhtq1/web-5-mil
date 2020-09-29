@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.products.management') . ' | ' . trans('labels.backend.products.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.products.management') }}
        <small>{{ trans('labels.backend.products.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.products.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-product','files' => true] ) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.products.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.products.partials.products-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            {{-- Including Form blade file --}}
            <div class="box-body">
                <div class="form-group">
                    @include("backend.products.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.products.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div><!--box-->
        </div>
    {{ Form::close() }}
@endsection

