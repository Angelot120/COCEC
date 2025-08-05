<?php $__env->startSection('content'); ?>

<!-- Script de diagnostic -->
<script>
    console.log('=== DIAGNOSTIC SIMULATEUR ===');
    console.log('Page chargée:', new Date().toLocaleString());
    
    // Vérifier si jQuery est chargé
    console.log('jQuery disponible:', typeof $ !== 'undefined');
    
    // Vérifier si SweetAlert2 est chargé
    console.log('SweetAlert2 disponible:', typeof Swal !== 'undefined');
    
    // Attendre que le DOM soit chargé
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM chargé');
        
        // Vérifier les éléments du simulateur
        const simulatorElements = {
            loanType: document.getElementById('loan-type'),
            loanAmount: document.getElementById('loan-amount'),
            loanDuration: document.getElementById('loan-duration'),
            calculateBtn: document.getElementById('calculate-loan')
        };
        
        console.log('Éléments du simulateur:', simulatorElements);
        
        // Vérifier si les fonctions sont disponibles
        setTimeout(() => {
            console.log('Fonctions après délai:', {
                calculateLoan: typeof window.calculateLoan,
                calculateMonthlyPayment: typeof window.calculateMonthlyPayment,
                formatCurrency: typeof window.formatCurrency,
                loanRates: window.loanRates
            });
        }, 1000);
    });
</script>

