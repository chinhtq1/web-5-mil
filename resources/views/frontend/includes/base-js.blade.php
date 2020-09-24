<script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="{{ asset('js/frontend/jquery.min.js') }}"></script>
<script src="{{ asset('js/frontend/jquery.meanmenu.min.js') }}"></script>
<!--start-smoth-scrolling-->
<script type="text/javascript" src="{{ asset('js/frontend/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/easing.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/frontend/owl.carousel.min.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
        });
    });
</script>

<!--search-scripts-->
<script src="{{ asset('js/frontend/classie.js') }}"></script>
<script src="{{ asset('js/frontend/uisearch.js') }}"></script>
<script>
    new UISearch(document.getElementById('sb-search'));
</script>
<!--//search-scripts-->

<!--script-for-menu-->
<script>
    $("span.menu").click(function () {
        $(" ul.navig").slideToggle("slow", function () {
        });
    });

    if ($('.menu-top-content').length) {
        $('.menu-top-content').meanmenu({
            meanScreenWidth: "992",
            meanMenuContainer: ".mobile-menu",
        });
    }
</script>
<!--script-for-menu-->

<!--FlexSlider-->
<script defer src="{{ asset('js/frontend/jquery.flexslider.js') }}"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!--End-slider-script-->

<!-- OWL -->
<script>
    $('.owl-carousel').owlCarousel({
        rtl: true,
        loop: true,
        autoplayHoverPause: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true
            },
            1000: {
                items: 5,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true
            }
        },

    })
</script>
<!-- End OWL -->

<!-- To TOP -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
        var defaults = {
                containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- End To TOP -->
