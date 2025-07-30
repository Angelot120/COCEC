

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<style>
    .account-form-section {
        background-color: #f7f8fc;
        font-family: 'Poppins', sans-serif;
    }

    .form-container {
        max-width: 900px;
        margin: 0 auto;
        background: #FFFFFF;
        border-radius: 16px;
        padding: 40px 50px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        border-top: 5px solid #EC281C;
    }

    .section-heading h2 {
        font-weight: 700;
        color: #000000;
    }

    .section-heading p {
        color: #555;
        line-height: 1.7;
    }

    .form-section-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-top: 35px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    .input-group-custom {
        position: relative;
    }

    .input-group-custom .form-label {
        font-weight: 500;
        color: #343a40;
        margin-bottom: 8px;
    }

    .input-group-custom .icon {
        position: absolute;
        top: calc(50% + 12px);
        transform: translateY(-50%);
        left: 18px;
        color: #adb5bd;
        font-size: 1.1rem;
        transition: color 0.3s ease;
        pointer-events: none;
    }

    .input-group-custom .form-control {
        padding-left: 50px;
        border-radius: 8px;
        padding-top: 12px;
        padding-bottom: 12px;
    }

    .input-group-custom:focus-within .icon {
        color: #EC281C;
    }

    .form-stepper {
        display: flex;
        justify-content: space-around;
        width: 100%;
        position: relative;
        margin: 30px 0;
    }

    .form-stepper .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .form-stepper .step-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e0e0e0;
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        transition: all 0.3s ease;
        border: 3px solid #e0e0e0;
    }

    .form-stepper .step-label {
        margin-top: 10px;
        font-size: 0.8rem;
        color: #6c757d;
        font-weight: 500;
    }

    .form-stepper .step.active .step-icon,
    .form-stepper .step.completed .step-icon {
        background: #EC281C;
        border-color: #EC281C;
    }

    .form-stepper .step.active .step-label {
        color: #EC281C;
        font-weight: 600;
    }

    .form-stepper::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        height: 2px;
        background-color: #e0e0e0;
        transform: translateY(-50%);
        z-index: 0;
    }

    .form-stepper .progress-line {
        position: absolute;
        top: 20px;
        left: 0;
        height: 2px;
        background-color: #EC281C;
        transform: translateY(-50%);
        z-index: 0;
        width: 0%;
        transition: width 0.4s ease;
    }

    .form-step-content {
        display: none;
    }

    .form-step-content.active {
        display: block;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-navigation-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }

    .btn-nav {
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
    }

    .btn-prev {
        background-color: #6c757d;
        color: white;
    }

    .btn-next {
        background-color: #EC281C;
        color: white;
    }

    .btn-submit-form {
        font-size: 1rem;
        border-radius: 8px;
        padding: 14px 35px;
        width: auto;
    }

    .file-upload-wrapper {
        position: relative;
        border: 2px dashed #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: border-color 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .file-upload-wrapper:hover {
        border-color: #EC281C;
    }

    .file-upload-wrapper input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .file-upload-icon {
        color: #EC281C;
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .file-upload-text {
        font-weight: 500;
        color: #555;
    }

    .file-upload-preview img {
        max-width: 150px;
        max-height: 150px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .file-upload-preview span {
        font-style: italic;
        color: #000;
        font-weight: 500;
    }

    .choice-container .choice-label {
        display: block;
        padding: 15px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .choice-container input[type="radio"] {
        display: none;
    }

    .choice-container input[type="radio"]:checked+.choice-label {
        border-color: #EC281C;
        background-color: #ec281c1a;
        font-weight: 600;
        color: #EC281C;
    }

    .method-area {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #eee;
        border-radius: 8px;
        display: none;
    }

    #signature-pad {
        /* ID D'ORIGINE RESTAURÉ */
        border: 2px solid #f0f0f0;
        border-radius: 8px;
        width: 100%;
        height: 200px;
        cursor: crosshair;
        background-color: #fff;
    }

    .signature-controls {
        margin-top: 15px;
        text-align: right;
    }

    .map-container {
        height: 350px;
        border-radius: 8px;
        border: 1px solid #ddd;
        z-index: 1;
    }

    .btn-clear {
        background: #6c757d;
        color: white;
        border-radius: 6px;
        padding: 8px 16px;
        font-weight: 500;
        border: none;
    }

    .versemants-summary {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
    }

    .versemants-summary .row-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
    }

    .versemants-summary .label {
        color: #6c757d;
    }

    .versemants-summary .value,
    .versemants-summary .total-value {
        font-weight: 600;
        color: #000;
    }

    .versemants-summary .total-row {
        border-top: 2px solid #343a40;
        margin-top: 10px;
        padding-top: 10px;
    }

    .versemants-summary .total-label,
    .versemants-summary .total-value {
        font-size: 1.2rem;
        font-weight: 700;
        color: #EC281C;
    }

    .form-control.is-invalid,
    .file-upload-wrapper.is-invalid,
    .choice-container.is-invalid .choice-label {
        border-color: #dc3545 !important;
    }

    .file-upload-wrapper.is-invalid {
        border-style: solid;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }

    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: .25rem;
        font-size: .875em;
        color: #dc3545;
    }

    .form-control.is-invalid~.invalid-feedback,
    .choice-container.is-invalid+.invalid-feedback {
        display: block;
    }

    .dynamic-field {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        position: relative;
    }

    .dynamic-field .remove-field {
        top: 10px;
        right: 10px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="account-form-section py-5">
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="page-header-pro">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Compte en Ligne - Personne Physique</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Compte en Ligne</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <br><br>

    <div class="container">
        <div class="form-container">
            <div class="section-heading mb-4 text-center">
                <h4 class="sub-heading"><span class="left-shape"></span>Compte en Ligne</h4>
                <h2 class="section-title">Ouvrez Votre Compte Personnel COCEC</h2>
                <p>Rejoignez la COCEC en remplissant le formulaire ci-dessous. C'est simple, rapide et sécurisé.</p>
            </div>

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
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <p class="mb-0"><strong>Oups !</strong> Veuillez corriger les erreurs indiquées en rouge ci-dessous avant de continuer.</p>
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('account.store.physical')); ?>" method="POST" enctype="multipart/form-data" class="adhesion-form multi-step-form" id="physique" novalidate>
                <?php echo csrf_field(); ?>

                <div class="form-stepper">
                    <div class="progress-line"></div>
                    <div class="step active" data-step="1">
                        <div class="step-icon">1</div>
                        <div class="step-label">Identité</div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-icon">2</div>
                        <div class="step-label">Adresse</div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-icon">3</div>
                        <div class="step-label">Profession</div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-icon">4</div>
                        <div class="step-label">Documents</div>
                    </div>
                    <div class="step" data-step="5">
                        <div class="step-icon">5</div>
                        <div class="step-label">Versements</div>
                    </div>
                </div>

                <!-- Étape 1: Identité -->
                <div class="form-step-content active" data-step="1">
                    <h4 class="form-section-title">Informations d'Identité</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom</label>
                            <i class="icon fas fa-user"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" required>
                            <div class="invalid-feedback"><?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Prénoms</label>
                            <i class="icon fas fa-user-friends"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['first_names'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_names" value="<?php echo e(old('first_names')); ?>" required>
                            <div class="invalid-feedback"><?php $__errorArgs = ['first_names'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom du père</label>
                            <i class="icon fas fa-user"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="father_name" value="<?php echo e(old('father_name')); ?>" required>
                            <div class="invalid-feedback"><?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom de la mère</label>
                            <i class="icon fas fa-user"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['mother_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mother_name" value="<?php echo e(old('mother_name')); ?>" required>
                            <div class="invalid-feedback"><?php $__errorArgs = ['mother_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Sexe</label>
                            <i class="icon fas fa-venus-mars"></i>
                            <select class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gender" style="padding-left: 50px;" required>
                                <option value="">Sélectionner...</option>
                                <option value="M" <?php echo e(old('gender') == 'M' ? 'selected' : ''); ?>>Masculin</option>
                                <option value="F" <?php echo e(old('gender') == 'F' ? 'selected' : ''); ?>>Féminin</option>
                            </select>
                            <div class="invalid-feedback"><?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Date de naissance</label>
                            <i class="icon fas fa-calendar-alt"></i>
                            <input type="date" class="form-control <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="birth_date" value="<?php echo e(old('birth_date')); ?>" max="<?php echo e(\Carbon\Carbon::today()->subYears(18)->format('Y-m-d')); ?>" required>
                            <div class="invalid-feedback"><?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis et doit être antérieur à aujourd'hui. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Lieu de naissance</label>
                            <i class="icon fas fa-map-marker-alt"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['birth_place'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="birth_place" value="<?php echo e(old('birth_place')); ?>" required>
                            <div class="invalid-feedback"><?php $__errorArgs = ['birth_place'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nationalité</label>
                            <i class="icon fas fa-flag"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nationality" value="<?php echo e(old('nationality')); ?>" required>
                            <div class="invalid-feedback"><?php $__errorArgs = ['nationality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">État Civil</label>
                            <i class="icon fas fa-ring"></i>
                            <select class="form-control <?php $__errorArgs = ['marital_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="marital_status" style="padding-left: 50px;" required>
                                <option value="">Sélectionner...</option>
                                <option value="Célibataire" <?php echo e(old('marital_status') == 'Célibataire' ? 'selected' : ''); ?>>Célibataire</option>
                                <option value="Marié(e)" <?php echo e(old('marital_status') == 'Marié(e)' ? 'selected' : ''); ?>>Marié(e)</option>
                                <option value="Divorcé(e)" <?php echo e(old('marital_status') == 'Divorcé(e)' ? 'selected' : ''); ?>>Divorcé(e)</option>
                                <option value="Veuf/Veuve" <?php echo e(old('marital_status') == 'Veuf/Veuve' ? 'selected' : ''); ?>>Veuf/Veuve</option>
                            </select>
                            <div class="invalid-feedback"><?php $__errorArgs = ['marital_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom du/de la Conjoint(e) (si applicable)</label>
                            <i class="icon fas fa-user-heart"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['spouse_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="spouse_name" value="<?php echo e(old('spouse_name')); ?>">
                            <div class="invalid-feedback"><?php $__errorArgs = ['spouse_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis si marié(e). <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Personne politiquement exposée (national) ?</label>
                            <i class="icon fas fa-user-shield"></i>
                            <select class="form-control <?php $__errorArgs = ['is_ppe_national'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="is_ppe_national" id="is_ppe_national" style="padding-left: 50px;" required>
                                <option value="0" <?php echo e(old('is_ppe_national', '0') == '0' ? 'selected' : ''); ?>>Non</option>
                                <option value="1" <?php echo e(old('is_ppe_national') == '1' ? 'selected' : ''); ?>>Oui</option>
                            </select>
                            <div class="invalid-feedback"><?php $__errorArgs = ['is_ppe_national'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Personne politiquement exposée (étranger) ? <span id="ppe-foreign-required" style="color: #dc3545; display: none;">*</span></label>
                            <i class="icon fas fa-user-shield"></i>
                            <select class="form-control <?php $__errorArgs = ['ppe_foreign'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="ppe_foreign" id="ppe_foreign" style="padding-left: 50px;" required>
                                <option value="0" <?php echo e(old('ppe_foreign', '0') == '0' ? 'selected' : ''); ?>>Non</option>
                                <option value="1" <?php echo e(old('ppe_foreign') == '1' ? 'selected' : ''); ?>>Oui</option>
                            </select>
                            <div class="invalid-feedback"><?php $__errorArgs = ['ppe_foreign'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis si vous n'êtes pas PPE national. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Étape 2: Adresse -->
                <div class="form-step-content" data-step="2">
                    <h4 class="form-section-title">Adresse du Domicile</h4>
                    <div class="alert alert-info">
                        <h5 class="alert-heading">Attestation sur l'honneur</h5>
                        <p class="mb-0">Je certifie sur l'honneur l'exactitude des informations de domicile fournies ci-dessous.</p>
                    </div>
                    <div class="row mb-3 choice-container <?php $__errorArgs = ['loc_method_residence'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <div class="col-6">
                            <input type="radio" name="loc_method_residence" id="desc_physique" value="description" <?php echo e(old('loc_method_residence', 'description') == 'description' ? 'checked' : ''); ?> required>
                            <label for="desc_physique" class="choice-label"><i class="fas fa-keyboard"></i> Décrire l'adresse</label>
                        </div>
                        <div class="col-6">
                            <input type="radio" name="loc_method_residence" id="map_physique" value="map" <?php echo e(old('loc_method_residence') == 'map' ? 'checked' : ''); ?>>
                            <label for="map_physique" class="choice-label"><i class="fas fa-map-marked-alt"></i> Sélectionner sur une carte</label>
                        </div>
                        <div class="invalid-feedback"><?php $__errorArgs = ['loc_method_residence'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Veuillez choisir une méthode. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>
                    <div class="method-area" id="description-area-physique">
                        <div class="input-group-custom">
                            <label class="form-label">Description détaillée du domicile</label>
                            <textarea class="form-control <?php $__errorArgs = ['residence_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="residence_description" rows="4" placeholder="Indiquer ville, quartier, rue, repères..." <?php echo e(old('loc_method_residence') == 'description' ? 'required' : ''); ?>><?php echo e(old('residence_description')); ?></textarea>
                            <div class="invalid-feedback"><?php $__errorArgs = ['residence_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis si vous choisissez de décrire l'adresse. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                    </div>
                    <div class="method-area" id="map-area-physique">
                        <label class="form-label">Cliquez sur la carte ou déplacez le marqueur pour indiquer votre domicile</label>
                        <div id="map-container-physique" class="map-container"></div>
                        <input type="hidden" name="residence_lat" id="latitude-physique" value="<?php echo e(old('residence_lat')); ?>" <?php echo e(old('loc_method_residence') == 'map' ? 'required' : ''); ?>>
                        <input type="hidden" name="residence_lng" id="longitude-physique" value="<?php echo e(old('residence_lng')); ?>" <?php echo e(old('loc_method_residence') == 'map' ? 'required' : ''); ?>>
                        <div class="invalid-feedback"><?php $__errorArgs = ['residence_lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> Une position sur la carte est requise. <?php else: ?> Veuillez sélectionner un point sur la carte. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>
                    <div class="mt-3 col-12 mb-3">
                        <label class="form-label">Plan du domicile (optionnel)</label>
                        <div class="file-upload-wrapper <?php $__errorArgs = ['residence_plan_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <div class="file-upload-content">
                                <i class="fas fa-map-marked-alt file-upload-icon"></i>
                                <p class="file-upload-text">Importer un plan scanné (PDF ou image)</p>
                            </div>
                            <div class="file-upload-preview"></div>
                            <input type="file" name="residence_plan_path" accept="image/*,application/pdf">
                            <div class="invalid-feedback"><?php $__errorArgs = ['residence_plan_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Une erreur est survenue avec le fichier. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                    </div>

                    <h4 class="form-section-title mt-4">Adresse du Lieu de Travail</h4>
                    <div class="row mb-3 choice-container <?php $__errorArgs = ['loc_method_workplace'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <div class="col-6">
                            <input type="radio" name="loc_method_workplace" id="desc_workplace" value="description" <?php echo e(old('loc_method_workplace', 'description') == 'description' ? 'checked' : ''); ?> required>
                            <label for="desc_workplace" class="choice-label"><i class="fas fa-keyboard"></i> Décrire l'adresse</label>
                        </div>
                        <div class="col-6">
                            <input type="radio" name="loc_method_workplace" id="map_workplace" value="map" <?php echo e(old('loc_method_workplace') == 'map' ? 'checked' : ''); ?>>
                            <label for="map_workplace" class="choice-label"><i class="fas fa-map-marked-alt"></i> Sélectionner sur une carte</label>
                        </div>
                        <div class="invalid-feedback"><?php $__errorArgs = ['loc_method_workplace'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Veuillez choisir une méthode. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>
                    <div class="method-area" id="description-area-workplace">
                        <div class="input-group-custom">
                            <label class="form-label">Description détaillée du lieu de travail</label>
                            <textarea class="form-control <?php $__errorArgs = ['workplace_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="workplace_description" rows="4" placeholder="Indiquer ville, quartier, rue, repères..." <?php echo e(old('loc_method_workplace') == 'description' ? 'required' : ''); ?>><?php echo e(old('workplace_description')); ?></textarea>
                            <div class="invalid-feedback"><?php $__errorArgs = ['workplace_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis si vous choisissez de décrire l'adresse. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                    </div>
                    <div class="method-area" id="map-area-workplace">
                        <label class="form-label">Cliquez sur la carte ou déplacez le marqueur pour indiquer votre lieu de travail</label>
                        <div id="map-container-workplace" class="map-container"></div>
                        <input type="hidden" name="workplace_lat" id="latitude-workplace" value="<?php echo e(old('workplace_lat')); ?>" <?php echo e(old('loc_method_workplace') == 'map' ? 'required' : ''); ?>>
                        <input type="hidden" name="workplace_lng" id="longitude-workplace" value="<?php echo e(old('workplace_lng')); ?>" <?php echo e(old('loc_method_workplace') == 'map' ? 'required' : ''); ?>>
                        <div class="invalid-feedback"><?php $__errorArgs = ['workplace_lat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> Une position sur la carte est requise. <?php else: ?> Veuillez sélectionner un point sur la carte. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>
                    <div class="mt-3 col-12 mb-3">
                        <label class="form-label">Plan du lieu de travail (optionnel)</label>
                        <div class="file-upload-wrapper <?php $__errorArgs = ['workplace_plan_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <div class="file-upload-content">
                                <i class="fas fa-map-marked-alt file-upload-icon"></i>
                                <p class="file-upload-text">Importer un plan scanné (PDF ou image)</p>
                            </div>
                            <div class="file-upload-preview"></div>
                            <input type="file" name="workplace_plan_path" accept="image/*,application/pdf">
                            <div class="invalid-feedback"><?php $__errorArgs = ['workplace_plan_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Une erreur est survenue avec le fichier. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Étape 3: Profession -->
                <div class="form-step-content" data-step="3">
                    <h4 class="form-section-title">Informations Professionnelles</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Profession / Type d'activité</label>
                            <i class="icon fas fa-briefcase"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['occupation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="occupation" value="<?php echo e(old('occupation')); ?>" required>
                            <div class="invalid-feedback"><?php $__errorArgs = ['occupation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom de l'entreprise (si applicable)</label>
                            <i class="icon fas fa-building"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['company_name_activity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="company_name_activity" value="<?php echo e(old('company_name_activity')); ?>">
                            <div class="invalid-feedback"><?php $__errorArgs = ['company_name_activity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est optionnel. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-12 mb-3 input-group-custom">
                            <label class="form-label">Description de l'activité</label>
                            <i class="icon fas fa-info-circle"></i>
                            <textarea class="form-control <?php $__errorArgs = ['activity_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="activity_description" rows="3"><?php echo e(old('activity_description')); ?></textarea>
                            <div class="invalid-feedback"><?php $__errorArgs = ['activity_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est optionnel. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                    </div>
                    <h4 class="form-section-title mt-4">Personnes de Référence</h4>
                    <div id="references-container-physique">
                        <?php if(old('references')): ?>
                        <?php $__currentLoopData = old('references'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $reference): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                            <h5>Référence <?php echo e($index + 1); ?></h5>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms</label>
                                    <i class="icon fas fa-user-check"></i>
                                    <input type="text" class="form-control <?php $__errorArgs = [" references.$index.name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="references[<?php echo e($index); ?>][name]" value="<?php echo e($reference['name']); ?>" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ["references.$index.name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Téléphone</label>
                                    <i class="icon fas fa-phone"></i>
                                    <input type="tel" class="form-control <?php $__errorArgs = [" references.$index.phone"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="references[<?php echo e($index); ?>][phone]" value="<?php echo e($reference['phone']); ?>" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ["references.$index.phone"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Numéro de téléphone invalide. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                            <h5>Référence 1</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms</label>
                                    <i class="icon fas fa-user-check"></i>
                                    <input type="text" class="form-control <?php $__errorArgs = ['references.0.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="references[0][name]" value="<?php echo e(old('references.0.name')); ?>" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ['references.0.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Téléphone</label>
                                    <i class="icon fas fa-phone"></i>
                                    <input type="tel" class="form-control <?php $__errorArgs = ['references.0.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="references[0][phone]" value="<?php echo e(old('references.0.phone')); ?>" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ['references.0.phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Numéro de téléphone invalide. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <button type="button" class="btn btn-outline-primary mt-2 dynamic-adder-btn" data-container="references-container-physique" data-type="reference"><i class="fas fa-plus"></i> Ajouter une référence</button>
                </div>

                <!-- Étape 4: Documents -->
                <div class="form-step-content" data-step="4">
                    <h4 class="form-section-title">Documents d'Identification</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Type de pièce d'identité</label>
                            <i class="icon fas fa-id-card"></i>
                            <select class="form-control <?php $__errorArgs = ['id_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_type" style="padding-left: 50px;" required>
                                <option value="">Sélectionner...</option>
                                <option value="CNI" <?php echo e(old('id_type') == 'CNI' ? 'selected' : ''); ?>>Carte Nationale d'Identité</option>
                                <option value="Passeport" <?php echo e(old('id_type') == 'Passeport' ? 'selected' : ''); ?>>Passeport</option>
                                <option value="Carte de Résident" <?php echo e(old('id_type') == 'Carte de Résident' ? 'selected' : ''); ?>>Carte de Résident</option>
                            </select>
                            <div class="invalid-feedback"><?php $__errorArgs = ['id_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Numéro de la pièce</label>
                            <i class="icon fas fa-hashtag"></i>
                            <input type="text" class="form-control <?php $__errorArgs = ['id_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_number" value="<?php echo e(old('id_number')); ?>" required>
                            <div class="invalid-feedback"><?php $__errorArgs = ['id_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Date d'émission de la pièce (optionnel)</label>
                            <i class="icon fas fa-calendar-alt"></i>
                            <input type="date" class="form-control <?php $__errorArgs = ['id_issue_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="id_issue_date" value="<?php echo e(old('id_issue_date')); ?>">
                            <div class="invalid-feedback"><?php $__errorArgs = ['id_issue_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est optionnel. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Photo d’identité</label>
                            <div class="file-upload-wrapper <?php $__errorArgs = ['photo_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <div class="file-upload-content">
                                    <i class="fas fa-camera file-upload-icon"></i>
                                    <p class="file-upload-text">Choisir une photo (JPEG, PNG)</p>
                                </div>
                                <div class="file-upload-preview"></div>
                                <input type="file" name="photo_path" accept="image/jpeg,image/png" required>
                                <div class="invalid-feedback"><?php $__errorArgs = ['photo_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Une photo est requise. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Scan de la pièce d'identité</label>
                            <div class="file-upload-wrapper <?php $__errorArgs = ['id_scan_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <div class="file-upload-content">
                                    <i class="fas fa-file-pdf file-upload-icon"></i>
                                    <p class="file-upload-text">Choisir un fichier (PDF)</p>
                                </div>
                                <div class="file-upload-preview"></div>
                                <input type="file" name="id_scan_path" accept="application/pdf" required>
                                <div class="invalid-feedback"><?php $__errorArgs = ['id_scan_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Le scan (PDF) est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                            </div>
                        </div>
                    </div>
                    <h4 class="form-section-title mt-4">Bénéficiaires Désignés</h4>
                    <div id="beneficiaries-container-physique">
                        <?php if(old('beneficiaries')): ?>
                        <?php $__currentLoopData = old('beneficiaries'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $beneficiary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                            <h5>Bénéficiaire <?php echo e($index + 1); ?></h5>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms</label>
                                    <i class="icon fas fa-user"></i>
                                    <input type="text" class="form-control <?php $__errorArgs = [" beneficiaries.$index.nom"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="beneficiaries[<?php echo e($index); ?>][nom]" value="<?php echo e($beneficiary['nom']); ?>" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ["beneficiaries.$index.nom"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Lien / Relation</label>
                                    <i class="icon fas fa-users"></i>
                                    <input type="text" class="form-control <?php $__errorArgs = [" beneficiaries.$index.lien"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="beneficiaries[<?php echo e($index); ?>][lien]" value="<?php echo e($beneficiary['lien']); ?>" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ["beneficiaries.$index.lien"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Téléphone</label>
                                    <i class="icon fas fa-phone"></i>
                                    <input type="tel" class="form-control <?php $__errorArgs = [" beneficiaries.$index.contact"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="beneficiaries[<?php echo e($index); ?>][contact]" value="<?php echo e($beneficiary['contact']); ?>" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ["beneficiaries.$index.contact"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Numéro de téléphone invalide. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Date de naissance</label>
                                    <i class="icon fas fa-calendar-alt"></i>
                                    <input type="date" class="form-control <?php $__errorArgs = [" beneficiaries.$index.birth_date"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="beneficiaries[<?php echo e($index); ?>][birth_date]" value="<?php echo e($beneficiary['birth_date']); ?>">
                                    <div class="invalid-feedback"><?php $__errorArgs = ["beneficiaries.$index.birth_date"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est optionnel. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                            <h5>Bénéficiaire 1</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms</label>
                                    <i class="icon fas fa-user"></i>
                                    <input type="text" class="form-control <?php $__errorArgs = ['beneficiaries.0.nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="beneficiaries[0][nom]" value="<?php echo e(old('beneficiaries.0.nom')); ?>" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ['beneficiaries.0.nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Lien / Relation</label>
                                    <i class="icon fas fa-users"></i>
                                    <input type="text" class="form-control <?php $__errorArgs = ['beneficiaries.0.lien'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="beneficiaries[0][lien]" value="<?php echo e(old('beneficiaries.0.lien')); ?>" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ['beneficiaries.0.lien'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Téléphone</label>
                                    <i class="icon fas fa-phone"></i>
                                    <input type="tel" class="form-control <?php $__errorArgs = ['beneficiaries.0.contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="beneficiaries[0][contact]" value="<?php echo e(old('beneficiaries.0.contact')); ?>" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                                    <div class="invalid-feedback"><?php $__errorArgs = ['beneficiaries.0.contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Numéro de téléphone invalide. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Date de naissance</label>
                                    <i class="icon fas fa-calendar-alt"></i>
                                    <input type="date" class="form-control <?php $__errorArgs = ['beneficiaries.0.birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="beneficiaries[0][birth_date]" value="<?php echo e(old('beneficiaries.0.birth_date')); ?>">
                                    <div class="invalid-feedback"><?php $__errorArgs = ['beneficiaries.0.birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est optionnel. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <button type="button" class="btn btn-outline-primary mt-2 dynamic-adder-btn" data-container="beneficiaries-container-physique" data-type="beneficiaire"><i class="fas fa-plus"></i> Ajouter un bénéficiaire</button>

                    <!-- ==== BLOC SIGNATURE CORRIGÉ ==== -->
                    <h4 class="form-section-title mt-4">Signature</h4>

                    <div class="row choice-container <?php $__errorArgs = ['signature_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <div class="col-6">
                            <input type="radio" name="signature_method" id="draw_physique" value="draw" <?php echo e(old('signature_method', 'draw') == 'draw' ? 'checked' : ''); ?> required>
                            <label for="draw_physique" class="choice-label"><i class="fas fa-pencil-alt"></i> Dessiner</label>
                        </div>
                        <div class="col-6">
                            <input type="radio" name="signature_method" id="upload_physique" value="upload" <?php echo e(old('signature_method') == 'upload' ? 'checked' : ''); ?>>
                            <label for="upload_physique" class="choice-label"><i class="fas fa-upload"></i> Importer</label>
                        </div>
                        <div class="invalid-feedback" id="signature-method-error"><?php $__errorArgs = ['signature_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Une méthode de signature est requise. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>

                    <div class="method-area" id="draw-area-physique">
                        <p class="text-muted small">Signez dans le cadre ci-dessous.</p>
                        <canvas id="signature-pad" width="600" height="200"></canvas>
                        <div class="signature-controls">
                            <button type="button" class="btn-clear">Effacer</button>
                        </div>
                        <input type="hidden" name="signature_data" id="signature-data-physique" value="<?php echo e(old('signature_data')); ?>">
                        <div class="invalid-feedback" id="signature-draw-error-physique" style="display:none;">Veuillez dessiner une signature.</div>
                    </div>

                    <div class="method-area" id="upload-area-physique">
                        <div class="<?php $__errorArgs = ['signature_upload'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> file-upload-wrapper">
                            <div class="file-upload-content">
                                <i class="fas fa-file-image file-upload-icon"></i>
                                <p class="file-upload-text">Importer (PNG)</p>
                            </div>
                            <div class="file-upload-preview"></div>
                            <input type="file" name="signature_upload" accept="image/png" />
                            <div class="invalid-feedback"><?php $__errorArgs = ['signature_upload'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> L'import de la signature est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                        </div>
                    </div>
                    <!-- ==== FIN BLOC SIGNATURE CORRIGÉ ==== -->
                </div>

                <!-- Étape 5: Versements -->
                <div class="form-step-content" data-step="5">
                    <h4 class="form-section-title">Versements Initiaux</h4>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="input-group-custom mb-3">
                                <label class="form-label">Dépôt Initial (FCFA)</label>
                                <i class="icon fas fa-money-bill-wave"></i>
                                <input type="number" class="form-control <?php $__errorArgs = ['initial_deposit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="depot-initial-physique" name="initial_deposit" value="<?php echo e(old('initial_deposit', 0)); ?>" min="0" step="1000" required>
                                <div class="invalid-feedback"><?php $__errorArgs = ['initial_deposit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Ce champ est requis. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="versemants-summary">
                                <div class="row-item"><span class="label">Droit d'adhésion</span> <span class="value">2,000 FCFA</span></div>
                                <div class="row-item"><span class="label">Part Sociale</span> <span class="value">5,000 FCFA</span></div>
                                <div class="row-item total-row"><span class="total-label">TOTAL À VERSER</span> <span class="total-value" id="total-versement-physique">7,000 FCFA</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-navigation-buttons">
                    <button type="button" class="btn btn-nav btn-prev" style="display: none;">Précédent</button>
                    <button type="button" class="btn btn-nav btn-next">Suivant</button>
                    <button type="submit" class="btn btn-submit-form btn-next" style="display: none;">Soumettre l'adhésion</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.multi-step-form');
        forms.forEach(form => {
            const steps = form.querySelectorAll('.form-step-content');
            const stepperItems = form.querySelectorAll('.form-stepper .step');
            const progressLine = form.querySelector('.form-stepper .progress-line');
            const prevBtn = form.querySelector('.btn-prev');
            const nextBtn = form.querySelector('.btn-next');
            const submitBtn = form.querySelector('.btn-submit-form');
            let currentStep = 1;
            const maps = new Map();

            function updateProgress() {
                const progress = (currentStep / steps.length) * 100;
                progressLine.style.width = `${progress}%`;
                stepperItems.forEach((item, index) => {
                    item.classList.toggle('active', index + 1 <= currentStep);
                    if (index + 1 < currentStep) {
                        item.classList.add('completed');
                    } else {
                        item.classList.remove('completed');
                    }
                });
            }

            function showStep(step) {
                steps.forEach(s => s.classList.remove('active'));
                steps[step - 1].classList.add('active');
                prevBtn.style.display = step === 1 ? 'none' : 'inline-block';
                nextBtn.style.display = step === steps.length ? 'none' : 'inline-block';
                submitBtn.style.display = step === steps.length ? 'inline-block' : 'none';
                updateProgress();

                const mapContainers = steps[step - 1].querySelectorAll('.map-container');
                mapContainers.forEach(container => {
                    const mapId = container.id;
                    const mapObj = maps.get(mapId);
                    if (mapObj) {
                        setTimeout(() => mapObj.invalidate(), 100);
                    }
                });
            }

            function validateStep(step) {
                const currentStepContent = steps[step - 1];
                const requiredInputs = currentStepContent.querySelectorAll('input[required], select[required], textarea[required]');
                let isValid = true;

                requiredInputs.forEach(input => {
                    // Ne pas valider les champs de signature ici, ils ont leur propre logique
                    if (input.name.includes('signature')) return;

                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }

                    if (input.type === 'tel' && input.pattern) {
                        const regex = new RegExp(input.pattern);
                        if (!regex.test(input.value)) {
                            input.classList.add('is-invalid');
                            isValid = false;
                        }
                    }
                });

                // Validation pour loc_method_residence
                const locMethodResidence = currentStepContent.querySelector('input[name="loc_method_residence"]:checked');
                if (locMethodResidence) {
                    if (locMethodResidence.value === 'description') {
                        const descInput = currentStepContent.querySelector('textarea[name="residence_description"]');
                        if (descInput && !descInput.value.trim()) {
                            descInput.classList.add('is-invalid');
                            isValid = false;
                        }
                    } else if (locMethodResidence.value === 'map') {
                        const latInput = currentStepContent.querySelector('input[name="residence_lat"]');
                        const lngInput = currentStepContent.querySelector('input[name="residence_lng"]');
                        if (latInput && lngInput && (!latInput.value || !lngInput.value)) {
                            latInput.classList.add('is-invalid');
                            lngInput.classList.add('is-invalid');
                            isValid = false;
                        }
                    }
                } else if (step === 2 && currentStepContent.querySelector('input[name="loc_method_residence"]')) {
                    const choiceContainer = currentStepContent.querySelector('input[name="loc_method_residence"]').closest('.choice-container');
                    choiceContainer.classList.add('is-invalid');
                    isValid = false;
                }

                // Validation pour loc_method_workplace
                const locMethodWorkplace = currentStepContent.querySelector('input[name="loc_method_workplace"]:checked');
                if (locMethodWorkplace) {
                    if (locMethodWorkplace.value === 'description') {
                        const descInput = currentStepContent.querySelector('textarea[name="workplace_description"]');
                        if (descInput && !descInput.value.trim()) {
                            descInput.classList.add('is-invalid');
                            isValid = false;
                        }
                    } else if (locMethodWorkplace.value === 'map') {
                        const latInput = currentStepContent.querySelector('input[name="workplace_lat"]');
                        const lngInput = currentStepContent.querySelector('input[name="workplace_lng"]');
                        if (latInput && lngInput && (!latInput.value || !lngInput.value)) {
                            latInput.classList.add('is-invalid');
                            lngInput.classList.add('is-invalid');
                            isValid = false;
                        }
                    }
                } else if (step === 2 && currentStepContent.querySelector('input[name="loc_method_workplace"]')) {
                    const choiceContainer = currentStepContent.querySelector('input[name="loc_method_workplace"]').closest('.choice-container');
                    choiceContainer.classList.add('is-invalid');
                    isValid = false;
                }

                // ==== BLOC VALIDATION SIGNATURE CORRIGÉ ====
                const signatureMethod = currentStepContent.querySelector('input[name="signature_method"]:checked');
                if (signatureMethod) {
                    if (signatureMethod.value === 'draw') {
                        const canvas = currentStepContent.querySelector('#signature-pad');
                        const signaturePad = canvas.signaturePadInstance;
                        if (signaturePad && signaturePad.isEmpty()) {
                            currentStepContent.querySelector('#signature-draw-error-physique').style.display = 'block';
                            isValid = false;
                        } else {
                            currentStepContent.querySelector('#signature-draw-error-physique').style.display = 'none';
                        }
                    } else if (signatureMethod.value === 'upload') {
                        const signatureUpload = currentStepContent.querySelector('input[name="signature_upload"]');
                        if (!signatureUpload.files.length) {
                            signatureUpload.closest('.file-upload-wrapper').classList.add('is-invalid');
                            isValid = false;
                        } else {
                            signatureUpload.closest('.file-upload-wrapper').classList.remove('is-invalid');
                        }
                    }
                } else if (step === 4 && currentStepContent.querySelector('input[name="signature_method"]')) {
                    const choiceContainer = currentStepContent.querySelector('input[name="signature_method"]').closest('.choice-container');
                    choiceContainer.classList.add('is-invalid');
                    isValid = false;
                }
                // ==== FIN BLOC VALIDATION SIGNATURE CORRIGÉ ====


                // Validation pour références et bénéficiaires
                if (step === 3 || step === 4) {
                    const containerId = step === 3 ? 'references-container-physique' : 'beneficiaries-container-physique';
                    const container = currentStepContent.querySelector(`#${containerId}`);
                    if (container) {
                        const fields = container.querySelectorAll('.dynamic-field');
                        if (fields.length === 0) {
                            let errorDiv = container.querySelector('.invalid-feedback');
                            if (!errorDiv) {
                                errorDiv = document.createElement('div');
                                errorDiv.className = 'invalid-feedback';
                                container.appendChild(errorDiv);
                            }
                            errorDiv.style.display = 'block';
                            errorDiv.textContent = `Veuillez ajouter au moins une ${step === 3 ? 'référence' : 'bénéficiaire'}.`;
                            isValid = false;
                        } else {
                            const errorDiv = container.querySelector('.invalid-feedback');
                            if (errorDiv) errorDiv.remove();
                        }
                    }
                }

                if (!isValid) {
                    const firstInvalid = currentStepContent.querySelector('.is-invalid, .is-invalid .form-control');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }

                return isValid;
            }

            prevBtn.addEventListener('click', () => {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            nextBtn.addEventListener('click', () => {
                if (validateStep(currentStep) && currentStep < steps.length) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            const depotInput = form.querySelector('#depot-initial-physique');
            const totalSpan = form.querySelector('#total-versement-physique');
            if (depotInput && totalSpan) {
                const baseAmount = 7000;
                depotInput.addEventListener('input', () => {
                    const depot = parseFloat(depotInput.value) || 0;
                    totalSpan.textContent = `${(baseAmount + depot).toLocaleString('fr-FR')} FCFA`;
                });
            }

            form.querySelectorAll('.dynamic-adder-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const containerId = btn.dataset.container;
                    const type = btn.dataset.type;
                    const container = document.getElementById(containerId);
                    const index = container.querySelectorAll('.dynamic-field').length;
                    const template = type === 'beneficiaire' ? `
                    <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                        <h5>Bénéficiaire ${index + 1}</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3 input-group-custom">
                                <label class="form-label">Nom & Prénoms</label>
                                <i class="icon fas fa-user"></i>
                                <input type="text" class="form-control" name="beneficiaries[${index}][nom]" required>
                                <div class="invalid-feedback">Ce champ est requis.</div>
                            </div>
                            <div class="col-md-6 mb-3 input-group-custom">
                                <label class="form-label">Lien / Relation</label>
                                <i class="icon fas fa-users"></i>
                                <input type="text" class="form-control" name="beneficiaries[${index}][lien]" required>
                                <div class="invalid-feedback">Ce champ est requis.</div>
                            </div>
                            <div class="col-md-6 mb-3 input-group-custom">
                                <label class="form-label">Téléphone</label>
                                <i class="icon fas fa-phone"></i>
                                <input type="tel" class="form-control" name="beneficiaries[${index}][contact]" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                                <div class="invalid-feedback">Numéro de téléphone invalide.</div>
                            </div>
                            <div class="col-md-6 mb-3 input-group-custom">
                                <label class="form-label">Date de naissance</label>
                                <i class="icon fas fa-calendar-alt"></i>
                                <input type="date" class="form-control" name="beneficiaries[${index}][birth_date]">
                                <div class="invalid-feedback">Ce champ est optionnel.</div>
                            </div>
                        </div>
                    </div>` : `
                    <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                        <h5>Référence ${index + 1}</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3 input-group-custom">
                                <label class="form-label">Nom & Prénoms</label>
                                <i class="icon fas fa-user-check"></i>
                                <input type="text" class="form-control" name="references[${index}][name]" required>
                                <div class="invalid-feedback">Ce champ est requis.</div>
                            </div>
                            <div class="col-md-6 mb-3 input-group-custom">
                                <label class="form-label">Téléphone</label>
                                <i class="icon fas fa-phone"></i>
                                <input type="tel" class="form-control" name="references[${index}][phone]" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                                <div class="invalid-feedback">Numéro de téléphone invalide.</div>
                            </div>
                        </div>
                    </div>`;
                    container.insertAdjacentHTML('beforeend', template);
                    const errorDiv = container.querySelector('.invalid-feedback');
                    if (errorDiv) errorDiv.remove();
                    container.querySelectorAll('.remove-field').forEach(removeBtn => {
                        removeBtn.addEventListener('click', () => removeBtn.closest('.dynamic-field').remove());
                    });
                });
            });

            form.querySelectorAll('input[type="file"]').forEach(input => {
                input.addEventListener('change', () => {
                    const wrapper = input.closest('.file-upload-wrapper');
                    const preview = wrapper.querySelector('.file-upload-preview');
                    const file = input.files[0];
                    if (file) {
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                preview.innerHTML = `<img src="${e.target.result}" alt="Aperçu">`;
                            };
                            reader.readAsDataURL(file);
                        } else {
                            preview.innerHTML = `<span>${file.name}</span>`;
                        }
                        wrapper.classList.remove('is-invalid');
                    } else {
                        preview.innerHTML = '';
                        wrapper.classList.toggle('is-invalid', input.hasAttribute('required'));
                    }
                });
            });

            const locRadiosResidence = form.querySelectorAll('input[name="loc_method_residence"]');
            locRadiosResidence.forEach(radio => {
                radio.addEventListener('change', () => {
                    const descArea = form.querySelector('#description-area-physique');
                    const mapArea = form.querySelector('#map-area-physique');
                    const descInput = descArea.querySelector('textarea[name="residence_description"]');
                    const latInput = mapArea.querySelector('input[name="residence_lat"]');
                    const lngInput = mapArea.querySelector('input[name="residence_lng"]');

                    descArea.style.display = radio.value === 'description' ? 'block' : 'none';
                    mapArea.style.display = radio.value === 'map' ? 'block' : 'none';
                    descInput.toggleAttribute('required', radio.value === 'description');
                    latInput.toggleAttribute('required', radio.value === 'map');
                    lngInput.toggleAttribute('required', radio.value === 'map');

                    if (radio.value === 'map') {
                        const mapObj = maps.get('map-container-physique');
                        if (mapObj) {
                            setTimeout(() => mapObj.invalidate(), 100);
                        }
                    }
                });
                if (radio.checked) radio.dispatchEvent(new Event('change'));
            });

            const locRadiosWorkplace = form.querySelectorAll('input[name="loc_method_workplace"]');
            locRadiosWorkplace.forEach(radio => {
                radio.addEventListener('change', () => {
                    const descArea = form.querySelector('#description-area-workplace');
                    const mapArea = form.querySelector('#map-area-workplace');
                    const descInput = descArea.querySelector('textarea[name="workplace_description"]');
                    const latInput = mapArea.querySelector('input[name="workplace_lat"]');
                    const lngInput = mapArea.querySelector('input[name="workplace_lng"]');

                    descArea.style.display = radio.value === 'description' ? 'block' : 'none';
                    mapArea.style.display = radio.value === 'map' ? 'block' : 'none';
                    descInput.toggleAttribute('required', radio.value === 'description');
                    latInput.toggleAttribute('required', radio.value === 'map');
                    lngInput.toggleAttribute('required', radio.value === 'map');

                    if (radio.value === 'map') {
                        const mapObj = maps.get('map-container-workplace');
                        if (mapObj) {
                            setTimeout(() => mapObj.invalidate(), 100);
                        }
                    }
                });
                if (radio.checked) radio.dispatchEvent(new Event('change'));
            });

            function initializeLeafletMap(mapId, latInputId, lonInputId) {
                const mapContainer = document.getElementById(mapId);
                if (!mapContainer) return null;

                const latInput = document.getElementById(latInputId);
                const lonInput = document.getElementById(lonInputId);
                const fallbackCoords = [6.1375, 1.2226];
                let map;
                let marker;

                const setupMap = (coords) => {
                    if (map) {
                        map.setView(coords, 14);
                        marker.setLatLng(coords);
                        updateInputs(coords);
                        return;
                    }

                    map = L.map(mapId).setView(coords, 14);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

                    marker = L.marker(coords, {
                        draggable: true
                    }).addTo(map);
                    updateInputs(marker.getLatLng());

                    marker.on('dragend', (event) => updateInputs(event.target.getLatLng()));
                    map.on('click', (e) => {
                        marker.setLatLng(e.latlng);
                        updateInputs(e.latlng);
                    });
                };

                const updateInputs = (latlng) => {
                    latInput.value = latlng.lat.toFixed(6);
                    lonInput.value = latlng.lng.toFixed(6);
                };

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => setupMap([position.coords.latitude, position.coords.longitude]),
                        () => setupMap(fallbackCoords)
                    );
                } else {
                    setupMap(fallbackCoords);
                }

                return {
                    invalidate: () => {
                        if (map) map.invalidateSize();
                    }
                };
            }

            maps.set('map-container-physique', initializeLeafletMap('map-container-physique', 'latitude-physique', 'longitude-physique'));
            maps.set('map-container-workplace', initializeLeafletMap('map-container-workplace', 'latitude-workplace', 'longitude-workplace'));

            // ==== FONCTIONS SIGNATURE CORRIGÉES (SANS formType) ====
            function setupSignatureChoice() {
                const radioButtons = form.querySelectorAll('input[name="signature_method"]');
                if (!radioButtons.length) return;

                const drawArea = form.querySelector('#draw-area-physique');
                const uploadArea = form.querySelector('#upload-area-physique');
                const canvas = form.querySelector('#signature-pad');
                const uploadInput = form.querySelector('input[name="signature_upload"]');
                let signaturePadInstance = null;

                function updateSignatureArea() {
                    const selectedValue = form.querySelector('input[name="signature_method"]:checked')?.value;
                    if (!selectedValue) return;

                    drawArea.style.display = selectedValue === 'draw' ? 'block' : 'none';
                    uploadArea.style.display = selectedValue === 'upload' ? 'block' : 'none';
                    uploadInput.toggleAttribute('required', selectedValue === 'upload');

                    if (selectedValue === 'draw' && !signaturePadInstance) {
                        signaturePadInstance = initializeSignaturePad(canvas);
                    }
                }

                radioButtons.forEach(radio => radio.addEventListener('change', updateSignatureArea));
                updateSignatureArea(); // Lancer au chargement
            }

            function initializeSignaturePad(canvas) {
                if (!canvas) return null;

                const hiddenInput = form.querySelector('#signature-data-physique');
                const clearBtn = form.querySelector('#draw-area-physique .btn-clear');
                let signaturePad = null;

                const resizeCanvas = () => {
                    const ratio = Math.max(window.devicePixelRatio || 1, 1);
                    const parentWidth = canvas.parentElement.offsetWidth;

                    if (parentWidth > 0) {
                        canvas.width = parentWidth * ratio;
                        canvas.height = (canvas.offsetHeight || 200) * ratio;
                        canvas.getContext('2d').scale(ratio, ratio);

                        const data = signaturePad ? signaturePad.toData() : [];

                        signaturePad = new SignaturePad(canvas, {
                            backgroundColor: 'rgb(255, 255, 255)',
                            penColor: 'rgb(0, 0, 0)'
                        });
                        canvas.signaturePadInstance = signaturePad;
                        signaturePad.fromData(data);

                        signaturePad.addEventListener('endStroke', () => {
                            if (!signaturePad.isEmpty()) {
                                hiddenInput.value = signaturePad.toDataURL('image/png');
                                form.querySelector('#signature-draw-error-physique').style.display = 'none';
                            } else {
                                hiddenInput.value = '';
                            }
                        });
                    }
                };

                const resizeObserver = new ResizeObserver(resizeCanvas);
                resizeObserver.observe(canvas.parentElement);

                // Exécute une fois pour l'initialisation
                resizeCanvas();

                clearBtn.addEventListener('click', () => {
                    if (signaturePad) {
                        signaturePad.clear();
                    }
                    hiddenInput.value = '';
                    form.querySelector('#signature-draw-error-physique').style.display = 'none';
                });

                return signaturePad;
            }

            setupSignatureChoice();
            // ==== FIN FONCTIONS SIGNATURE CORRIGÉES ====


            showStep(currentStep);
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/main/account/physic.blade.php ENDPATH**/ ?>