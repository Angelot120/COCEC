

<?php $__env->startSection('title', 'Gestion des Comptes - Vue d\'ensemble'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="dashboard-main">
    <?php echo $__env->make('includes.admin.appbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Gestion des Comptes - Vue d'ensemble</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Gestion des Comptes</li>
            </ul>
        </div>

        <!-- Statistiques -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gy-4 mb-24">
            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">Total Comptes Physiques</p>
                                <h6 class="mb-0"><?php echo e(number_format($totalPhysical)); ?></h6>
                            </div>
                            <div class="w-50-px h-50-px bg-danger1 rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:user-fill" class="text-white text-2xl"></iconify-icon>
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
                                <p class="fw-medium text-muted mb-1">Total Comptes Moraux</p>
                                <h6 class="mb-0"><?php echo e(number_format($totalMoral)); ?></h6>
                            </div>
                            <div class="w-50-px h-50-px bg-success rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:buildings-fill" class="text-white text-2xl"></iconify-icon>
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
                                <p class="fw-medium text-muted mb-1">En Attente Physiques</p>
                                <h6 class="mb-0"><?php echo e(number_format($pendingPhysical)); ?></h6>
                            </div>
                            <div class="w-50-px h-50-px bg-warning1 rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:clock-fill" class="text-white text-2xl"></iconify-icon>
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
                                <p class="fw-medium text-muted mb-1">En Attente Moraux</p>
                                <h6 class="mb-0"><?php echo e(number_format($pendingMoral)); ?></h6>
                            </div>
                            <div class="w-50-px h-50-px bg-danger1 rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:clock-fill" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comptes Physiques Récents -->
        <div class="row mb-24">
            <div class="col-12">
                <div class="card shadow-none border">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Comptes Physiques Récents</h5>
                        <a href="<?php echo e(route('accounts.physical.index')); ?>" class="btn btn-danger btn-sm">
                            Voir tous
                        </a>
                    </div>
                    <div class="card-body">
                        <?php if($physicalSubmissions->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Statut</th>
                                            <th>Date de création</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $physicalSubmissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($submission->id); ?></td>
                                                <td><?php echo e($submission->last_name); ?> <?php echo e($submission->first_names); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo e($submission->statut === 'en_attente' ? 'warning' : ($submission->statut === 'accepter' ? 'success' : 'danger1')); ?>">
                                                        <?php echo e($submission->statut === 'en_attente' ? 'En attente' : ($submission->statut === 'accepter' ? 'Accepté' : 'Refusé')); ?>

                                                    </span>
                                                </td>
                                                <td><?php echo e($submission->created_at->format('d/m/Y H:i')); ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                                        <!-- Bouton VOIR -->
                                                        <a href="<?php echo e(route('accounts.physical.show', $submission->id)); ?>" 
                                                           class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                           title="Voir">
                                                            <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-muted text-center py-4">Aucun compte physique trouvé</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comptes Moraux Récents -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-none border">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Comptes Moraux Récents</h5>
                        <a href="<?php echo e(route('accounts.moral.index')); ?>" class="btn btn-danger btn-sm">
                            Voir tous
                        </a>
                    </div>
                    <div class="card-body">
                        <?php if($moralSubmissions->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom de l'entreprise</th>
                                            <th>Statut</th>
                                            <th>Date de création</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $moralSubmissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($submission->id); ?></td>
                                                <td><?php echo e($submission->company_name); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo e($submission->statut === 'en_attente' ? 'warning1' : ($submission->statut === 'accepter' ? 'success' : 'danger')); ?>">
                                                        <?php echo e($submission->statut === 'en_attente' ? 'En attente' : ($submission->statut === 'accepter' ? 'Accepté' : 'Refusé')); ?>

                                                    </span>
                                                </td>
                                                <td><?php echo e($submission->created_at->format('d/m/Y H:i')); ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                                        <!-- Bouton VOIR -->
                                                        <a href="<?php echo e(route('accounts.moral.show', $submission->id)); ?>" 
                                                           class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                           title="Voir">
                                                            <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-muted text-center py-4">Aucun compte moral trouvé</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/admin/accounts/index.blade.php ENDPATH**/ ?>