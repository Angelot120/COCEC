<?php $__env->startSection('title', 'Formulaires de Mise à Jour - Finance Digitale'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="dashboard-main">
    <?php echo $__env->make('includes.admin.appbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Formulaires de Mise à Jour - Finance Digitale</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="mdi:cellphone-banking" class="icon text-lg"></iconify-icon>
                        Finance Digitale
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Formulaires de Mise à Jour</li>
            </ul>
        </div>

        <!-- Statistiques -->
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-24">
            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">Total</p>
                                <h6 class="mb-0"><?php echo e($totalUpdates); ?></h6>
                            </div>
                            <div class="w-50-px h-50-px bg-primary rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:files" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">En Attente</p>
                                <h6 class="mb-0"><?php echo e($pendingUpdates); ?></h6>
                            </div>
                            <div class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:clock" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">Approuvés</p>
                                <h6 class="mb-0"><?php echo e($approvedUpdates); ?></h6>
                            </div>
                            <div class="w-50-px h-50-px bg-success rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:check-circle" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">Rejetés</p>
                                <h6 class="mb-0"><?php echo e($rejectedUpdates); ?></h6>
                            </div>
                            <div class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:x-circle" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres et Recherche -->
        <div class="card mb-24">
            <div class="card-header bg-base py-16 px-24">
                <h6 class="fw-semibold mb-0">Filtres et Recherche</h6>
            </div>
            <div class="card-body p-24">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="search" class="form-label">Recherche par nom</label>
                        <input type="text" class="form-control" id="search" name="search" 
                               value="<?php echo e(request('search')); ?>" placeholder="Saisissez le nom du client..."
                               oninput="filterTable()">
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Statut</label>
                        <select class="form-select" id="status" name="status" onchange="filterTable()">
                            <option value="">Tous les statuts</option>
                            <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>En attente</option>
                            <option value="approved" <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?>>Approuvé</option>
                            <option value="rejected" <?php echo e(request('status') == 'rejected' ? 'selected' : ''); ?>>Rejeté</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des formulaires -->
        <div class="card">
            <div class="card-header bg-base py-16 px-24">
                <h6 class="fw-semibold mb-0">Liste des Formulaires de Mise à Jour</h6>
            </div>
            <div class="card-body p-24">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Compte</th>
                                <th>Contacts</th>
                                <th>Services</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $updates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <span class="fw-semibold">#<?php echo e($update->id); ?></span>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="fw-semibold"><?php echo e($update->full_name); ?></div>
                                            <small class="text-muted"><?php echo e($update->cni_type); ?>: <?php echo e($update->cni_number); ?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info"><?php echo e($update->account_number); ?></span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">
                                            <?php if($update->email): ?>
                                                <small class="text-muted"><?php echo e($update->email); ?></small>
                                            <?php endif; ?>
                                            <?php if($update->togocel): ?>
                                                <small class="text-muted">Togocel: <?php echo e($update->togocel); ?></small>
                                            <?php endif; ?>
                                            <?php if($update->moov): ?>
                                                <small class="text-muted">Moov: <?php echo e($update->moov); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <?php if($update->mobile_banking_togocel || $update->mobile_banking_moov): ?>
                                                <span class="badge bg-success">Mobile Banking</span>
                                            <?php endif; ?>
                                            <?php if($update->mobile_money_togocel || $update->mobile_money_moov): ?>
                                                <span class="badge bg-primary">Mobile Money</span>
                                            <?php endif; ?>
                                            <?php if($update->web_banking_togocel || $update->web_banking_moov): ?>
                                                <span class="badge bg-info">Web Banking</span>
                                            <?php endif; ?>
                                            <?php if($update->sms_banking_togocel || $update->sms_banking_moov): ?>
                                                <span class="badge bg-warning">SMS Banking</span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?php echo e($update->status_color); ?>">
                                            <?php echo e($update->status_label); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <small class="fw-semibold"><?php echo e($update->created_at->format('d/m/Y')); ?></small>
                                            <small class="text-muted"><?php echo e($update->created_at->format('H:i')); ?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-10 justify-content-center">
                                            <!-- Bouton VOIR -->
                                            <a href="<?php echo e(route('admin.digitalfinance.updates.show', $update)); ?>" 
                                               class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                               title="Voir">
                                                <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                            </a>

                                            <!-- Bouton PDF -->
                                            <a href="<?php echo e(route('admin.digitalfinance.updates.pdf', $update)); ?>" 
                                               class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                               title="Télécharger PDF">
                                                <iconify-icon icon="lucide:file-text" class="menu-icon"></iconify-icon>
                                            </a>

                                            <!-- Bouton SUPPRIMER -->
                                            <form action="<?php echo e(route('admin.digitalfinance.updates.destroy', $update)); ?>" method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" 
                                                        class="bg-danger-focus text-danger-600 bg-hover-danger-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                        title="Supprimer"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce formulaire ?')">
                                                    <iconify-icon icon="lucide:trash-2" class="menu-icon"></iconify-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <iconify-icon icon="ph:file-text" class="text-4xl mb-2"></iconify-icon>
                                            <p class="mb-0">Aucun formulaire de mise à jour trouvé</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if($updates->hasPages()): ?>
                    <div class="d-flex justify-content-center mt-4">
                        <?php echo e($updates->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('includes.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
function filterTable() {
    const searchTerm = document.getElementById('search').value.toLowerCase();
    const statusFilter = document.getElementById('status').value;
    const table = document.querySelector('table tbody');
    const rows = table.querySelectorAll('tr');

    rows.forEach(row => {
        const nameCell = row.querySelector('td:nth-child(2)');
        const statusCell = row.querySelector('td:nth-child(6)');
        
        if (nameCell && statusCell) {
            const name = nameCell.textContent.toLowerCase();
            const status = statusCell.textContent.trim();
            
            let showRow = true;
            
            // Filtre par nom
            if (searchTerm && !name.includes(searchTerm)) {
                showRow = false;
            }
            
            // Filtre par statut
            if (statusFilter && status !== getStatusLabel(statusFilter)) {
                showRow = false;
            }
            
            row.style.display = showRow ? '' : 'none';
        }
    });
}

function getStatusLabel(status) {
    const statusMap = {
        'pending': 'En attente',
        'approved': 'Approuvé',
        'rejected': 'Rejeté'
    };
    return statusMap[status] || status;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/admin/digitalfinance/updates/index.blade.php ENDPATH**/ ?>