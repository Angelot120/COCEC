<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Demande physique #<?php echo e($submission->id); ?></title>
    <style>
        @page {
            margin: 20mm;
        }

        body {
            font-family: 'Helvetica Neue', 'Roboto', 'Lato', Arial, sans-serif;
            line-height: 1.4;
            color: #000000;
            background-color: #ffffff;
            font-size: 10pt;
            margin: 0;
            padding: 0;
        }

        /* --- EN-TÊTE OPTIMISÉ --- */
        .header {
            position: relative;
            border-bottom: 2px solid #EC281C;
            padding-bottom: 8mm;
            margin-bottom: 8mm;
            padding-left: 55mm;
            page-break-inside: avoid;
        }

        .header-photo {
            position: absolute;
            top: 0;
            left: 0;
        }

        .header-photo img {
            width: 35mm;
            height: 45mm;
            object-fit: cover;
            border: 2px solid #EC281C;
            border-radius: 4px;
            background-color: #ffffff;
        }

        .header-content {
            text-align: center;
            width: 100%;
        }

        .header-content h1 {
            color: #EC281C;
            margin: 0 0 2mm 0;
            font-size: 15pt;
            font-weight: bold;
        }
        
        .header-content h2 {
            color: #000000;
            margin: 0 0 8mm 0;
            font-size: 10pt;
            font-weight: normal;
        }
        
        .header-content h3 {
            margin: 0 0 4mm 0;
            font-size: 13pt;
            color: #000000;
            font-weight: bold;
        }
        
        .submission-details {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8mm;
            font-size: 9pt;
            color: #000000;
            margin-top: 2mm;
        }
        .submission-details p { margin: 0; }
        .submission-details strong { color: #EC281C; }

        /* Alternative si pas de photo */
        .header.no-photo {
            padding-left: 0;
            text-align: center;
        }

        /* --- CORPS DU DOCUMENT OPTIMISÉ --- */
        .section {
            margin-bottom: 8mm;
            page-break-inside: avoid;
        }

        .section-title {
            font-size: 12pt;
            font-weight: bold;
            color: #FFFFFF;
            background-color: #EC281C;
            padding: 3mm 6mm;
            margin-bottom: 6mm;
            border-radius: 3px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 10mm;
            margin-bottom: 2mm;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: 2mm 0;
            border-bottom: 1px dotted #EC281C;
            min-height: 6mm;
        }
        
        .info-label {
            font-weight: bold;
            color: #000000;
            flex-shrink: 0;
            padding-right: 4mm;
            font-size: 9.5pt;
        }
        
        .info-value {
            font-weight: normal;
            color: #000000;
            text-align: right;
            font-size: 9.5pt;
        }
        
        .full-width {
            grid-column: 1 / -1;
        }

        /* --- TABLEAUX OPTIMISÉS --- */
        .table, .payment-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9pt;
            margin-bottom: 0;
        }
        
        .table th, .payment-table th {
            background-color: #EC281C; 
            color: #FFFFFF;
            padding: 3mm; 
            text-align: left; 
            font-weight: bold;
        }
        
        .table td, .payment-table td { 
            padding: 3mm; 
            border-bottom: 1px solid #EC281C;
            color: #000000;
            vertical-align: top;
        }
        
        .table tr:nth-child(even) td { 
            background-color: #FFFFFF; 
        }
        
        .payment-table .total-row {
            background-color: #FFCC00; 
            font-weight: bold;
            color: #000000; 
            border-top: 2px solid #EC281C;
        }
        
        /* --- TEXTE ET SIGNATURES OPTIMISÉS --- */
        .prose { 
            text-align: justify; 
            margin-bottom: 6mm; 
            font-size: 10.5pt; 
            line-height: 1.5;
            color: #000000;
        }
        
        .signature-area { 
            margin-top: 15mm; 
            text-align: right;
            color: #000000;
        }
        
        .signature-area p { 
            margin: 0 0 2mm 0; 
        }
        
        .signature-line { 
            margin-top: 20mm; 
            border-bottom: 1px dotted #000000; 
            width: 70mm; 
            margin-left: auto; 
            height: 15mm;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9pt;
            color: #666;
            text-align: center;
        }
        
        .signature-display {
            margin-top: 10mm;
            text-align: right;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            min-height: 30mm;
        }
        
        .signature-display img {
            max-width: 60mm;
            max-height: 25mm;
            min-height: 15mm;
            /* border: 1px solid #EC281C; */
            border-radius: 3px;
            background-color: #ffffff;
            object-fit: contain;
            object-position: center;
            display: block;
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
        }
        
        .footer { 
            margin-top: 10mm; 
            text-align: center; 
            font-size: 8pt; 
            color: #EC281C;
            font-weight: bold;
        }
        
        .page-break { 
            page-break-before: always; 
        }

        /* --- OPTIMISATIONS ESPACES --- */
        .section:last-of-type {
            margin-bottom: 5mm;
        }

        .info-grid .info-item:last-child {
            margin-bottom: 0;
        }

        .section.compact {
            margin-bottom: 6mm;
        }

        .section.compact .section-title {
            margin-bottom: 4mm;
        }
        
    </style>
