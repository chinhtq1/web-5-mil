@extends('frontend.layouts.app')
@section('title')
     | @isset($active_category) {{ $active_category->name }} @else {{ appSettings()->document_title ? appSettings()->document_title : '' }}  @endisset

@endsection
@section('after-css')
    <link rel="stylesheet" href="{{ asset('css/frontend/chocolat.css') }}" type="text/css" media="screen" charset="utf-8">
@endsection

@section('main-content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                    @isset($active_category)
                        <li><a href="{{ route('frontend.documents.index') }}">Tài liệu</a></li>
                        <li class="active">{{ $active_category->name }}</li>
                    @else
                        <li class="active">Tài liệu</li>
                    @endisset
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->

    <!--document-starts-->
    <div class="blog">
        <div class="container">
            <div class="blog-top heading">
                @isset($active_category)
                    <h3>{{ $active_category->name }}</h3>
                @else
                    <h3>Tài liệu</h3>
                @endisset
                    @if(count($documents)==0)<h4>Không có tài liệu</h4> @endif

            </div>
            <div class="blog-bottom">
                <div class="col-md-3 blog-left">
                    @include('frontend.documents.partials.categories-menu')
                </div>

                <!-- LIST BLOG -->
                <div class="col-md-9 blog-left">
                    @foreach($documents as $document)
                        <div class="single-youtube-channel">
                            <img src="{{ asset(config('common.file-type')[$document->type]) }}" style="width: 30px; height: 30px; margin-right: 2rem;"  alt="{{ $document->description }}"/>
                            <a href="{{ Storage::disk('public')->url('img/document/' . $document->file) }}">
                                {{ Illuminate\Support\Str::limit($document->name, 96, "...") }}
                            </a>
                            <a style="float: right" href="javascript:void(0)" class="download-file"
                               target="_blank"
                               data-file-url="{{ Storage::disk('public')->url('img/document/' . $document->file) }}"
                               data-file-name="{{ $document->file }}">
                                <i class="fa fa-download" aria-hidden="true"></i>  Tải về</a>
                        </div>
                    @endforeach
                </div>
                <!-- END LIST BLOG -->
                <div class="clearfix"></div>
            </div>

            <div>
                <div class="col-md-3 blog-left">
                </div>
                <div>
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
    <!--document-end-->
@endsection

@section('after-js')
    <script src="{{ asset('js/frontend/modernizr.custom.97074.js') }}"></script>
    <script src="{{ asset('js/frontend/jquery.chocolat.js') }}"></script>
    <!--light-box-files-->
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $('.gallery-grids a').Chocolat();
        });
    </script>
    <script type="text/javascript" src="{{ asset('js/frontend/FileSaver.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.download-file').click(function () {
                var fileUrl = $(this).data("file-url");
                var fileName = $(this).data("file-name");
                var blob = new Blob();
                saveAs(fileUrl, fileName);
            })
        })
    </script>
@endsection
