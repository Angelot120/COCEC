<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configuration des Plaintes
    |--------------------------------------------------------------------------
    |
    | Ce fichier contient la configuration pour le système de gestion
    | des plaintes de la COCEC.
    |
    */

    // Statuts possibles pour les plaintes
    'statuses' => [
        'pending' => 'En attente',
        'processing' => 'En cours de traitement',
        'resolved' => 'Résolue',
        'closed' => 'Fermée',
    ],

    // Catégories possibles pour les plaintes
    'categories' => [
        'service' => 'Service client',
        'credit' => 'Crédit',
        'epargne' => 'Épargne',
        'technique' => 'Problème technique',
        'autre' => 'Autre',
    ],

    // Limites de validation
    'limits' => [
        'subject_max_length' => 255,
        'description_max_length' => 2000,
        'admin_notes_max_length' => 1000,
        'file_max_size' => 5120, // 5MB en KB
        'allowed_file_types' => ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx'],
    ],

    // Configuration des emails
    'email' => [
        'admin_address' => env('COMPLAINT_ADMIN_EMAIL', 'admin@cocec.tg'),
        'notification_enabled' => env('COMPLAINT_EMAIL_NOTIFICATIONS', true),
    ],

    // Configuration du stockage des fichiers
    'storage' => [
        'disk' => 'public',
        'path' => 'complaints',
        'max_files_per_complaint' => 5,
    ],

    // Configuration des délais de traitement
    'processing_times' => [
        'initial_response' => 24, // heures
        'resolution_target' => 72, // heures
        'escalation_threshold' => 48, // heures
    ],

    // Configuration des références
    'reference' => [
        'prefix' => 'PLAINT',
        'year_format' => 'Y',
        'sequence_length' => 4,
        'separator' => '-',
    ],
];
