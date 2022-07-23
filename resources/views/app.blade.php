<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/pronia/assets/images/favicon.ico" />

    <!-- CSS
    ============================================ -->

    <link rel="stylesheet" href="/pronia/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/pronia/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/pronia/assets/css/Pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="/pronia/assets/css/animate.min.css">
    <link rel="stylesheet" href="/pronia/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/pronia/assets/css/nice-select.css">
    <link rel="stylesheet" href="/pronia/assets/css/magnific-popup.min.css" />
    <link rel="stylesheet" href="/pronia/assets/css/ion.rangeSlider.min.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="/pronia/assets/css/style.css">

    <!-- Scripts -->
    @routes
    @vite('resources/scripts/mainApp.js')
    @inertiaHead
</head>
<body>

    <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>

    <div class="main-wrapper">
        
        @include('header')
        @inertia

    </div>
    <!-- Global Vendor, plugins JS -->
    <!-- JS Files
            ============================================ -->

    <script src="/pronia/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/pronia/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/pronia/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="/pronia/assets/js/vendor/jquery.waypoints.js"></script>
    <script src="/pronia/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="/pronia/assets/js/plugins/wow.min.js"></script>
    <script src="/pronia/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/pronia/assets/js/plugins/jquery.nice-select.js"></script>
    <script src="/pronia/assets/js/plugins/parallax.min.js"></script>
    <script src="/pronia/assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="/pronia/assets/js/plugins/tippy.min.js"></script>
    <script src="/pronia/assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="/pronia/assets/js/plugins/mailchimp-ajax.js"></script>
    <script src="/pronia/assets/js/plugins/jquery.counterup.js"></script>

    <!--Main JS (Common Activation Codes)-->
    <script src="/pronia/assets/js/main.js"></script>

</body>
</html>