<body>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.popup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- ./ preloader -->

    <?php echo $__env->make('includes.main.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- hero-section-3 -->
    <!-- La classe "swiper" est ajoutée pour l'initialisation JS -->
    <section class="hero-section-3">

        <!-- Les formes restent en arrière-plan global de la section -->
        <div class="shapes">
            <div class="shape shape-1"><img src="<?php echo e(asset('assets/main/img/shapes/hero-bg-shape-2.png')); ?>" alt="forme"></div>
            <div class="shape shape-2"><img src="<?php echo e(asset('assets/main/img/shapes/hero-bg-shape-3.png')); ?>" alt="forme"></div>
        </div>

        <!-- CORRECTION : On groupe tout le carrousel dans un conteneur positionné -->
        <div class="swiper-container-wrapper swiper">

            <!-- Le conteneur obligatoire pour les slides -->
            <div class="swiper-wrapper">

                <!-- SLIDE 1 -->
                <div class="swiper-slide hero-slide-1" data-background="<?php echo e(asset('assets/images/banner.jpg')); ?>" loading="lazy">
                    <div class="container-2">
                        <div class="hero-content hero-content-3">
                            <div class="section-heading mb-40 red-content">
                                <h4 class="sub-heading"><span class="left-shape"></span>Votre Partenaire Financier</h4>
                                <h2 class="section-title">Des Solutions Financières pour <br>Votre Avenir</h2>
                                <p class="text-justify">La COCEC vous accompagne avec des services d’épargne, de crédit et d’accompagnement personnalisé pour réaliser vos projets et assurer votre sécurité financière.</p>
                            </div>
                            <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                                <a href="<?php echo e(route('contact')); ?>" class="bz-primary-btn primary">Nous Contacter <i class="fa-regular fa-arrow-right"></i></a>
                                <a href="<?php echo e(route('product.index')); ?>" class="bz-primary-btn hero-btn">Nos Produits</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="swiper-slide hero-slide-2" data-background="<?php echo e(asset('assets/images/banner-1.jpg')); ?>" loading="lazy">
                    <div class="container-2">
                        <div class="hero-content hero-content-3">
                            <div class="section-heading mb-40 red-content">
                                <h4 class="sub-heading"><span class="left-shape"></span>Crédit & Investissement</h4>
                                <h2 class="section-title">Financez Vos Projets les Plus <br>Ambitieux</h2>
                                <p class="text-justify">Que ce soit pour un projet immobilier, agricole ou entrepreneurial, nos solutions de crédit sont conçues pour vous donner les moyens de réussir.</p>
                            </div>
                            <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                                <a href="<?php echo e(route('contact')); ?>" class="bz-primary-btn primary">Demander un Crédit <i class="fa-regular fa-arrow-right"></i></a>
                                <a href="<?php echo e(route('product.index')); ?>" class="bz-primary-btn hero-btn">Explorer les Options</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 3 (contenu identique pour l'exemple) -->
                <div class="swiper-slide hero-slide-3" data-background="<?php echo e(asset('assets/images/banner-2.jpg')); ?>" loading="lazy">
                    <div class="container-2">
                        <div class="hero-content hero-content-3">
                            <div class="section-heading mb-40 red-content">
                                <h4 class="sub-heading"><span class="left-shape"></span>Épargne Sécurisée</h4>
                                <h2 class="section-title">Construisez Votre Patrimoine <br>en Toute Confiance</h2>
                                <p class="text-justify">Découvrez nos comptes d'épargne flexibles et rentables pour préparer l'avenir, financer les études de vos enfants ou simplement vous constituer une réserve.</p>
                            </div>
                            <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                                <a href="<?php echo e(route('contact')); ?>" class="bz-primary-btn primary">Ouvrir un Compte <i class="fa-regular fa-arrow-right"></i></a>
                                <a href="<?php echo e(route('product.index')); ?>" class="bz-primary-btn hero-btn">Types de Comptes</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Flèches de Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Points de Pagination -->
            <div class="swiper-pagination"></div>

        </div>

    </section>
    <!-- ./ hero-section -->

    <!-- promo-section -->
    <section class="promo-section pb-120">
        <div class="container-2">
            <div class="row gy-lg-0 gy-4 justify-content-center fade-wrapper">
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content">
                        <div class="bg-items">
                            <div class="bg-img"><img src="<?php echo e(asset('assets/images/epargne.jpg')); ?>" alt="Épargne" loading="lazy"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Épargne Sécurisée</h3>
                        <p class="text-justify">Épargnez en toute tranquillité avec nos comptes d’épargne flexibles, conçus pour répondre à vos besoins à court et long terme, avec des options comme l’épargne à vue ou à terme.</p>
                        <a href="<?php echo e(route('product.index')); ?>" class="bz-primary-btn red-btn">En savoir plus <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content credit-card-middle">
                        <div class="bg-items">
                            <div class="bg-img"><img src="<?php echo e(asset('assets/images/credit.jpg')); ?>" alt="Crédit" loading="lazy"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Crédits Adaptés</h3>
                        <p class="text-justify">Financez vos projets avec nos solutions de crédit sur mesure : prêts scolaires, commerciaux, ou agricoles pour soutenir vos ambitions personnelles et professionnelles.</p>
                        <a href="<?php echo e(route('product.index')); ?>" class="bz-primary-btn red-btn">En savoir plus <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content">
                        <div class="bg-items">
                            <div class="bg-img"><img src="<?php echo e(asset('assets/images/accompagnement.jpg')); ?>" alt="Services Financiers" loading="lazy"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Accompagnement Financier</h3>
                        <p class="text-justify">Bénéficiez de conseils personnalisés et de services comme le transfert d’argent pour gérer efficacement vos finances avec le soutien de la COCEC.</p>
                                                    <a href="<?php echo e(route('product.index')); ?>" class="bz-primary-btn red-btn">En savoir plus <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ promo-section -->

    <section class="about-section-3 pb-120">
        <div class="container-2">
            <div class="row align-items-center">

                <!-- Colonne Image -->
                <div class="col-lg-6">
                    <div class="about-img-3 img-reveal">
                        <div class="img-overlay overlay-2"></div>
                        <img src="<?php echo e(asset('assets/images/director.jpeg')); ?>" alt="about" loading="lazy">
                    </div>
                </div>

                <!-- Colonne Contenu -->
                <!-- Colonne Contenu (Refonte) -->
                <div class="col-lg-6">
                    <div class="about-content-3 fade-wrapper">
                        <div class="section-heading red-content mb-20">
                            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Mot du Directeur Général</h4>
                            <h2 class="section-title" data-text-animation data-split="word" data-duration="1">Bâtir un Avenir Financier Inclusif et Moderne</h2>
                        </div>

                        <p class="fade-top text-justify">
                            Depuis 2001, la COCEC a placé l’amélioration de vos conditions de vie au centre de ses stratégies. Notre plus grande fierté réside dans les témoignages de ceux qui, partis de rien, subviennent aujourd’hui aux besoins de leur famille grâce à notre accompagnement.
                        </p>

                        <!-- Liste des piliers transformée en cartes -->
                        <ul class="about-list-revisited fade-top">
                            <li>
                                <div class="list-icon-revisited"><i class="fas fa-rocket"></i></div>
                                <div class="list-text">
                                    <h5>Innovation & Modernité</h5>
                                    <span>Nous intégrons les nouvelles technologies (Mobile Money, Web Banking) pour vous offrir des produits innovants à moindre coût.</span>
                                </div>
                            </li>
                            <li>
                                <div class="list-icon-revisited"><i class="fas fa-hands-helping"></i></div>
                                <div class="list-text">
                                    <h5>Confiance & Partenariat</h5>
                                    <span>Avec la confiance renouvelée de nos clients et partenaires, et avec Dieu à nos côtés, nous accomplirons des exploits.</span>
                                </div>
                            </li>
                        </ul>

                        <!-- Séparateur visuel -->
                        <hr class="section-divider fade-top">

                        <!-- Bloc combinant la signature et le bouton -->
                        <div class="director-cta-block fade-top">
                            <div class="director-signature-block">
                                <strong>M. Kokou GABIAM</strong>
                                <span>Directeur Général</span>
                            </div>
                            <div class="about-btn">
                                <a href="<?php echo e(route('about')); ?>" class="bz-primary-btn red-btn">En Savoir Plus <i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ./ about-section -->

    <!-- SECTION SERVICES - VERSION OPTIMISÉE ET REFAITE -->
    <section class="service-section-3 pt-120 pb-120" data-background="<?php echo e(asset('assets/images/shapes/service-bg-shape.png')); ?>">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                <h4 class="sub-heading"><span class="left-shape"></span>Nos Produits Phares</h4>
                <h2 class="section-title mb-0">Des Solutions Financières Conçues Pour Vous</h2>
            </div>
            <div class="row gy-lg-0 gy-4 justify-content-center">

                <!-- Produit 1 : Compte d'Épargne -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3">
                        <div class="service-thumb">
                            <img class="img-item" src="<?php echo e(asset('assets/images/account1.jpg')); ?>" alt="Épargne" loading="lazy">
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="#">Compte d'Épargne</a></h3>
                            <p class="text-justify">Faites fructifier votre argent en toute sécurité et préparez sereinement votre avenir grâce à nos solutions d'épargne flexibles.</p>
                            <a href="#" class="bz-primary-btn red-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Produit 2 : Compte Courant -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3">
                        <div class="service-thumb">
                            <img class="img-item" src="<?php echo e(asset('assets/images/account2.jpg')); ?>" alt="Compte Courant" loading="lazy">
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="#">Compte Courant</a></h3>
                            <p class="text-justify">Gérez vos revenus et vos dépenses quotidiennes avec agilité. La solution idéale pour la domiciliation de votre salaire.</p>
                            <a href="#" class="bz-primary-btn red-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Produit 3 : Crédits & Financements -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3">
                        <div class="service-thumb">
                            <img class="img-item" src="<?php echo e(asset('assets/images/account3.jpg')); ?>" alt="Crédits" loading="lazy">
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="#">Crédits & Financements</a></h3>
                            <p class="text-justify">Donnez vie à vos projets personnels ou professionnels avec nos solutions de crédit sur-mesure et à des conditions avantageuses.</p>
                            <a href="#" class="bz-primary-btn red-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ./ service-section -->

    <section class="cta-section cta-2 pt-120 pb-120">
        <div class="bg-img"><img src="<?php echo e(asset('assets/images/products.jpeg')); ?>" alt="img"></div>
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container-2">
            <div class="cta-wrap">
                <div class="cta-content">
                    <div class="section-heading mb-0 white-content">
                        
                        <h4 class="sub-heading">
                            <span class="left-shape"></span>Une Gamme Complète de Produits
                        </h4>
                        <h2 class="section-title mb-0">
                            De l'épargne à la concrétisation de vos projets, nous avons la solution financière qu'il vous faut.</h2>
                    </div>
                </div>
                <div class="cta-btn-wrap">
                    
                    <a href="" class="bz-primary-btn red-btn">Voir tous les produits</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ cta-section -->


<!-- Simulateur de Prêt Section -->
<section class="loan-simulator-section pt-120 pb-120" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container-2">
        <div class="section-heading text-center red-content mb-60">
            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5">
                <span class="left-shape"></span>Simulateur de Prêt
            </h4>
            <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">
                Calculez votre échéance de prêt
            </h2>
            <p class="mt-20">Simulez votre prêt en quelques clics et obtenez un tableau d'amortissement détaillé</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="loan-simulator-card">
                    <div class="simulator-header">
                        <h3><i class="fas fa-calculator"></i> Simulateur de Prêt COCEC</h3>
                        <p>Entrez vos informations pour calculer votre échéance et voir le tableau d'amortissement</p>
                    </div>

                    <!-- Formulaire de simulation -->
                    <div class="simulation-form mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="loan-type" class="form-label">Type de prêt</label>
                                <select class="form-select" id="loan-type">
                                    <option value="">Sélectionner le type</option>
                                    <option value="commerce">Commerce</option>
                                    <option value="construction">Construction</option>
                                    <option value="equipement">Équipement</option>
                                    <option value="personnel">Prêt Personnel</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="loan-amount" class="form-label">Montant (FCFA)</label>
                                <input type="number" class="form-control" id="loan-amount" placeholder="Ex: 5000000" min="100000" step="10000">
                            </div>
                            <div class="col-md-3">
                                <label for="loan-duration" class="form-label">Durée (mois)</label>
                                <input type="number" class="form-control" id="loan-duration" placeholder="Ex: 24" min="6" max="120" step="6">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">&nbsp;</label>
                                <button type="button" class="bz-primary-btn red-btn w-100" id="calculate-loan" onclick="calculateLoan()">
                                    <span class="btn-text">Calculer</span>
                                    <span class="btn-loading" style="display: none;">
                                        <i class="fa-solid fa-spinner fa-spin"></i> Calcul...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Résultats -->
                    <div id="loan-results" class="loan-results" style="display: none;">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="result-card">
                                    <h4>Résumé du Prêt</h4>
                                    <div class="result-item">
                                        <span>Montant emprunté :</span>
                                        <strong id="borrowed-amount">0 FCFA</strong>
                                    </div>
                                    <div class="result-item">
                                        <span>Durée :</span>
                                        <strong id="loan-period">0 mois</strong>
                                    </div>
                                    <div class="result-item">
                                        <span>Taux d'intérêt :</span>
                                        <strong id="interest-rate">0%</strong>
                                    </div>
                                    <div class="result-item">
                                        <span>Échéance mensuelle :</span>
                                        <strong id="monthly-payment">0 FCFA</strong>
                                    </div>
                                    <div class="result-item">
                                        <span>Total à rembourser :</span>
                                        <strong id="total-amount">0 FCFA</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="amortization-table-wrapper">
                                    <h4>Tableau d'Amortissement</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="amortization-table">
                                            <thead>
                                                <tr>
                                                    <th>Échéance</th>
                                                    <th>Capital</th>
                                                    <th>Intérêts</th>
                                                    <th>Échéance</th>
                                                    <th>Capital Restant</th>
                                                </tr>
                                            </thead>
                                            <tbody id="amortization-body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Loading -->
                    <div id="loan-loading" class="text-center py-5" style="display: none;">
                        <div class="loading-spinner">
                            <div class="spinner"></div>
                        </div>
                        <p class="mt-3">Calcul en cours...</p>
                    </div>

                    <!-- Actions -->
                    <div class="simulation-actions text-center mt-4">
                        <button type="button" class="bz-primary-btn hero-btn" onclick="refreshTable()">
                            <i class="fas fa-redo"></i> Actualiser
                        </button>
                    </div>

                    <!-- Script de test et simulateur autonome -->
                    <script>
                        // Configuration des taux d'intérêt
                        const loanRates = {
                            'commerce': 12.5,
                            'construction': 15.0,
                            'equipement': 13.5,
                            'personnel': 18.0
                        };

                        // Fonction pour calculer l'échéance mensuelle
                        function calculateMonthlyPayment(principal, annualRate, months) {
                            const monthlyRate = annualRate / 100 / 12;
                            if (monthlyRate === 0) return principal / months;
                            
                            return principal * (monthlyRate * Math.pow(1 + monthlyRate, months)) / (Math.pow(1 + monthlyRate, months) - 1);
                        }

                        // Fonction pour formater les montants
                        function formatCurrency(amount) {
                            return new Intl.NumberFormat('fr-FR', {
                                style: 'currency',
                                currency: 'XOF',
                                minimumFractionDigits: 0
                            }).format(amount);
                        }

                        // Fonction pour générer le tableau d'amortissement
                        function generateAmortizationTable(principal, annualRate, months) {
                            const monthlyRate = annualRate / 100 / 12;
                            const monthlyPayment = calculateMonthlyPayment(principal, annualRate, months);
                            const table = [];
                            
                            let remainingBalance = principal;
                            
                            for (let month = 1; month <= months; month++) {
                                const interestPayment = remainingBalance * monthlyRate;
                                const principalPayment = monthlyPayment - interestPayment;
                                remainingBalance -= principalPayment;
                                
                                table.push({
                                    month: month,
                                    principal: principalPayment,
                                    interest: interestPayment,
                                    payment: monthlyPayment,
                                    remaining: Math.max(0, remainingBalance)
                                });
                            }
                            
                            return table;
                        }

                        // Fonction principale de calcul
                        function calculateLoan() {
                            console.log('Fonction calculateLoan appelée (version autonome)');
                            
                            const loanType = document.getElementById('loan-type');
                            const loanAmount = document.getElementById('loan-amount');
                            const loanDuration = document.getElementById('loan-duration');
                            
                            if (!loanType || !loanAmount || !loanDuration) {
                                console.error('Éléments manquants');
                                return;
                            }
                            
                            const type = loanType.value;
                            const amount = parseFloat(loanAmount.value);
                            const duration = parseInt(loanDuration.value);
                            
                            console.log('Valeurs:', { type, amount, duration });
                            
                            // Validation
                            if (!type || !amount || !duration) {
                                alert('Veuillez remplir tous les champs');
                                return;
                            }
                            
                            if (amount < 100000) {
                                alert('Le montant minimum est de 100,000 FCFA');
                                return;
                            }
                            
                            if (duration < 6 || duration > 120) {
                                alert('La durée doit être entre 6 et 120 mois');
                                return;
                            }
                            
                            // Afficher le loading
                            const loadingEl = document.getElementById('loan-loading');
                            const resultsEl = document.getElementById('loan-results');
                            const calculateBtn = document.getElementById('calculate-loan');
                            
                            if (loadingEl) loadingEl.style.display = 'block';
                            if (resultsEl) resultsEl.style.display = 'none';
                            if (calculateBtn) {
                                calculateBtn.disabled = true;
                                const btnText = calculateBtn.querySelector('.btn-text');
                                const btnLoading = calculateBtn.querySelector('.btn-loading');
                                if (btnText) btnText.style.display = 'none';
                                if (btnLoading) btnLoading.style.display = 'inline-block';
                            }
                            
                            // Calcul
                            setTimeout(() => {
                                console.log('Calcul en cours...');
                                
                                const annualRate = loanRates[type];
                                const monthlyPayment = calculateMonthlyPayment(amount, annualRate, duration);
                                const totalAmount = monthlyPayment * duration;
                                
                                console.log('Résultats calculés:', { annualRate, monthlyPayment, totalAmount });
                                
                                // Mettre à jour le résumé
                                const borrowedAmount = document.getElementById('borrowed-amount');
                                const loanPeriod = document.getElementById('loan-period');
                                const interestRate = document.getElementById('interest-rate');
                                const monthlyPaymentEl = document.getElementById('monthly-payment');
                                const totalAmountEl = document.getElementById('total-amount');
                                
                                if (borrowedAmount) borrowedAmount.textContent = formatCurrency(amount);
                                if (loanPeriod) loanPeriod.textContent = `${duration} mois`;
                                if (interestRate) interestRate.textContent = `${annualRate}% annuel`;
                                if (monthlyPaymentEl) monthlyPaymentEl.textContent = formatCurrency(monthlyPayment);
                                if (totalAmountEl) totalAmountEl.textContent = formatCurrency(totalAmount);
                                
                                // Générer le tableau d'amortissement
                                const amortizationTable = generateAmortizationTable(amount, annualRate, duration);
                                const tbody = document.getElementById('amortization-body');
                                
                                if (tbody) {
                                    tbody.innerHTML = '';
                                    
                                    amortizationTable.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td>${row.month}</td>
                                            <td>${formatCurrency(row.principal)}</td>
                                            <td>${formatCurrency(row.interest)}</td>
                                            <td>${formatCurrency(row.payment)}</td>
                                            <td>${formatCurrency(row.remaining)}</td>
                                        `;
                                        tbody.appendChild(tr);
                                    });
                                }
                                
                                // Masquer le loading et afficher les résultats
                                if (loadingEl) loadingEl.style.display = 'none';
                                if (resultsEl) resultsEl.style.display = 'block';
                                if (calculateBtn) {
                                    calculateBtn.disabled = false;
                                    const btnText = calculateBtn.querySelector('.btn-text');
                                    const btnLoading = calculateBtn.querySelector('.btn-loading');
                                    if (btnText) btnText.style.display = 'inline-block';
                                    if (btnLoading) btnLoading.style.display = 'none';
                                }
                                
                                console.log('Calcul terminé, résultats affichés');
                                
                                // Scroll vers les résultats
                                if (resultsEl) {
                                    resultsEl.scrollIntoView({ behavior: 'smooth' });
                                }
                                
                            }, 1500);
                        }

                        // Rendre la fonction globale
                        window.calculateLoan = calculateLoan;
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- <section class="process-section-2 pt-120 pb-120">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Notre Démarche</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Votre Parcours vers la Réussite Financière</h2>
            </div>
            <div class="row gy-lg-0 gy-4 fade-wrapper"> -->

    <!-- Étape 1 -->
    <!-- <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="<?php echo e(asset('assets/main/img/images/process-img-1.png')); ?>" alt="Devenir Membre">
                            <span>Étape 1</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Devenez Membre</h3>
                            <p class="text-justify">Ouvrez votre compte en quelques minutes en agence ou en ligne et rejoignez une communauté financière solide.</p>
                        </div>
                    </div>
                </div> -->

    <!-- Étape 2 -->
    <!-- <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="<?php echo e(asset('assets/main/img/images/process-img-2.png')); ?>" alt="Épargner">
                            <span>Étape 2</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Épargnez & Grandissez</h3>
                            <p class="text-justify">Faites fructifier votre argent en toute sécurité grâce à nos solutions d'épargne flexibles et rentables.</p>
                        </div>
                    </div>
                </div> -->

    <!-- Étape 3 -->
    <!-- <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="<?php echo e(asset('assets/main/img/images/process-img-3.png')); ?>" alt="Financer un projet">
                            <span>Étape 3</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Financez Vos Projets</h3>
                            <p class="text-justify">Que ce soit pour un projet personnel ou professionnel, nous vous offrons des crédits adaptés avec un accompagnement sur-mesure.</p>
                        </div>
                    </div>
                </div> -->

    <!-- Étape 4 -->
    <!-- <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="<?php echo e(asset('assets/main/img/images/process-img-4.png')); ?>" alt="Réussir">
                            <span>Étape 4</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Prospérez & Réussissez</h3>
                            <p class="text-justify">Grâce à nos conseils et nos outils digitaux, atteignez vos objectifs et assurez votre indépendance financière.</p>
                        </div>
                    </div>
                </div> -->
    <!-- 
            </div>
        </div>
    </section> -->
    <!-- ./ process-section -->

    <!-- SECTION STATISTIQUES - VERSION OPTIMISÉE -->
    <section class="strength-section pt-120 pb-120">
        <div class="bg-item">
            <div class="bg-img" data-background="<?php echo e(asset('assets/images/strength-bg.jpg')); ?>"></div>
            <div class="overlay"></div>
            <div class="shapes">
                <div class="shape">
                    <img src="<?php echo e(asset('assets/images/shapes/strength-shape-1.png')); ?>" alt="img">
                </div>
                <div class="shape-2"></div>
            </div>
        </div>
        <div class="container-2">
            <div class="row strength-wrap fade-wrapper">
                <div class="col-lg-6 col-md-12">
                    <div class="strength-content">
                        <div class="section-heading mb-20 white-content red-content">
                            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5">
                                <span class="left-shape"></span>Notre Force en Chiffres
                            </h4>
                            <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">
                                Plus qu'une Institution, <br>une Communauté Qui Prospère
                            </h2>
                        </div>
                        <p class="fade-top text-justify mb-40">
                            Depuis plus de 20 ans, notre force réside dans la confiance de nos membres et notre engagement indéfectible pour leur réussite financière.
                        </p>
                        
                        <!-- Statistiques en grille 2x2 -->
                        <div class="strength-items-grid">
                            <div class="strength-item fade-top">
                                <div class="strength-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="strength-content">
                                    <h3 class="title"><span class="odometer" data-count="95">0</span>%</h3>
                                    <p>Taux de Satisfaction</p>
                                </div>
                            </div>
                            
                            <div class="strength-item fade-top">
                                <div class="strength-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="strength-content">
                                    <h3 class="title">+<span class="odometer" data-count="50000">0</span></h3>
                                    <p>Membres Accompagnés</p>
                                </div>
                            </div>
                            
                            <div class="strength-item fade-top">
                                <div class="strength-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="strength-content">
                                    <h3 class="title"><span class="odometer" data-count="20">0</span>+</h3>
                                    <p>Années d'Expérience</p>
                                </div>
                            </div>
                            
                            <div class="strength-item fade-top">
                                <div class="strength-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <div class="strength-content">
                                    <h3 class="title"><span class="odometer" data-count="1000">0</span>+</h3>
                                    <p>Projets Financés</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="strength-man">
                        <img class="men" src="<?php echo e(asset('assets/images/forces.png')); ?>" alt="man">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ process-section -->

    <section class="team-section-3 pt-120 pb-120">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Notre Équipe</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Des Experts Engagés Pour Votre Réussite</h2>
            </div>
            <div class="row gy-xl-0 gy-4 justify-content-center fade-wrapper">

                <!-- Membre 1 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="<?php echo e(asset('assets/images/team.jpg')); ?>" alt="Photo de membre d'équipe">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="#">M. Kokou GABIAM</a></h4>
                            <span>Directeur Général</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="#">M. Kokou GABIAM</a></h4>
                                <span>Directeur Général</span>
                                <p class="text-justify">Leader visionnaire, il guide la COCEC avec une passion pour l'inclusion financière et un engagement total envers la prospérité de nos membres.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Membre 2 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="<?php echo e(asset('assets/images/team.jpg')); ?>" alt="Photo de membre d'équipe">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="#">Adjoa AKOUETE</a></h4>
                            <span>Responsable des Opérations</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="#">Adjoa AKOUETE</a></h4>
                                <span>Responsable des Opérations</span>
                                <p class="text-justify">Elle assure l'excellence et la fluidité de tous nos services pour vous garantir une expérience client irréprochable au quotidien.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Membre 3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="<?php echo e(asset('assets/images/team.jpg')); ?>" alt="Photo de membre d'équipe">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="#">Koffi LAWSON</a></h4>
                            <span>Responsable du Crédit</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="#">Koffi LAWSON</a></h4>
                                <span>Responsable du Crédit</span>
                                <p class="text-justify">Expert en financement, il analyse et accompagne vos projets pour vous aider à concrétiser vos ambitions en toute sécurité.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Membre 4 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="<?php echo e(asset('assets/images/team.jpg')); ?>" alt="Photo de membre d'équipe">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="#">Fati BAMBA</a></h4>
                            <span>Chef d'Agence Principale</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="#">Fati BAMBA</a></h4>
                                <span>Chef d'Agence Principale</span>
                                <p class="text-justify">Au cœur de notre réseau, elle incarne la proximité et l'écoute, veillant à ce que chaque membre reçoive un conseil personnalisé.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ./ team-section -->


    <section class="home-agencies-section">
        <div class="container">
            
            <div class="section-heading text-center">
                <h4 class="sub-heading"><span class="left-shape"></span>Notre Réseau</h4>
                <h2>Trouvez un point de service proche de vous</h2>
                <p>Avec un réseau en pleine expansion, la COCEC est toujours à vos côtés. Découvrez nos agences principales.</p>
            </div>

            
            <div class="agency-grid">
                <?php $__currentLoopData = $agencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('agencies')); ?>" class="mini-agency-card">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-status">
                        <?php
                        // Récupérer l'heure actuelle dans le fuseau horaire de l'application
                        $currentHour = now()->hour;
                        // Vérifier si l'heure est entre 9h et 17h
                        $isOpen = ($currentHour >= 9 && $currentHour < 17);
                        $status = $isOpen ? 'Ouvert' : 'Fermé';
                        ?>
                        <span class="status-dot <?php echo e($isOpen ? 'open' : 'closed'); ?>"></span> <?php echo e($status); ?>

                    </div>
                    <h3 class="card-title"><?php echo e($agency->name); ?></h3>
                    <p class="card-address"><?php echo e($agency->address); ?></p>
                    <span class="card-arrow"><i class="fas fa-arrow-right"></i></span>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            

            
            <div class="text-center" style="margin-top: 50px;">
                
                
                <a href="<?php echo e(route('agencies')); ?>" class="btn-see-all">
                    Voir toutes nos agences <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </section>


    <section class="cta-section-3">
        <div class="container-2">
            <div class="cta-wrap-3">
                <div class="shapes">
                    <div class="shape-1">
                        <img src="<?php echo e(asset('assets/images/shapes/cta-shape-1.png')); ?>" alt="cta">
                    </div>
                    <div class="shape-2">
                        <img src="<?php echo e(asset('assets/images/shapes/cta-shape-2.png')); ?>" alt="cta">
                    </div>
                </div>
                <div class="cta-mask-img">
                    <div class="overlay"></div>
                    <img src="<?php echo e(asset('assets/images/job-offer.jpg')); ?>" alt="cta">
                </div>

                
                <h3 class="title">Rejoignez Notre Équipe</h3>
                <p>Nous sommes toujours à la recherche de professionnels talentueux et passionnés, <br> désireux de contribuer à notre mission d'inclusion financière.</p>

                
                <div style="margin-top: 30px;">
                    <a href="<?php echo e(route('career')); ?>" class="bz-primary-btn red-btn">Voir les Offres d'Emploi <i class="fa-regular fa-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </section>
    <!-- ./ agencies-section -->

    <section class="testimonial-section-3 overflow-hidden pb-120" data-background="<?php echo e(URL::asset('assets/images/shapes/testi-bg-2.png')); ?>">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Témoignages de nos Membres</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Leurs Mots, Notre Plus Grande Fierté</h2>
            </div>
            <div class="testi-carousel-2 swiper">
                <div class="swiper-wrapper">

                    <!-- Témoignage 1 -->
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top no-image">
                                <div class="testi-author">
                                    <!-- <img src="<?php echo e(asset('assets/main/img/testi/testi-author-1.png')); ?>" alt="Photo d'un membre"> -->
                                    <h3 class="name">Mme Akouvi MENSAH <span>Enseignante & Mère de famille</span></h3>
                                </div>
                                <ul class="review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <p>Grâce au compte épargne projet de la COCEC, j'ai pu financer les études supérieures de mon fils sans stress. Leur accompagnement a été précieux à chaque étape.</p>
                        </div>
                    </div>

                    <!-- Témoignage 2 -->
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top no-image">
                                <div class="testi-author">
                                    <!-- <img src="<?php echo e(asset('assets/main/img/testi/testi-author-2.png')); ?>" alt="Photo d'un membre"> -->
                                    <h3 class="name">M. Koffi SOSSOU <span>Commerçant au grand marché</span></h3>
                                </div>
                                <ul class="review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <p>Obtenir un crédit pour développer mon commerce a été simple et rapide. L'équipe de la COCEC a vraiment compris mes besoins et m'a fait confiance.</p>
                        </div>
                    </div>

                    <!-- Témoignage 3 -->
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top no-image">
                                <div class="testi-author">
                                    <!-- <img src="<?php echo e(asset('assets/main/img/testi/testi-author-3.png')); ?>" alt="Photo d'un membre"> -->
                                    <h3 class="name">Mlle Fati ALI <span>Jeune Entrepreneure</span></h3>
                                </div>
                                <ul class="review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <p>Avec COCEC Mobile, je gère mes finances directement depuis ma boutique. C'est un gain de temps incroyable qui me permet de me concentrer sur mon business.</p>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination" style="--bz-color-theme-primary: #EC281C"></div>
            </div>
        </div>
    </section>
    <!-- ./ testimonial-section -->

    <section class="blog-section-3 pt-120 pb-120">
        <div class="container-2">
            <div class="blog-top heading-space">
                <div class="section-heading red-content mb-0">
                    <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Nos actualités</h4>
                    
                    <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">L'actualité financière décryptée <br>par nos experts</h2>
                </div>
                <a href="<?php echo e(route('blogs')); ?>" class="bz-primary-btn red-btn">Voir tous les Posts <i class="fa-regular fa-arrow-right"></i></a>
            </div>
            <div class="row gy-lg-0 gy-4 fade-wrapper">
                <?php if($blogs->count() > 0): ?>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="post-card-3 fade-top" style="--bz-color-theme-primary: #EC281C">
                        <div class="post-thumb img-reveal">
                            <div class="img-overlay"></div>
                            <img src="<?php echo e($blog->image ? asset('storage/' . $blog->image) : asset('assets/images/blog.jpg')); ?>" alt="<?php echo e($blog->title); ?>">
                        </div>
                        <div class="post-content">
                            <ul class="post-meta">
                                
                                <li><i class="fa-regular fa-calendar"></i><?php echo e($blog->created_at->translatedFormat('d F Y')); ?></li>
                                
                                <li><i class="fa-regular fa-user"></i>par Admin</li>
                            </ul>
                            
                            <h3 class="title"><a href="<?php echo e(route('blogs.show', $blog->id)); ?>"><?php echo e($blog->title); ?></a></h3>
                            
                            <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" class="blog-btn"><i class="fa-regular fa-arrow-right"></i>Lire la suite</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="text-center py-5">
                            <div class="empty-blog-message">
                                <i class="fa-regular fa-newspaper" style="font-size: 4rem; color: #EC281C; margin-bottom: 1rem;"></i>
                                <h3 class="mb-3">Aucun article disponible</h3>
                                <p class="text-muted mb-4">Nous travaillons actuellement sur de nouveaux contenus. Revenez bientôt pour découvrir nos derniers articles !</p>
                                <a href="<?php echo e(route('blogs')); ?>" class="bz-primary-btn red-btn">Voir tous les Posts <i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- ./ blog-section -->

    <div class="sponsor-section pb-120">
        <div class="container">
            <h3 class="sponsor-text-wrap">
                <span></span>
                
                <span class="sponsor-text">Nos Partenaires Institutionnels & Techniques Nous Font Confiance</span>
                <span></span>
            </h3>
            <div class="sponsor-carousel swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/fnfi.png')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/ada.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/apsfd.png')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/btci.png')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/ecobank.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/mainnetwork.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/nsia.png')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/orabank.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/poste.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/sunu.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('includes.main.scroll', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- ./ sponsor-section -->
    <?php echo $__env->make('includes.main.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisation du Swiper pour le hero
        const heroSwiper = new Swiper('.swiper-container-wrapper', {
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            a11y: {
                prevSlideMessage: 'Slide précédent',
                nextSlideMessage: 'Slide suivant'
            },
        });

        // Optimisation du lazy loading pour les images
        const lazyImages = document.querySelectorAll('img[loading="lazy"]');
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
        });
    });

            lazyImages.forEach(img => imageObserver.observe(img));
        }

        // Animation des compteurs optimisée
        const counters = document.querySelectorAll('.odometer');
        let countersAnimated = new Set();

        if ('IntersectionObserver' in window) {
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !countersAnimated.has(entry.target)) {
                        const target = parseInt(entry.target.getAttribute('data-count') || '0');
                        // Utiliser requestAnimationFrame pour éviter le blocage du scroll
                        requestAnimationFrame(() => {
                            animateCounter(entry.target, target);
                        });
                        countersAnimated.add(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => counterObserver.observe(counter));
        }

        function animateCounter(element, target) {
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 16);
        }

        // ===== TABLEAU DES TARIFS DE PRÊT =====
        
        // Données prédéfinies des tarifs
        const loanTariffs = [
            // Prêts de 100,000 FCFA
            { amount: 100000, duration: 6, type: 'personal', monthly: 18500, interest: 11000, fees: 5000, total: 111000 },
            { amount: 100000, duration: 12, type: 'personal', monthly: 10200, interest: 22400, fees: 5000, total: 122400 },
            { amount: 100000, duration: 18, type: 'personal', monthly: 7200, interest: 29600, fees: 5000, total: 129600 },
            { amount: 100000, duration: 24, type: 'personal', monthly: 5800, interest: 39200, fees: 5000, total: 139200 },
            
            // Prêts de 200,000 FCFA
            { amount: 200000, duration: 6, type: 'personal', monthly: 37000, interest: 22000, fees: 8000, total: 222000 },
            { amount: 200000, duration: 12, type: 'personal', monthly: 20400, interest: 44800, fees: 8000, total: 244800 },
            { amount: 200000, duration: 18, type: 'personal', monthly: 14400, interest: 59200, fees: 8000, total: 259200 },
            { amount: 200000, duration: 24, type: 'personal', monthly: 11600, interest: 78400, fees: 8000, total: 278400 },
            
            // Prêts de 500,000 FCFA
            { amount: 500000, duration: 6, type: 'business', monthly: 92500, interest: 55000, fees: 15000, total: 555000 },
            { amount: 500000, duration: 12, type: 'business', monthly: 51000, interest: 112000, fees: 15000, total: 612000 },
            { amount: 500000, duration: 18, type: 'business', monthly: 36000, interest: 148000, fees: 15000, total: 648000 },
            { amount: 500000, duration: 24, type: 'business', monthly: 29000, interest: 196000, fees: 15000, total: 696000 },
            
            // Prêts de 1,000,000 FCFA
            { amount: 1000000, duration: 6, type: 'business', monthly: 185000, interest: 110000, fees: 25000, total: 1110000 },
            { amount: 1000000, duration: 12, type: 'business', monthly: 102000, interest: 224000, fees: 25000, total: 1224000 },
            { amount: 1000000, duration: 18, type: 'business', monthly: 72000, interest: 296000, fees: 25000, total: 1296000 },
            { amount: 1000000, duration: 24, type: 'business', monthly: 58000, interest: 392000, fees: 25000, total: 1392000 },
            
            // Prêts de 2,000,000 FCFA
            { amount: 2000000, duration: 12, type: 'agricultural', monthly: 204000, interest: 448000, fees: 40000, total: 2448000 },
            { amount: 2000000, duration: 18, type: 'agricultural', monthly: 144000, interest: 592000, fees: 40000, total: 2592000 },
            { amount: 2000000, duration: 24, type: 'agricultural', monthly: 116000, interest: 784000, fees: 40000, total: 2784000 },
            { amount: 2000000, duration: 36, type: 'agricultural', monthly: 82000, interest: 952000, fees: 40000, total: 2952000 },
            
            // Prêts de 5,000,000 FCFA
            { amount: 5000000, duration: 24, type: 'education', monthly: 290000, interest: 1960000, fees: 80000, total: 6960000 },
            { amount: 5000000, duration: 36, type: 'education', monthly: 205000, interest: 2380000, fees: 80000, total: 7380000 },
        ];

        // Initialisation du tableau
        let currentTariffs = [...loanTariffs];
        
        // Éléments DOM
        const loanTableBody = document.getElementById('loanTableBody');
        const loanTableLoading = document.getElementById('loanTableLoading');
        const filterAmount = document.getElementById('filterAmount');
        const filterDuration = document.getElementById('filterDuration');
        const filterType = document.getElementById('filterType');

        // Fonction de formatage des montants
        function formatCurrency(amount) {
            return new Intl.NumberFormat('fr-FR', {
                style: 'currency',
                currency: 'XOF',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(amount);
        }

        // Fonction de formatage des types de prêt
        function formatLoanType(type) {
            const types = {
                'personal': 'Personnel',
                'business': 'Commercial',
                'agricultural': 'Agricole',
                'education': 'Scolaire'
            };
            return types[type] || type;
        }

        // Fonction d'affichage du tableau
        function displayLoanTable(tariffs) {
            if (!loanTableBody) return;

            loanTableBody.innerHTML = '';

            if (tariffs.length === 0) {
                loanTableBody.innerHTML = `
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <i class="fas fa-search text-muted"></i>
                            <p class="mt-2 text-muted">Aucun tarif trouvé pour les critères sélectionnés</p>
                        </td>
                    </tr>
                `;
                return;
            }

            tariffs.forEach(tariff => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="amount">${formatCurrency(tariff.amount)}</td>
                    <td><span class="duration">${tariff.duration} mois</span></td>
                    <td><span class="type">${formatLoanType(tariff.type)}</span></td>
                    <td class="monthly">${formatCurrency(tariff.monthly)}</td>
                    <td class="interest">${formatCurrency(tariff.interest)}</td>
                    <td class="fees">${formatCurrency(tariff.fees)}</td>
                    <td class="total">${formatCurrency(tariff.total)}</td>
                    <td>
                        <a href="<?php echo e(route('contact')); ?>?loan=${tariff.amount}&duration=${tariff.duration}&type=${tariff.type}" 
                           class="loan-info" title="Demander ce prêt">
                            <i class="fas fa-info-circle"></i> Détails
                        </a>
                    </td>
                `;
                loanTableBody.appendChild(row);
            });
        }

        // Fonction de filtrage
        function filterTariffs() {
            const amountFilter = filterAmount.value;
            const durationFilter = filterDuration.value;
            const typeFilter = filterType.value;

            console.log('Filtres appliqués:', { amountFilter, durationFilter, typeFilter });

            let filtered = loanTariffs.filter(tariff => {
                const amountMatch = amountFilter === 'all' || tariff.amount === parseInt(amountFilter);
                const durationMatch = durationFilter === 'all' || tariff.duration === parseInt(durationFilter);
                const typeMatch = typeFilter === 'all' || tariff.type === typeFilter;

                console.log('Tariff:', tariff, 'Matches:', { amountMatch, durationMatch, typeMatch });

                return amountMatch && durationMatch && typeMatch;
            });

            console.log('Résultats filtrés:', filtered.length);
            currentTariffs = filtered;
            displayLoanTable(filtered);
        }

        // Fonction de chargement initial
        function loadLoanTable() {
            if (loanTableLoading) {
                loanTableLoading.style.display = 'block';
            }

            // Simulation d'un délai de chargement
            setTimeout(() => {
                if (loanTableLoading) {
                    loanTableLoading.style.display = 'none';
                }
                displayLoanTable(currentTariffs);
            }, 1000);
        }

        // Fonction de réinitialisation des filtres
        function resetFilters() {
            filterAmount.value = 'all';
            filterDuration.value = 'all';
            filterType.value = 'all';
            
            currentTariffs = [...loanTariffs];
            displayLoanTable(currentTariffs);
        }

        // Fonction de rafraîchissement
        function refreshTable() {
            loadLoanTable();
            resetFilters();
        }

        // Écouteurs d'événements pour les filtres
        const applyFiltersBtn = document.getElementById('applyFilters');
        const resetFiltersBtn = document.getElementById('resetFilters');

        if (applyFiltersBtn) {
            applyFiltersBtn.addEventListener('click', filterTariffs);
        }
        if (resetFiltersBtn) {
            resetFiltersBtn.addEventListener('click', resetFilters);
        }

        // Chargement initial du tableau
        loadLoanTable();


    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/welcome.blade.php ENDPATH**/ ?>