<?php

// Lire le fichier PDF
$content = file_get_contents('resources/views/admin/accounts/physical/pdf.blade.php');

// Remplacer la section des cartes de résidence
$old_residence = '@if (!empty($submission->residence_lat) && !empty($submission->residence_lng))
        <div style="margin-top: 10mm;">
            <div style="text-align: center; margin-bottom: 5mm;">
                <strong style="color: #EC281C; font-size: 11pt;">Carte de résidence</strong>
            </div>
            <div style="text-align: center; border: 2px solid #EC281C; padding: 5mm; background: #f8f9fa; border-radius: 5px;">
                <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s+ff0000({{ $submission->residence_lng }},{{ $submission->residence_lat }})/{{ $submission->residence_lng }},{{ $submission->residence_lat }},15,0/400x200@2x?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" 
                     style="width: 100%; height: 40mm; object-fit: cover; border-radius: 3px;" 
                     alt="Carte de résidence">
                <div style="margin-top: 3mm; font-size: 8pt; color: #666;">
                    Coordonnées : {{ $submission->residence_lat }}, {{ $submission->residence_lng }}
                </div>
            </div>
        </div>
        @endif';

$new_residence = '@if (!empty($submission->residence_lat) && !empty($submission->residence_lng))
            @if (empty(trim($submission->residence_description)))
            {{-- Afficher la carte seulement si la description est vide (choix sur carte) --}}
            <div style="margin-top: 10mm;">
                <div style="text-align: center; margin-bottom: 5mm;">
                    <strong style="color: #EC281C; font-size: 11pt;">Carte de résidence</strong>
                </div>
                <div style="text-align: center; border: 2px solid #EC281C; padding: 5mm; background: #f8f9fa; border-radius: 5px;">
                    <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s+ff0000({{ $submission->residence_lng }},{{ $submission->residence_lat }})/{{ $submission->residence_lng }},{{ $submission->residence_lat }},15,0/400x200@2x?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" 
                         style="width: 100%; height: 40mm; object-fit: cover; border-radius: 3px;" 
                         alt="Carte de résidence">
                    <div style="margin-top: 3mm; font-size: 8pt; color: #666;">
                        Coordonnées : {{ $submission->residence_lat }}, {{ $submission->residence_lng }}
                    </div>
                </div>
            </div>
            @else
            {{-- Si description manuelle, afficher seulement les coordonnées sans carte --}}
            <div style="margin-top: 10mm;">
                <div style="text-align: center; margin-bottom: 5mm;">
                    <strong style="color: #EC281C; font-size: 11pt;">Coordonnées de résidence</strong>
                </div>
                <div style="text-align: center; border: 2px solid #EC281C; padding: 5mm; background: #f8f9fa; border-radius: 5px;">
                    <div style="font-size: 12pt; color: #333; padding: 10mm;">
                        {{ $submission->residence_description }}
                    </div>
                    <div style="margin-top: 3mm; font-size: 8pt; color: #666;">
                        Coordonnées : {{ $submission->residence_lat }}, {{ $submission->residence_lng }}
                    </div>
                </div>
            </div>
            @endif
        @endif';

// Remplacer la section des cartes de lieu de travail
$old_workplace = '@if (!empty($submission->workplace_lat) && !empty($submission->workplace_lng))
        <div style="margin-top: 10mm;">
            <div style="text-align: center; margin-bottom: 5mm;">
                <strong style="color: #EC281C; font-size: 11pt;">Carte du lieu de travail</strong>
            </div>
            <div style="text-align: center; border: 2px solid #EC281C; padding: 5mm; background: #f8f9fa; border-radius: 5px;">
                <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s+ff0000({{ $submission->workplace_lng }},{{ $submission->workplace_lat }})/{{ $submission->workplace_lng }},{{ $submission->workplace_lat }},15,0/400x200@2x?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" 
                     style="width: 100%; height: 40mm; object-fit: cover; border-radius: 3px;" 
                     alt="Carte du lieu de travail">
                <div style="margin-top: 3mm; font-size: 8pt; color: #666;">
                    Coordonnées : {{ $submission->workplace_lat }}, {{ $submission->workplace_lng }}
                </div>
            </div>
        </div>
        @endif';

$new_workplace = '@if (!empty($submission->workplace_lat) && !empty($submission->workplace_lng))
            @if (empty(trim($submission->workplace_description)))
            {{-- Afficher la carte seulement si la description est vide (choix sur carte) --}}
            <div style="margin-top: 10mm;">
                <div style="text-align: center; margin-bottom: 5mm;">
                    <strong style="color: #EC281C; font-size: 11pt;">Carte du lieu de travail</strong>
                </div>
                <div style="text-align: center; border: 2px solid #EC281C; padding: 5mm; background: #f8f9fa; border-radius: 5px;">
                    <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s+ff0000({{ $submission->workplace_lng }},{{ $submission->workplace_lat }})/{{ $submission->workplace_lng }},{{ $submission->workplace_lat }},15,0/400x200@2x?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" 
                         style="width: 100%; height: 40mm; object-fit: cover; border-radius: 3px;" 
                         alt="Carte du lieu de travail">
                    <div style="margin-top: 3mm; font-size: 8pt; color: #666;">
                        Coordonnées : {{ $submission->workplace_lat }}, {{ $submission->workplace_lng }}
                    </div>
                </div>
            </div>
            @else
            {{-- Si description manuelle, afficher seulement les coordonnées sans carte --}}
            <div style="margin-top: 10mm;">
                <div style="text-align: center; margin-bottom: 5mm;">
                    <strong style="color: #EC281C; font-size: 11pt;">Coordonnées du lieu de travail</strong>
                </div>
                <div style="text-align: center; border: 2px solid #EC281C; padding: 5mm; background: #f8f9fa; border-radius: 5px;">
                    <div style="font-size: 12pt; color: #333; padding: 10mm;">
                        {{ $submission->workplace_description }}
                    </div>
                    <div style="margin-top: 3mm; font-size: 8pt; color: #666;">
                        Coordonnées : {{ $submission->workplace_lat }}, {{ $submission->workplace_lng }}
                    </div>
                </div>
            </div>
            @endif
        @endif';

// Effectuer les remplacements
$content = str_replace($old_residence, $new_residence, $content);
$content = str_replace($old_workplace, $new_workplace, $content);

// Écrire le fichier corrigé
file_put_contents('resources/views/admin/accounts/physical/pdf.blade.php', $content);

echo "Fichier PDF corrigé avec succès!\n";
echo "Logique d'affichage conditionnel des cartes appliquée.\n";
?>
