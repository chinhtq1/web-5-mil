<!--footer-starts-->
<div class="footer" style="margin-top:4%">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 footer-left">
                <div class="a-1">
                    <img class="logo-footer company-logo" src="{{ Storage::disk('public')->url('img/settings/company-details/' . appSettings()->company_logo)}}" /><br>
                    <p class="company-name"><strong>{{ appSettings()->company_name }}</strong></p>
                </div>
                <br>
                <div class="a-1">
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    <p><strong>{{ appSettings()->company_address }}</strong></p>
                </div>
                <div class="a-1">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    <p><a href="mailto:example@email.com"><strong>{{ appSettings()->company_email }}</strong></a></p>
                </div>
                <div class="a-1">
                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                    <p><strong>{{ appSettings()->company_contact_1 }}</strong></p>
                </div>
                <div class="a-1">
                    <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                    <p><strong>{{ appSettings()->company_contact_2 }}</strong></p>
                </div>
            </div>
            <div class="col-md-6 footer-right">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <input  type="text" value="Tên" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Tên';}">
                        </div>
                        <div class="col-md-6">
                            <input  type="text" value="Số điện thoại" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Số điện thoại';}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1rem;">
                        <div class="col-md-12">
                            <input type="text" value="Email" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Email';}">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1rem;">
                        <div class="col-md-12">
                            <textarea  rows="3"></textarea>
                        </div>
                    </div>

                    <input type="submit" value="Đăng ký">

                </form>
                <div style="margin-top: 2rem; color: white">
                    <span>Copyright &copy; {{ date('Y') }} <a style="color: tomato" href="#">{{ app_name() }} - v.{{ app_version() }}</a>.</span> {{ trans('strings.backend.general.all_rights_reserved') }}
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;">
			</span></a>
</div>
<!--footer-end-->

