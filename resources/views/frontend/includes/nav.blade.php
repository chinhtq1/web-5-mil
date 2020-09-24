<!--navigation-starts-->
<div class="navigation menu">
    <div class="menu-top-content">
        <ul class="navig cl-effect-1">
            <li class="menu-item active"><a  class="menu-link" href="index.html">Trang chủ</a></li>
            <li class="menu-item">
                <a class="menu-link" href="products.html">Sản Phẩm</a>
                <div class="menu-mega-sub">
                    <ul class="sub-menu">
                        <li class="menu-item ">
                            <a href="#" class="menu-link">Menu-Sub 2</a>
                        </li>
                        <li class="menu-item ">
                            <a href="#" class="menu-link">Menu-Sub 2</a>
                        </li>
                        <li class="menu-item ">
                            <a href="#" class="menu-link">Menu-Sub 2</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item"><a class="menu-link" href="{{ route('frontend.blogs.index') }}">Tin tức</a>
                <div class="menu-mega-sub">
                    <ul class="sub-menu">
                        @isset($menus)
                            @foreach($menus as $menu)
                                <li class="menu-item ">
                                    <a href="#" class="menu-link">{{ $menu->name }}</a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </li>
            <li class="menu-item"><a class="menu-link" href="download.html">Tải File</a></li>
            <li class="menu-item"><a class="menu-link" href="about.html">Về chúng tôi</a></li>
            <li class="menu-item"><a class="menu-link" href="contact.html">Liên hệ</a></li>
        </ul>
    </div>

    <div class="mobile-menu">
    </div>

</div>
<!--navigation-end-->
