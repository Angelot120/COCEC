<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dashboard-main">
    <?php echo $__env->make('includes.admin.appbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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
            <h6 class="fw-semibold mb-0">Liste des annonces</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Annonces</li>
            </ul>
        </div>

        <!-- Barre de contrôles -->
        <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between mb-24">
            <form action="<?php echo e(route('announcement.index')); ?>" method="GET" class="d-flex align-items-center flex-wrap gap-3">
                <div class="d-flex align-items-center gap-3">
                    <span class="text-md fw-medium text-secondary-light mb-0">Afficher</span>
                    <select name="per_page" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                        <option value="8" <?php echo e(request('per_page', 8) == 8 ? 'selected' : ''); ?>>8</option>
                        <option value="12" <?php echo e(request('per_page') == 12 ? 'selected' : ''); ?>>12</option>
                        <option value="16" <?php echo e(request('per_page') == 16 ? 'selected' : ''); ?>>16</option>
                        <option value="24" <?php echo e(request('per_page') == 24 ? 'selected' : ''); ?>>24</option>
                    </select>
                </div>
                <div class="navbar-search">
                    <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Rechercher..." value="<?php echo e(request('search')); ?>">
                    <button type="submit" style="border:none; background:transparent; cursor:pointer;">
                        <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                    </button>
                </div>
            </form>
            <a href="<?php echo e(route('announcement.create')); ?>" class="btn btn-danger text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Ajouter une annonce
            </a>
        </div>

        <!-- Affichage en grille de cartes -->
        <div class="row gy-4">
            <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-xxl-3 col-lg-4 col-sm-6">
                <div class="card h-100 p-0 radius-12 overflow-hidden">
                    <div class="card-body p-24">
                        <!-- Image de l'annonce -->
                        <div class="w-100 max-h-194-px radius-8 overflow-hidden mb-20">
                            <?php if($announcement->image): ?>
                            <img src="<?php echo e($announcement->image ? asset('storage/' .$announcement->image) : asset('assets/images/announcements.jpg')); ?>" alt="<?php echo e($announcement->title); ?>" class="w-100 h-100 object-fit-cover">
                            <?php else: ?>
                            <div class="w-100 h-194-px bg-neutral-100 d-flex align-items-center justify-content-center radius-8">
                                <iconify-icon icon="solar:image-outline" class="text-neutral-400" style="font-size: 48px;"></iconify-icon>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="mt-20">
                            <!-- Statut et Date -->
                            <div class="d-flex align-items-center gap-6 justify-content-between flex-wrap mb-16">
                                <?php if($announcement->status === 'publier'): ?>
                                <span class="px-20 py-6 rounded-pill fw-medium text-white bg-success">Publiée</span>
                                <?php elseif($announcement->status === 'non publier'): ?>
                                <span class="px-20 py-6 rounded-pill fw-medium text-white bg-secondary">Non publiée</span>
                                <?php elseif($announcement->status === 'expirer'): ?>
                                <span class="px-20 py-6 rounded-pill fw-medium text-white bg-danger">Expirée</span>
                                <?php endif; ?>
                                <div class="d-flex align-items-center gap-8 text-neutral-500 fw-medium">
                                    <iconify-icon icon="solar:calendar-outline" class="icon"></iconify-icon>
                                    <?php echo e($announcement->created_at->format('M d, Y')); ?>

                                </div>
                            </div>

                            <!-- Titre -->
                            <h6 class="mb-16">
                                <span class="text-line-2 text-xl"><?php echo e($announcement->title); ?></span>
                            </h6>

                            <!-- Description -->
                            <p class="text-line-3 text-neutral-500 mb-16">
                                <?php echo e($announcement->description ?? 'Aucune description disponible...'); ?>

                            </p>

                            <!-- Boutons d'action -->
                            <div class="d-flex gap-2 mt-16">
                                <!-- Bouton VOIR -->
                                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewAnnouncementModal<?php echo e($announcement->id); ?>">
                                    <iconify-icon icon="lucide:eye" class="icon"></iconify-icon>
                                    Voir
                                </button>

                                <!-- Bouton ÉDITER -->
                                <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal<?php echo e($announcement->id); ?>">
                                    <iconify-icon icon="lucide:edit" class="icon"></iconify-icon>
                                    Éditer
                                </button>

                                <!-- Bouton SUPPRIMER -->
                                <form method="POST" action="<?php echo e(route('announcement.destroy', $announcement->id)); ?>" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-outline-danger btn-sm remove-item-btn">
                                        <iconify-icon icon="fluent:delete-24-regular" class="icon"></iconify-icon>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de visualisation -->
            <div class="modal fade" id="viewAnnouncementModal<?php echo e($announcement->id); ?>" tabindex="-1" aria-labelledby="viewAnnouncementModalLabel<?php echo e($announcement->id); ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewAnnouncementModalLabel<?php echo e($announcement->id); ?>">Détails de l'annonce : <?php echo e($announcement->title); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Titre :</strong> <?php echo e($announcement->title); ?></p>
                                    <p><strong>Description :</strong></p>
                                    <p class="text-muted"><?php echo e($announcement->description ?? 'Non définie'); ?></p>
                                    <p><strong>Statut :</strong>
                                        <?php if($announcement->status === 'publier'): ?>
                                        <span class="badge bg-success">Publiée</span>
                                        <?php elseif($announcement->status === 'non publier'): ?>
                                        <span class="badge bg-secondary">Non publiée</span>
                                        <?php elseif($announcement->status === 'expirer'): ?>
                                        <span class="badge bg-danger">Expirée</span>
                                        <?php endif; ?>
                                    </p>
                                    <p><strong>Date de création :</strong> <?php echo e($announcement->created_at->format('d M Y à H:i')); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <?php if($announcement->image): ?>
                                    <p><strong>Image :</strong></p>
                                    <img src="<?php echo e(Storage::url($announcement->image)); ?>" alt="<?php echo e($announcement->title); ?>" class="img-fluid radius-8" style="max-width: 100%; max-height: 300px;">
                                    <?php else: ?>
                                    <div class="text-center py-5">
                                        <iconify-icon icon="solar:image-outline" class="text-neutral-300" style="font-size: 80px;"></iconify-icon>
                                        <p class="text-muted mt-2">Aucune image</p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de modification -->
            <div class="modal fade" id="editAnnouncementModal<?php echo e($announcement->id); ?>" tabindex="-1" aria-labelledby="editAnnouncementModalLabel<?php echo e($announcement->id); ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form method="POST" action="<?php echo e(route('announcement.update', $announcement->id)); ?>" enctype="multipart/form-data" class="modal-content">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAnnouncementModalLabel<?php echo e($announcement->id); ?>">Modifier l'annonce : <?php echo e($announcement->title); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title<?php echo e($announcement->id); ?>" class="form-label">Titre</label>
                                        <input type="text" name="title" id="title<?php echo e($announcement->id); ?>" class="form-control <?php $__errorArgs = ['title', 'update-'.$announcement->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title', $announcement->title)); ?>" required>
                                        <?php $__errorArgs = ['title', 'update-'.$announcement->id];
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
                                        <label for="status<?php echo e($announcement->id); ?>" class="form-label">Statut</label>
                                        <select name="status" id="status<?php echo e($announcement->id); ?>" class="form-select <?php $__errorArgs = ['status', 'update-'.$announcement->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                            <option value="publier" <?php echo e(old('status', $announcement->status) == 'publier' ? 'selected' : ''); ?>>Publiée</option>
                                            <option value="non publier" <?php echo e(old('status', $announcement->status) == 'non publier' ? 'selected' : ''); ?>>Non publiée</option>
                                            <option value="expirer" <?php echo e(old('status', $announcement->status) == 'expirer' ? 'selected' : ''); ?>>Expirée</option>
                                        </select>
                                        <?php $__errorArgs = ['status', 'update-'.$announcement->id];
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
                                        <label for="description<?php echo e($announcement->id); ?>" class="form-label">Description</label>
                                        <textarea name="description" id="description<?php echo e($announcement->id); ?>" class="form-control <?php $__errorArgs = ['description', 'update-'.$announcement->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4"><?php echo e(old('description', $announcement->description)); ?></textarea>
                                        <?php $__errorArgs = ['description', 'update-'.$announcement->id];
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
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="image<?php echo e($announcement->id); ?>" class="form-label">Changer l'image (laisser vide pour conserver l'actuelle)</label>
                                        <input type="file" name="image" id="image<?php echo e($announcement->id); ?>" class="form-control <?php $__errorArgs = ['image', 'update-'.$announcement->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept="image/*">
                                        <?php $__errorArgs = ['image', 'update-'.$announcement->id];
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
                                    <div class="text-center">
                                        <p class="small text-muted mb-1">Image actuelle :</p>
                                        <?php if($announcement->image): ?>
                                        <img src="<?php echo e(Storage::url($announcement->image)); ?>" alt="<?php echo e($announcement->title); ?>" class="img-fluid radius-8" style="max-width: 100%; max-height: 200px;">
                                        <?php else: ?>
                                        <div class="bg-neutral-100 d-flex align-items-center justify-content-center radius-8" style="height: 150px;">
                                            <iconify-icon icon="solar:image-outline" class="text-neutral-400" style="font-size: 48px;"></iconify-icon>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="card text-center p-5">
                    <div class="announcement-card justify-center">
                        <iconify-icon icon="solar:document-outline" class="text-neutral-300 mb-3" style="font-size: 80px;"></iconify-icon>
                        <h5 class="text-neutral-500">Aucune annonce trouvée</h5>
                        <p class="text-neutral-400">Commencez par créer votre première annonce.</p>
                        <a href="<?php echo e(route('announcement.create')); ?>" class="btn btn-danger">
                            Créer une annonce
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if($announcements->hasPages()): ?>
        <div class="mt-4 d-flex justify-content-center">
            <?php echo e($announcements->appends(request()->query())->links()); ?>

        </div>
        <?php endif; ?>
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
                if (confirm("Êtes-vous sûr de vouloir supprimer cette annonce ?")) {
                    this.closest('form').submit();
                }
            });
        });

        // Prévisualisation d'image lors de la modification
        document.querySelectorAll('input[type="file"][name="image"]').forEach(input => {
            input.addEventListener('change', function(event) {
                const file = event.target.files[0];
                const modalId = this.getAttribute('id').replace('image', '');
                const previewImg = document.querySelector(`#editAnnouncementModal${modalId} img`);

                if (file && previewImg) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        // Ouvre le modal de modification si des erreurs existent
        <?php if(session('edit_announcement_id')): ?>
        const modal = new bootstrap.Modal(document.getElementById('editAnnouncementModal<?php echo e(session('
            edit_announcement_id ')); ?>'), {
            backdrop: 'static',
            keyboard: false
        });
        modal.show();
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\COCEC\resources\views/admin/announcement/index.blade.php ENDPATH**/ ?>