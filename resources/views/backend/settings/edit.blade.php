@extends ('backend.layouts.app') 

@section ('title', trans('labels.backend.settings.management') . ' | ' . trans('labels.backend.settings.edit'))

@section('page-header')
<h1>
	{{ trans('labels.backend.settings.management') }}
	<small>{{ trans('labels.backend.settings.edit') }}</small>
</h1>
@endsection 

@section('content') 
{{ Form::model($setting, ['route' => ['admin.settings.update', $setting], 'class' => 'form-horizontal',
'role' => 'form', 'method' => 'PATCH','files' => true, 'id' => 'edit-settings']) }}

<div class="box box-info">
	<div class="box-header">
		<h3 class="box-title">{{ trans('labels.backend.settings.edit') }}</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body setting-block">
		<!-- Nav tabs -->
		<ul id="myTab" class="nav nav-tabs setting-tab-list" role="tablist">
			<li role="presentation" class="active">
				<a href="#tab1" aria-controls="home" role="tab" data-toggle="tab">SEO</a>
			</li>
			<li role="presentation">
				<a href="#tab2" aria-controls="1" role="tab" data-toggle="tab">Thông tin công ty</a>
			</li>
			<li role="presentation">
				<a href="#tab3" aria-controls="2" role="tab" data-toggle="tab">Trang chủ</a>
			</li>
			<li role="presentation">
				<a href="#tab4" aria-controls="3" role="tab" data-toggle="tab">Chỉnh sửa chung</a>
			</li>
			<li role="presentation">
				<a href="#tab5" aria-controls="4" role="tab" data-toggle="tab">Thông tin liên hệ</a>
			</li>
			<li role="presentation">
				<a href="#tab6" aria-controls="5" role="tab" data-toggle="tab">{{ trans('labels.backend.settings.google') }}</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div id="myTabContent" class="tab-content setting-tab">
			@include('backend.settings.tabs.tab1')
			@include('backend.settings.tabs.tab2')
			@include('backend.settings.tabs.tab3')
			@include('backend.settings.tabs.tab4')
			@include('backend.settings.tabs.tab5')
			@include('backend.settings.tabs.tab6')
		</div>
	</div>
	<!-- /.box-body -->
	<div class="box-footer">
		<div class="row">
			<div class="col-lg-offset-2 col-lg-10 footer-btn">
				{{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div><!--box-->

<!-- hidden setting id variable -->
<input type="hidden" data-id="{{ $setting->id }}" id="setting">
{{ Form::close() }} 
@endsection 

@section('after-scripts')
<script src='/js/backend/bootstrap-tabcollapse.js'></script>
<script>
	(function(){
		Backend.Utils.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		Backend.Settings.selectors.RouteURL = "{{ route('admin.removeIcon', -1) }}";
		Backend.Settings.init();
		
	})();

	window.load = function(){
		
	}
	/*
	var route = "{{ route('admin.removeIcon', -1) }}";
    var data_id = $('#setting').data('id');
    
    route = route.replace('-1', data_id);

    $('.remove-logo').click(function() {
        var data = $(this).data('id');

        swal({
            title: "Warning",
            text: "Are you sure you want to remove?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: true
            }, function (confirmed) {
                if (confirmed)
                {
                    console.log(data);
                    if(data=='logo')
                    {
                        value= 'logo';
                        $('.img-remove-logo').addClass('hidden');
                    }
                    else
                    {
                        value= 'favicon';
                        $('.img-remove-favicon').addClass('hidden');
                    }
                    $.ajax({
                        url: route,
                        type: "POST",
                        data: {data: value},
                    });
                }
            });
    });
	
   */
    $('#myTab').tabCollapse({
        tabsClass: 'hidden-sm hidden-xs',
        accordionClass: 'visible-sm visible-xs'
    });

</script>
@endsection
