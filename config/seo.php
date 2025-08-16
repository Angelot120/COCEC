<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configuration SEO Générale
    |--------------------------------------------------------------------------
    */
    
    'site_name' => 'COCEC Togo',
    'site_description' => 'Coopérative d\'Épargne et de Crédit au Togo - Solutions financières, crédits, épargne et services bancaires depuis 2001',
    'site_keywords' => 'COCEC, microfinance, Togo, épargne, crédit, prêt, finance, coopérative, Lomé, Kanyikope, services bancaires, transfert d\'argent, tontine, investissement',
    'site_author' => 'COCEC Togo',
    'site_language' => 'fr',
    'site_locale' => 'fr_FR',
    
    /*
    |--------------------------------------------------------------------------
    | Configuration des Réseaux Sociaux
    |--------------------------------------------------------------------------
    */
    
    'social' => [
        'facebook' => [
            'app_id' => env('FACEBOOK_APP_ID', ''),
            'page_url' => env('FACEBOOK_PAGE_URL', ''),
        ],
        'twitter' => [
            'username' => env('TWITTER_USERNAME', '@COCECTogo'),
            'card_type' => 'summary_large_image',
        ],
        'linkedin' => [
            'company_url' => env('LINKEDIN_COMPANY_URL', ''),
        ],
        'whatsapp' => [
            'phone' => env('WHATSAPP_PHONE', '+22891126471'),
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Configuration Google
    |--------------------------------------------------------------------------
    */
    
    'google' => [
        'analytics_id' => env('GOOGLE_ANALYTICS_ID', ''),
        'search_console_verification' => env('GOOGLE_SEARCH_CONSOLE_VERIFICATION', ''),
        'adsense_id' => env('GOOGLE_ADSENSE_ID', ''),
        'tag_manager_id' => env('GOOGLE_TAG_MANAGER_ID', ''),
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Configuration des Meta Tags par défaut
    |--------------------------------------------------------------------------
    */
    
    'default_meta' => [
        'robots' => 'index, follow',
        'revisit_after' => '7 days',
        'distribution' => 'global',
        'rating' => 'general',
        'theme_color' => '#1877f2',
        'msapplication_tilecolor' => '#1877f2',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Configuration des Images par défaut
    |--------------------------------------------------------------------------
    */
    
    'default_images' => [
        'og_image' => 'assets/images/Logo.png',
        'twitter_image' => 'assets/images/Logo.png',
        'favicon' => 'assets/images/Logo.png',
        'apple_touch_icon' => 'assets/images/Logo.png',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Configuration du Sitemap
    |--------------------------------------------------------------------------
    */
    
    'sitemap' => [
        'url' => 'https://cocectogo.com',
        'changefreq' => [
            'home' => 'weekly',
            'pages' => 'monthly',
            'blog' => 'weekly',
            'services' => 'monthly',
        ],
        'priority' => [
            'home' => 1.0,
            'pages' => 0.8,
            'blog' => 0.6,
            'services' => 0.8,
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Configuration des Balises Schema.org
    |--------------------------------------------------------------------------
    */
    
    'schema' => [
        'organization' => [
            'name' => 'COCEC Togo',
            'url' => 'https://cocectogo.com',
            'logo' => 'https://cocectogo.com/assets/images/Logo.png',
            'description' => 'Coopérative d\'Épargne et de Crédit au Togo',
            'address' => [
                'street_address' => 'Kanyikope',
                'locality' => 'Lomé',
                'region' => 'Maritime',
                'postal_code' => '',
                'country' => 'Togo',
            ],
            'contact_point' => [
                'telephone' => '+22891126471',
                'contact_type' => 'customer service',
                'area_served' => 'Togo',
                'available_language' => ['French', 'Ewe'],
            ],
        ],
        'financial_service' => [
            'name' => 'COCEC - Services Financiers',
            'description' => 'Services de microfinance, crédits, épargne et transferts d\'argent',
            'area_served' => 'Togo',
            'service_type' => [
                'Microfinance',
                'Crédit',
                'Épargne',
                'Transfert d\'argent',
                'Tontine',
            ],
        ],
    ],
];
