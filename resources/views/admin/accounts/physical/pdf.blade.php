<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Demande physique #{{ $submission->id }}</title>
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

        /* Réduction des espaces pour les sections courtes */
        .section.compact {
            margin-bottom: 6mm;
        }

        .section.compact .section-title {
            margin-bottom: 4mm;
        }
        
    </style>
</head>
<body>
    <div class="header {{ $submission->photo_path ? '' : 'no-photo' }}">
        @if($submission->photo_path)
        <div class="header-photo">
            @php
                $photoPath = storage_path('app/public/' . str_replace('public/', '', $submission->photo_path));
                $imageSrc = '';
                if (file_exists($photoPath)) {
                    $imageData = base64_encode(file_get_contents($photoPath));
                    $imageType = pathinfo($photoPath, PATHINFO_EXTENSION);
                    $imageSrc = "data:image/$imageType;base64,$imageData";
                } else { $imageSrc = ''; }
            @endphp
            @if($imageSrc)
                <img src="{{ $imageSrc }}" alt="Photo d'identité">
            @endif
        </div>
        @endif

        <div class="header-content">
            <h1>COOPERATIVE CHRETIENNE D'EPARGNE ET DE CREDIT</h1>
            <h2>ASSISTANCE - CONSEIL MICROFINANCEMENT</h2>
            <h3>FICHE D'ADHÉSION PERSONNE PHYSIQUE</h3>
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
    
    <div class="section">
        <div class="section-title">Informations personnelles</div>
        <div class="info-grid">
            <div class="info-item"><span class="info-label">Nom</span><span class="info-value">{{ $submission->last_name }}</span></div>
            <div class="info-item"><span class="info-label">Prénoms</span><span class="info-value">{{ $submission->first_names }}</span></div>
            <div class="info-item"><span class="info-label">Genre</span><span class="info-value">{{ $submission->gender == 'M' ? 'Masculin' : 'Féminin' }}</span></div>
            <div class="info-item"><span class="info-label">Date de naissance</span><span class="info-value">{{ $submission->birth_date ? $submission->birth_date->format('d/m/Y') : 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Lieu de naissance</span><span class="info-value">{{ $submission->birth_place }}</span></div>
            <div class="info-item"><span class="info-label">Nationalité</span><span class="info-value">{{ $submission->nationality }}</span></div>
            <div class="info-item"><span class="info-label">Nom du père</span><span class="info-value">{{ $submission->father_name ?? 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Nom de la mère</span><span class="info-value">{{ $submission->mother_name ?? 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Téléphone</span><span class="info-value">{{ $submission->phone ?? 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Adresse</span><span class="info-value">{{ $submission->address ?? 'N/A' }}</span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informations supplémentaires</div>
        <div class="info-grid">
            <div class="info-item"><span class="info-label">Statut marital</span><span class="info-value">{{ $submission->marital_status ?? 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Nom du conjoint</span><span class="info-value">{{ $submission->spouse_name ?? 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Profession</span><span class="info-value">{{ $submission->occupation ?? 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Entreprise</span><span class="info-value">{{ $submission->company_name_activity ?? 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Numéro de pièce</span><span class="info-value">{{ $submission->id_number ?? 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Date d'émission</span><span class="info-value">{{ $submission->id_issue_date ? $submission->id_issue_date->format('d/m/Y') : 'N/A' }}</span></div>
        </div>
    </div>

    <div class="section compact">
        <div class="section-title">Informations sur le compte</div>
        <div class="info-grid">
            <div class="info-item"><span class="info-label">Date d'adhésion</span><span class="info-value">{{ $submission->membership_date ? $submission->membership_date->format('d/m/Y') : 'N/A' }}</span></div>
            <div class="info-item"><span class="info-label">Date d'ouverture</span><span class="info-value">{{ $submission->account_opening_date ? $submission->account_opening_date->format('d/m/Y') : 'N/A' }}</span></div>
            <div class="info-item full-width"><span class="info-label">Numéro de compte</span><span class="info-value">{{ $submission->account_number ?? 'Non attribué' }}</span></div>
            @if($submission->remarks)
            <div class="info-item full-width"><span class="info-label">Remarques</span><span class="info-value">{{ $submission->remarks }}</span></div>
            @endif
        </div>
    </div>

    <div class="section compact">
        <div class="section-title">Versements initiaux</div>
        <table class="payment-table">
            <thead><tr><th>Désignation</th><th style="text-align: right;">Montant (FCFA)</th></tr></thead>
            <tbody>
                <tr><td>Droit d'adhésion</td><td style="text-align: right;">{{ number_format(2000, 0, ',', ' ') }}</td></tr>
                <tr><td>Part social</td><td style="text-align: right;">{{ number_format(15000, 0, ',', ' ') }}</td></tr>
                <tr><td>Dépôts</td><td style="text-align: right;">{{ number_format($submission->initial_deposit ?? 0, 0, ',', ' ') }}</td></tr>
                <tr class="total-row"><td><strong>TOTAL</strong></td><td style="text-align: right;"><strong>{{ number_format(2000 + 15000 + ($submission->initial_deposit ?? 0), 0, ',', ' ') }}</strong></td></tr>
            </tbody>
        </table>
    </div>

    @if (!$submission->beneficiaries->isEmpty())
    <div class="section">
        <div class="section-title">Bénéficiaires (Ayant droit en cas de décès)</div>
        <table class="table">
            <thead><tr><th>N°</th><th>Nom et prénoms</th><th>Adresse</th><th>Lien de parenté</th></tr></thead>
            <tbody>
                @foreach ($submission->beneficiaries as $index => $beneficiary)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $beneficiary->nom }}</td>
                        <td>{{ $beneficiary->contact }}</td>
                        <td>{{ $beneficiary->lien }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="section">
        <div class="section-title">Procès-verbal et Déclaration</div>
        <p class="prose">
            L'an {{ $submission->created_at->format('Y') }}, le {{ $submission->created_at->format('d/m/Y') }}, je soussigné(e) <strong>{{ $submission->last_name }} {{ $submission->first_names }}</strong> déclare vouloir adhérer à la COCEC et ouvrir un compte d'épargne.
        </p>
         <p class="prose">
            Je soussigné(e), <strong>{{ $submission->last_name }} {{ $submission->first_names }}</strong>, atteste sur l'honneur que les informations fournies sont exactes et sincères, et reconnais que toute fausse déclaration peut entraîner le rejet de cette demande ou la clôture du compte.
        </p>
        <div class="signature-area">
            <p><strong>Fait à Lomé, le {{ $submission->created_at->format('d/m/Y') }}</strong></p>
            <p><strong>LE DEMANDEUR</strong></p>
            <div class="signature-line">(Signature et Cachet)</div>
        </div>
    </div>

    <div class="footer">
        <p>COCEC - Coopérative Chrétienne d'Épargne et de Crédit</p>
    </div>
</body>
</html>