<!--navigation-starts-->
<div class="navigation menu">
    <div class="menu-top-content">
        <ul class="navig cl-effect-1">
            <li class="menu-item active"><a  class="menu-link" href="{{ route('frontend.index') }}">Trang chủ</a></li>
            <li class="menu-item">
                <a class="menu-link" href="{{ route('frontend.products.index') }}">Sản Phẩm</a>
                <div class="menu-mega-sub">
                    <ul class="sub-menu">
                        @isset($productMenus)
                            @foreach($productMenus as $menu)
                                <li class="menu-item ">
                                    <a href="{{ route('frontend.products.listByCategory', ['slug' => $menu->slug]) }}" class="menu-link">{{ $menu->name }}</a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </li>
            <li class="menu-item"><a class="menu-link" href="{{ route('frontend.blogs.index') }}">Tin tức</a>
                <div class="menu-mega-sub">
                    <ul class="sub-menu">
                        @isset($blogMenus)
                            @foreach($blogMenus as $menu)
                                <li class="menu-item ">
                                    <a href="{{ route('frontend.blogs.listByCategory', ['slug' => $menu->slug]) }}" class="menu-link">{{ $menu->name }}</a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </li>
            <li class="menu-item"><a class="menu-link" href="{{ route('frontend.documents.index') }}">Tải file</a>
                <div class="menu-mega-sub">
                    <ul class="sub-menu">
                        @isset($documentMenus)
                            @foreach($documentMenus as $menu)
                                <li class="menu-item ">
                                    <a href="{{ route('frontend.documents.listByCategory', ['slug' => $menu->slug]) }}" class="menu-link">{{ $menu->name }}</a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </li>
            <li class="menu-item"><a class="menu-link" href="about.html">Về chúng tôi</a></li>
            <li class="menu-item"><a class="menu-link" href="contact.html">Liên hệ</a></li>
        </ul>
    </div>

    <div class="mobile-menu">
    </div>

</div>
<!--navigation-end-->
