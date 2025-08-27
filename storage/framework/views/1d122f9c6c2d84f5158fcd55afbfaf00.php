<?php $__env->startSection('css'); ?>
<style>
    :root {
        --primary-color: #EC281C;
        --secondary-color: #ffcc00;
        --dark-charcoal: #1A202C;
        --text-color: #4A5568;
        --light-gray-bg: #F7FAFC;
        --border-color: #E2E8F0;
        --font-family: 'Poppins', sans-serif;
    }

    .update-form-container {
        min-height: 100vh;
        padding: 60px 0;
        background-color: var(--light-gray-bg);
    }

    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        max-width: 900px;
        margin: 0 auto;
        border: 1px solid var(--border-color);
        border-top: 5px solid var(--primary-color);
    }

    .form-header {
        background: white;
        color: var(--dark-charcoal);
        padding: 40px 30px 20px;
        text-align: center;
        border-bottom: 1px solid var(--border-color);
    }

    .form-header h1 {
        margin: 0;
        font-size: 2rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--dark-charcoal);
    }
    
    .form-header h1::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: var(--primary-color);
        margin: 15px auto 0;
        border-radius: 2px;
    }

    .form-header .subtitle {
        margin: 15px 0 0 0;
        font-size: 1.1rem;
        color: var(--text-color);
    }

    .form-body {
        padding: 40px;
    }

    .form-section {
        margin-bottom: 40px;
        padding: 30px;
        background: var(--light-gray-bg);
        border-radius: 15px;
        border: 1px solid var(--border-color);
    }

    .section-title {
        color: var(--dark-charcoal);
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--border-color);
        display: flex;
        align-items: center;
    }
    
    .section-title::before {
        font-family: "Font Awesome 6 Pro";
        font-weight: 900;
        margin-right: 15px;
        color: var(--primary-color);
        font-size: 1.3rem;
    }

    .form-section:nth-of-type(1) .section-title::before { content: '\f2bb'; }
    .form-section:nth-of-type(2) .section-title::before { content: '\f879'; }
    .form-section:nth-of-type(3) .section-title::before { content: '\f68d'; }
    .form-section:nth-of-type(4) .section-title::before { content: '\f0e5'; }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    .form-group.full-width { grid-column: 1 / -1; }
    .form-group { margin-bottom: 0; }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-color);
        font-weight: 600;
        font-size: 0.95rem;
    }

    .form-input, .form-select {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid var(--border-color);
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
        height: 50px;
    }

    textarea.form-input {
        height: auto;
        min-height: 120px;
        padding-top: 12px;
    }

    .form-input:focus, .form-select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(236, 40, 28, 0.15);
    }

    .form-input.error, .form-select.error {
        border-color: #e53e3e;
        box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.15);
    }

    .error-message {
        color: #e53e3e;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
        font-weight: 500;
    }

    .services-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .service-category {
        background: white;
        padding: 20px;
        border-radius: 12px;
        border: 1px solid var(--border-color);
    }

    .service-category h4 {
        color: var(--dark-charcoal);
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 15px;
        text-align: center;
        border-bottom: 1px solid var(--border-color);
        padding-bottom: 10px;
    }
    
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }
    .checkbox-group:not(:last-child){ margin-bottom: 5px; }
    .checkbox-group:hover { background-color: #f8fafc; }

    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: var(--primary-color);
        cursor: pointer;
        flex-shrink: 0;
    }
    .checkbox-group label {
        color: var(--text-color);
        font-weight: 500;
        cursor: pointer;
        margin: 0;
        flex: 1;
    }

    /* === CORRECTION DU BOUTON DE SOUMISSION === */
    .submit-btn {
        position: relative; /* Contexte pour le positionnement absolu */
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 15px 40px;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 20px;
        min-height: 60px;
        overflow: hidden; /* Empêche tout débordement */
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(236, 40, 28, 0.3);
    }

    .submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }

    .submit-btn .btn-text,
    .submit-btn .btn-loading {
        transition: opacity 0.2s ease;
    }

    .submit-btn .btn-loading {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        opacity: 0;
        visibility: hidden;
    }
    
    /* Gère l'état de chargement */
    .submit-btn.loading .btn-text {
        opacity: 0;
        visibility: hidden;
    }
    .submit-btn.loading .btn-loading {
        opacity: 1;
        visibility: visible;
    }
    .submit-btn.loading {
        cursor: wait;
    }

    @media (max-width: 768px) {
        .form-row, .services-grid { grid-template-columns: 1fr; }
        .form-body { padding: 25px; }
        .form-header h1 { font-size: 1.5rem; }
        .form-header .subtitle { font-size: 1rem; }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="page-header-pro">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Mise à Jour et Souscription</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('main.finance')); ?>">Finance Digitale</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Formulaire</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="update-form-container">
        <div class="container">
            <div class="form-card">
                <div class="form-header">
                    <h1>Services Financiers Digitaux</h1>
                    <p class="subtitle">Remplissez ce formulaire pour mettre à jour vos informations et souscrire à nos services</p>
                </div>

                <div class="form-body">
                    <form id="digital-finance-form" action="<?php echo e(route('digitalfinance.updates.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-section">
                            <h3 class="section-title">Informations Client</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="account_number" class="form-label">N° Compte *</label>
                                    <input type="text" id="account_number" name="account_number" class="form-input" value="<?php echo e(old('account_number')); ?>" placeholder="Ex: 0123456789" required>
                                </div>
                                <div class="form-group">
                                    <label for="full_name" class="form-label">Nom et Prénom(s) *</label>
                                    <input type="text" id="full_name" name="full_name" class="form-input" value="<?php echo e(old('full_name')); ?>" placeholder="Votre nom complet" required>
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group">
                                    <label for="cni_type" class="form-label">Type de Pièce d'Identité *</label>
                                    <select id="cni_type" name="cni_type" class="form-select" required>
                                        <option value="" disabled selected>Sélectionnez le type</option>
                                        <option value="CNI" <?php echo e(old('cni_type') == 'CNI' ? 'selected' : ''); ?>>Carte Nationale d'Identité (CNI)</option>
                                        <option value="Passeport" <?php echo e(old('cni_type') == 'Passeport' ? 'selected' : ''); ?>>Passeport</option>
                                        <option value="Permis de conduire" <?php echo e(old('cni_type') == 'Permis de conduire' ? 'selected' : ''); ?>>Permis de conduire</option>
                                        <option value="Autre" <?php echo e(old('cni_type') == 'Autre' ? 'selected' : ''); ?>>Autre</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cni_number" class="form-label">N° de la Pièce *</label>
                                    <input type="text" id="cni_number" name="cni_number" class="form-input" value="<?php echo e(old('cni_number')); ?>" placeholder="Numéro de la pièce d'identité" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">Contacts à Mettre à Jour</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="togocel" class="form-label">Numéro Togocel</label>
                                    <input type="tel" id="togocel" name="togocel" class="form-input" value="<?php echo e(old('togocel')); ?>" placeholder="Ex: 90000000">
                                </div>
                                <div class="form-group">
                                    <label for="tmoney" class="form-label">Numéro T-Money</label>
                                    <input type="tel" id="tmoney" name="tmoney" class="form-input" value="<?php echo e(old('tmoney')); ?>" placeholder="Si différent du numéro Togocel">
                                </div>
                            </div>
                            <div class="form-row">
                                 <div class="form-group">
                                    <label for="moov" class="form-label">Numéro Moov</label>
                                    <input type="tel" id="moov" name="moov" class="form-input" value="<?php echo e(old('moov')); ?>" placeholder="Ex: 96000000">
                                </div>
                                <div class="form-group">
                                    <label for="flooz" class="form-label">Numéro Flooz</label>
                                    <input type="tel" id="flooz" name="flooz" class="form-input" value="<?php echo e(old('flooz')); ?>" placeholder="Si différent du numéro Moov">
                                </div>
                            </div>
                             <div class="form-row">
                                <div class="form-group">
                                    <label for="whatsapp_togocel" class="form-label">WhatsApp (Togocel)</label>
                                    <input type="tel" id="whatsapp_togocel" name="whatsapp_togocel" class="form-input" value="<?php echo e(old('whatsapp_togocel')); ?>" placeholder="Votre numéro WhatsApp">
                                </div>
                                 <div class="form-group">
                                    <label for="email" class="form-label">Adresse Email</label>
                                    <input type="email" id="email" name="email" class="form-input" value="<?php echo e(old('email')); ?>" placeholder="Ex: votre.email@domaine.com">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">Souscription aux Services</h3>
                            <div class="services-grid">
                                <div class="service-category">
                                    <h4>Mobile Banking</h4>
                                    <div class="checkbox-group"><input type="checkbox" id="mobile_banking_togocel" name="services[mobile_banking_togocel]"><label for="mobile_banking_togocel">TOGOCEL</label></div>
                                    <div class="checkbox-group"><input type="checkbox" id="mobile_banking_moov" name="services[mobile_banking_moov]"><label for="mobile_banking_moov">MOOV</label></div>
                                </div>
                                <div class="service-category">
                                    <h4>Mobile Money</h4>
                                    <div class="checkbox-group"><input type="checkbox" id="mobile_money_togocel" name="services[mobile_money_togocel]"><label for="mobile_money_togocel">TOGOCEL</label></div>
                                    <div class="checkbox-group"><input type="checkbox" id="mobile_money_moov" name="services[mobile_money_moov]"><label for="mobile_money_moov">MOOV</label></div>
                                </div>
                                <div class="service-category">
                                    <h4>Web Banking</h4>
                                    <div class="checkbox-group"><input type="checkbox" id="web_banking" name="services[web_banking]"><label for="web_banking">Activer Web Banking</label></div>
                                </div>
                                <div class="service-category">
                                    <h4>SMS Banking (Bonus)</h4>
                                    <div class="checkbox-group"><input type="checkbox" id="sms_banking_togocel" name="services[sms_banking_togocel]"><label for="sms_banking_togocel">TOGOCEL</label></div>
                                    <div class="checkbox-group"><input type="checkbox" id="sms_banking_moov" name="services[sms_banking_moov]"><label for="sms_banking_moov">MOOV</label></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="section-title">Notes Additionnelles</h3>
                            <div class="form-group full-width">
                                <label for="notes" class="form-label">Commentaires ou observations</label>
                                <textarea id="notes" name="notes" class="form-input" rows="5" placeholder="Ajoutez ici vos commentaires ou observations..."><?php echo e(old('notes')); ?></textarea>
                            </div>
                        </div>

                        <button type="submit" class="submit-btn" id="submit-btn">
                            <span class="btn-text">Envoyer ma demande</span>
                            <span class="btn-loading">
                                <i class="fas fa-spinner fa-spin"></i> Envoi en cours...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('includes.main.scroll', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('digital-finance-form');
    const submitBtn = document.getElementById('submit-btn');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            submitBtn.disabled = true;
            submitBtn.classList.add('loading');

            document.querySelectorAll('.error-message').forEach(el => el.remove());
            document.querySelectorAll('.form-input, .form-select').forEach(el => el.classList.remove('error'));

            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json().then(data => ({ status: response.status, body: data })))
            .then(({ status, body }) => {
                if (status === 200 || status === 201) {
                    Swal.fire({
                        icon: "success",
                        title: "Demande Envoyée !",
                        text: "Votre formulaire a été soumis avec succès. Nous vous contacterons bientôt.",
                        confirmButtonColor: "#EC281C",
                    }).then(() => {
                        form.reset();
                    });
                } else if (status === 422) {
                    Object.keys(body.errors).forEach(field => {
                        const input = document.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('error');
                            const errorSpan = document.createElement('span');
                            errorSpan.className = 'error-message';
                            errorSpan.textContent = body.errors[field][0];
                            input.closest('.form-group').appendChild(errorSpan);
                        }
                    });
                    Swal.fire({
                        icon: "warning",
                        title: "Erreurs de validation",
                        text: "Veuillez corriger les champs en rouge.",
                        confirmButtonColor: "#EC281C",
                    });
                } else {
                    throw new Error(body.message || 'Une erreur inattendue est survenue.');
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: "error",
                    title: "Oups...",
                    text: "Une erreur de communication est survenue. Veuillez réessayer plus tard.",
                    confirmButtonColor: "#EC281C",
                });
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.classList.remove('loading');
            });
        });
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/main/digitalfinance/updatesheet.blade.php ENDPATH**/ ?>