<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat d'Adhésion - Finance Digitale</title>
    {{-- Le style est une copie exacte du design précédent pour garantir la cohérence --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            padding: 20px;
            font-size: 14px;
            position: relative;
        }
        .container {
            position: relative;
            z-index: 1;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        .logo {
            width: 80px;
            height: auto;
        }
        .logo-left {
            position: absolute;
            left: 0;
            top: 0;
        }
        .logo-right {
            position: absolute;
            right: 0;
            top: 0;
        }
        .header-title {
            display: inline-block;
            margin-top: 10px;
        }
        .header-title h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
        .header-title h1.underlined {
            text-decoration: underline;
        }
        .section-title {
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .section {
            margin-bottom: 25px;
        }
        .form-row {
            margin-bottom: 12px;
        }
        .form-row label {
            display: inline;
            white-space: nowrap;
            padding-right: 10px;
            font-weight: bold;
        }
        .form-row .data {
            display: inline;
            border-bottom: 1px dotted #555; /* Ligne pointillée pour les données affichées */
            padding-bottom: 2px;
        }
        
        /* Spécifique pour la souscription */
        .service-row {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .service-row .service-label {
            width: 250px; /* Plus de largeur pour inclure le prix */
            font-weight: bold;
        }
        .service-option {
            margin-left: 40px;
        }
        .checkbox {
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 1px solid black;
            margin-left: 8px;
            vertical-align: middle;
            position: relative;
        }
        
        .checkbox.checked::after {
            content: 'X';
            font-size: 14px;
            font-weight: bold;
            color: #000;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            line-height: 1;
        }

        /* Signatures */
        .signature-section {
            margin-top: 50px;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
        }
        .signature-block {
            width: 45%;
            text-align: center;
        }
        .signature-line {
            border-bottom: 1px solid black;
            height: 60px;
            margin-bottom: 8px;
        }
        .signature-block .signature-label {
            font-weight: bold;
        }
        
        .section-title.center {
            text-align: center;
        }
        
        .signature-title {
             text-align: center;
             font-weight: bold;
             text-decoration: underline;
             margin-bottom: 20px;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
            opacity: 0.1;
        }
        .watermark img {
             width: 400px;
        }
    </style>
</head>
<body>

    <div class="watermark">
        <img src="{{ public_path('assets/images/Logo.png') }}" alt="Watermark">
    </div>

    <div class="container">
        <div class="header">
            <img src="{{ public_path('assets/images/Logo.png') }}" alt="OCEC Logo" class="logo logo-left">
            <div class="header-title">
                <h1>CONTRAT D'ADHESION</h1>
                <h1 class="underlined">AUX SERVICES DE FINANCE DIGITALE</h1>
            </div>
            <img src="{{ public_path('assets/images/Logo.png') }}" alt="OCEC Logo" class="logo logo-right">
        </div>

        <div class="section">
            <h2 class="section-title center">INFORMATIONS DU SOUSCRIPTEUR</h2>
            <div class="form-row">
                <label>NOM et PRENOM:</label>
                <span class="data">{{ $contract->full_name ?: '____________________' }}</span>
            </div>
            <div class="form-row">
                <label>N° DE COMPTE:</label>
                <span class="data">{{ $contract->account_number ?: '____________________' }}</span>
            </div>
            <div class="form-row">
                <label>PIECE D'IDENTITE:</label>
                <span class="data">{{ $contract->cni_type ? $contract->cni_type . ' N° ' . $contract->cni_number : '____________________' }}</span>
            </div>
             <div class="form-row">
                <label>TELEPHONE:</label>
                <span class="data">{{ $contract->phone ?: '____________________' }}</span>
            </div>
            <div class="form-row">
                <label>ADRESSE:</label>
                <span class="data">{{ $contract->address ?: '____________________' }}</span>
            </div>
             <div class="form-row">
                <label>Fait le:</label>
                <span class="data">{{ $contract->contract_date ? $contract->contract_date->format('d/m/Y') : '____________________' }}</span>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">SERVICES SOUSCRITS</h2>
            <div class="service-row">
                <span class="service-label">MOBILE BANKING (1000 F/an) :</span>
                <span class="checkbox {{ $contract->mobile_banking ? 'checked' : '' }}"></span>
            </div>
            <div class="service-row">
                <span class="service-label">MOBILE MONEY (1000 F/an) :</span>
                <span class="checkbox {{ $contract->mobile_money ? 'checked' : '' }}"></span>
            </div>
             <div class="service-row">
                <span class="service-label">WEB BANKING (600 F/an) :</span>
                <span class="checkbox {{ $contract->web_banking ? 'checked' : '' }}"></span>
            </div>
             <div class="service-row">
                <span class="service-label">SMS BANKING (100 F/mois) :</span>
                <span class="checkbox {{ $contract->sms_banking ? 'checked' : '' }}"></span>
            </div>
        </div>
        
        <div class="signature-section">
            <h2 class="signature-title">SIGNATURES</h2>
            <div class="signatures">
                <div class="signature-block">
                    <div class="signature-line"></div>
                    <div class="signature-label">LE CLIENT</div>
                </div>
                <div class="signature-block">
                    <div class="signature-line"></div>
                    <div class="signature-label">LE CHEF D'AGENCE</div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

