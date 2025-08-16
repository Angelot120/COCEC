@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'robots' => null,
    'og_title' => null,
    'og_description' => null,
    'og_image' => null,
    'twitter_title' => null,
    'twitter_description' => null,
    'twitter_image' => null,
    'canonical' => null
])

@php
    // Valeurs par défaut
    $title = $title ?? config('seo.site_name', 'COCEC Togo');
    $description = $description ?? config('seo.site_description', 'Coopérative d\'Épargne et de Crédit au Togo - Solutions financières, crédits, épargne et services bancaires depuis 2001');
    $keywords = $keywords ?? config('seo.site_keywords', 'COCEC, microfinance, Togo, épargne, crédit, prêt, finance, coopérative, Lomé, Kanyikope, services bancaires, transfert d\'argent, tontine, investissement');
    $robots = $robots ?? config('seo.default_meta.robots', 'index, follow');
    $og_title = $og_title ?? $title;
    $og_description = $og_description ?? $description;
    $og_image = $og_image ?? asset(config('seo.default_images.og_image', 'assets/images/Logo.png'));
    $twitter_title = $twitter_title ?? $title;
    $twitter_description = $twitter_description ?? $description;
    $twitter_image = $twitter_image ?? asset(config('seo.default_images.twitter_image', 'assets/images/Logo.png'));
    $canonical = $canonical ?? url()->current();
@endphp

<!-- Meta Tags SEO -->
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="robots" content="{{ $robots }}">
<meta name="author" content="{{ config('seo.site_author', 'COCEC Togo') }}">
<meta name="language" content="{{ config('seo.site_language', 'fr') }}">
<meta name="revisit-after" content="{{ config('seo.default_meta.revisit_after', '7 days') }}">
<meta name="distribution" content="{{ config('seo.default_meta.distribution', 'global') }}">
<meta name="rating" content="{{ config('seo.default_meta.rating', 'general') }}">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ $og_title }}">
<meta property="og:description" content="{{ $og_description }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $og_image }}">
<meta property="og:site_name" content="{{ config('seo.site_name', 'COCEC Togo') }}">
<meta property="og:locale" content="{{ config('seo.site_locale', 'fr_FR') }}">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $twitter_title }}">
<meta name="twitter:description" content="{{ $twitter_description }}">
<meta name="twitter:image" content="{{ $twitter_image }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $canonical }}">

<!-- Balises Schema.org -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FinancialService",
    "name": "{{ config('seo.schema.organization.name', 'COCEC Togo') }}",
    "alternateName": "{{ config('seo.schema.organization.alternateName', 'Coopérative d\'Épargne et de Crédit au Togo') }}",
    "description": "{{ $description }}",
    "url": "{{ $canonical }}",
    "logo": "{{ asset(config('seo.default_images.logo', 'assets/images/Logo.png')) }}",
    "image": "{{ $og_image }}",
    "telephone": "{{ config('seo.schema.organization.contact_point.telephone', '+22891126471') }}",
    "email": "{{ config('seo.schema.organization.contact_point.email', 'contact@cocectogo.com') }}",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "{{ config('seo.schema.organization.address.street_address', 'Kanyikope') }}",
        "addressLocality": "{{ config('seo.schema.organization.address.locality', 'Lomé') }}",
        "addressRegion": "{{ config('seo.schema.organization.address.region', 'Maritime') }}",
        "addressCountry": "{{ config('seo.schema.organization.address.country', 'Togo') }}"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": "{{ config('seo.schema.organization.geo.latitude', '6.1375') }}",
        "longitude": "{{ config('seo.schema.organization.geo.longitude', '1.2123') }}"
    },
    "openingHours": "{{ config('seo.schema.organization.opening_hours', 'Mo-Fr 08:00-17:00') }}",
    "priceRange": "{{ config('seo.schema.organization.price_range', '$$') }}",
    "paymentAccepted": {{ json_encode(config('seo.schema.organization.payment_accepted', ['Cash', 'Bank Transfer', 'Mobile Money'])) }},
    "currenciesAccepted": "{{ config('seo.schema.organization.currencies_accepted', 'XOF') }}",
    "areaServed": {
        "@type": "Country",
        "name": "{{ config('seo.schema.organization.area_served', 'Togo') }}"
    },
    "serviceType": {{ json_encode(config('seo.schema.financial_service.service_type', ['Microfinance', 'Crédit', 'Épargne', 'Transfert d\'argent', 'Tontine', 'Investissement'])) }},
    "foundingDate": "{{ config('seo.schema.organization.founding_date', '2001') }}",
    "sameAs": {{ json_encode(config('seo.schema.organization.same_as', ['https://facebook.com/cocectogo', 'https://twitter.com/COCECTogo'])) }}
}
</script>
