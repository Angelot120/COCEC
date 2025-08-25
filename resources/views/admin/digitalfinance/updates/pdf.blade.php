<!DOCTYPE html>
<html lang="fr">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de Mise à Jour et de Souscription - La Finance Digitale</title>
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
        .info-client, .contacts-client, .souscription-services {
            margin-bottom: 20px;
        }
        .form-row {
            display: block; /* Change de inline-block à block pour empiler verticalement */
            margin-bottom: 15px;
        }
        .form-row label {
            display: inline; /* Affiche le label en ligne */
            white-space: nowrap;
            padding-right: 10px;
            font-weight: bold;
        }
        .form-row .input-line {
            display: inline; /* Affiche l'information en ligne */
            border: none;
            padding-left: 5px;
        }

        /* Spécifique pour les contacts */
        .contacts-grid {
            display: block; /* Change de grid à block pour empiler verticalement */
            margin-top: 15px;
        }
        .contact-field {
            display: block; /* Change de inline-block à block pour empiler verticalement */
            margin-bottom: 10px; /* Espace entre chaque contact */
        }
        .contact-field label {
             display: inline; /* Affiche le label en ligne */
             white-space: nowrap;
             padding-right: 5px;
             font-weight: bold;
        }
        .contact-field .input-line {
            display: inline; /* Affiche l'information en ligne */
            border: none;
            padding-left: 5px;
        }
        
        /* Spécifique pour la souscription */
        .service-row {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .service-row .service-label {
            width: 150px;
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
        
        /* === SOLUTION 1: Remplacement par un "X" === */
        .checkbox.checked::after {
            content: 'X'; /* Utilisation d'un "X" qui s'affichera partout */
            font-size: 14px;
            font-weight: bold;
            color: #000;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Centrage parfait du "X" */
            line-height: 1;
        }

        .bonus {
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        
        /* === SOLUTION 2: Positionnement des signatures === */
        .signature-section {
            margin-top: 40px;
            position: relative;
            height: 120px; /* Hauteur fixe pour la section */
        }
        .signatures {
            position: relative;
            width: 100%;
            height: 100%;
        }
        .signature-block {
            position: absolute;
            width: 200px; /* Largeur fixe pour chaque bloc */
            text-align: center;
        }
        .signature-block:first-child {
            left: 50px; /* Position à gauche */
        }
        .signature-block:last-child {
            right: 50px; /* Position à droite */
        }
        .signature-line {
            border-bottom: 1px solid black;
            height: 60px; /* Espace pour signer */
            margin-bottom: 8px;
        }
        .signature-block .signature-label {
            font-weight: bold;
            text-align: center;
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
        <!-- L'en-tête, les informations client et les contacts restent identiques -->
        <div class="header">
            <img src="{{ public_path('assets/images/Logo.png') }}" alt="OCEC Logo" class="logo logo-left">
            <div class="header-title">
                <h1>FICHE DE MISE A JOUR ET DE SOUSCRIPTION A</h1>
                <h1 class="underlined">LA FINANCE DIGITALE</h1>
            </div>
            <img src="{{ public_path('assets/images/Logo.png') }}" alt="OCEC Logo" class="logo logo-right">
        </div>

        <div class="info-client">
            <h2 class="section-title center">INFORMATIONS CLIENT</h2>
            <div class="form-row">
                <label for="compte">N° COMPTE:</label>
                <div class="input-line">{{ $update->account_number ?: '' }}</div>
            </div>
            <div class="form-row">
                <label for="cni">N° CNI ou AUTRE (à préciser):</label>
                <div class="input-line">{{ $update->cni_type ? $update->cni_type . ': ' . $update->cni_number : '' }}</div>
            </div>
            <div class="form-row">
                <label for="nom">NOM et PRENOM:</label>
                <div class="input-line">{{ $update->full_name ?: '' }}</div>
            </div>
        </div>

        <div class="contacts-client">
            <h2 class="section-title">CONTACTS DU CLIENT :</h2>
             <div class="form-row">
                <label for="email">Email :</label>
                <div class="input-line">{{ $update->email ?: '' }}</div>
            </div>
            <div class="contacts-grid">
                <div class="contact-field">
                    <label>Togocel :</label>
                    <div class="input-line">{{ $update->togocel ?: '' }}</div>
                </div>
                 <div class="contact-field">
                    <label>Tmoney :</label>
                    <div class="input-line">{{ $update->tmoney ?: '' }}</div>
                </div>
                  <div class="contact-field">
                    <label>Whatsapp :</label>
                    <div class="input-line">{{ $update->whatsapp_togocel ?: '' }}</div>
                </div>
                <div class="contact-field">
                    <label>Moov :</label>
                    <div class="input-line">{{ $update->moov ?: '' }}</div>
                </div>
                 <div class="contact-field">
                    <label>Flooz :</label>
                    <div class="input-line">{{ $update->flooz ?: '' }}</div>
                </div>
                  <div class="contact-field">
                    <label>Whatsapp :</label>
                    <div class="input-line">{{ $update->whatsapp_moov ?: '' }}</div>
                </div>
            </div>
        </div>

        <div class="souscription-services">
            <h2 class="section-title">SOUSCRIPTION AUX SERVICES</h2>
            <div class="service-row">
                <span class="service-label">MOBILE BANKING :</span>
                <span class="service-option">TOGOCEL <span class="checkbox {{ $update->mobile_banking_togocel ? 'checked' : '' }}"></span></span>
                <span class="service-option">MOOV <span class="checkbox {{ $update->mobile_banking_moov ? 'checked' : '' }}"></span></span>
            </div>
            <div class="service-row">
                <span class="service-label">MOBILE MONEY :</span>
                <span class="service-option">TOGOCEL <span class="checkbox {{ $update->mobile_money_togocel ? 'checked' : '' }}"></span></span>
                <span class="service-option">MOOV <span class="checkbox {{ $update->mobile_money_moov ? 'checked' : '' }}"></span></span>
            </div>
             <div class="service-row">
                <span class="service-label">WEB BANKING :</span>
                <span class="service-option">TOGOCEL <span class="checkbox {{ $update->web_banking_togocel ? 'checked' : '' }}"></span></span>
                <span class="service-option">MOOV <span class="checkbox {{ $update->web_banking_moov ? 'checked' : '' }}"></span></span>
            </div>
            <div class="bonus">BONUS</div>
             <div class="service-row">
                <span class="service-label">SMS BANKING :</span>
                <span class="service-option">TOGOCEL <span class="checkbox {{ $update->sms_banking_togocel ? 'checked' : '' }}"></span></span>
                <span class="service-option">MOOV <span class="checkbox {{ $update->sms_banking_moov ? 'checked' : '' }}"></span></span>
            </div>
        </div>
        
        <div class="signature-section">
            <h2 class="signature-title">SIGNATURE</h2>
            <div class="signatures">
                <div class="signature-block"> <!-- Ce bloc sera à gauche -->
                    <div class="signature-line"></div>
                    <div class="signature-label">LE CLIENT</div>
                </div>
                <div class="signature-block"> <!-- Ce bloc sera à droite -->
                    <div class="signature-line"></div>
                    <div class="signature-label">LE CHEF D'AGENCE</div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>