@extends('layout.main')

@section('css')
<style>
    .contract-container {
        min-height: 100vh;
        padding: 40px 0;
    }

    .contract-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 1000px;
        margin: 0 auto;
    }

    .contract-header {
        background: linear-gradient(135deg, #EC281C 0%, #c53030 100%);
        color: white;
        padding: 30px;
        text-align: center;
    }

    .contract-header h1 {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .contract-header .subtitle {
        margin: 10px 0 0 0;
        font-size: 1rem;
        opacity: 0.9;
    }

    .contract-body {
        padding: 40px;
    }

    .contract-section {
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

    .contract-text {
        color: #4a5568;
        line-height: 1.6;
        margin-bottom: 20px;
        text-align: justify;
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
        border-color: #EC281C;
        box-shadow: 0 0 0 3px rgba(236, 40, 28, 0.15);
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .checkbox-group input[type="checkbox"] {
        margin-right: 10px;
        transform: scale(1.2);
        accent-color: #EC281C;
    }

    .checkbox-group label {
        color: #4a5568;
        font-weight: 500;
        cursor: pointer;
    }

    .services-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-top: 20px;
    }

    .service-category {
        background: white;
        padding: 20px;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
    }

    .service-category h4 {
        color: #2d3748;
        margin-bottom: 15px;
        font-size: 1.1rem;
        font-weight: 600;
        text-align: center;
        padding-bottom: 8px;
        border-bottom: 1px solid #e2e8f0;
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

    .alert {
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .info-box {
        background: #e6f3ff;
        border: 1px solid #b3d9ff;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .info-box h3 {
        color: #0066cc;
        margin-bottom: 15px;
        font-size: 1.2rem;
    }

    .info-box p {
        color: #4a5568;
        margin-bottom: 10px;
    }

    .error-message {
        color: #EC281C;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .services-grid {
            grid-template-columns: 1fr;
        }
        
        .contract-body {
            padding: 20px;
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
                <h1 class="title-pro">Contrat d'Adhésion à la Finance Digitale</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contrat Finance Digitale</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="contract-container">
        <div class="contract-card">
            <div class="contract-header">
                <h1>CONTRAT D'ADHÉSION À LA FINANCE DIGITALE</h1>
                <p class="subtitle">COCEC - Services Financiers Numériques</p>
            </div>

            <div class="contract-body">
                <!-- FORMULAIRE DE SOUSCRIPTION -->
                <div class="contract-section">
                    <h3 class="section-title">📝 INFORMATIONS DU SOUSCRIPTEUR</h3>
                    
                    <form id="digital-finance-contract-form" action="{{ route('digitalfinance.contracts.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="full_name" class="form-label">Nom & Prénoms *</label>
                                <input type="text" id="full_name" name="full_name" class="form-input @error('full_name') error @enderror" 
                                       value="{{ old('full_name') }}" placeholder="Nom et prénom complet" required>
                                @error('full_name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="phone" class="form-label">Téléphone *</label>
                                <input type="text" id="phone" name="phone" class="form-input @error('phone') error @enderror" 
                                       value="{{ old('phone') }}" placeholder="Numéro de téléphone" required>
                                @error('phone')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="cni_type" class="form-label">Type de document</label>
                                <select id="cni_type" name="cni_type" class="form-input @error('cni_type') error @enderror">
                                    <option value="">Sélectionner...</option>
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
                                <label for="cni_number" class="form-label">N° CNI ou AUTRE *</label>
                                <input type="text" id="cni_number" name="cni_number" class="form-input @error('cni_number') error @enderror" 
                                       value="{{ old('cni_number') }}" placeholder="Numéro du document" required>
                                @error('cni_number')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="address" class="form-label">Adresse *</label>
                            <textarea id="address" name="address" class="form-input @error('address') error @enderror" rows="3" 
                                      placeholder="Adresse complète" required>{{ old('address') }}</textarea>
                            @error('address')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="account_number" class="form-label">N° Compte *</label>
                            <input type="text" id="account_number" name="account_number" class="form-input @error('account_number') error @enderror" 
                                   value="{{ old('account_number') }}" placeholder="Numéro de compte COCEC" required>
                            @error('account_number')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- SERVICES DIGITAUX -->
                        <div class="contract-section">
                            <h3 class="section-title">🚀 SOUSCRIPTION AUX SERVICES DIGITAUX</h3>
                            
                            <div class="info-box">
                                <h3>📱 Services Disponibles</h3>
                                <p><strong>Mobile Money :</strong> Consultation de solde, mini relevé, dépôts/retraits, transferts</p>
                                <p><strong>Mobile Banking :</strong> Toutes les opérations Mobile Money + demandes de crédit</p>
                                <p><strong>Web Banking :</strong> Accès via navigateur web pour toutes les opérations</p>
                                <p><strong>SMS Banking :</strong> Alertes et notifications par SMS</p>
                            </div>
                            
                            <div class="services-grid">
                                <div class="service-category">
                                    <h4>💰 MOBILE MONEY</h4>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="mobile_money" name="mobile_money" 
                                               {{ old('mobile_money') ? 'checked' : '' }}>
                                        <label for="mobile_money">Souscrire au service Mobile Money</label>
                                    </div>
                                    <p style="font-size: 0.9rem; color: #666; margin-top: 10px;">
                                        <strong>Coût :</strong> 1000 F/an
                                    </p>
                                </div>
                                
                                <div class="service-category">
                                    <h4>📱 MOBILE BANKING</h4>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="mobile_banking" name="mobile_banking" 
                                               {{ old('mobile_banking') ? 'checked' : '' }}>
                                        <label for="mobile_banking">Souscrire au service Mobile Banking</label>
                                    </div>
                                    <p style="font-size: 0.9rem; color: #666; margin-top: 10px;">
                                        <strong>Coût :</strong> 1000 F/an
                                    </p>
                                </div>
                                
                                <div class="service-category">
                                    <h4>🌐 WEB BANKING</h4>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="web_banking" name="web_banking" 
                                               {{ old('web_banking') ? 'checked' : '' }}>
                                        <label for="web_banking">Souscrire au service Web Banking</label>
                                    </div>
                                    <p style="font-size: 0.9rem; color: #666; margin-top: 10px;">
                                        <strong>Coût :</strong> 600 F/an
                                    </p>
                                </div>
                                
                                <div class="service-category">
                                    <h4>📨 SMS BANKING</h4>
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="sms_banking" name="sms_banking" 
                                               {{ old('sms_banking') ? 'checked' : '' }}>
                                        <label for="sms_banking">Souscrire au service SMS Banking</label>
                                    </div>
                                    <p style="font-size: 0.9rem; color: #666; margin-top: 10px;">
                                        <strong>Coût :</strong> 100 F/mois
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- NOTES -->
                        <div class="contract-section">
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
                            <span class="btn-text">Soumettre le Contrat</span>
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
        $("#digital-finance-contract-form").on("submit", function (e) {
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
                        title: "Contrat soumis avec succès ! 🎉",
                        text: "Votre contrat d'adhésion a été enregistré. Nous vous contacterons bientôt.",
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
