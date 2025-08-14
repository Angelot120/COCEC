<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }

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
                <h4 class="fw-semibold mb-0">Ajouter une agence</h4>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Ajouter une agence</li>
                </ul>
            </div>

            <form action="<?php echo e(route('agency.store')); ?>" method="POST" class="row g-4" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="col-12">
                    <label for="name" class="form-label">Nom de l'agence</label>
                    <input type="text" name="name" id="name"
                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" required>
                    <?php $__errorArgs = ['name'];
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
                <div class="col-md-6">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="number" step="any" name="latitude" id="latitude"
                        class="form-control <?php $__errorArgs = ['latitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('latitude', 8.6195)); ?>"
                        required>
                    <?php $__errorArgs = ['latitude'];
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
                <div class="col-md-6">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="number" step="any" name="longitude" id="longitude"
                        class="form-control <?php $__errorArgs = ['longitude'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('longitude', 0.8248)); ?>"
                        required>
                    <?php $__errorArgs = ['longitude'];
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
                    <label for="address" class="form-label">Adresse</label>
                    <textarea name="address" id="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('address')); ?></textarea>
                    <?php $__errorArgs = ['address'];
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
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" name="phone" id="phone"
                        class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('phone')); ?>" required>
                    <?php $__errorArgs = ['phone'];
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
                    <label for="status" class="form-label">Statut</label>
                    <select name="status" id="status" class="form-select <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="" <?php echo e(old('status') == null ? 'selected' : ''); ?>>Non défini</option>
                        <option value="Open" <?php echo e(old('status') == 'Open' ? 'selected' : ''); ?>>Ouverte</option>
                        <option value="Close" <?php echo e(old('status') == 'Close' ? 'selected' : ''); ?>>Fermée</option>
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
                    <div id="map"></div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger">Enregistrer</button>
                </div>
            </form>
        </div>

        <?php echo $__env->make('includes.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Coordonnées par défaut du Togo (Lomé)
            const defaultLat = 6.1375;
            const defaultLng = 1.2123;

            // Récupérer les valeurs de latitude et longitude avec les valeurs par défaut du Togo
            const latitude = parseFloat('<?php echo e(old('latitude', 6.1375)); ?>') || defaultLat;
            const longitude = parseFloat('<?php echo e(old('longitude', 1.2123)); ?>') || defaultLng;
            const hasValidCoords = !isNaN(latitude) && !isNaN(longitude) && latitude >= -90 && latitude <= 90 &&
                longitude >= -180 && longitude <= 180;

            // Initialisation de la carte centrée sur le Togo
            const map = L.map('map').setView([latitude, longitude], hasValidCoords ? 10 : 7);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Initialisation du marqueur
            const marker = L.marker([latitude, longitude]).addTo(map);

            // Mise à jour des champs lors d'un clic sur la carte
            map.on('click', function(e) {
                marker.setLatLng(e.latlng);
                const latitudeInput = document.getElementById('latitude');
                const longitudeInput = document.getElementById('longitude');
                if (latitudeInput && longitudeInput) {
                    latitudeInput.value = e.latlng.lat.toFixed(6);
                    longitudeInput.value = e.latlng.lng.toFixed(6);
                    map.setView(e.latlng, 13);
                }
            });

            // Mise à jour du marqueur lors de la modification manuelle des champs
            function updateMarker() {
                const latitudeInput = document.getElementById('latitude');
                const longitudeInput = document.getElementById('longitude');
                if (latitudeInput && longitudeInput) {
                    const lat = parseFloat(latitudeInput.value);
                    const lng = parseFloat(longitudeInput.value);
                    if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
                        marker.setLatLng([lat, lng]);
                        map.setView([lat, lng], 13);
                    }
                }
            }

            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');
            if (latitudeInput && longitudeInput) {
                latitudeInput.addEventListener('input', updateMarker);
                longitudeInput.addEventListener('input', updateMarker);
            }
        });

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
            const maxSize = 30 * 1024 * 1024; // 30MB

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

<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/admin/agency/create.blade.php ENDPATH**/ ?>