</head>
<body>
    
    <div class="header <?php echo e($submission->photo_path ? '' : 'no-photo'); ?>">
        <?php if($submission->photo_path): ?>
        <div class="header-photo">
            <?php
                $photoHtml = '';
                try {
                    $relativePath = str_replace('public/', '', $submission->photo_path);
                    $photoPath = storage_path('app/public/' . $relativePath);
                    
                    // Alternative si le fichier n'est pas trouvé
                    if (!file_exists($photoPath)) {
                        $photoPath = storage_path('app/' . $submission->photo_path);
                    }
                    
                    if (file_exists($photoPath) && is_readable($photoPath)) {
                        $fileSize = filesize($photoPath);
                        if ($fileSize > 0 && $fileSize < 10000000) { // Max 10MB
                            $imageData = file_get_contents($photoPath);
                            if ($imageData !== false) {
                                $imageType = strtolower(pathinfo($photoPath, PATHINFO_EXTENSION));
                                $mimeTypes = [
                                    'jpg' => 'jpeg',
                                    'jpeg' => 'jpeg',
                                    'png' => 'png',
                                    'gif' => 'gif',
                                    'webp' => 'webp'
                                ];
                                
                                if (isset($mimeTypes[$imageType])) {
                                    $mimeType = $mimeTypes[$imageType];
                                    $base64Data = base64_encode($imageData);
                                    $photoHtml = '<img src="data:image/' . $mimeType . ';base64,' . $base64Data . '" alt="Photo d\'identité">';
                                }
                            }
                        }
                    }
                } catch (Exception $e) {
                    // Continuer sans photo en cas d'erreur
                }
            ?>
            
            <?php echo $photoHtml; ?>

        </div>
        <?php endif; ?>

        <div class="header-content">
            <h1>COOPERATIVE CHRETIENNE D'EPARGNE ET DE CREDIT</h1>
            <h2>ASSISTANCE - CONSEIL MICROFINANCEMENT</h2>
            <h3>FICHE D'ADHÉSION PERSONNE PHYSIQUE</h3>
            <div class="submission-details">
                <p>N° de soumission : <strong>#<?php echo e($submission->id); ?></strong></p>
                <p>Date : <strong><?php echo e($submission->created_at->format('d/m/Y')); ?></strong></p>
                <p>Statut : <strong class="status-<?php echo e($submission->statut ?? 'en_attente'); ?>">
                     <?php if(($submission->statut ?? 'en_attente') == 'en_attente'): ?> En attente
                     <?php elseif(($submission->statut ?? 'en_attente') == 'accepter'): ?> Accepté
                     <?php elseif(($submission->statut ?? 'en_attente') == 'refuser'): ?> Refusé
                     <?php else: ?> <?php echo e($submission->statut ?? 'en_attente'); ?> <?php endif; ?>
                </strong></p>
            </div>
        </div>
    </div>
    
    
    <div class="section">
        <div class="section-title">Informations personnelles</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Nom</span>
                <span class="info-value"><?php echo e($submission->last_name ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Prénoms</span>
                <span class="info-value"><?php echo e($submission->first_names ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Genre</span>
                <span class="info-value"><?php echo e(($submission->gender ?? '') == 'M' ? 'Masculin' : (($submission->gender ?? '') == 'F' ? 'Féminin' : 'N/A')); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Date de naissance</span>
                <span class="info-value"><?php echo e($submission->birth_date ? $submission->birth_date->format('d/m/Y') : 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Lieu de naissance</span>
                <span class="info-value"><?php echo e($submission->birth_place ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Nationalité</span>
                <span class="info-value"><?php echo e($submission->nationality ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Nom du père</span>
                <span class="info-value"><?php echo e($submission->father_name ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Nom de la mère</span>
                <span class="info-value"><?php echo e($submission->mother_name ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Téléphone</span>
                <span class="info-value"><?php echo e($submission->phone ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Adresse</span>
                <span class="info-value"><?php echo e($submission->address ?? 'N/A'); ?></span>
            </div>
        </div>
    </div>

    
    <div class="section">
        <div class="section-title">Adresses et coordonnées</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Résidence</span>
                <span class="info-value"><?php echo e($submission->residence_description ?? 'N/A'); ?></span>
            </div>
            <?php if(!empty($submission->residence_lat) && !empty($submission->residence_lng)): ?>
            <div class="info-item">
                <span class="info-label">Coordonnées résidence</span>
                <span class="info-value"><?php echo e($submission->residence_lat); ?>, <?php echo e($submission->residence_lng); ?></span>
            </div>
            <?php endif; ?>
            <div class="info-item">
                <span class="info-label">Lieu de travail</span>
                <span class="info-value"><?php echo e($submission->workplace_description ?? 'N/A'); ?></span>
            </div>
            <?php if(!empty($submission->workplace_lat) && !empty($submission->workplace_lng)): ?>
            <div class="info-item">
                <span class="info-label">Coordonnées travail</span>
                <span class="info-value"><?php echo e($submission->workplace_lat); ?>, <?php echo e($submission->workplace_lng); ?></span>
            </div>
            <?php endif; ?>
        </div>
        
        
        <?php if(!empty($submission->residence_lat) && !empty($submission->residence_lng)): ?>
        <div style="margin-top: 10mm;">
            <div style="text-align: center; margin-bottom: 5mm;">
                <strong style="color: #EC281C; font-size: 11pt;">Carte de résidence</strong>
            </div>
            <div style="text-align: center; border: 2px solid #EC281C; padding: 5mm; background: #f8f9fa; border-radius: 5px;">
                <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s+ff0000(<?php echo e($submission->residence_lng); ?>,<?php echo e($submission->residence_lat); ?>)/<?php echo e($submission->residence_lng); ?>,<?php echo e($submission->residence_lat); ?>,15,0/400x200@2x?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" 
                     style="width: 100%; height: 40mm; object-fit: cover; border-radius: 3px;" 
                     alt="Carte de résidence">
                <div style="margin-top: 3mm; font-size: 8pt; color: #666;">
                    Coordonnées : <?php echo e($submission->residence_lat); ?>, <?php echo e($submission->residence_lng); ?>

                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($submission->workplace_lat) && !empty($submission->workplace_lng)): ?>
        <div style="margin-top: 10mm;">
            <div style="text-align: center; margin-bottom: 5mm;">
                <strong style="color: #EC281C; font-size: 11pt;">Carte du lieu de travail</strong>
            </div>
            <div style="text-align: center; border: 2px solid #EC281C; padding: 5mm; background: #f8f9fa; border-radius: 5px;">
                <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s+ff0000(<?php echo e($submission->workplace_lng); ?>,<?php echo e($submission->workplace_lat); ?>)/<?php echo e($submission->workplace_lng); ?>,<?php echo e($submission->workplace_lat); ?>,15,0/400x200@2x?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" 
                     style="width: 100%; height: 40mm; object-fit: cover; border-radius: 3px;" 
                     alt="Carte du lieu de travail">
                <div style="margin-top: 3mm; font-size: 8pt; color: #666;">
                    Coordonnées : <?php echo e($submission->workplace_lat); ?>, <?php echo e($submission->workplace_lng); ?>

                </div>
            </div>
        </div>
        <?php endif; ?>

        
        <style>
            @media print {
                .leaflet-container,
                .leaflet-tile-container,
                .leaflet-layer,
                .leaflet-pane {
                    position: static !important;
                    width: 100% !important;
                    height: 40mm !important;
                }
                
                .leaflet-tile {
                    visibility: visible !important;
                    opacity: 1 !important;
                }
                
                .leaflet-marker-icon {
                    display: block !important;
                }
            }
        </style>

        
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script>
            <?php if(!empty($submission->residence_lat) && !empty($submission->residence_lng)): ?>
            // Carte de résidence
            const residenceMap = L.map('residence-map').setView([<?php echo e($submission->residence_lat); ?>, <?php echo e($submission->residence_lng); ?>], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(residenceMap);
            L.marker([<?php echo e($submission->residence_lat); ?>, <?php echo e($submission->residence_lng); ?>]).addTo(residenceMap)
                .bindPopup('Résidence')
                .openPopup();
            <?php endif; ?>

            <?php if(!empty($submission->workplace_lat) && !empty($submission->workplace_lng)): ?>
            // Carte du lieu de travail
            const workplaceMap = L.map('workplace-map').setView([<?php echo e($submission->workplace_lat); ?>, <?php echo e($submission->workplace_lng); ?>], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(workplaceMap);
            L.marker([<?php echo e($submission->workplace_lat); ?>, <?php echo e($submission->workplace_lng); ?>]).addTo(workplaceMap)
                .bindPopup('Lieu de travail')
                .openPopup();
            <?php endif; ?>

            // Forcer le rechargement des tuiles pour l'impression
            window.addEventListener('beforeprint', () => {
                <?php if(!empty($submission->residence_lat) && !empty($submission->residence_lng)): ?>
                residenceMap.invalidateSize();
                residenceMap.eachLayer(function (layer) {
                    if (layer instanceof L.TileLayer) {
                        layer.redraw();
                    }
                });
                <?php endif; ?>

                <?php if(!empty($submission->workplace_lat) && !empty($submission->workplace_lng)): ?>
                workplaceMap.invalidateSize();
                workplaceMap.eachLayer(function (layer) {
                    if (layer instanceof L.TileLayer) {
                        layer.redraw();
                    }
                });
                <?php endif; ?>
            });
        </script>
    </div>

    
    <div class="section">
        <div class="section-title">Informations supplémentaires</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Statut marital</span>
                <span class="info-value"><?php echo e($submission->marital_status ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Nom du conjoint</span>
                <span class="info-value"><?php echo e($submission->spouse_name ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Profession</span>
                <span class="info-value"><?php echo e($submission->occupation ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Entreprise</span>
                <span class="info-value"><?php echo e($submission->company_name_activity ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Numéro de pièce</span>
                <span class="info-value"><?php echo e($submission->id_number ?? 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Date d'émission</span>
                <span class="info-value"><?php echo e($submission->id_issue_date ? $submission->id_issue_date->format('d/m/Y') : 'N/A'); ?></span>
            </div>
        </div>
    </div>

    
    <div class="section compact">
        <div class="section-title">Informations sur le compte</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Date d'adhésion</span>
                <span class="info-value"><?php echo e($submission->membership_date ? $submission->membership_date->format('d/m/Y') : 'N/A'); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Date d'ouverture</span>
                <span class="info-value"><?php echo e($submission->account_opening_date ? $submission->account_opening_date->format('d/m/Y') : 'N/A'); ?></span>
            </div>
            <div class="info-item full-width">
                <span class="info-label">Numéro de compte</span>
                <span class="info-value"><?php echo e($submission->account_number ?? 'Non attribué'); ?></span>
            </div>
            <?php if(!empty($submission->remarks)): ?>
            <div class="info-item full-width">
                <span class="info-label">Remarques</span>
                <span class="info-value"><?php echo e($submission->remarks); ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="section compact">
        <div class="section-title">Versements initiaux</div>
        <table class="payment-table">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th style="text-align: right;">Montant (FCFA)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Droit d'adhésion</td>
                    <td style="text-align: right;"><?php echo e(number_format(2000, 0, ',', ' ')); ?></td>
                </tr>
                <tr>
                    <td>Part social</td>
                    <td style="text-align: right;"><?php echo e(number_format(15000, 0, ',', ' ')); ?></td>
                </tr>
                <tr>
                    <td>Dépôts</td>
                    <td style="text-align: right;"><?php echo e(number_format($submission->initial_deposit ?? 0, 0, ',', ' ')); ?></td>
                </tr>
                <tr class="total-row">
                    <td><strong>TOTAL</strong></td>
                    <td style="text-align: right;"><strong><?php echo e(number_format(17000 + ($submission->initial_deposit ?? 0), 0, ',', ' ')); ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    
    <?php if(isset($submission->references) && !$submission->references->isEmpty()): ?>
    <div class="section compact">
        <div class="section-title">Références</div>
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom et prénoms</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $submission->references; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($reference->name ?? 'N/A'); ?></td>
                        <td><?php echo e($reference->phone ?? 'N/A'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>

    
    <?php if(isset($submission->beneficiaries) && !$submission->beneficiaries->isEmpty()): ?>
    <div class="section compact">
        <div class="section-title">Bénéficiaires (Ayant droit en cas de décès)</div>
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom et prénoms</th>
                    <th>Contact</th>
                    <th>Lien de parenté</th>
                    <th>Date de naissance</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $submission->beneficiaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $beneficiary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($beneficiary->nom ?? 'N/A'); ?></td>
                        <td><?php echo e($beneficiary->contact ?? 'N/A'); ?></td>
                        <td><?php echo e($beneficiary->lien ?? 'N/A'); ?></td>
                        <td><?php echo e($beneficiary->birth_date ? $beneficiary->birth_date->format('d/m/Y') : 'N/A'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>

    
    <div class="section">
        <div class="section-title">Procès-verbal et Déclaration</div>
        <p class="prose">
            L'an <?php echo e($submission->created_at->format('Y')); ?>, le <?php echo e($submission->created_at->format('d/m/Y')); ?>, je soussigné(e) <strong><?php echo e(($submission->last_name ?? '') . ' ' . ($submission->first_names ?? '')); ?></strong> déclare vouloir adhérer à la COCEC et ouvrir un compte d'épargne.
        </p>
        <p class="prose">
            Je soussigné(e), <strong><?php echo e(($submission->last_name ?? '') . ' ' . ($submission->first_names ?? '')); ?></strong>, atteste sur l'honneur que les informations fournies sont exactes et sincères, et reconnais que toute fausse déclaration peut entraîner le rejet de cette demande ou la clôture du compte.
        </p>
        
        <div class="signature-area">
            <p><strong>Fait à Lomé, le <?php echo e($submission->created_at->format('d/m/Y')); ?></strong></p>
            <p><strong>LE DEMANDEUR</strong></p>
            
            <?php
                $hasSignature = false;
                $signatureHtml = '';
                
                try {
                    // Priorité 1: Signature dessinée (base64)
                    if (!empty($submission->signature_base64) && trim($submission->signature_base64) !== '') {
                        // Nettoyer la chaîne base64
                        $cleanBase64 = preg_replace('/^data:image\/[^;]+;base64,/', '', $submission->signature_base64);
                        $cleanBase64 = preg_replace('/[^A-Za-z0-9+\/=]/', '', $cleanBase64);
                        
                        // Vérifier que c'est du base64 valide et non vide
                        if (base64_decode($cleanBase64, true) !== false && strlen($cleanBase64) > 100) {
                            $signatureHtml = '<img src="data:image/png;base64,' . $cleanBase64 . '" alt="Signature" style="max-width: 60mm; max-height: 25mm; border-radius: 3px; background: white;">';
                            $hasSignature = true;
                        }
                    }
                    
                    // Priorité 2: Signature uploadée si pas de signature dessinée
                    if (!$hasSignature && !empty($submission->signature_upload_path)) {
                        // Construire le chemin complet
                        $relativePath = str_replace('public/', '', $submission->signature_upload_path);
                        $signaturePath = storage_path('app/public/' . $relativePath);
                        
                        // Alternative: essayer aussi le chemin direct
                        if (!file_exists($signaturePath)) {
                            $signaturePath = storage_path('app/' . $submission->signature_upload_path);
                        }
                        
                        if (file_exists($signaturePath) && is_readable($signaturePath)) {
                            $fileSize = filesize($signaturePath);
                            if ($fileSize > 0 && $fileSize < 5000000) { // Max 5MB
                                $signatureData = file_get_contents($signaturePath);
                                if ($signatureData !== false) {
                                    $signatureType = strtolower(pathinfo($signaturePath, PATHINFO_EXTENSION));
                                    
                                    // Mapper les extensions aux types MIME
                                    $mimeTypes = [
                                        'jpg' => 'jpeg',
                                        'jpeg' => 'jpeg',
                                        'png' => 'png',
                                        'gif' => 'gif',
                                        'webp' => 'webp'
                                    ];
                                    
                                    if (isset($mimeTypes[$signatureType])) {
                                        $mimeType = $mimeTypes[$signatureType];
                                        $base64Data = base64_encode($signatureData);
                                        $signatureSrc = "data:image/$mimeType;base64,$base64Data";
                                        $signatureHtml = '<img src="' . $signatureSrc . '" alt="Signature uploadée" style="max-width: 60mm; max-height: 25mm; border-radius: 3px; background: white;">';
                                        $hasSignature = true;
                                    }
                                }
                            }
                        }
                    }
                    
                } catch (Exception $e) {
                    // En cas d'erreur, continuer sans signature
                    $hasSignature = false;
                }
            ?>
            
            <?php if($hasSignature): ?>
                <div class="signature-display">
                    <?php echo $signatureHtml; ?>

                </div>
            <?php else: ?>
                <div class="signature-line">(Signature et Cachet)</div>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="footer">
        <p>COCEC - Coopérative Chrétienne d'Épargne et de Crédit</p>
    </div>
</body>
</html><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/admin/accounts/physical/pdf.blade.php ENDPATH**/ ?>