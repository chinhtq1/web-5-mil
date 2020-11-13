<!--header-top-->
<div class="header-top" id="home" style="background: {{ appSettings()->header_color ? appSettings()->header_color : "rgba(71, 71, 71, 1.0)" }} ">
    <div class="container">
        <div class="head-main">
            <div class="col-md-4 head-left">
                <ul>
                    <li><a target="_blank" href="{{ appSettings()->fb_link ? appSettings()->fb_link : "" }}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a target="_blank" href="{{ appSettings()->twitter_link ? appSettings()->twitter_link : "" }}"><i class="fab fa-youtube"></i></a></li>
                    <li><a target="_blank" href="{{ appSettings()->printerest_link ? appSettings()->printerest_link : "" }}"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 head-middle">
                <a href="{{ route('frontend.index') }}">
                        <img class="logo-header"
                                src="{{ appSettings()->company_logo ? Storage::disk('public')->url('img/settings/company-details/' . appSettings()->company_logo) : ''}}" alt="{{ appSettings()->app_name }}"></a>
            </div>
            <div class="col-md-4 head-right">
                <div id="sb-search" class="sb-search">
                    {!! Form::open(['route' => 'frontend.search', 'role' => 'form', 'method' => 'get']) !!}
                        <input class="sb-search-input" placeholder="Tìm kiếm" type="search" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search" style="background-color: {{ appSettings()->header_color ? appSettings()->header_color : "rgba(71, 71, 71, 1.0)" }} "> </span>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--header-top-->
