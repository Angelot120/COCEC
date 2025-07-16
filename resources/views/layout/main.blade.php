<!DOCTYPE html>
<html lang="fr">

<head>
    @yield('css')
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/main/img/favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/main/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/keyframe-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/main.css') }}">
    <title>COCEC</title>
</head>

<body>
    @yield('content')

    <script src="{{ asset('assets/main/js/vendor/jquary-3.6.0.min.js') }}"></script>

    @yield('js')
    
    <script src="{{ asset('assets/main/js/vendor/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/meanmenu.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/smooth-scroll.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/jquery.isotope.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/split-type.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/scroll-trigger.min.js') }}"></script>
    <script src="{{ asset('assets/main/js/vendor/nice-select.js') }}"></script>
    <script src="{{ asset('assets/main/js/contact.js') }}"></script>
    <script src="{{ asset('assets/main/js/main.js') }}"></script>


</body>

</html>