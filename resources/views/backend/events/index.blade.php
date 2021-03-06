@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.events.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.events.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.events.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.events.partials.events-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="events-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.events.table.title') }}</th>
                            <th>{{ trans('labels.backend.events.table.startdate') }}</th>
                            <th>{{ trans('labels.backend.events.table.endate') }}</th>
                            <th>{{ trans('labels.backend.events.table.show') }}</th>
                            <th>{{ trans('labels.backend.events.table.status') }}</th>
                            <th>{{ trans('labels.backend.events.table.createdby') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th>
                                {!! Form::text('first_name', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.events.table.title')]) !!}
                                <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                            <th></th>
                            <th></th>
                            <th>
                                {!! Form::select('show', [0 => "Không hiển thị", 1 => "Hiển thị"], null, ["class" => "search-input-select form-control", "data-column" => 3, "placeholder" => trans('labels.backend.blogcategories.table.all')]) !!}
                            </th>
                            <th>
                                {!! Form::select('status', $status, null, ["class" => "search-input-select form-control", "data-column" => 2, "placeholder" => trans('labels.backend.blogs.table.all')]) !!}
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var dataTable = $('#events-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.events.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: '{{config('module.events.table')}}.name'},
                    {data: 'start_datetime', name: '{{config('module.events.table')}}.start_datetime'},
                    {data: 'end_datetime', name: '{{config('module.events.table')}}.end_datetime'},
                    {data: 'show', name: '{{config('module.events.table')}}.show'},
                    {data: 'status', name: '{{config('module.events.table')}}.status'},
                    {data: 'created_by', name: '{{config('module.events.table')}}.created_by'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
