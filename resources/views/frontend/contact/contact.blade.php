@extends('frontend.layouts.app')

@section('main-content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                    <li class="active">Liên hệ</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--contact-starts-->
    <div class="contact">
        <div class="container">
            <div class="contact-top heading">
                <h3 style="color: rgba(247, 114, 51, 1) !important;">Liên hệ với chúng tôi</h3>
            </div>
            <div class="contact-bottom">
                <div class="col-md-4 contact-left">
                    <div class="add row">
                        <div class="col-md-3 text-center">
                            <img height="32" src="{{ Storage::disk('public')->url('img/settings/company-details/' . appSettings()->company_logo) }}"
                                 alt="{{ appSettings()->company_name }}">
                            <br>
                        </div>
                        <div class="col-md-9">
                            <h5>Địa chỉ</h5>
                            <address>
                                <strong>{{ appSettings()->company_name }}</strong><br>
                                {{ appSettings()->company_address }}
                            </address>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 contact-right">
                    <form>
                        <div class="col-md-6 c-left">
                            <input type="text" placeholder="Tên">
                            <input type="text" placeholder="Email">
                            <input type="text" placeholder="Số điện thoại">
                        </div>
                        <div class="col-md-6 c-left">
                            <textarea placeholder="Nội dung tin nhắn" required></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="submit-btn">
                            <input type="submit" value="Gửi thông tin">
                        </div>
                    </form>
                </div>

                <div class="clearfix"></div>

                <div class="map col-md-12">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe height="389"
                                    id="gmap_canvas"
                                    src="{{ appSettings()->company_map }}"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

                            </iframe>
                            <a href="https://www.whatismyip-address.com/nordvpn-coupon/"></a>
                        </div>
                        <style>
                            .mapouter{position:relative;text-align:right;height:389px;width:100%;}
                            .gmap_canvas {overflow:hidden;background:none!important;height:389px;width:100%;}
                        </style>
                    </div>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    <!--contact-end-->
@endsection
