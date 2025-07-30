```blade


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
                <h6 class="fw-semibold mb-0">Liste des candidatures spontanées</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Candidatures spontanées</li>
                </ul>
            </div>

            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <form action="<?php echo e(route('jobList.index')); ?>" method="GET" class="d-flex align-items-center flex-wrap gap-3">
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
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Rechercher..." value="<?php echo e(request('search')); ?>">
                            <button type="submit" style="border:none; background:transparent; cursor:pointer;">
                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-body p-24">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th>Date de soumission</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Intitulé</th>
                                    <th>Type</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $jobApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobApplication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($jobApplication->created_at->format('d M Y')); ?></td>
                                        <td><?php echo e($jobApplication->last_name); ?> <?php echo e($jobApplication->first_name); ?></td>
                                        <td><?php echo e($jobApplication->email); ?></td>
                                        <td><?php echo e($jobApplication->phone); ?></td>
                                        <td><?php echo e($jobApplication->intitule ?? 'Non défini'); ?></td>
                                        <td><?php echo e($jobApplication->application_type === 'emploi' ? 'Emploi' : 'Stage'); ?></td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                                <!-- Bouton VOIR -->
                                                <button type="button" class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="modal" data-bs-target="#viewJobApplicationModal<?php echo e($jobApplication->id); ?>">
                                                    <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                </button>

                                                <!-- Bouton SUPPRIMER -->
                                                <form method="POST" action="<?php echo e(route('jobList.destroy', $jobApplication->id)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal de visualisation -->
                                    <div class="modal fade" id="viewJobApplicationModal<?php echo e($jobApplication->id); ?>" tabindex="-1" aria-labelledby="viewJobApplicationModalLabel<?php echo e($jobApplication->id); ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewJobApplicationModalLabel<?php echo e($jobApplication->id); ?>">Détails de la candidature</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Nom :</strong> <?php echo e($jobApplication->last_name); ?> <?php echo e($jobApplication->first_name); ?></p>
                                                    <p><strong>Email :</strong> <?php echo e($jobApplication->email); ?></p>
                                                    <p><strong>Téléphone :</strong> <?php echo e($jobApplication->phone); ?></p>
                                                    <p><strong>Intitulé :</strong> <?php echo e($jobApplication->intitule ?? 'Non défini'); ?></p>
                                                    <p><strong>Type :</strong> <?php echo e($jobApplication->application_type === 'emploi' ? 'Emploi' : 'Stage'); ?></p>
                                                    <p><strong>Date de soumission :</strong> <?php echo e($jobApplication->created_at->format('d M Y')); ?></p>
                                                    <p><strong>CV :</strong>
                                                        <?php if($jobApplication->cv_path && Storage::disk('public')->exists($jobApplication->cv_path)): ?>
                                                            <a href="<?php echo e(route('jobList.download', ['id' => $jobApplication->id, 'type' => 'cv'])); ?>" class="btn btn-sm btn-primary">Télécharger</a>
                                                        <?php else: ?>
                                                            Non disponible
                                                        <?php endif; ?>
                                                    </p>
                                                    <p><strong>Lettre de motivation :</strong>
                                                        <?php if($jobApplication->motivation_letter_path && Storage::disk('public')->exists($jobApplication->motivation_letter_path)): ?>
                                                            <a href="<?php echo e(route('jobList.download', ['id' => $jobApplication->id, 'type' => 'motivation_letter'])); ?>" class="btn btn-sm btn-primary">Télécharger</a>
                                                        <?php else: ?>
                                                            Non disponible
                                                        <?php endif; ?>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="7" class="text-center">Aucune candidature spontanée trouvée.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-24">
                        <?php echo e($jobApplications->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('includes.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Confirmation avant suppression
            document.querySelectorAll('.remove-item-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm("Êtes-vous sûr de vouloir supprimer cette candidature ?")) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
```
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/admin/jobListe/index.blade.php ENDPATH**/ ?>