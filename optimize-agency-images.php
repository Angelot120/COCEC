<?php

/**
 * Script d'optimisation des images des agences
 * Usage: php optimize-agency-images.php
 */

require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

// Configuration
$imageQuality = 80; // Qualité JPEG/WebP (0-100)
$maxWidth = 800; // Largeur maximale
$maxHeight = 600; // Hauteur maximale

echo "🚀 Début de l'optimisation des images des agences...\n";

// Chemin vers les images des agences
$agencyImagePath = 'storage/app/public/agency/';

if (!is_dir($agencyImagePath)) {
    echo "❌ Le dossier des images d'agences n'existe pas: $agencyImagePath\n";
    exit(1);
}

$optimizedCount = 0;
$errors = [];

// Parcourir toutes les images
$files = glob($agencyImagePath . '*.{jpg,jpeg,png}', GLOB_BRACE);

foreach ($files as $file) {
    try {
        $filename = basename($file);
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        
        echo "📸 Optimisation de: $filename\n";
        
        // Charger l'image avec Intervention Image
        $image = Image::make($file);
        
        // Redimensionner si nécessaire
        if ($image->width() > $maxWidth || $image->height() > $maxHeight) {
            $image->resize($maxWidth, $maxHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        
        // Sauvegarder en WebP (format moderne et compressé)
        $webpPath = str_replace(['.jpg', '.jpeg', '.png'], '.webp', $file);
        $image->save($webpPath, $imageQuality, 'webp');
        
        // Sauvegarder en JPEG optimisé (fallback)
        $image->save($file, $imageQuality, 'jpg');
        
        $optimizedCount++;
        echo "✅ $filename optimisé\n";
        
    } catch (Exception $e) {
        $errors[] = "Erreur avec $filename: " . $e->getMessage();
        echo "❌ Erreur avec $filename: " . $e->getMessage() . "\n";
    }
}

echo "\n🎉 Optimisation terminée!\n";
echo "📊 Images optimisées: $optimizedCount\n";

if (!empty($errors)) {
    echo "\n❌ Erreurs rencontrées:\n";
    foreach ($errors as $error) {
        echo "- $error\n";
    }
}

echo "\n💡 Conseils d'optimisation:\n";
echo "- Utilisez des images de 800x600px maximum\n";
echo "- Format WebP recommandé pour le web\n";
echo "- Qualité 80% offre un bon compromis taille/qualité\n";
echo "- Lazy loading activé pour améliorer les performances\n"; 