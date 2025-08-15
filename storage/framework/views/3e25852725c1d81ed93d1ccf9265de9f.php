

<?php $__env->startSection('title', 'Détails de l\'Utilisateur'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="dashboard-main">
    <?php echo $__env->make('includes.admin.appbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Détails de l'Utilisateur</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Détails Utilisateur</li>
            </ul>
        </div>

        <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Détails de l'Utilisateur</h4>
                    <div>
                        <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-warning">
                            <i class="ri-edit-line"></i> Modifier
                        </a>
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary">
                            <i class="ri-arrow-left-line"></i> Retour
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="150">ID :</th>
                                    <td><?php echo e($user->id); ?></td>
                                </tr>
                                <tr>
                                    <th>Nom complet :</th>
                                    <td><?php echo e($user->name); ?></td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td><?php echo e($user->email); ?></td>
                                </tr>
                                <tr>
                                    <th>Rôle :</th>
                                    <td>
                                        <span class="badge bg-<?php echo e($user->role->value === 'super_admin' ? 'danger' : ($user->role->value === 'dg' ? 'warning' : ($user->role->value === 'informaticien' ? 'info' : 'success'))); ?>">
                                            <?php echo e($user->role->getLabel()); ?>

                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="150">Téléphone :</th>
                                    <td><?php echo e($user->phone_num ?? 'Non renseigné'); ?></td>
                                </tr>
                                <tr>
                                    <th>Date de création :</th>
                                    <td><?php echo e($user->created_at->format('d/m/Y à H:i')); ?></td>
                                </tr>
                                <tr>
                                    <th>Dernière connexion :</th>
                                    <td><?php echo e($user->updated_at->format('d/m/Y à H:i')); ?></td>
                                </tr>
                                <tr>
                                    <th>Permissions :</th>
                                    <td>
                                        <?php if($user->hasFullAccess()): ?>
                                            <span class="badge bg-success">Accès complet</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning">Accès limité</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Actions disponibles</h5>
                            <div class="d-flex gap-2" role="group">
                                <form action="<?php echo e(route('admin.users.reset-password', $user)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-secondary" onclick="return confirm('Réinitialiser le mot de passe ?')">
                                        <i class="ri-key-line"></i> Réinitialiser le mot de passe
                                    </button>
                                </form>
                                
                                <?php if($user->id !== auth()->id()): ?>
                                    <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                            <i class="ri-delete-bin-line"></i> Supprimer
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </main>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/admin/users/show.blade.php ENDPATH**/ ?>