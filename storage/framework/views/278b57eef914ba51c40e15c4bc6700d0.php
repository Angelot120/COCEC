

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        .map-container {
            height: 300px;
            border-radius: 8px;
            overflow: hidden;
        }
        .document-preview {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .document-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            text-decoration: none;
            color: #495057;
            transition: all 0.3s ease;
        }
        .document-link:hover {
            background: #e9ecef;
            color: #212529;
            text-decoration: none;
        }
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .status-en_attente { background: #fff3cd; color: #856404; }
        .status-accepter { background: #d4edda; color: #155724; }
        .status-refuser { background: #f8d7da; color: #721c24; }

        /* Styles pour l'impression */
        @media print {
            /* Masquer TOUS les éléments de navigation et boutons */
            .dashboard-main header,
            .dashboard-main aside,
            .dashboard-main footer,
            .btn,
            .dropdown,
            .alert,
            .card-header,
            .no-print,
            .d-flex.flex-wrap.align-items-center.justify-content-between.gap-3.mb-24,
            .d-flex.align-items-center.gap-2,
            .breadcrumb,
            .navigation,
            .appbar,
            .sidebar {
                display: none !important;
            }
            
            /* Masquer le breadcrumb */
            .no-print {
                display: none !important;
            }
            
            /* Afficher le titre d'impression */
            .print-only {
                display: block !important;
            }
            
            /* Masquer le titre normal */
            h6.fw-semibold.mb-0 {
                display: none !important;
            }
            
            /* Masquer les icônes de mode clair/sombre */
            iconify-icon[icon*="sun"],
            iconify-icon[icon*="moon"],
            iconify-icon[icon*="solar"],
            .theme-toggle,
            .mode-toggle,
            button[data-theme-toggle],
            [data-theme-toggle] {
                display: none !important;
            }
            
            /* S'assurer que le titre s'affiche */
            .fw-semibold.mb-0 {
                display: block !important;
                font-size: 18px !important;
                font-weight: bold !important;
                margin-bottom: 20px !important;
            }
            
            /* Masquer les cartes d'actions */
            .card.mb-24.no-print,
            .card:first-child {
                display: none !important;
            }
            
            /* Ajuster la mise en page pour l'impression */
            .dashboard-main {
                margin: 0 !important;
                padding: 0 !important;
            }
            
            .dashboard-main-body {
                padding: 0 !important;
            }
            
            .card {
                border: none !important;
                box-shadow: none !important;
                margin-bottom: 20px !important;
            }
            
            .card-body {
                padding: 15px !important;
            }
            
            /* Masquer les cartes de mise à jour du statut */
            .col-lg-4 .card:last-child {
                display: none !important;
            }
            
            /* Ajuster la largeur des colonnes pour l'impression */
            .col-lg-8 {
                width: 100% !important;
            }
            
            .col-lg-4 {
                width: 100% !important;
            }
            
            /* Masquer les cartes de documents dans la sidebar */
            .col-lg-4 .card:first-child {
                display: none !important;
            }
            
            /* Masquer les cartes d'informations du compte dans la sidebar */
            .col-lg-4 .card:nth-child(2) {
                display: none !important;
            }
            
            /* Forcer le masquage de tous les éléments avec no-print */
            *[class*="no-print"] {
                display: none !important;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="dashboard-main">
        <?php echo $__env->make('includes.admin.appbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="dashboard-main-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <!-- Titre pour l'impression -->
            <h1 class="print-only" style="display: none; text-align: center; font-size: 24px; font-weight: bold; margin-bottom: 30px;">
                Détails de la demande morale #<?php echo e($submission->id); ?>

            </h1>
            
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24 no-print">
                <h6 class="fw-semibold mb-0">Détails de la demande morale #<?php echo e($submission->id); ?></h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">
                        <a href="<?php echo e(route('accounts.moral.index')); ?>" class="hover-text-primary">
                            Demandes morales
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Détails</li>
                </ul>
            </div>

            <!-- Actions -->
            <div class="card mb-24 no-print">
                <div class="card-body d-flex align-items-center gap-3">
                    <a href="<?php echo e(route('accounts.moral.index')); ?>" class="btn btn-danger d-flex align-items-center gap-2">
                        <iconify-icon icon="lucide:arrow-left" class="icon"></iconify-icon>
                        Retour à la liste
                    </a>
                    <a href="<?php echo e(route('accounts.moral.pdf', $submission->id)); ?>" class="btn btn-warning d-flex align-items-center gap-2">
                        <iconify-icon icon="lucide:file-text" class="icon"></iconify-icon>
                        Télécharger PDF
                    </a>
                    <button onclick="window.print()" class="btn btn-danger d-flex align-items-center gap-2">
                        <iconify-icon icon="lucide:printer" class="icon"></iconify-icon>
                        Imprimer
                    </button>
                </div>
            </div>

            <div class="row">
                <!-- Informations principales -->
                <div class="col-lg-8">
                    <!-- Informations de l'entreprise -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Informations de l'entreprise</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nom de l'entreprise</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->company_name); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Catégorie</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->category ?? '-'); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">RCCM</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->rccm); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Secteur d'activité</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->activity_sector); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nationalité</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->company_nationality); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Date de création</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->creation_date ? $submission->creation_date->format('d/m/Y') : '-'); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Lieu de création</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->creation_place); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Téléphone</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->company_phone); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Statut</label>
                                        <span class="status-badge status-<?php echo e($submission->statut); ?>">
                                            <?php if($submission->statut == 'en_attente'): ?> En attente
                                            <?php elseif($submission->statut == 'accepter'): ?> Accepté
                                            <?php elseif($submission->statut == 'refuser'): ?> Refusé
                                            <?php else: ?> <?php echo e($submission->statut); ?>

                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php if($submission->activity_description): ?>
                            <div class="mt-16">
                                <label class="text-sm text-secondary-light mb-4">Description de l'activité</label>
                                <p class="fw-medium mb-0"><?php echo e($submission->activity_description); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Informations du directeur -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Informations du directeur</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nom complet</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_name); ?> <?php echo e($submission->director_first_name ?? ''); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Poste</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_position); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Genre</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_gender == 'M' ? 'Masculin' : 'Féminin'); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Date de naissance</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_birth_date ? $submission->director_birth_date->format('d/m/Y') : '-'); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Lieu de naissance</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_birth_place); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nationalité</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_nationality); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Numéro de pièce</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_id_number); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Date d'émission</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_id_issue_date ? $submission->director_id_issue_date->format('d/m/Y') : '-'); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Téléphone</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_phone); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nom du père</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->director_father_name ?? '-'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Adresse de l'entreprise -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Adresse de l'entreprise</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Adresse</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->company_address); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Ville</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->company_city ?? '-'); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Quartier</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->company_neighborhood ?? '-'); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Boîte postale</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->company_postal_box ?? '-'); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php if($submission->company_lat && $submission->company_lng): ?>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Coordonnées</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->company_lat); ?>, <?php echo e($submission->company_lng); ?></p>
                                        <div id="company-map" class="map-container mt-8"></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($submission->company_plan_path): ?>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Plan de l'entreprise</label>
                                        <a href="<?php echo e(Storage::url($submission->company_plan_path)); ?>" target="_blank" class="document-link">
                                            <iconify-icon icon="lucide:download" class="icon"></iconify-icon>
                                            Télécharger le plan
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KYC Information -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">KYC (Know Your Customer)</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Personne politiquement exposée (nationale)</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->is_ppe_national ? 'Oui' : 'Non'); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Personne politiquement exposée (étrangère)</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->ppe_foreign ? 'Oui' : 'Non'); ?></p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Dépôt initial</label>
                                        <p class="fw-medium mb-0"><?php echo e(number_format($submission->initial_deposit, 2)); ?> FCFA</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php if($submission->sanctions): ?>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Sanctions</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->sanctions); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($submission->terrorism_financing): ?>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Financement du terrorisme</label>
                                        <p class="fw-medium mb-0"><?php echo e($submission->terrorism_financing); ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Co-directeurs -->
                    <?php if(!$submission->coDirectors->isEmpty()): ?>
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Co-directeurs</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Poste</th>
                                            <th>Téléphone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $submission->coDirectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coDirector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($coDirector->name); ?></td>
                                                <td><?php echo e($coDirector->position); ?></td>
                                                <td><?php echo e($coDirector->phone); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Signataires du compte -->
                    <?php if(!$submission->accountSignatories->isEmpty()): ?>
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Signataires du compte</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Type de signature</th>
                                            <th>Numéro de pièce</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $submission->accountSignatories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signatory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($signatory->name); ?></td>
                                                <td><?php echo e($signatory->signature_type); ?></td>
                                                <td><?php echo e($signatory->id_number ?? '-'); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Bénéficiaires -->
                    <?php if(!$submission->beneficiaries->isEmpty()): ?>
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Bénéficiaires</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Contact</th>
                                            <th>Lien</th>
                                            <th>Date de naissance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $submission->beneficiaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beneficiary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($beneficiary->nom); ?></td>
                                                <td><?php echo e($beneficiary->contact); ?></td>
                                                <td><?php echo e($beneficiary->lien); ?></td>
                                                <td><?php echo e($beneficiary->birth_date ? $beneficiary->birth_date->format('d/m/Y') : '-'); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Documents -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Documents</h6>
                        </div>
                        <div class="card-body p-24">
                            <?php if($submission->responsible_persons_photo_path): ?>
                            <div class="mb-24">
                                <label class="text-sm text-secondary-light mb-8">Photo des responsables</label>
                                <div class="text-center">
                                    <img src="<?php echo e(Storage::url($submission->responsible_persons_photo_path)); ?>" alt="Photo des responsables" class="document-preview">
                                </div>
                                <div class="text-center mt-8">
                                    <a href="<?php echo e(Storage::url($submission->responsible_persons_photo_path)); ?>" target="_blank" class="document-link">
                                        <iconify-icon icon="lucide:external-link" class="icon"></iconify-icon>
                                        Voir en plein écran
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if($submission->company_document_path): ?>
                            <div class="mb-24">
                                <label class="text-sm text-secondary-light mb-8">Document de l'entreprise</label>
                                <div class="text-center">
                                    <a href="<?php echo e(Storage::url($submission->company_document_path)); ?>" target="_blank" class="document-link">
                                        <iconify-icon icon="lucide:download" class="icon"></iconify-icon>
                                        Télécharger le document
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if($submission->signature_method === 'draw' && $submission->signature_base64): ?>
                            <div class="mb-24">
                                <label class="text-sm text-secondary-light mb-8">Signature</label>
                                <div class="text-center">
                                    <img src="data:image/png;base64,<?php echo e($submission->signature_base64); ?>" alt="Signature" class="document-preview">
                                </div>
                            </div>
                            <?php elseif($submission->signature_method === 'upload' && $submission->signature_upload_path): ?>
                            <div class="mb-24">
                                <label class="text-sm text-secondary-light mb-8">Signature</label>
                                <div class="text-center">
                                    <a href="<?php echo e(Storage::url($submission->signature_upload_path)); ?>" target="_blank" class="document-link">
                                        <iconify-icon icon="lucide:download" class="icon"></iconify-icon>
                                        Télécharger la signature
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Informations du compte -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Informations du compte</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="mb-16">
                                <label class="text-sm text-secondary-light mb-4">Numéro de compte</label>
                                <p class="fw-medium mb-0"><?php echo e($submission->account_number ?? 'Non attribué'); ?></p>
                            </div>
                            <div class="mb-16">
                                <label class="text-sm text-secondary-light mb-4">Date d'adhésion</label>
                                <p class="fw-medium mb-0"><?php echo e($submission->membership_date ? $submission->membership_date->format('d/m/Y') : 'Non définie'); ?></p>
                            </div>
                            <div class="mb-16">
                                <label class="text-sm text-secondary-light mb-4">Date d'ouverture</label>
                                <p class="fw-medium mb-0"><?php echo e($submission->account_opening_date ? $submission->account_opening_date->format('d/m/Y') : 'Non définie'); ?></p>
                            </div>
                            <?php if($submission->remarks): ?>
                            <div class="mb-16">
                                <label class="text-sm text-secondary-light mb-4">Remarques</label>
                                <p class="fw-medium mb-0"><?php echo e($submission->remarks); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Mise à jour du statut -->
                    <div class="card">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Mettre à jour le statut</h6>
                        </div>
                        <div class="card-body p-24">
                            <form action="<?php echo e(route('accounts.moral.update', $submission->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="mb-16">
                                    <label for="statut" class="form-label">Statut</label>
                                    <select name="statut" id="statut" class="form-select">
                                        <option value="en_attente" <?php echo e($submission->statut == 'en_attente' ? 'selected' : ''); ?>>En attente</option>
                                        <option value="accepter" <?php echo e($submission->statut == 'accepter' ? 'selected' : ''); ?>>Accepté</option>
                                        <option value="refuser" <?php echo e($submission->statut == 'refuser' ? 'selected' : ''); ?>>Refusé</option>
                                    </select>
                                </div>
                                <div class="mb-16">
                                    <label for="account_number" class="form-label">Numéro de compte</label>
                                    <input type="text" name="account_number" id="account_number" class="form-control" value="<?php echo e($submission->account_number); ?>">
                                </div>
                                <div class="mb-16">
                                    <label for="membership_date" class="form-label">Date d'adhésion</label>
                                    <input type="date" name="membership_date" id="membership_date" class="form-control" value="<?php echo e($submission->membership_date ? $submission->membership_date->format('Y-m-d') : ''); ?>">
                                </div>
                                <div class="mb-16">
                                    <label for="account_opening_date" class="form-label">Date d'ouverture de compte</label>
                                    <input type="date" name="account_opening_date" id="account_opening_date" class="form-control" value="<?php echo e($submission->account_opening_date ? $submission->account_opening_date->format('Y-m-d') : ''); ?>">
                                </div>
                                <div class="mb-16">
                                    <label for="remarks" class="form-label">Remarques</label>
                                    <textarea name="remarks" id="remarks" class="form-control" rows="4"><?php echo e($submission->remarks); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger w-100">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('includes.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialisation de la carte de l'entreprise
        <?php if($submission->company_lat && $submission->company_lng): ?>
        const companyMap = L.map('company-map').setView([<?php echo e($submission->company_lat); ?>, <?php echo e($submission->company_lng); ?>], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(companyMap);
        L.marker([<?php echo e($submission->company_lat); ?>, <?php echo e($submission->company_lng); ?>]).addTo(companyMap)
            .bindPopup('<?php echo e($submission->company_name); ?>')
            .openPopup();
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/admin/accounts/moral/show.blade.php ENDPATH**/ ?>