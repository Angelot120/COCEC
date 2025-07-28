<!-- 4. VUE CORRIGÉE - Modifications dans le modal d'édition -->


<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/summernote/summernote.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="dashboard-main">
        <?php echo $__env->make('includes.admin.appbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="dashboard-main-body">
            <!-- Messages de succès/erreur -->
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

            <!-- Breadcrumb -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">Offres d'emploi</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Offres d'emploi</li>
                </ul>
            </div>

            <!-- Contenu principal -->
            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <!-- Formulaire de recherche et pagination -->
                    <form action="<?php echo e(route('career.index')); ?>" method="GET" class="d-flex align-items-center flex-wrap gap-3">
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
                    <a href="<?php echo e(route('career.create')); ?>" class="btn btn-danger text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Ajouter une offre
                    </a>
                </div>

                <div class="card-body p-24">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th>Date de Création</th>
                                    <th>Titre</th>
                                    <th>Type</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $job_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($job_offer->created_at->format('d M Y')); ?></td>
                                        <td><?php echo e($job_offer->title); ?></td>
                                        <td><?php echo e($job_offer->type == 'stage' ? 'Stage' : 'Emploi'); ?></td>
                                        <td class="text-center">
                                            <?php if($job_offer->status === 'open'): ?>
                                                <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Ouvert</span>
                                            <?php else: ?>
                                                <span class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-24 py-4 radius-4 fw-medium text-sm">Fermé</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                                <!-- Bouton VOIR -->
                                                <button type="button" class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="modal" data-bs-target="#viewJobOfferModal<?php echo e($job_offer->id); ?>">
                                                    <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                </button>

                                                <!-- Bouton EDITION -->
                                                <button type="button" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="modal" data-bs-target="#editJobOfferModal<?php echo e($job_offer->id); ?>">
                                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                                </button>

                                                <!-- Bouton SUPPRIMER -->
                                                <form method="POST" action="<?php echo e(route('career.destroy', $job_offer->id)); ?>" style="display: inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Aucune offre d'emploi trouvée.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-24">
                        <?php echo e($job_offers->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('includes.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </main>

    <!-- MODALS -->
    <?php $__currentLoopData = $job_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal de visualisation -->
        <div class="modal fade" id="viewJobOfferModal<?php echo e($job_offer->id); ?>" tabindex="-1" aria-labelledby="viewJobOfferModalLabel<?php echo e($job_offer->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewJobOfferModalLabel<?php echo e($job_offer->id); ?>">Détails de l'offre : <?php echo e($job_offer->title); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Titre :</strong> <?php echo e($job_offer->title); ?></p>
                        <p><strong>Type :</strong> <?php echo e($job_offer->type == 'stage' ? 'Stage' : 'Emploi'); ?></p>
                        <p><strong>Statut :</strong> <?php echo e($job_offer->status == 'open' ? 'Ouvert' : 'Fermé'); ?></p>
                        <p><strong>Date de création :</strong> <?php echo e($job_offer->created_at->format('d M Y')); ?></p>
                        <p><strong>Description :</strong></p>
                        <div class="border p-3 rounded"><?php echo $job_offer->description; ?></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de modification CORRIGÉ -->
        <div class="modal fade" id="editJobOfferModal<?php echo e($job_offer->id); ?>" tabindex="-1" aria-labelledby="editJobOfferModalLabel<?php echo e($job_offer->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="POST" action="<?php echo e(route('career.update', $job_offer->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="editJobOfferModalLabel<?php echo e($job_offer->id); ?>">Modifier l'offre : <?php echo e($job_offer->title); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Affichage des erreurs spécifiques à ce modal -->
                            <?php if($errors->getBag('update-'.$job_offer->id)->any()): ?>
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        <?php $__currentLoopData = $errors->getBag('update-'.$job_offer->id)->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label for="title<?php echo e($job_offer->id); ?>" class="form-label">Titre *</label>
                                <input type="text" 
                                       name="title" 
                                       id="title<?php echo e($job_offer->id); ?>" 
                                       class="form-control <?php $__errorArgs = ['title', 'update-'.$job_offer->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       value="<?php echo e(old('title', $job_offer->title)); ?>" 
                                       required>
                                <?php $__errorArgs = ['title', 'update-'.$job_offer->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="type<?php echo e($job_offer->id); ?>" class="form-label">Type *</label>
                                <select name="type" 
                                        id="type<?php echo e($job_offer->id); ?>" 
                                        class="form-select <?php $__errorArgs = ['type', 'update-'.$job_offer->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        required>
                                    <option value="">-- Sélectionner un type --</option>
                                    <option value="stage" <?php echo e(old('type', $job_offer->type) == 'stage' ? 'selected' : ''); ?>>Stage</option>
                                    <option value="emploi" <?php echo e(old('type', $job_offer->type) == 'emploi' ? 'selected' : ''); ?>>Emploi</option>
                                </select>
                                <?php $__errorArgs = ['type', 'update-'.$job_offer->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="status<?php echo e($job_offer->id); ?>" class="form-label">Statut *</label>
                                <select name="status" 
                                        id="status<?php echo e($job_offer->id); ?>" 
                                        class="form-select <?php $__errorArgs = ['status', 'update-'.$job_offer->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        required>
                                    <option value="">-- Sélectionner un statut --</option>
                                    <option value="open" <?php echo e(old('status', $job_offer->status) == 'open' ? 'selected' : ''); ?>>Ouvert</option>
                                    <option value="closed" <?php echo e(old('status', $job_offer->status) == 'closed' ? 'selected' : ''); ?>>Fermé</option>
                                </select>
                                <?php $__errorArgs = ['status', 'update-'.$job_offer->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="description<?php echo e($job_offer->id); ?>" class="form-label">Description *</label>
                                <textarea name="description" 
                                          id="description<?php echo e($job_offer->id); ?>" 
                                          class="form-control summernote <?php $__errorArgs = ['description', 'update-'.$job_offer->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                          rows="5" 
                                          required><?php echo e(old('description', $job_offer->description)); ?></textarea>
                                <?php $__errorArgs = ['description', 'update-'.$job_offer->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(URL::asset('assets/summernote/summernote.min.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation de Summernote pour chaque textarea de modification
            document.querySelectorAll('.summernote').forEach(function(textarea) {
                $(textarea).summernote({
                    height: 200,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            });

            // Confirmation avant suppression
            document.querySelectorAll('.remove-item-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm("Êtes-vous sûr de vouloir supprimer cette offre d'emploi ?")) {
                        this.closest('form').submit();
                    }
                });
            });

            // Réouvre le modal de modification en cas d'erreur
            <?php if(session('edit_job_offer_id')): ?>
                const modalElement = document.getElementById('editJobOfferModal<?php echo e(session('edit_job_offer_id')); ?>');
                if (modalElement) {
                    const modal = new bootstrap.Modal(modalElement);
                    modal.show();
                    
                    // Réinitialise Summernote pour ce modal spécifique
                    setTimeout(function() {
                        const textarea = modalElement.querySelector('.summernote');
                        if (textarea) {
                            $(textarea).summernote('destroy');
                            $(textarea).summernote({
                                height: 200,
                                toolbar: [
                                    ['style', ['style']],
                                    ['font', ['bold', 'underline', 'clear']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['table', ['table']],
                                    ['insert', ['link', 'picture', 'video']],
                                    ['view', ['fullscreen', 'codeview', 'help']]
                                ]
                            });
                        }
                    }, 500);
                }
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/admin/career/index.blade.php ENDPATH**/ ?>