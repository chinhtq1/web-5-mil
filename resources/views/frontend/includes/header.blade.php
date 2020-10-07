<!--header-top-->
<div class="header-top" id="home" style="background: {{ appSettings()->header_color ? appSettings()->header_color : "rgba(71, 71, 71, 1.0)" }} ">
    <div class="container">
        <div class="head-main">
            <div class="col-md-4 head-left">
                <ul>
                    <li><a target="_blank" href="{{ appSettings()->fb_link ? appSettings()->fb_link : "" }}"><span class="fb"> </span></a></li>
                    <li><a target="_blank" href="{{ appSettings()->twitter_link ? appSettings()->twitter_link : "" }}"><span class="twit"> </span></a></li>
                    <li><a target="_blank" href="{{ appSettings()->printerest_link ? appSettings()->printerest_link : "" }}"><span class="pin"> </span></a></li>
                    <li><a target="_blank" href="{{ appSettings()->rss_link ? appSettings()->rss_link : "" }}"><span class="rss"> </span></a></li>
                </ul>
            </div>
            <div class="col-md-4 head-middle">
                <h1><a href="{{ route('frontend.index') }}">{{ appSettings()->header_title ? appSettings()->header_title : "" }}</a></h1>
            </div>
            <div class="col-md-4 head-right">
                <div id="sb-search" class="sb-search">
                    <form>
                        <input class="sb-search-input" placeholder="Tìm kiếm" type="search" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search"> </span>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--header-top-->
