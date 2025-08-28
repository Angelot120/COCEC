<?php

// Lire le fichier
$content = file_get_contents('resources/views/admin/accounts/physical/show.blade.php');

// Corriger la syntaxe
$content = str_replace(
    '@if (empty(trim($submission->residence_description))))',
    '@if (empty(trim($submission->residence_description)))',
    $content
);

$content = str_replace(
    '@if (empty(trim($submission->workplace_description))))',
    '@if (empty(trim($submission->workplace_description)))',
    $content
);

// Écrire le fichier corrigé
file_put_contents('resources/views/admin/accounts/physical/show.blade.php', $content);

echo "Fichier corrigé avec succès!\n";
?>
