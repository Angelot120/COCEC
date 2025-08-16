<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande morale #{{ $submission->id }}</title>
    <style>
        @page {
            margin: 20mm;
        }

        body {
            font-family: 'Helvetica Neue', 'Roboto', 'Lato', Arial, sans-serif;
            line-height: 1.5;
            color: #3d474d;
            background-color: #ffffff;
            font-size: 10pt;
        }

        /* --- EN-TÊTE CORRIGÉ --- */
        .header {
            position: relative;
            border-bottom: 2px solid #EC281C;
            padding-bottom: 10mm;
            margin-bottom: 12mm;
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
            margin: 0 0 10mm 0;
            font-size: 10pt;
            font-weight: normal;
        }
        
        .header-content h3 {
            margin: 0 0 6mm 0;
            font-size: 13pt;
            color: #000000;
            font-weight: bold;
        }
        
        .submission-details {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10mm;
            font-size: 9pt;
            color: #000000;
        }
        .submission-details p { margin: 0; }
        .submission-details strong { color: #EC281C; }

        /* Alternative si pas de photo - centrage normal */
        .header.no-photo {
            padding-left: 0;
            text-align: center;
        }

        /* --- CORPS DU DOCUMENT --- */
        .section {
            margin-bottom: 12mm;
            page-break-inside: avoid;
        }

        .section-title {
            font-size: 12pt;
            font-weight: bold;
            color: #FFFFFF;
            background-color: #EC281C;
            padding: 3mm 6mm;
            margin-bottom: 8mm;
            border-radius: 3px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 12mm;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: 3mm 0;
            border-bottom: 1px dotted #EC281C;
        }
        
        .info-label {
            font-weight: bold;
            color: #000000;
            flex-shrink: 0;
            padding-right: 5mm;
        }
        
        .info-value {
            font-weight: normal;
            color: #000000;
            text-align: right;
        }
        
        .full-width {
            grid-column: 1 / -1;
        }

        .table, .payment-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9pt;
        }
        
        .table th, .payment-table th {
            background-color: #EC281C; 
            color: #FFFFFF;
            padding: 4mm; 
            text-align: left; 
            font-weight: bold;
        }
        
        .table td, .payment-table td { 
            padding: 4mm; 
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
        
        .prose { 
            text-align: justify; 
            margin-bottom: 10mm; 
            font-size: 11pt; 
            line-height: 1.6;
            color: #000000;
        }
        
        .signature-area { 
            margin-top: 25mm; 
            text-align: right;
            color: #000000;
        }
        
        .signature-area p { 
            margin: 0 0 2mm 0; 
        }
        
        .signature-line { 
            margin-top: 30mm; 
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
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 30mm;
        }
        
        .signature-display img {
            max-width: 60mm;
            max-height: 25mm;
            min-height: 15mm;
            /* border: 1px solid #EC281C; */
            /* border-radius: 3px; */
            background-color: #ffffff;
            object-fit: contain;
            object-position: center;
            display: block;
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
        }
        
        .footer { 
            margin-top: 15mm; 
            text-align: center; 
            font-size: 8pt; 
            color: #EC281C;
            font-weight: bold;
        }
        
        .page-break { 
            page-break-before: always; 
        }
        
    </style>
</head>
<body>
    {{-- EN-TÊTE AVEC PHOTO --}}
    <div class="header {{ $submission->responsible_persons_photo_path ? '' : 'no-photo' }}">
        @if($submission->responsible_persons_photo_path)
        <div class="header-photo">
             @php
                $photoHtml = '';
                try {
                    $relativePath = str_replace('public/', '', $submission->responsible_persons_photo_path);
                    $photoPath = storage_path('app/public/' . $relativePath);
                    
                    // Alternative si le fichier n'est pas trouvé
                    if (!file_exists($photoPath)) {
                        $photoPath = storage_path('app/' . $submission->responsible_persons_photo_path);
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
                                    $photoHtml = '<img src="data:image/' . $mimeType . ';base64,' . $base64Data . '" alt="Photo du responsable">';
                                }
                            }
                        }
                    }
                } catch (Exception $e) {
                    // Continuer sans photo en cas d'erreur
                }
             @endphp
            
            {!! $photoHtml !!}
        </div>
        @endif

        <div class="header-content">
            <h1>COOPERATIVE CHRETIENNE D'EPARGNE ET DE CREDIT</h1>
            <h2>ASSISTANCE - CONSEIL MICROFINANCEMENT</h2>
            <h3>FICHE D'ADHÉSION PERSONNE MORALE</h3>
            <div class="submission-details">
                <p>N° de soumission : <strong>#{{ $submission->id }}</strong></p>
                <p>Date : <strong>{{ $submission->created_at->format('d/m/Y') }}</strong></p>
                <p>Statut : <strong class="status-{{ $submission->statut ?? 'en_attente' }}">
                     @if(($submission->statut ?? 'en_attente') == 'en_attente') En attente
                     @elseif(($submission->statut ?? 'en_attente') == 'accepter') Accepté
                     @elseif(($submission->statut ?? 'en_attente') == 'refuser') Refusé
                     @else {{ $submission->statut ?? 'en_attente' }} @endif
                </strong></p>
            </div>
        </div>
    </div>
    
    {{-- INFORMATIONS SUR L'ENTREPRISE --}}
    <div class="section">
        <div class="section-title">Informations sur l'entreprise</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Nom de l'entreprise</span>
                <span class="info-value">{{ $submission->company_name ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Catégorie</span>
                <span class="info-value">{{ $submission->category ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">RCCM</span>
                <span class="info-value">{{ $submission->rccm ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Secteur d'activité</span>
                <span class="info-value">{{ $submission->activity_sector ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Date de création</span>
                <span class="info-value">{{ $submission->creation_date ? $submission->creation_date->format('d/m/Y') : 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Lieu de création</span>
                <span class="info-value">{{ $submission->creation_place ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Nationalité</span>
                <span class="info-value">{{ $submission->company_nationality ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Téléphone</span>
                <span class="info-value">{{ $submission->company_phone ?? 'N/A' }}</span>
            </div>
            <div class="info-item full-width">
                <span class="info-label">Adresse complète</span>
                <span class="info-value">{{ $submission->company_address ?? 'N/A' }}</span>
            </div>
            @if(!empty($submission->activity_description))
            <div class="info-item full-width">
                <span class="info-label">Description de l'activité</span>
                <span class="info-value">{{ $submission->activity_description }}</span>
            </div>
            @endif
        </div>
        
        {{-- CARTE DE L'ENTREPRISE --}}
        @if (!empty($submission->company_lat) && !empty($submission->company_lng))
        <div style="margin-top: 10mm;">
            <div style="text-align: center; margin-bottom: 5mm;">
                <strong style="color: #EC281C; font-size: 11pt;">Localisation de l'entreprise</strong>
            </div>
            <div style="text-align: center; border: 2px solid #EC281C; padding: 5mm; background: #f8f9fa; border-radius: 5px;">
                <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s+ff0000({{ $submission->company_lng }},{{ $submission->company_lat }})/{{ $submission->company_lng }},{{ $submission->company_lat }},15,0/400x200@2x?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" 
                     style="width: 100%; height: 40mm; object-fit: cover; border-radius: 3px;" 
                     alt="Localisation de l'entreprise">
                <div style="margin-top: 3mm; font-size: 8pt; color: #666;">
                    Coordonnées : {{ $submission->company_lat }}, {{ $submission->company_lng }}
                </div>
            </div>
        </div>
        @endif

        {{-- CSS pour les cartes Leaflet --}}
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

        {{-- JavaScript pour les cartes Leaflet --}}
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script>
            @if (!empty($submission->company_lat) && !empty($submission->company_lng))
            // Carte de l'entreprise
            const companyMap = L.map('company-map').setView([{{ $submission->company_lat }}, {{ $submission->company_lng }}], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(companyMap);
            L.marker([{{ $submission->company_lat }}, {{ $submission->company_lng }}]).addTo(companyMap)
                .bindPopup('Localisation de l\'entreprise')
                .openPopup();

            // Forcer le rechargement des tuiles pour l'impression
            window.addEventListener('beforeprint', () => {
                companyMap.invalidateSize();
                companyMap.eachLayer(function (layer) {
                    if (layer instanceof L.TileLayer) {
                        layer.redraw();
                    }
                });
            });
            @endif
        </script>
    </div>

    {{-- INFORMATIONS SUR LE DIRECTEUR --}}
    <div class="section">
        <div class="section-title">Informations sur le directeur</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Nom complet</span>
                <span class="info-value">{{ ($submission->director_name ?? '') . ' ' . ($submission->director_first_name ?? '') }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Poste</span>
                <span class="info-value">{{ $submission->director_position ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Genre</span>
                <span class="info-value">{{ ($submission->director_gender ?? '') == 'M' ? 'Masculin' : (($submission->director_gender ?? '') == 'F' ? 'Féminin' : 'N/A') }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Nationalité</span>
                <span class="info-value">{{ $submission->director_nationality ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Date de naissance</span>
                <span class="info-value">{{ $submission->director_birth_date ? $submission->director_birth_date->format('d/m/Y') : 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Lieu de naissance</span>
                <span class="info-value">{{ $submission->director_birth_place ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">N° Pièce d'identité</span>
                <span class="info-value">{{ $submission->director_id_number ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Date d'émission</span>
                <span class="info-value">{{ $submission->director_id_issue_date ? $submission->director_id_issue_date->format('d/m/Y') : 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Téléphone</span>
                <span class="info-value">{{ $submission->director_phone ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Nom du père</span>
                <span class="info-value">{{ $submission->director_father_name ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Nom de la mère</span>
                <span class="info-value">{{ $submission->director_mother_name ?? 'N/A' }}</span>
            </div>
        </div>
    </div>

    {{-- INFORMATIONS SUR LE/LA CONJOINT(E) --}}
    <div class="section">
        <div class="section-title">Informations sur le/la Conjoint(e)</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Nom</span>
                <span class="info-value">{{ $submission->director_spouse_name ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Prénom</span>
                <span class="info-value">{{ $submission->director_spouse_first_name ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Profession</span>
                <span class="info-value">{{ $submission->director_spouse_profession ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Téléphone</span>
                <span class="info-value">{{ $submission->director_spouse_phone ?? 'N/A' }}</span>
            </div>
            <div class="info-item full-width">
                <span class="info-label">Adresse</span>
                <span class="info-value">{{ $submission->director_spouse_address ?? 'N/A' }}</span>
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    {{-- PERSONNE À CONTACTER EN CAS DE BESOIN --}}
    <div class="section">
        <div class="section-title">Personne à contacter en cas de besoin</div>
         <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Nom et prénom</span>
                <span class="info-value">{{ $submission->emergency_contact_name ?? 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Téléphone</span>
                <span class="info-value">{{ $submission->emergency_contact_phone ?? 'N/A' }}</span>
            </div>
            <div class="info-item full-width">
                <span class="info-label">Adresse</span>
                <span class="info-value">{{ $submission->emergency_contact_address ?? 'N/A' }}</span>
            </div>
        </div>
    </div>

    {{-- KYC --}}
    <div class="section">
        <div class="section-title">KYC (Know Your Customer)</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Personne politiquement exposée (nationale)</span>
                <span class="info-value">{{ ($submission->is_ppe_national ?? false) ? 'Oui' : 'Non' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Personne politiquement exposée (étrangère)</span>
                <span class="info-value">{{ ($submission->ppe_foreign ?? false) ? 'Oui' : 'Non' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Sanction financière internationale</span>
                <span class="info-value">{{ (($submission->sanctions ?? 'Non') !== 'Non') ? 'Oui' : 'Non' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Financement du terrorisme</span>
                <span class="info-value">{{ (($submission->terrorism_financing ?? 'Non') !== 'Non') ? 'Oui' : 'Non' }}</span>
            </div>
            @if(!empty($submission->sanctions) && $submission->sanctions !== 'Non')
            <div class="info-item full-width">
                <span class="info-label">Détails des sanctions</span>
                <span class="info-value">{{ $submission->sanctions }}</span>
            </div>
            @endif
        </div>
    </div>
    
    {{-- INFORMATIONS SUR LE COMPTE --}}
    <div class="section">
        <div class="section-title">Informations sur le compte</div>
        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Date d'adhésion</span>
                <span class="info-value">{{ $submission->membership_date ? $submission->membership_date->format('d/m/Y') : 'N/A' }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Date d'ouverture</span>
                <span class="info-value">{{ $submission->account_opening_date ? $submission->account_opening_date->format('d/m/Y') : 'N/A' }}</span>
            </div>
            <div class="info-item full-width">
                <span class="info-label">Numéro de compte</span>
                <span class="info-value">{{ $submission->account_number ?? 'Non attribué' }}</span>
            </div>
            @if(!empty($submission->remarks))
            <div class="info-item full-width">
                <span class="info-label">Remarques</span>
                <span class="info-value">{{ $submission->remarks }}</span>
            </div>
            @endif
        </div>
    </div>

    {{-- VERSEMENTS INITIAUX --}}
    <div class="section">
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
                    <td style="text-align: right;">{{ number_format(2000, 0, ',', ' ') }}</td>
                </tr>
                <tr>
                    <td>Part social</td>
                    <td style="text-align: right;">{{ number_format(15000, 0, ',', ' ') }}</td>
                </tr>
                <tr>
                    <td>Dépôts</td>
                    <td style="text-align: right;">{{ number_format($submission->initial_deposit ?? 0, 0, ',', ' ') }}</td>
                </tr>
                <tr class="total-row">
                    <td><strong>TOTAL</strong></td>
                    <td style="text-align: right;"><strong>{{ number_format(17000 + ($submission->initial_deposit ?? 0), 0, ',', ' ') }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- SIGNATAIRES DU COMPTE --}}
    @if (isset($submission->accountSignatories) && !$submission->accountSignatories->isEmpty())
    <div class="section">
        <div class="section-title">Signataires du compte</div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom & Prénoms</th>
                    <th>Type de signature</th>
                    <th style="width: 30%;">Signature</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submission->accountSignatories as $signatory)
                    <tr>
                        <td>{{ $signatory->name ?? 'N/A' }}</td>
                        <td>
                            @if(($signatory->signature_type ?? '') == 'unique') Unique
                            @elseif(($signatory->signature_type ?? '') == 'conjointe') Conjointe
                            @elseif(($signatory->signature_type ?? '') == 'unique_ou_conjointe') Unique ou Conjointe
                            @else {{ $signatory->signature_type ?? 'N/A' }} @endif
                        </td>
                        <td style="height: 25mm; vertical-align: top; padding: 2mm;">
                            @php
                                $hasSignature = false;
                                $signatureHtml = '';
                                
                                try {
                                    // Utiliser la signature du directeur pour tous les signataires (solution temporaire)
                                    if (!empty($submission->signature_base64) && trim($submission->signature_base64) !== '') {
                                        // Nettoyer la chaîne base64
                                        $cleanBase64 = preg_replace('/^data:image\/[^;]+;base64,/', '', $submission->signature_base64);
                                        $cleanBase64 = preg_replace('/[^A-Za-z0-9+\/=]/', '', $cleanBase64);
                                        
                                        // Vérifier que c'est du base64 valide et non vide
                                        if (base64_decode($cleanBase64, true) !== false && strlen($cleanBase64) > 100) {
                                            $signatureHtml = '<img src="data:image/png;base64,' . $cleanBase64 . '" alt="Signature" style="max-width: 50mm; max-height: 20mm; border-radius: 3px; background: white; display: block; margin: 0 auto; object-fit: contain;">';
                                            $hasSignature = true;
                                        }
                                    }
                                    
                                    // Alternative: signature uploadée du directeur
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
                                                        $signatureHtml = '<img src="' . $signatureSrc . '" alt="Signature uploadée" style="max-width: 50mm; max-height: 20mm; border-radius: 3px; background: white; display: block; margin: 0 auto; object-fit: contain;">';
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
                            @endphp
                            
                            @if($hasSignature)
                                {!! $signatureHtml !!}
                            @else
                                <div style="text-align: center; color: #666; font-size: 8pt; padding: 5mm 0;">
                                    (Signature)
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    
    {{-- PROCÈS-VERBAL ET DÉCLARATION --}}
    <div class="section">
        <div class="section-title">Procès-verbal et Déclaration</div>
        <p class="prose">
            L'an {{ $submission->created_at->format('Y') }}, le {{ $submission->created_at->format('d/m/Y') }}, les membres de <strong>{{ $submission->company_name ?? 'N/A' }}</strong> réunis en Assemblée Générale ont unanimement décidé d'ouvrir un compte à la COCEC et de donner mandat aux membres désignés comme signataires pour faire fonctionner ledit compte.
        </p>
         <p class="prose">
            Je soussigné(e), <strong>{{ ($submission->director_name ?? '') . ' ' . ($submission->director_first_name ?? '') }}</strong>, agissant en qualité de responsable, atteste sur l'honneur que les informations fournies sont exactes et sincères, et reconnais que toute fausse déclaration peut entraîner le rejet de cette demande ou la clôture du compte.
        </p>
        
        <div class="signature-area">
            <p><strong>Fait à Lomé, le {{ $submission->created_at->format('d/m/Y') }}</strong></p>
            <p><strong>LE PRÉSIDENT / DIRECTEUR</strong></p>
            
            @php
                $hasDirectorSignature = false;
                $directorSignatureHtml = '';
                
                try {
                    // Priorité 1: Signature dessinée (base64) du directeur
                    if (!empty($submission->signature_base64) && trim($submission->signature_base64) !== '') {
                        // Nettoyer la chaîne base64
                        $cleanBase64 = preg_replace('/^data:image\/[^;]+;base64,/', '', $submission->signature_base64);
                        $cleanBase64 = preg_replace('/[^A-Za-z0-9+\/=]/', '', $cleanBase64);
                        
                        // Vérifier que c'est du base64 valide et non vide
                        if (base64_decode($cleanBase64, true) !== false && strlen($cleanBase64) > 100) {
                            $directorSignatureHtml = '<img src="data:image/png;base64,' . $cleanBase64 . '" alt="Signature du directeur" style="max-width: 60mm; max-height: 25mm; border-radius: 3px; background: white; object-fit: contain;">';
                            $hasDirectorSignature = true;
                        }
                    }
                    
                    // Priorité 2: Signature uploadée du directeur si pas de signature dessinée
                    if (!$hasDirectorSignature && !empty($submission->signature_upload_path)) {
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
                                        $directorSignatureHtml = '<img src="' . $signatureSrc . '" alt="Signature du directeur" style="max-width: 60mm; max-height: 25mm; border-radius: 3px; background: white; object-fit: contain;">';
                                        $hasDirectorSignature = true;
                                    }
                                }
                            }
                        }
                    }
                    
                } catch (Exception $e) {
                    // En cas d'erreur, continuer sans signature
                    $hasDirectorSignature = false;
                }
            @endphp
            
            @if($hasDirectorSignature)
                <div class="signature-display" style="text-align: right;">
                    {!! $directorSignatureHtml !!}
                </div>
            @else
                <div class="signature-line" >
                    (Signature et Cachet)
                </div>
            @endif
        </div>
    </div>

    {{-- FOOTER --}}
    <div class="footer">
        <p>COCEC - Coopérative Chrétienne d'Épargne et de Crédit</p>
    </div>
</body>
</html>