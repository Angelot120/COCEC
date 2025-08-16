

<?php $__env->startSection('title', 'Détails du Formulaire - Finance Digitale'); ?>

<?php $__env->startSection('css'); ?>
<style>
    .show-container {
        padding: 30px;
        max-width: 1000px;
        margin: 0 auto;
    }

    .page-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #e2e8f0;
    }

    .page-title {
        color: #2d3748;
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }

    .page-subtitle {
        color: #718096;
        margin: 10px 0 0 0;
        font-size: 1.1rem;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #EC281C;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
        margin-bottom: 20px;
    }

    .back-btn:hover {
        background: #dc2626;
        color: white;
        text-decoration: none;
    }

    .form-details {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }

    .form-header {
        background: linear-gradient(135deg, #EC281C 0%, #c53030 100%);
        color: white;
        padding: 25px;
        text-align: center;
    }

    .form-header h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .form-header .status-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        padding: 8px 16px;
        border-radius: 20px;
        margin-top: 15px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-body {
        padding: 30px;
    }

    .form-section {
        margin-bottom: 35px;
        padding: 25px;
        background: #f8fafc;
        border-radius: 12px;
        border-left: 4px solid #EC281C;
    }

    .section-title {
        color: #2d3748;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e2e8f0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #4a5568;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .form-value {
        padding: 12px 16px;
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        color: #2d3748;
        font-size: 1rem;
        min-height: 45px;
        display: flex;
        align-items: center;
    }

    .form-value.empty {
        color: #a0aec0;
        font-style: italic;
    }

    .services-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 20px;
    }

    .service-category {
        background: white;
        padding: 20px;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
    }

    .service-category h4 {
        color: #2d3748;
        margin-bottom: 15px;
        font-size: 1.1rem;
        font-weight: 600;
        text-align: center;
        padding-bottom: 8px;
        border-bottom: 1px solid #e2e8f0;
    }

    .service-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
        padding: 8px 12px;
        border-radius: 6px;
        background: #f7fafc;
    }

    .service-item.active {
        background: #f0fff4;
        border: 1px solid #68d391;
    }

    .service-item.inactive {
        background: #fed7d7;
        border: 1px solid #fc8181;
    }

    .service-icon {
        font-size: 1.1rem;
    }

    .service-icon.active {
        color: #38a169;
    }

    .service-icon.inactive {
        color: #e53e3e;
    }

    .service-name {
        font-weight: 500;
        color: #2d3748;
    }

    .service-status {
        margin-left: auto;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .service-status.active {
        color: #38a169;
    }

    .service-status.inactive {
        color: #e53e3e;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 30px;
        padding-top: 30px;
        border-top: 2px solid #e2e8f0;
    }

    .action-btn {
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-edit {
        background: #f6ad55;
        color: white;
    }

    .btn-edit:hover {
        background: #ed8936;
        color: white;
        text-decoration: none;
    }

    .btn-approve {
        background: #68d391;
        color: white;
    }

    .btn-approve:hover {
        background: #48bb78;
        color: white;
    }

    .btn-reject {
        background: #fc8181;
        color: white;
    }

    .btn-reject:hover {
        background: #f56565;
        color: white;
    }

    .btn-delete {
        background: #e53e3e;
        color: white;
    }

    .btn-delete:hover {
        background: #c53030;
        color: white;
    }

    .metadata {
        background: #f7fafc;
        padding: 20px;
        border-radius: 10px;
        margin-top: 30px;
        border: 1px solid #e2e8f0;
    }

    .metadata h4 {
        color: #2d3748;
        margin-bottom: 15px;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .metadata-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .metadata-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .metadata-item:last-child {
        border-bottom: none;
    }

    .metadata-label {
        font-weight: 600;
        color: #4a5568;
    }

    .metadata-value {
        color: #2d3748;
    }

    @media (max-width: 768px) {
        .show-container {
            padding: 15px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .services-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .action-btn {
            justify-content: center;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="dashboard-main">
    <?php echo $__env->make('includes.admin.appbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- En-tête de page -->
    <div class="page-header">
        <h1 class="page-title">📋 Détails du Formulaire</h1>
        <p class="page-subtitle">Finance Digitale - Consultation des informations de mise à jour</p>
    </div>

    <!-- Bouton retour -->
    <a href="<?php echo e(route('admin.digitalfinance.updates.index')); ?>" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Retour à la liste
    </a>

    <!-- Détails du formulaire -->
    <div class="form-details">
        <div class="form-header">
            <h2>FICHE DE MISE À JOUR ET DE SOUSCRIPTION À LA FINANCE DIGITALE</h2>
            <div class="status-badge">
                Statut: <?php echo e($update->status_label); ?>

            </div>
        </div>

        <div class="form-body">
            <!-- INFORMATIONS CLIENT -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-user"></i>
                    INFORMATIONS CLIENT
                </h3>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">N° COMPTE</label>
                        <div class="form-value <?php echo e($update->account_number ? '' : 'empty'); ?>">
                            <?php echo e($update->account_number ?: 'Non renseigné'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Type de document</label>
                        <div class="form-value <?php echo e($update->cni_type ? '' : 'empty'); ?>">
                            <?php echo e($update->cni_type ?: 'Non renseigné'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">N° CNI ou AUTRE</label>
                        <div class="form-value <?php echo e($update->cni_number ? '' : 'empty'); ?>">
                            <?php echo e($update->cni_number ?: 'Non renseigné'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">NOM et PRÉNOM</label>
                        <div class="form-value">
                            <?php echo e($update->full_name); ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- CONTACTS DU CLIENT -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-phone"></i>
                    CONTACTS DU CLIENT
                </h3>

                <div class="form-grid">
                    <div class="form-group full-width">
                        <label class="form-label">Email</label>
                        <div class="form-value <?php echo e($update->email ? '' : 'empty'); ?>">
                            <?php echo e($update->email ?: 'Non renseigné'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Togocel</label>
                        <div class="form-value <?php echo e($update->togocel ? '' : 'empty'); ?>">
                            <?php echo e($update->togocel ?: 'Non renseigné'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tmoney</label>
                        <div class="form-value <?php echo e($update->tmoney ? '' : 'empty'); ?>">
                            <?php echo e($update->tmoney ?: 'Non renseigné'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">WhatsApp (Togocel)</label>
                        <div class="form-value <?php echo e($update->whatsapp_togocel ? '' : 'empty'); ?>">
                            <?php echo e($update->whatsapp_togocel ?: 'Non renseigné'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Moov</label>
                        <div class="form-value <?php echo e($update->moov ? '' : 'empty'); ?>">
                            <?php echo e($update->moov ?: 'Non renseigné'); ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Flooz</label>
                        <div class="form-value <?php echo e($update->flooz ? '' : 'empty'); ?>>
                            <?php echo e($update->flooz ?: 'Non renseigné'); ?>

                        </div>
                    </div>
                    
                    <div class=" form-group">
                            <label class="form-label">WhatsApp (Moov)</label>
                            <div class="form-value <?php echo e($update->whatsapp_moov ? '' : 'empty'); ?>">
                                <?php echo e($update->whatsapp_moov ?: 'Non renseigné'); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- SOUSCRIPTION AUX SERVICES -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-cogs"></i>
                        SOUSCRIPTION AUX SERVICES
                    </h3>

                    <div class="services-grid">
                        <div class="service-category">
                            <h4>📱 MOBILE BANKING</h4>
                            <div class="service-item <?php echo e($update->mobile_banking_togocel ? 'active' : 'inactive'); ?>">
                                <i class="fas fa-check-circle service-icon <?php echo e($update->mobile_banking_togocel ? 'active' : 'inactive'); ?>"></i>
                                <span class="service-name">TOGOCEL</span>
                                <span class="service-status <?php echo e($update->mobile_banking_togocel ? 'active' : 'inactive'); ?>">
                                    <?php echo e($update->mobile_banking_togocel ? 'Activé' : 'Non activé'); ?>

                                </span>
                            </div>
                            <div class="service-item <?php echo e($update->mobile_banking_moov ? 'active' : 'inactive'); ?>">
                                <i class="fas fa-check-circle service-icon <?php echo e($update->mobile_banking_moov ? 'active' : 'inactive'); ?>"></i>
                                <span class="service-name">MOOV</span>
                                <span class="service-status <?php echo e($update->mobile_banking_moov ? 'active' : 'inactive'); ?>">
                                    <?php echo e($update->mobile_banking_moov ? 'Activé' : 'Non activé'); ?>

                                </span>
                            </div>
                        </div>

                        <div class="service-category">
                            <h4>💰 MOBILE MONEY</h4>
                            <div class="service-item <?php echo e($update->mobile_money_togocel ? 'active' : 'inactive'); ?>">
                                <i class="fas fa-check-circle service-icon <?php echo e($update->mobile_money_togocel ? 'active' : 'inactive'); ?>"></i>
                                <span class="service-name">TOGOCEL</span>
                                <span class="service-status <?php echo e($update->mobile_money_togocel ? 'active' : 'inactive'); ?>">
                                    <?php echo e($update->mobile_money_togocel ? 'Activé' : 'Non activé'); ?>

                                </span>
                            </div>
                            <div class="service-item <?php echo e($update->mobile_money_moov ? 'active' : 'inactive'); ?>">
                                <i class="fas fa-check-circle service-icon <?php echo e($update->mobile_money_moov ? 'active' : 'inactive'); ?>"></i>
                                <span class="service-name">MOOV</span>
                                <span class="service-status <?php echo e($update->mobile_money_moov ? 'active' : 'inactive'); ?>">
                                    <?php echo e($update->mobile_money_moov ? 'Activé' : 'Non activé'); ?>

                                </span>
                            </div>
                        </div>

                        <div class="service-category">
                            <h4>🌐 WEB BANKING</h4>
                            <div class="service-item <?php echo e($update->web_banking_togocel ? 'active' : 'inactive'); ?>">
                                <i class="fas fa-check-circle service-icon <?php echo e($update->web_banking_togocel ? 'active' : 'inactive'); ?>"></i>
                                <span class="service-name">TOGOCEL</span>
                                <span class="service-status <?php echo e($update->web_banking_togocel ? 'active' : 'inactive'); ?>">
                                    <?php echo e($update->web_banking_togocel ? 'Activé' : 'Non activé'); ?>

                                </span>
                            </div>
                            <div class="service-item <?php echo e($update->web_banking_moov ? 'active' : 'inactive'); ?>">
                                <i class="fas fa-check-circle service-icon <?php echo e($update->web_banking_moov ? 'active' : 'inactive'); ?>"></i>
                                <span class="service-name">MOOV</span>
                                <span class="service-status <?php echo e($update->web_banking_moov ? 'active' : 'inactive'); ?>">
                                    <?php echo e($update->web_banking_moov ? 'Activé' : 'Non activé'); ?>

                                </span>
                            </div>
                        </div>

                        <div class="service-category">
                            <h4>📨 SMS BANKING (BONUS)</h4>
                            <div class="service-item <?php echo e($update->sms_banking_togocel ? 'active' : 'inactive'); ?>">
                                <i class="fas fa-check-circle service-icon <?php echo e($update->sms_banking_togocel ? 'active' : 'inactive'); ?>"></i>
                                <span class="service-name">TOGOCEL</span>
                                <span class="service-status <?php echo e($update->sms_banking_togocel ? 'active' : 'inactive'); ?>">
                                    <?php echo e($update->sms_banking_togocel ? 'Activé' : 'Non activé'); ?>

                                </span>
                            </div>
                            <div class="service-item <?php echo e($update->sms_banking_moov ? 'active' : 'inactive'); ?>">
                                <i class="fas fa-check-circle service-icon <?php echo e($update->sms_banking_moov ? 'active' : 'inactive'); ?>"></i>
                                <span class="service-name">MOOV</span>
                                <span class="service-status <?php echo e($update->sms_banking_moov ? 'active' : 'inactive'); ?>">
                                    <?php echo e($update->sms_banking_moov ? 'Activé' : 'Non activé'); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NOTES -->
                <?php if($update->notes): ?>
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-sticky-note"></i>
                        NOTES ADDITIONNELLES
                    </h3>
                    <div class="form-group full-width">
                        <div class="form-value" style="min-height: auto; white-space: pre-wrap;">
                            <?php echo e($update->notes); ?>

                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- MÉTADONNÉES -->
                <div class="metadata">
                    <h4>📊 Informations du formulaire</h4>
                    <div class="metadata-grid">
                        <div class="metadata-item">
                            <span class="metadata-label">ID du formulaire:</span>
                            <span class="metadata-value">#<?php echo e($update->id); ?></span>
                        </div>
                        <div class="metadata-item">
                            <span class="metadata-label">Date de création:</span>
                            <span class="metadata-value"><?php echo e($update->created_at->format('d/m/Y à H:i')); ?></span>
                        </div>
                        <div class="metadata-item">
                            <span class="metadata-label">Dernière modification:</span>
                            <span class="metadata-value"><?php echo e($update->updated_at->format('d/m/Y à H:i')); ?></span>
                        </div>
                        <div class="metadata-item">
                            <span class="metadata-label">Statut actuel:</span>
                            <span class="metadata-value"><?php echo e($update->status_label); ?></span>
                        </div>
                    </div>
                </div>

                <!-- ACTIONS -->
                <div class="form-actions">
                    <a href="<?php echo e(route('admin.digitalfinance.updates.edit', $update->id)); ?>" class="action-btn btn-edit">
                        <i class="fas fa-edit"></i>
                        Modifier
                    </a>

                    <?php if($update->status == 'pending'): ?>
                    <form method="POST" action="<?php echo e(route('admin.digitalfinance.updates.approve', $update->id)); ?>" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <button type="submit" class="action-btn btn-approve">
                            <i class="fas fa-check"></i>
                            Approuver
                        </button>
                    </form>

                    <form method="POST" action="<?php echo e(route('admin.digitalfinance.updates.reject', $update->id)); ?>" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <button type="submit" class="action-btn btn-reject">
                            <i class="fas fa-times"></i>
                            Rejeter
                        </button>
                    </form>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('admin.digitalfinance.updates.destroy', $update->id)); ?>"
                        style="display: inline;"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce formulaire ?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="action-btn btn-delete">
                            <i class="fas fa-trash"></i>
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/admin/digitalfinance/updates/show.blade.php ENDPATH**/ ?>