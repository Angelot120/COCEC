<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Soumission #<?php echo e($submission->id); ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; margin-bottom: 30px; }
        .section { margin-bottom: 20px; }
        .section h3 { border-bottom: 1px solid #ccc; padding-bottom: 5px; }
        .info-row { margin-bottom: 10px; }
        .label { font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <h1>COCEC - Soumission de compte physique</h1>
        <h2>Soumission #<?php echo e($submission->id); ?></h2>
        <p>Date de soumission : <?php echo e($submission->created_at ? $submission->created_at->format('d/m/Y H:i') : '-'); ?></p>
    </div>

    <div class="section">
        <h3>Informations personnelles</h3>
        <div class="info-row">
            <span class="label">Nom :</span> <?php echo e($submission->last_name); ?>

        </div>
        <div class="info-row">
            <span class="label">Prénoms :</span> <?php echo e($submission->first_names); ?>

        </div>
        <div class="info-row">
            <span class="label">Genre :</span> <?php echo e($submission->gender == 'M' ? 'Masculin' : 'Féminin'); ?>

        </div>
        <div class="info-row">
            <span class="label">Date de naissance :</span> <?php echo e($submission->birth_date ? $submission->birth_date->format('d/m/Y') : '-'); ?>

        </div>
        <div class="info-row">
            <span class="label">Lieu de naissance :</span> <?php echo e($submission->birth_place); ?>

        </div>
        <div class="info-row">
            <span class="label">Nationalité :</span> <?php echo e($submission->nationality); ?>

        </div>
        <div class="info-row">
            <span class="label">Nom du père :</span> <?php echo e($submission->father_name); ?>

        </div>
        <div class="info-row">
            <span class="label">Nom de la mère :</span> <?php echo e($submission->mother_name); ?>

        </div>
        <div class="info-row">
            <span class="label">Téléphone :</span> <?php echo e($submission->phone ?? '-'); ?>

        </div>
    </div>

    <div class="section">
        <h3>Informations supplémentaires</h3>
        <div class="info-row">
            <span class="label">Statut marital :</span> <?php echo e($submission->marital_status); ?>

        </div>
        <div class="info-row">
            <span class="label">Nom du conjoint :</span> <?php echo e($submission->spouse_name ?? '-'); ?>

        </div>
        <div class="info-row">
            <span class="label">Profession :</span> <?php echo e($submission->occupation); ?>

        </div>
        <div class="info-row">
            <span class="label">Nom de l'entreprise :</span> <?php echo e($submission->company_name_activity ?? '-'); ?>

        </div>
    </div>

    <div class="section">
        <h3>Informations de compte</h3>
        <div class="info-row">
            <span class="label">Statut :</span> <?php echo e(ucfirst($submission->statut ?? 'en_attente')); ?>

        </div>
        <div class="info-row">
            <span class="label">Numéro de compte :</span> <?php echo e($submission->account_number ?? '-'); ?>

        </div>
        <div class="info-row">
            <span class="label">Date d'adhésion :</span> <?php echo e($submission->membership_date ? \Carbon\Carbon::parse($submission->membership_date)->format('d/m/Y') : '-'); ?>

        </div>
        <div class="info-row">
            <span class="label">Date d'ouverture :</span> <?php echo e($submission->account_opening_date ? \Carbon\Carbon::parse($submission->account_opening_date)->format('d/m/Y') : '-'); ?>

        </div>
        <div class="info-row">
            <span class="label">Dépôt initial :</span> <?php echo e($submission->initial_deposit ?? '-'); ?>

        </div>
    </div>

    <?php if($submission->remarks): ?>
    <div class="section">
        <h3>Remarques</h3>
        <p><?php echo e($submission->remarks); ?></p>
    </div>
    <?php endif; ?>

    <div class="section">
        <p><em>Document généré le <?php echo e(now()->format('d/m/Y H:i:s')); ?></em></p>
    </div>
</body>
</html> <?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/admin/accounts/physical/pdf.blade.php ENDPATH**/ ?>