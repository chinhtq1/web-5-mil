@if(count($banners) == 0)

@else
    <div class="banner">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    @foreach($banners as $banner)
                        <li>
                            <div class="banner" style="
                                    background: url({{ $banner->featured_image ? Storage::disk('public')->url('img/banner/' .  $banner->featured_image) : ''}}) no-repeat;
                                    background-size: cover;">
                                <div class="container">
                                    <div class="banner-text">
                                        <p>{{ $banner->title1 }}</p>
                                        <h3>{{ $banner->title2 }}</h3>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
@endif
