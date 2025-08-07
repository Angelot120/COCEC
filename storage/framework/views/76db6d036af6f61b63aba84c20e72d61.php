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

            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">Soumissions des comptes physiques</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Comptes physiques</li>
                </ul>
            </div>

            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <form action="<?php echo e(route('accounts.physical.index')); ?>" method="GET" class="d-flex align-items-center flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <span class="text-md fw-medium text-secondary-light mb-0">Afficher</span>
                            <select name="per_page" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                                <option value="5" <?php echo e(request('per_page') == 5 ? 'selected' : ''); ?>>5</option>
                                <option value="10" <?php echo e(request('per_page', 10) == 10 ? 'selected' : ''); ?>>10</option>
                                <option value="20" <?php echo e(request('per_page') == 20 ? 'selected' : ''); ?>>20</option>
                                <option value="50" <?php echo e(request('per_page') == 50 ? 'selected' : ''); ?>>50</option>
                            </select>
                        </div>
                        <div class="navbar-search">
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Rechercher par nom ou numéro de compte..." value="<?php echo e(request('search')); ?>">
                            <button type="submit" style="border:none; background:transparent; cursor:pointer;">
                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            </button>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <select name="status" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                                <option value="">Tous les statuts</option>
                                <option value="en_attente" <?php echo e(request('status') == 'en_attente' ? 'selected' : ''); ?>>En attente</option>
                                <option value="accepter" <?php echo e(request('status') == 'accepter' ? 'selected' : ''); ?>>Accepté</option>
                                <option value="refuser" <?php echo e(request('status') == 'refuser' ? 'selected' : ''); ?>>Refusé</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="card-body p-24">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th>Date de soumission</th>
                                    <th>Nom complet</th>
                                    <th>Téléphone</th>
                                    <th>N° de compte</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($submission->created_at->format('d M Y')); ?></td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-medium"><?php echo e($submission->last_name); ?></span>
                                                <span class="text-sm text-secondary-light"><?php echo e($submission->first_names); ?></span>
                                            </div>
                                        </td>
                                        <td><?php echo e($submission->phone ?? '-'); ?></td>
                                        <td>
                                            <?php if($submission->account_number): ?>
                                                <span class="fw-medium text-primary"><?php echo e($submission->account_number); ?></span>
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($submission->statut === 'accepter'): ?>
                                                <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Accepté</span>
                                            <?php elseif($submission->statut === 'refuser'): ?>
                                                <span class="bg-danger-focus text-danger-600 border border-danger-main px-24 py-4 radius-4 fw-medium text-sm">Refusé</span>
                                            <?php else: ?>
                                                <span class="bg-warning-focus text-warning-600 border border-warning-main px-24 py-4 radius-4 fw-medium text-sm">En attente</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                                <!-- Bouton VOIR -->
                                                <a href="<?php echo e(route('accounts.physical.show', $submission->id)); ?>"
                                                    class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                    title="Voir les détails">
                                                    <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                </a>

                                                <!-- Bouton PDF -->
                                                <a href="<?php echo e(route('accounts.physical.pdf', $submission->id)); ?>"
                                                    class="bg-primary-focus text-primary-600 bg-hover-primary-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                    title="Télécharger PDF">
                                                    <iconify-icon icon="lucide:file-text" class="menu-icon"></iconify-icon>
                                                </a>

                                                <!-- Bouton IMPRIMER -->
                                                <button onclick="printSubmission(<?php echo e($submission->id); ?>)"
                                                    class="bg-secondary-focus text-secondary-600 bg-hover-secondary-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                    title="Imprimer">
                                                    <iconify-icon icon="lucide:printer" class="menu-icon"></iconify-icon>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-24">
                                            <div class="d-flex flex-column align-items-center gap-3">
                                                <iconify-icon icon="lucide:file-x" class="icon text-4xl text-secondary-light"></iconify-icon>
                                                <span class="text-secondary-light">Aucune soumission trouvée</span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-24">
                        <?php echo e($submissions->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('includes.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </main>

    <script>
        function printSubmission(id) {
            window.open('<?php echo e(url('admin/accounts/physical')); ?>/' + id + '?print=1', '_blank');
        }
    </script>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .printable, .printable * {
                visibility: visible;
            }
            .printable {
                position: absolute;
                left: 0;
                top: 0;
            }
            .no-print {
                display: none;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/admin/accounts/physical/index.blade.php ENDPATH**/ ?>