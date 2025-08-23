<!DOCTYPE html>
<html lang="fr">

<head>
    @yield('css')
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'COCEC - Coopérative d\'Épargne et de Crédit au Togo. Solutions financières, crédits, épargne et services bancaires depuis 2001. Votre partenaire financier de confiance pour vos projets.')">
    <meta name="keywords" content="@yield('meta_keywords', 'COCEC, microfinance, Togo, épargne, crédit, prêt, finance, coopérative, Lomé, Kanyikope, services bancaires, transfert d\'argent, tontine, investissement')">
    <meta name="author" content="COCEC Togo">
    <meta name="robots" content="@yield('meta_robots', 'index, follow')">
    <meta name="language" content="fr">
    <meta name="revisit-after" content="7 days">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'COCEC - Coopérative d\'Épargne et de Crédit au Togo')">
    <meta property="og:description" content="@yield('og_description', 'Solutions financières, crédits, épargne et services bancaires depuis 2001. Votre partenaire financier de confiance.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('assets/images/Logo.png'))">
    <meta property="og:site_name" content="COCEC Togo">
    <meta property="og:locale" content="fr_FR">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'COCEC - Coopérative d\'Épargne et de Crédit au Togo')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Solutions financières, crédits, épargne et services bancaires depuis 2001.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('assets/images/Logo.png'))">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/Logo.png') }}">

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
    
    <!-- CSS Simulateur de Prêt -->
    <link rel="stylesheet" href="{{ asset('assets/css/loan-simulator.css') }}">
    
    <!-- CSS personnalisé pour le header -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom-header.css') }}">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <!-- Dynamic Title -->
    <title>@yield('page_title', 'COCEC - Coopérative d\'Épargne et de Crédit au Togo | Solutions Financières')</title>
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
    
    <!-- Script personnalisé pour le header responsive -->
    <script src="{{ asset('assets/js/header-responsive.js') }}"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Bannière de Cookies -->
    <div id="cookie-banner" class="cookie-banner" style="display: none;">
        <div class="cookie-content">
            <div class="cookie-text">
                <h4>🍪 Politique de Cookies</h4>
                <p>Nous utilisons des cookies et du stockage local pour améliorer votre expérience sur notre site.</p>
            </div>
            <div class="cookie-actions">
                <button id="accept-cookies" class="btn btn-primary">Accepter</button>
                <button id="reject-cookies" class="btn btn-outline-secondary">Refuser</button>
            </div>
        </div>
    </div>

    <!-- Script pour la bannière de cookies -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cookieBanner = document.getElementById('cookie-banner');
            const acceptBtn = document.getElementById('accept-cookies');
            const rejectBtn = document.getElementById('reject-cookies');
            
            const cookieChoice = localStorage.getItem('cookieChoice');
            
            if (!cookieChoice) {
                setTimeout(() => {
                    cookieBanner.style.display = 'block';
                }, 2000);
            }
            
            acceptBtn.addEventListener('click', function() {
                localStorage.setItem('cookieChoice', 'accepted');
                cookieBanner.style.display = 'none';
            });
            
            rejectBtn.addEventListener('click', function() {
                localStorage.setItem('cookieChoice', 'rejected');
                cookieBanner.style.display = 'none';
            });
        });
    </script>

</body>

</html>
