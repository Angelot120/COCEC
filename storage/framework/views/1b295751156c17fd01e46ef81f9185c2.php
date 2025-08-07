<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande morale #<?php echo e($submission->id); ?></title>
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
            padding-left: 55mm; /* Espace réservé pour la photo */
            page-break-inside: avoid;
        }
        
        .header-photo {
            position: absolute;
            top: 0;
            left: 0;
        }

        .header-photo img {
            width: 35mm; /* Réduit de 40mm à 35mm */
            height: 45mm; /* Réduit de 50mm à 45mm */
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

        /* --- CORPS DU DOCUMENT (Design validé) --- */
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
            background-color: #EC281C; color: #FFFFFF;
            padding: 4mm; text-align: left; font-weight: bold;
        }
        .table td, .payment-table td { 
            padding: 4mm; 
            border-bottom: 1px solid #EC281C;
            color: #000000;
        }
        .table tr:nth-child(even) td { background-color: #FFFFFF; }
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
        .signature-area p { margin: 0; }
        .signature-line { 
            margin-top: 30mm; 
            border-bottom: 1px dotted #000000; 
            width: 70mm; 
            margin-left: auto; 
        }
        .footer { 
            margin-top: 15mm; 
            text-align: center; 
            font-size: 8pt; 
            color: #EC281C;
            font-weight: bold;
        }
        .page-break { page-break-before: always; }
        
    </style>
</head>
<body>
    <div class="header <?php echo e($submission->responsible_persons_photo_path ? '' : 'no-photo'); ?>">
        <?php if($submission->responsible_persons_photo_path): ?>
        <div class="header-photo">
             <?php
                 $photoPath = storage_path('app/public/' . str_replace('public/', '', $submission->responsible_persons_photo_path));
                 if (file_exists($photoPath)) {
                     $imageData = base64_encode(file_get_contents($photoPath));
                     $imageType = pathinfo($photoPath, PATHINFO_EXTENSION);
                     $imageSrc = "data:image/$imageType;base64,$imageData";
                 } else { $imageSrc = ''; }
             ?>
             <?php if($imageSrc): ?>
                 <img src="<?php echo e($imageSrc); ?>" alt="Photo du responsable">
             <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="header-content">
            <h1>COOPERATIVE CHRETIENNE D'EPARGNE ET DE CREDIT</h1>
            <h2>ASSISTANCE - CONSEIL MICROFINANCEMENT</h2>
            <h3>FICHE D'ADHÉSION PERSONNE MORALE</h3>
            <div class="submission-details">
                <p>N° de soumission : <strong>#<?php echo e($submission->id); ?></strong></p>
                <p>Date : <strong><?php echo e($submission->created_at->format('d/m/Y')); ?></strong></p>
                <p>Statut : <strong class="status-<?php echo e($submission->statut); ?>">
                     <?php if($submission->statut == 'en_attente'): ?> En attente
                     <?php elseif($submission->statut == 'accepter'): ?> Accepté
                     <?php elseif($submission->statut == 'refuser'): ?> Refusé
                     <?php else: ?> <?php echo e($submission->statut); ?> <?php endif; ?>
                </strong></p>
            </div>
        </div>
    </div>
    
    <div class="section">
        <div class="section-title">Informations sur l'entreprise</div>
        <div class="info-grid">
            <div class="info-item"><span class="info-label">Nom de l'entreprise</span><span class="info-value"><?php echo e($submission->company_name); ?></span></div>
            <div class="info-item"><span class="info-label">Catégorie</span><span class="info-value"><?php echo e($submission->category ?? 'N/A'); ?></span></div>
            <div class="info-item"><span class="info-label">RCCM</span><span class="info-value"><?php echo e($submission->rccm); ?></span></div>
            <div class="info-item"><span class="info-label">Secteur d'activité</span><span class="info-value"><?php echo e($submission->activity_sector); ?></span></div>
            <div class="info-item"><span class="info-label">Date de création</span><span class="info-value"><?php echo e($submission->creation_date ? $submission->creation_date->format('d/m/Y') : 'N/A'); ?></span></div>
            <div class="info-item"><span class="info-label">Lieu de création</span><span class="info-value"><?php echo e($submission->creation_place); ?></span></div>
            <div class="info-item"><span class="info-label">Nationalité</span><span class="info-value"><?php echo e($submission->company_nationality); ?></span></div>
            <div class="info-item"><span class="info-label">Téléphone</span><span class="info-value"><?php echo e($submission->company_phone); ?></span></div>
            <div class="info-item full-width"><span class="info-label">Adresse complète</span><span class="info-value"><?php echo e($submission->company_address); ?></span></div>
            <?php if($submission->activity_description): ?>
            <div class="info-item full-width"><span class="info-label">Description de l'activité</span><span class="info-value"><?php echo e($submission->activity_description); ?></span></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informations sur le directeur</div>
        <div class="info-grid">
            <div class="info-item"><span class="info-label">Nom complet</span><span class="info-value"><?php echo e($submission->director_name); ?> <?php echo e($submission->director_first_name ?? ''); ?></span></div>
            <div class="info-item"><span class="info-label">Poste</span><span class="info-value"><?php echo e($submission->director_position); ?></span></div>
            <div class="info-item"><span class="info-label">Genre</span><span class="info-value"><?php echo e($submission->director_gender == 'M' ? 'Masculin' : 'Féminin'); ?></span></div>
            <div class="info-item"><span class="info-label">Nationalité</span><span class="info-value"><?php echo e($submission->director_nationality); ?></span></div>
            <div class="info-item"><span class="info-label">Date de naissance</span><span class="info-value"><?php echo e($submission->director_birth_date ? $submission->director_birth_date->format('d/m/Y') : 'N/A'); ?></span></div>
            <div class="info-item"><span class="info-label">Lieu de naissance</span><span class="info-value"><?php echo e($submission->director_birth_place); ?></span></div>
            <div class="info-item"><span class="info-label">N° Pièce d'identité</span><span class="info-value"><?php echo e($submission->director_id_number); ?></span></div>
            <div class="info-item"><span class="info-label">Date d'émission</span><span class="info-value"><?php echo e($submission->director_id_issue_date ? $submission->director_id_issue_date->format('d/m/Y') : 'N/A'); ?></span></div>
            <div class="info-item"><span class="info-label">Téléphone</span><span class="info-value"><?php echo e($submission->director_phone); ?></span></div>
            <div class="info-item"><span class="info-label">Nom du père</span><span class="info-value"><?php echo e($submission->director_father_name ?? 'N/A'); ?></span></div>
             <div class="info-item"><span class="info-label">Nom de la mère</span><span class="info-value"><?php echo e($submission->director_mother_name ?? 'N/A'); ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informations sur le/la Conjoint(e)</div>
        <div class="info-grid">
            <div class="info-item"><span class="info-label">Nom</span><span class="info-value"><?php echo e($submission->director_spouse_name ?? 'N/A'); ?></span></div>
            <div class="info-item"><span class="info-label">Prénom</span><span class="info-value"><?php echo e($submission->director_spouse_first_name ?? 'N/A'); ?></span></div>
            <div class="info-item"><span class="info-label">Profession</span><span class="info-value"><?php echo e($submission->director_spouse_profession ?? 'N/A'); ?></span></div>
            <div class="info-item"><span class="info-label">Téléphone</span><span class="info-value"><?php echo e($submission->director_spouse_phone ?? 'N/A'); ?></span></div>
            <div class="info-item full-width"><span class="info-label">Adresse</span><span class="info-value"><?php echo e($submission->director_spouse_address ?? 'N/A'); ?></span></div>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="section">
        <div class="section-title">Personne à contacter en cas de besoin</div>
         <div class="info-grid">
            <div class="info-item"><span class="info-label">Nom et prénom</span><span class="info-value"><?php echo e($submission->emergency_contact_name ?? 'N/A'); ?></span></div>
            <div class="info-item"><span class="info-label">Téléphone</span><span class="info-value"><?php echo e($submission->emergency_contact_phone ?? 'N/A'); ?></span></div>
            <div class="info-item full-width"><span class="info-label">Adresse</span><span class="info-value"><?php echo e($submission->emergency_contact_address ?? 'N/A'); ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">KYC (Know Your Customer)</div>
        <div class="info-grid">
            <div class="info-item"><span class="info-label">Personne politiquement exposée (nationale)</span><span class="info-value"><?php echo e($submission->is_ppe_national ? 'Oui' : 'Non'); ?></span></div>
            <div class="info-item"><span class="info-label">Personne politiquement exposée (étrangère)</span><span class="info-value"><?php echo e($submission->ppe_foreign ? 'Oui' : 'Non'); ?></span></div>
            <div class="info-item"><span class="info-label">Sanction financière internationale</span><span class="info-value"><?php echo e(($submission->sanctions && $submission->sanctions !== 'Non') ? 'Oui' : 'Non'); ?></span></div>
            <div class="info-item"><span class="info-label">Financement du terrorisme</span><span class="info-value"><?php echo e(($submission->terrorism_financing && $submission->terrorism_financing !== 'Non') ? 'Oui' : 'Non'); ?></span></div>
            <?php if($submission->sanctions && $submission->sanctions !== 'Non'): ?>
            <div class="info-item full-width"><span class="info-label">Détails des sanctions</span><span class="info-value"><?php echo e($submission->sanctions); ?></span></div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="section">
        <div class="section-title">Informations sur le compte</div>
        <div class="info-grid">
            <div class="info-item"><span class="info-label">Date d'adhésion</span><span class="info-value"><?php echo e($submission->membership_date ? $submission->membership_date->format('d/m/Y') : 'N/A'); ?></span></div>
            <div class="info-item"><span class="info-label">Date d'ouverture</span><span class="info-value"><?php echo e($submission->account_opening_date ? $submission->account_opening_date->format('d/m/Y') : 'N/A'); ?></span></div>
            <div class="info-item full-width"><span class="info-label">Numéro de compte</span><span class="info-value"><?php echo e($submission->account_number ?? 'Non attribué'); ?></span></div>
            <?php if($submission->remarks): ?>
            <div class="info-item full-width"><span class="info-label">Remarques</span><span class="info-value"><?php echo e($submission->remarks); ?></span></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Versements initiaux</div>
        <table class="payment-table">
            <thead><tr><th>Désignation</th><th style="text-align: right;">Montant (FCFA)</th></tr></thead>
            <tbody>
                <tr><td>Droit d'adhésion</td><td style="text-align: right;"><?php echo e(number_format(2000, 0, ',', ' ')); ?></td></tr>
                <tr><td>Part social</td><td style="text-align: right;"><?php echo e(number_format(15000, 0, ',', ' ')); ?></td></tr>
                <tr><td>Dépôts</td><td style="text-align: right;"><?php echo e(number_format($submission->initial_deposit, 0, ',', ' ')); ?></td></tr>
                <tr class="total-row"><td><strong>TOTAL</strong></td><td style="text-align: right;"><strong><?php echo e(number_format(2000 + 15000 + $submission->initial_deposit, 0, ',', ' ')); ?></strong></td></tr>
            </tbody>
        </table>
    </div>

    <?php if(!$submission->accountSignatories->isEmpty()): ?>
    <div class="section">
        <div class="section-title">Signataires du compte</div>
        <table class="table">
            <thead><tr><th>Nom & Prénoms</th><th>Type de signature</th><th style="width: 30%;">Signature</th></tr></thead>
            <tbody>
                <?php $__currentLoopData = $submission->accountSignatories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signatory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($signatory->name); ?></td>
                        <td>
                            <?php if($signatory->signature_type == 'unique'): ?> Unique
                            <?php elseif($signatory->signature_type == 'conjointe'): ?> Conjointe
                            <?php elseif($signatory->signature_type == 'unique_ou_conjointe'): ?> Unique ou Conjointe
                            <?php else: ?> <?php echo e($signatory->signature_type); ?> <?php endif; ?>
                        </td>
                        <td style="height: 15mm;"></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
    
    <div class="section">
        <div class="section-title">Procès-verbal et Déclaration</div>
        <p class="prose">
            L'an <?php echo e($submission->created_at->format('Y')); ?>, le <?php echo e($submission->created_at->format('d/m/Y')); ?>, les membres de <strong><?php echo e($submission->company_name); ?></strong> réunis en Assemblée Générale ont unanimement décidé d'ouvrir un compte à la COCEC et de donner mandat aux membres désignés comme signataires pour faire fonctionner ledit compte.
        </p>
         <p class="prose">
            Je soussigné(e), <strong><?php echo e($submission->director_name); ?> <?php echo e($submission->director_first_name ?? ''); ?></strong>, agissant en qualité de responsable, atteste sur l'honneur que les informations fournies sont exactes et sincères, et reconnais que toute fausse déclaration peut entraîner le rejet de cette demande ou la clôture du compte.
        </p>
        <div class="signature-area">
            <p><strong>Fait à Lomé, le <?php echo e($submission->created_at->format('d/m/Y')); ?></strong></p>
            <p><strong>LE PRÉSIDENT / DIRECTEUR</strong></p>
            <div class="signature-line">(Signature et Cachet)</div>
        </div>
    </div>

    <div class="footer">
        <p>COCEC - Coopérative Chrétienne d'Épargne et de Crédit</p>
    </div>
</body>
</html><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/admin/accounts/moral/pdf.blade.php ENDPATH**/ ?>