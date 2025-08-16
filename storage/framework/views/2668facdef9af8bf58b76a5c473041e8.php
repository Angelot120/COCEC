<?php $__env->startSection('css'); ?>
<style>
    .drag-drop-area {
        border: 2px dashed #d1d5db;
        border-radius: 8px;
        padding: 40px;
        text-align: center;
        background-color: #f9fafb;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }

    .drag-drop-area:hover {
        border-color: #3b82f6;
        background-color: #eff6ff;
    }

    .drag-drop-area.dragover {
        border-color: #10b981;
        background-color: #ecfdf5;
        transform: scale(1.02);
    }

    .drag-drop-area .upload-icon {
        font-size: 3rem;
        color: #6b7280;
        margin-bottom: 1rem;
    }

    .drag-drop-area.dragover .upload-icon {
        color: #10b981;
    }

    .file-input-hidden {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .image-preview {
        max-width: 100%;
        max-height: 200px;
        border-radius: 8px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-top: 1rem;
    }

    .remove-image {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .remove-image:hover {
        background: #dc2626;
    }

    .preview-container {
        position: relative;
        display: inline-block;
    }

    .file-info {
        background: #f3f4f6;
        padding: 10px;
        border-radius: 6px;
        margin-top: 10px;
        font-size: 0.9rem;
        color: #374151;
    }
</style>
<?php $__env->stopSection(); ?>

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
            <h4 class="fw-semibold mb-0">Ajouter une annonce</h4>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Ajouter une annonce</li>
            </ul>
        </div>

        <form action="<?php echo e(route('announcement.store')); ?>" method="POST" enctype="multipart/form-data" class="row g-4">
            <?php echo csrf_field(); ?>
            <div class="col-12">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('title')); ?>" required>
                <?php $__errorArgs = ['title'];
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

            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="4" maxlength="255"><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
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

            <div class="col-12">
                <label class="form-label">Image (optionnel)</label>
                <div class="drag-drop-area" id="dragDropArea">
                    <input type="file" name="image" id="imageInput" class="file-input-hidden" accept="image/*">
                    <div class="upload-content">
                        <iconify-icon icon="material-symbols:cloud-upload-outline" class="upload-icon"></iconify-icon>
                        <h5 class="mb-2">Glissez et déposez votre image ici</h5>
                        <p class="text-muted mb-2">ou cliquez pour sélectionner un fichier</p>
                        <small class="text-muted">Formats acceptés: JPG, PNG, GIF (Max: 2MB)</small>
                    </div>
                    <div id="imagePreview" class="d-none">
                        <div class="preview-container">
                            <img id="previewImg" class="image-preview" src="" alt="Aperçu">
                            <button type="button" class="remove-image" id="removeImage">&times;</button>
                        </div>
                        <div class="file-info" id="fileInfo"></div>
                    </div>
                </div>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12">
                <label for="status" class="form-label">Statut</label>
                <select name="status" id="status" class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <option value="publier" <?php echo e(old('status', 'publier') == 'publier' ? 'selected' : ''); ?>>Publiée</option>
                    <option value="non publier" <?php echo e(old('status') == 'non publier' ? 'selected' : ''); ?>>Non publiée</option>
                    <option value="expirer" <?php echo e(old('status') == 'expirer' ? 'selected' : ''); ?>>Expirée</option>
                </select>
                <?php $__errorArgs = ['status'];
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

            <div class="col-12">
                <button type="submit" class="btn btn-danger ">
                    
                    Enregistrer
                </button>
                <a href="<?php echo e(route('announcement.index')); ?>" class="btn btn-warning ">
                    
                    Annuler
                </a>
            </div>
        </form>
    </div>

    <?php echo $__env->make('includes.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dragDropArea = document.getElementById('dragDropArea');
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const removeImage = document.getElementById('removeImage');
        const fileInfo = document.getElementById('fileInfo');
        const uploadContent = dragDropArea.querySelector('.upload-content');

        // Formats d'image acceptés
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        const maxSize = 2 * 1024 * 1024; // 2MB

        // Prévenir les comportements par défaut
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dragDropArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        // Ajouter/retirer la classe de survol
        ['dragenter', 'dragover'].forEach(eventName => {
            dragDropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dragDropArea.addEventListener(eventName, unhighlight, false);
        });

        // Gérer le drop
        dragDropArea.addEventListener('drop', handleDrop, false);

        // Gérer le clic
        dragDropArea.addEventListener('click', () => imageInput.click());

        // Gérer la sélection via input
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                handleFile(this.files[0]);
            }
        });

        // Supprimer l'image
        removeImage.addEventListener('click', function(e) {
            e.stopPropagation();
            clearImage();
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight() {
            dragDropArea.classList.add('dragover');
        }

        function unhighlight() {
            dragDropArea.classList.remove('dragover');
        }

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                handleFile(files[0]);
            }
        }

        function handleFile(file) {
            // Vérifier le type de fichier
            if (!allowedTypes.includes(file.type)) {
                alert('Format de fichier non autorisé. Veuillez sélectionner une image (JPG, PNG, GIF).');
                return;
            }

            // Vérifier la taille
            if (file.size > maxSize) {
                alert('Le fichier est trop volumineux. Taille maximale autorisée: 2MB.');
                return;
            }

            // Créer un nouveau DataTransfer pour mettre à jour l'input
            const dt = new DataTransfer();
            dt.items.add(file);
            imageInput.files = dt.files;

            // Afficher l'aperçu
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                showPreview(file);
            };
            reader.readAsDataURL(file);
        }

        function showPreview(file) {
            // Afficher l'aperçu et masquer le contenu d'upload
            uploadContent.classList.add('d-none');
            imagePreview.classList.remove('d-none');

            // Afficher les informations du fichier
            const fileSize = (file.size / 1024).toFixed(1);
            fileInfo.innerHTML = `
            <strong>Fichier:</strong> ${file.name}<br>
            <strong>Taille:</strong> ${fileSize} KB<br>
            <strong>Type:</strong> ${file.type}
        `;

            // Changer l'apparence de la zone de drop
            dragDropArea.style.border = '2px dashed #10b981';
            dragDropArea.style.backgroundColor = '#f0fdf4';
        }

        function clearImage() {
            // Réinitialiser l'input
            imageInput.value = '';

            // Masquer l'aperçu et afficher le contenu d'upload
            imagePreview.classList.add('d-none');
            uploadContent.classList.remove('d-none');

            // Réinitialiser l'apparence
            dragDropArea.style.border = '2px dashed #d1d5db';
            dragDropArea.style.backgroundColor = '#f9fafb';

            // Vider l'aperçu
            previewImg.src = '';
            fileInfo.innerHTML = '';
        }

        // Animation au survol
        dragDropArea.addEventListener('mouseenter', function() {
            if (!imagePreview.classList.contains('d-none')) return;
            this.style.transform = 'scale(1.01)';
        });

        dragDropArea.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/admin/announcement/create.blade.php ENDPATH**/ ?>