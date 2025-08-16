@extends('layout.main')

@section('css')
<style>
    .update-form-container {
        min-height: 100vh;
        padding: 40px 0;
    }

    .form-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 900px;
        margin: 0 auto;
    }

    .form-header {
        background: linear-gradient(135deg, #EC281C 0%, #c53030 100%);
        color: white;
        padding: 30px;
        text-align: center;
    }

    .form-header h1 {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-header .subtitle {
        margin: 10px 0 0 0;
        font-size: 1rem;
        opacity: 0.9;
    }

    .form-body {
        padding: 40px;
    }

    .form-section {
        margin-bottom: 40px;
        padding: 25px;
        background: #f8fafc;
        border-radius: 15px;
        border-left: 4px solid #EC281C;
    }

    .section-title {
        color: #2d3748;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e2e8f0;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #4a5568;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .form-input {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-input:focus {
        outline: none;
        border-color: #EC281C;
        box-shadow: 0 0 0 3px rgba(236, 40, 28, 0.15);
    }

    .form-input.error {
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

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
        padding: 10px;
        background: white;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .checkbox-group:hover {
        border-color: #EC281C;
        box-shadow: 0 2px 8px rgba(236, 40, 28, 0.1);
    }

    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #EC281C;
        cursor: pointer;
    }

    .checkbox-group label {
        color: #4a5568;
        font-weight: 600;
        cursor: pointer;
        margin: 0;
        flex: 1;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .service-category {
        background: white;
        padding: 20px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
    }

    .service-category h4 {
        color: #2d3748;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 15px;
        text-align: center;
        padding-bottom: 8px;
        border-bottom: 2px solid #EC281C;
    }

    .submit-btn {
        background: linear-gradient(135deg, #EC281C 0%, #c53030 100%);
        color: white;
        border: none;
        padding: 15px 40px;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 20px;
        position: relative;
        overflow: hidden;
        min-height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
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

    .submit-btn .btn-text {
        display: inline-block;
        transition: all 0.3s ease;
    }

    .submit-btn .btn-loading {
        display: none;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .submit-btn.loading .btn-text {
        display: none !important;
    }

    .submit-btn.loading .btn-loading {
        display: flex !important;
    }

    .submit-btn.loading {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        cursor: wait;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .services-grid {
            grid-template-columns: 1fr;
        }
        
        .form-body {
            padding: 25px;
        }
    }
</style>
@endsection

@section('content')
<body>
    @include('includes.main.loading')
    @include('includes.main.header')

    <section class="page-header-pro">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Mise à Jour et Souscription</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('main.finance') }}">Finance Digitale</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mise à Jour</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="update-form-container">
        <div class="container">
            <div class="form-card">
                <div class="form-header">
                    <h1>📋 FICHE DE MISE À JOUR ET DE SOUSCRIPTION À LA FINANCE DIGITALE</h1>
                    <p class="subtitle">Remplissez ce formulaire pour mettre à jour vos informations et souscrire à nos services</p>
                </div>

                <div class="form-body">
                    <form id="digital-finance-form" action="{{ route('digitalfinance.updates.store') }}" method="POST">
                        @csrf
                        
                        <!-- INFORMATIONS CLIENT -->
                        <div class="form-section">
                            <h3 class="section-title">📋 INFORMATIONS CLIENT</h3>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="account_number" class="form-label">N° COMPTE *</label>
                                    <input type="text" id="account_number" name="account_number" class="form-input @error('account_number') error @enderror"
                                        value="{{ old('account_number') }}" placeholder="Numéro de compte" required>
                                    @error('account_number')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cni_number" class="form-label">N° CNI ou AUTRE *</label>
                                    <input type="text" id="cni_number" name="cni_number" class="form-input @error('cni_number') error @enderror"
                                        value="{{ old('cni_number') }}" placeholder="Numéro CNI ou autre" required>
                                    @error('cni_number')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="cni_type" class="form-label">Type de document *</label>
                                    <select id="cni_type" name="cni_type" class="form-input @error('cni_type') error @enderror" required>
                                        <option value="">Sélectionnez le type</option>
                                        <option value="CNI" {{ old('cni_type') == 'CNI' ? 'selected' : '' }}>CNI</option>
                                        <option value="Passeport" {{ old('cni_type') == 'Passeport' ? 'selected' : '' }}>Passeport</option>
                                        <option value="Permis de conduire" {{ old('cni_type') == 'Permis de conduire' ? 'selected' : '' }}>Permis de conduire</option>
                                        <option value="Autre" {{ old('cni_type') == 'Autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                    @error('cni_type')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="full_name" class="form-label">NOM et PRÉNOM *</label>
                                    <input type="text" id="full_name" name="full_name" class="form-input @error('full_name') error @enderror"
                                        value="{{ old('full_name') }}" placeholder="Nom et prénom complet" required>
                                    @error('full_name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- CONTACTS DU CLIENT -->
                        <div class="form-section">
                            <h3 class="section-title">📞 CONTACTS DU CLIENT</h3>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-input @error('email') error @enderror"
                                        value="{{ old('email') }}" placeholder="Adresse email">
                                    @error('email')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="togocel" class="form-label">Togocel</label>
                                    <input type="text" id="togocel" name="togocel" class="form-input @error('togocel') error @enderror"
                                        value="{{ old('togocel') }}" placeholder="Numéro Togocel">
                                    @error('togocel')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="tmoney" class="form-label">Tmoney</label>
                                    <input type="text" id="tmoney" name="tmoney" class="form-input @error('tmoney') error @enderror"
                                        value="{{ old('tmoney') }}" placeholder="Numéro Tmoney">
                                    @error('tmoney')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="whatsapp_togocel" class="form-label">WhatsApp (Togocel)</label>
                                    <input type="text" id="whatsapp_togocel" name="whatsapp_togocel" class="form-input @error('whatsapp_togocel') error @enderror"
                                        value="{{ old('whatsapp_togocel') }}" placeholder="WhatsApp Togocel">
                                    @error('whatsapp_togocel')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="moov" class="form-label">Moov</label>
                                    <input type="text" id="moov" name="moov" class="form-input @error('moov') error @enderror"
                                        value="{{ old('moov') }}" placeholder="Numéro Moov">
                                    @error('moov')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="flooz" class="form-label">Flooz</label>
                                    <input type="text" id="flooz" name="flooz" class="form-input @error('flooz') error @enderror"
                                        value="{{ old('flooz') }}" placeholder="Numéro Flooz">
                                    @error('flooz')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="whatsapp_moov" class="form-label">WhatsApp (Moov)</label>
                                    <input type="text" id="whatsapp_moov" name="whatsapp_moov" class="form-input @error('whatsapp_moov') error @enderror"
                                        value="{{ old('whatsapp_moov') }}" placeholder="WhatsApp Moov">
                                    @error('whatsapp_moov')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- SOUSCRIPTION AUX SERVICES -->
                        <div class="form-section">
                            <h3 class="section-title">SOUSCRIPTION AUX SERVICES</h3>

                            <div class="services-grid">
                                <div class="service-category">
                                    <h4>📱 MOBILE BANKING</h4>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="mobile_banking_togocel" name="mobile_banking_togocel"
                                            {{ old('mobile_banking_togocel') ? 'checked' : '' }}>
                                        <label for="mobile_banking_togocel">TOGOCEL</label>
                                    </div>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="mobile_banking_moov" name="mobile_banking_moov"
                                            {{ old('mobile_banking_moov') ? 'checked' : '' }}>
                                        <label for="mobile_banking_moov">MOOV</label>
                                    </div>
                                </div>

                                <div class="service-category">
                                    <h4>💰 MOBILE MONEY</h4>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="mobile_money_togocel" name="mobile_money_togocel"
                                            {{ old('mobile_money_togocel') ? 'checked' : '' }}>
                                        <label for="mobile_money_togocel">TOGOCEL</label>
                                    </div>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="mobile_money_moov" name="mobile_money_moov"
                                            {{ old('mobile_money_moov') ? 'checked' : '' }}>
                                        <label for="mobile_money_moov">MOOV</label>
                                    </div>
                                </div>

                                <div class="service-category">
                                    <h4>🌐 WEB BANKING</h4>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="web_banking_togocel" name="web_banking_togocel"
                                            {{ old('web_banking_togocel') ? 'checked' : '' }}>
                                        <label for="web_banking_togocel">TOGOCEL</label>
                                    </div>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="web_banking_moov" name="web_banking_moov"
                                            {{ old('web_banking_moov') ? 'checked' : '' }}>
                                        <label for="web_banking_moov">MOOV</label>
                                    </div>
                                </div>

                                <div class="service-category">
                                    <h4>📨 SMS BANKING (BONUS)</h4>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="sms_banking_togocel" name="sms_banking_togocel"
                                            {{ old('sms_banking_togocel') ? 'checked' : '' }}>
                                        <label for="sms_banking_togocel">TOGOCEL</label>
                                    </div>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="sms_banking_moov" name="sms_banking_moov"
                                            {{ old('sms_banking_moov') ? 'checked' : '' }}>
                                        <label for="sms_banking_moov">MOOV</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- NOTES -->
                        <div class="form-section">
                            <h3 class="section-title">📝 NOTES ADDITIONNELLES</h3>
                            <div class="form-group full-width">
                                <label for="notes" class="form-label">Commentaires ou observations</label>
                                <textarea id="notes" name="notes" class="form-input @error('notes') error @enderror" rows="4"
                                    placeholder="Ajoutez ici vos commentaires ou observations...">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="submit-btn" id="submit-btn">
                            <span class="btn-text">Soumettre le formulaire</span>
                            <span class="btn-loading">
                                <i class="fas fa-spinner fa-spin"></i> Envoi en cours...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('includes.main.scroll')
    @include('includes.main.footer')
</body>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Gestion du formulaire avec AJAX comme la newsletter
        $("#digital-finance-form").on("submit", function (e) {
            e.preventDefault();

            const $form = $(this);
            const $submitBtn = $form.find('#submit-btn');
            const $btnText = $submitBtn.find('.btn-text');
            const $btnLoading = $submitBtn.find('.btn-loading');

            console.log('Formulaire soumis, activation du loading...');
            console.log('Bouton:', $submitBtn);
            console.log('Texte:', $btnText);
            console.log('Loading:', $btnLoading);

            // Afficher le loading
            $submitBtn.addClass('loading').prop('disabled', true);
            
            console.log('Classes du bouton après activation:', $submitBtn.attr('class'));
            console.log('Bouton désactivé:', $submitBtn.prop('disabled'));

            // Nettoyer les erreurs précédentes
            $('.form-input').removeClass('error');
            $('.error-message').remove();

            $.ajax({
                url: $form.attr("action"),
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $form.find('input[name="_token"]').val(),
                },
                success: function (data) {
                    console.log('Succès, désactivation du loading...');
                    // Masquer le loading
                    $submitBtn.removeClass('loading').prop('disabled', false);
                    
                    // Afficher le message de succès
                    Swal.fire({
                        icon: "success",
                        title: "Formulaire soumis avec succès ! 🎉",
                        text: "Votre demande a été enregistrée. Nous vous contacterons bientôt.",
                        confirmButtonColor: "#EC281C",
                        confirmButtonText: "Parfait !"
                    }).then(() => {
                        // Réinitialiser le formulaire au lieu de rediriger
                        $form[0].reset();
                        // Nettoyer les erreurs
                        $('.form-input').removeClass('error');
                        $('.error-message').remove();
                    });
                },
                error: function (jqXHR) {
                    console.log('Erreur, désactivation du loading...');
                    // Masquer le loading
                    $submitBtn.removeClass('loading').prop('disabled', false);
                    
                    if (jqXHR.status === 422 && jqXHR.responseJSON && jqXHR.responseJSON.errors) {
                        // Afficher les erreurs de validation
                        const errors = jqXHR.responseJSON.errors;
                        
                        Object.keys(errors).forEach(field => {
                            const $input = $(`[name="${field}"]`);
                            if ($input.length) {
                                $input.addClass('error');
                                
                                // Ajouter le message d'erreur
                                const errorMessage = errors[field][0];
                                $input.after(`<span class="error-message">${errorMessage}</span>`);
                            }
                        });

                        // Afficher un popup d'erreur
                        Swal.fire({
                            icon: "warning",
                            title: "Veuillez corriger les erreurs",
                            text: "Certains champs contiennent des erreurs. Veuillez les corriger et réessayer.",
                            confirmButtonColor: "#EC281C",
                            confirmButtonText: "Je corrige"
                        });
                    } else {
                        // Erreur générale
                        let errorMessage = "Une erreur est survenue. Veuillez réessayer.";
                        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                            errorMessage = jqXHR.responseJSON.message;
                        }
                        
                        Swal.fire({
                            icon: "error",
                            title: "Oups...",
                            text: errorMessage,
                            confirmButtonColor: "#EC281C",
                            confirmButtonText: "D'accord"
                        });
                    }
                },
            });
        });
    });
</script>
@endsection