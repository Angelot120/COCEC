

<?php $__env->startSection('css'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .complaint-page {
        background-color: #f7f8fc;
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
    }

    .hero-section {
        background: linear-gradient(135deg, #EC281C 0%, #d4241a 100%);
        color: white;
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .hero-content h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .hero-content p {
        font-size: 1.2rem;
        opacity: 0.95;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .form-container {
        max-width: 900px;
        margin: -50px auto 0;
        background: #FFFFFF;
        border-radius: 20px;
        padding: 50px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        border-top: 5px solid #EC281C;
        position: relative;
        z-index: 10;
    }

    .section-heading {
        text-align: center;
        margin-bottom: 40px;
    }

    .section-heading h2 {
        font-weight: 700;
        color: #000000;
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .section-heading p {
        color: #555;
        line-height: 1.7;
        font-size: 1.1rem;
    }

    .form-section {
        margin-bottom: 40px;
        padding: 30px;
        background: #f8f9fa;
        border-radius: 15px;
        border-left: 4px solid #EC281C;
    }

    .form-section-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 25px;
        color: #333;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-section-title i {
        color: #EC281C;
        font-size: 1.2rem;
    }

    .input-group-custom {
        position: relative;
        margin-bottom: 20px;
    }

    .input-group-custom .form-label {
        font-weight: 500;
        color: #343a40;
        margin-bottom: 8px;
        display: block;
    }

    .input-group-custom .form-control,
    .input-group-custom .form-select {
        width: 100%;
        padding: 15px 20px;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
        cursor: pointer;
        pointer-events: auto;
        z-index: 1;
        position: relative;
    }
    
    .input-group-custom .form-select {
        cursor: pointer;
        pointer-events: auto;
        z-index: 10;
        position: relative;
    }
    
    .input-group-custom .form-select:focus {
        z-index: 100;
    }

    .input-group-custom .form-control:focus,
    .input-group-custom .form-select:focus {
        border-color: #EC281C;
        box-shadow: 0 0 0 0.2rem rgba(236, 40, 28, 0.25);
        outline: none;
        z-index: 100;
    }
    
    /* Correction spécifique pour le select */
    .form-select {
        cursor: pointer !important;
        pointer-events: auto !important;
        z-index: 10 !important;
        position: relative !important;
    }
    
    .form-select:focus {
        z-index: 100 !important;
    }
    
    .form-select option {
        background: white;
        color: #333;
        padding: 10px;
    }

    .input-group-custom textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-check {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 20px;
        background: white;
        border-radius: 10px;
        border: 1px solid #e9ecef;
    }

    .form-check-input {
        width: 20px;
        height: 20px;
        margin-top: 2px;
        accent-color: #EC281C;
        filter: hue-rotate(0deg) saturate(100%) brightness(100%);
    }
    
    .form-check-input:checked {
        background-color: #EC281C !important;
        border-color: #EC281C !important;
    }
    
    .form-check-input:focus {
        border-color: #EC281C !important;
        box-shadow: 0 0 0 0.2rem rgba(236, 40, 28, 0.25) !important;
    }

    .form-check-label {
        color: #555;
        line-height: 1.6;
        font-size: 0.95rem;
    }

    .file-upload-area {
        border: 2px dashed #e9ecef;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        background: #f8f9fa;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-upload-area:hover {
        border-color: #EC281C;
        background: #fff5f5;
    }

    .file-upload-area i {
        font-size: 2rem;
        color: #EC281C;
        margin-bottom: 15px;
    }

    .file-upload-text {
        color: #666;
        margin-bottom: 10px;
    }

    .file-upload-info {
        font-size: 0.9rem;
        color: #999;
    }

    .btn-submit {
        background: linear-gradient(135deg, #EC281C, #d4241a);
        color: white;
        border: none;
        padding: 18px 40px;
        font-size: 1.1rem;
        font-weight: 700;
        border-radius: 8px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(236, 40, 28, 0.3);
        position: relative;
        overflow: hidden;
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-submit:hover::before {
        left: 100%;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(236, 40, 28, 0.4);
    }

    .btn-submit i {
        margin-right: 10px;
    }

    .commitment-box {
        background: linear-gradient(135deg, #EC281C, #d4241a);
        color: white;
        padding: 30px;
        border-radius: 15px;
        text-align: center;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
    }

    .commitment-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .commitment-box h4 {
        color: white;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
    }

    .commitment-box p {
        color: white;
        opacity: 0.95;
        line-height: 1.6;
        position: relative;
        z-index: 2;
        margin: 0;
    }

    .contact-info {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        margin-bottom: 30px;
        border: 1px solid #e9ecef;
    }

    .contact-info h5 {
        color: #333;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .contact-info .phone-number {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: white;
        padding: 15px 25px;
        border-radius: 25px;
        border: 1px solid #EC281C;
        color: #EC281C;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .contact-info .phone-number i {
        font-size: 1.2rem;
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2.5rem;
        }
        
        .form-container {
            margin: -30px 20px 0;
            padding: 30px 25px;
        }
        
        .form-section {
            padding: 20px;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="complaint-page">
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.popup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container-2">
            <div class="hero-content">
                <h1>Gestion des Plaintes</h1>
                <p>Votre satisfaction est notre priorité. Nous sommes là pour vous écouter et résoudre vos préoccupations dans les meilleurs délais.</p>
            </div>
        </div>
    </section>

    <!-- Formulaire Section -->
    <section class="py-120">
        <div class="container-2">
            <div class="form-container">
                
                <!-- En-tête -->
                <div class="section-heading">
                    <h2>Déposer une Plainte</h2>
                    <p>Remplissez ce formulaire sécurisé pour nous informer de votre préoccupation</p>
                </div>

                <!-- Notre engagement -->
                <div class="commitment-box">
                    <h4><i class="fa-solid fa-heart"></i> Notre Engagement</h4>
                    <p>Vous offrir une écoute attentive, un suivi transparent et une réponse adaptée à votre situation dans les plus brefs délais.</p>
                </div>

                <!-- Informations de contact -->
                <div class="contact-info">
                    <h5><i class="fa-solid fa-phone"></i> Besoin d'aide ?</h5>
                    <div class="phone-number">
                        <i class="fa-solid fa-headset"></i>
                        <span>Numéro Vert : <strong>8080</strong></span>
                    </div>
                </div>

                <!-- Formulaire -->
                <form class="complaint-form" id="complaintForm" action="<?php echo e(route('complaint.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Identification -->
                    <div class="form-section">
                        <h5 class="form-section-title">
                            <i class="fa-solid fa-user-circle"></i>Identification du membre
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group-custom">
                                    <label for="member_name" class="form-label">Nom complet *</label>
                                    <input type="text" class="form-control" id="member_name" name="member_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group-custom">
                                    <label for="member_number" class="form-label">Numéro d'adhérent *</label>
                                    <input type="text" class="form-control" id="member_number" name="member_number" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group-custom">
                                    <label for="member_phone" class="form-label">Téléphone *</label>
                                    <input type="tel" class="form-control" id="member_phone" name="member_phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group-custom">
                                    <label for="member_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="member_email" name="member_email">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Détails de la plainte -->
                    <div class="form-section">
                        <h5 class="form-section-title">
                            <i class="fa-solid fa-exclamation-triangle"></i>Détails de la plainte
                        </h5>
                        <div class="input-group-custom">
                            <label for="complaint_subject" class="form-label">Objet de la plainte *</label>
                            <input type="text" class="form-control" id="complaint_subject" name="complaint_subject" required 
                                   placeholder="Ex: Problème avec un service, Retard dans le traitement...">
                        </div>
                        <div class="input-group-custom">
                            <label for="complaint_category" class="form-label">Catégorie *</label>
                            <select class="form-select" id="complaint_category" name="complaint_category" required>
                                <option value="">Sélectionnez une catégorie</option>
                                <option value="service">Service client</option>
                                <option value="credit">Crédit</option>
                                <option value="epargne">Épargne</option>
                                <option value="technique">Problème technique</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                        <div class="input-group-custom">
                            <label for="complaint_description" class="form-label">Description détaillée *</label>
                            <textarea class="form-control" id="complaint_description" name="complaint_description" rows="5" required 
                                      placeholder="Décrivez en détail le problème rencontré, les circonstances, les personnes impliquées..."></textarea>
                        </div>
                    </div>

                    <!-- Pièces jointes et consentement -->
                    <div class="form-section">
                        <h5 class="form-section-title">
                            <i class="fa-solid fa-paperclip"></i>Pièces jointes et consentement
                        </h5>
                        <div class="input-group-custom">
                            <label for="complaint_attachments" class="form-label">Photos et documents (optionnel)</label>
                            <div class="file-upload-area" onclick="document.getElementById('complaint_attachments').click()">
                                <i class="fa-solid fa-cloud-upload-alt"></i>
                                <div class="file-upload-text">Cliquez pour sélectionner des fichiers</div>
                                <div class="file-upload-info">Formats acceptés : JPG, PNG, PDF, DOC, DOCX. Taille max : 5MB par fichier.</div>
                            </div>
                            <input type="file" class="form-control" id="complaint_attachments" name="complaint_attachments[]" multiple 
                                   accept="image/*,.pdf,.doc,.docx" style="display: none;">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="data_consent" name="data_consent" required>
                            <label class="form-check-label" for="data_consent">
                                J'accepte que mes données personnelles soient traitées par la COCEC dans le cadre du traitement de ma plainte, conformément à notre politique de confidentialité. *
                            </label>
                        </div>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="text-center">
                        <button type="submit" class="btn-submit">
                            <i class="fa-solid fa-paper-plane"></i>Déposer ma plainte
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php echo $__env->make('includes.main.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>

<!-- Script pour la gestion du formulaire avec SweetAlert -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const complaintForm = document.getElementById('complaintForm');
    
    // Gestion de la soumission du formulaire
    if (complaintForm) {
        complaintForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validation du formulaire
            if (!validateForm()) {
                return;
            }
            
            // Afficher le loader
            Swal.fire({
                title: 'Envoi en cours...',
                text: 'Votre plainte est en cours de transmission',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Envoyer le formulaire via AJAX
            const formData = new FormData(complaintForm);
            
            fetch(complaintForm.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Plainte déposée avec succès !',
                        text: data.message,
                        confirmButtonText: 'Parfait',
                        confirmButtonColor: '#EC281C'
                    }).then((result) => {
                        // Réinitialiser le formulaire
                        complaintForm.reset();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur lors de la soumission',
                        text: 'Veuillez vérifier les informations saisies et réessayer.',
                        confirmButtonText: 'Compris',
                        confirmButtonColor: '#EC281C'
                    });
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur de connexion',
                    text: 'Une erreur est survenue lors de la transmission. Veuillez réessayer.',
                    confirmButtonText: 'Compris',
                    confirmButtonColor: '#EC281C'
                });
            });
        });
    }
    
    function validateForm() {
        const requiredFields = complaintForm.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
                
                // Afficher l'erreur avec SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Champ obligatoire manquant',
                    text: `Le champ "${field.previousElementSibling.textContent.replace('*', '').trim()}" est obligatoire.`,
                    confirmButtonText: 'Compris',
                    confirmButtonColor: '#EC281C'
                });
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        return isValid;
    }
    
    // Validation en temps réel
    const inputs = complaintForm.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
        
        input.addEventListener('input', function() {
            if (this.classList.contains('is-invalid') && this.value.trim()) {
                this.classList.remove('is-invalid');
            }
        });
    });
    
    // Gestion des fichiers
    const fileInput = document.getElementById('complaint_attachments');
    const fileUploadArea = document.querySelector('.file-upload-area');
    
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                fileUploadArea.innerHTML = `
                    <i class="fa-solid fa-check-circle"></i>
                    <div class="file-upload-text">${this.files.length} fichier(s) sélectionné(s)</div>
                    <div class="file-upload-info">Cliquez pour changer</div>
                `;
                fileUploadArea.style.borderColor = '#EC281C';
                fileUploadArea.style.background = '#fff5f5';
            }
        });
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/main/complaint.blade.php ENDPATH**/ ?>