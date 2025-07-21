@extends('layout.main')

@section('css')
<style>
    /* === STYLE "PRESTIGE" DE LA PAGE FAQ === */

    :root {
        --primary-color: #EC281C;
        --dark-charcoal: #1A202C;
        --text-color: #4A5568;
        --light-gray-bg: #F7FAFC;
        --border-color: #E2E8F0;
        --font-family: 'Poppins', sans-serif;
    }

    .faq-pro-section {
        padding: 100px 0;
        background-color: #FFFFFF;
        font-family: var(--font-family);
    }
    
    /* --- En-tête de la section --- */
    .faq-pro-section .section-heading .sub-heading { color: var(--primary-color); }
    .faq-pro-section .section-heading .section-title { color: var(--dark-charcoal); font-weight: 700; font-size: 2.8rem;}
    .faq-pro-section .section-heading .lead { color: var(--text-color); max-width: 700px; margin: 15px auto 0; }
    
    /* --- Layout Principal --- */
    .faq-layout {
        display: grid;
        grid-template-columns: 0.8fr 2fr; /* Colonne de catégories plus petite */
        gap: 50px;
        margin-top: 60px;
        align-items: flex-start;
    }

    /* --- Colonne des Catégories (Gauche) --- */
    .faq-categories-list {
        position: sticky;
        top: 120px; /* Espace pour le header */
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .faq-category-item {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        border: 1px solid transparent;
        border-radius: 10px;
        font-weight: 600;
        color: var(--text-color);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .faq-category-item i {
        font-size: 1.2rem;
        width: 30px;
        margin-right: 15px;
        color: var(--text-color);
        transition: all 0.3s ease;
    }

    .faq-category-item:hover {
        background-color: var(--light-gray-bg);
        color: var(--dark-charcoal);
    }

    .faq-category-item.active {
        background-color: #ec281c1a;
        color: var(--primary-color);
        font-weight: 700;
    }
    .faq-category-item.active i {
        color: var(--primary-color);
    }

    /* --- Colonne de l'Accordéon (Droite) --- */
    .faq-accordion-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .faq-item-pro {
        background: #FFFFFF;
        border-radius: 12px;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .faq-question-pro {
        padding: 20px 25px;
        font-weight: 600;
        font-size: 1.1rem;
        color: var(--dark-charcoal);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .faq-question-pro:hover { color: var(--primary-color); }

    .faq-toggle-icon {
        font-size: 1rem;
        color: var(--text-color);
        transition: transform 0.3s ease;
        width: 30px;
        height: 30px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background-color: var(--light-gray-bg);
    }

    .faq-answer-pro {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease-out, padding-bottom 0.4s ease-out;
    }

    .faq-answer-content {
        padding: 0 25px 0 25px; /* Padding bottom ajouté via JS */
        color: var(--text-color);
        line-height: 1.8;
    }
    .faq-answer-content ul { padding-left: 20px; margin-top: 15px; }
    .faq-answer-content li { margin-bottom: 10px; }

    /* État actif de l'accordéon */
    .faq-item-pro.active .faq-toggle-icon {
        transform: rotate(135deg);
        background-color: var(--primary-color);
        color: #FFFFFF;
    }

    /* --- Section Contact --- */
    .faq-contact-section {
        margin-top: 60px;
        padding: 40px;
        background: var(--dark-charcoal);
        border-radius: 16px;
        text-align: center;
        color: #FFFFFF;
    }
    .faq-contact-section h3 { font-size: 1.5rem; font-weight: 600; margin-bottom: 10px; }
    .faq-contact-section p { color: var(--subtle-text, #A0AEC0); margin-bottom: 25px; }
    .btn-contact-faq {
        display: inline-block;
        background: var(--primary-color);
        color: #FFFFFF;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .btn-contact-faq:hover { background-color: #FFFFFF; color: var(--primary-color); transform: translateY(-2px); }

    /* --- Responsive --- */
    @media (max-width: 991px) {
        .faq-layout { grid-template-columns: 1fr; }
        .faq-categories-list {
            position: relative;
            top: 0;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }
    }

</style>
@endsection

@section('content')

<body>
    @include('includes.main.loading')
    @include('includes.main.header')

    <br><br><br><br>

    <section class="faq-pro-section">
        <div class="container">
            <div class="section-heading text-center" data-aos="fade-up">
                <h4 class="sub-heading">Aide & Support</h4>
                <h2 class="section-title">Réponses à vos Questions</h2>
                <p class="lead">Parcourez nos catégories pour trouver rapidement les informations dont vous avez besoin sur nos services et procédures.</p>
            </div>

            <div class="faq-layout">
                <!-- Colonne de navigation des catégories -->
                <aside class="faq-categories-list" data-aos="fade-right">
                    <div class="faq-category-item active" data-category="tous">
                        <i class="fas fa-globe-americas"></i>
                        <span>Toutes les questions</span>
                    </div>
                    <div class="faq-category-item" data-category="general">
                        <i class="fas fa-info-circle"></i>
                        <span>Général</span>
                    </div>
                    <div class="faq-category-item" data-category="comptes">
                        <i class="fas fa-wallet"></i>
                        <span>Comptes & Crédits</span>
                    </div>
                    <div class="faq-category-item" data-category="digital">
                        <i class="fas fa-mobile-alt"></i>
                        <span>Services Digitaux</span>
                    </div>
                </aside>

                <!-- Colonne des questions -->
                <main class="faq-accordion-container" data-aos="fade-left" data-aos-delay="200">
                    <div class="faq-item-pro" data-category="general">
                        <div class="faq-question-pro">
                            <span>Qu'est-ce que la COCEC ?</span>
                            <div class="faq-toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer-pro">
                            <div class="faq-answer-content">
                                <p>La COCEC (Coopérative Chrétienne d’Epargne et de Crédit) est une institution de microfinance dédiée à l'amélioration des conditions de vie de ses membres en offrant des services financiers accessibles et adaptés.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-item-pro" data-category="general">
                        <div class="faq-question-pro">
                            <span>Qui peut devenir membre de la COCEC ?</span>
                            <div class="faq-toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer-pro">
                            <div class="faq-answer-content">
                                <p>Toute personne morale ou physique, quel que soit son secteur d'activité, peut devenir membre et bénéficier de nos services, en adhérant à nos valeurs et objectifs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-item-pro" data-category="comptes">
                        <div class="faq-question-pro">
                            <span>Quels types de comptes proposez-vous ?</span>
                            <div class="faq-toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer-pro">
                            <div class="faq-answer-content">
                                <p>Nous proposons une gamme variée de comptes :</p>
                                <ul>
                                    <li><strong>Compte Épargne :</strong> Pour faire fructifier votre argent en toute sécurité.</li>
                                    <li><strong>Compte Courant :</strong> Pour la gestion de vos opérations quotidiennes.</li>
                                    <li><strong>Compte Tontine :</strong> Une solution d'épargne rotative adaptée.</li>
                                    <li><strong>Compte Épargne Projet :</strong> Pour concrétiser vos projets futurs.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="faq-item-pro" data-category="comptes">
                        <div class="faq-question-pro">
                            <span>Quels documents pour ouvrir un compte ?</span>
                            <div class="faq-toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer-pro">
                            <div class="faq-answer-content">
                                <p>Pour une personne physique, il vous faudra généralement : une pièce d'identité en cours de validité, deux photos d'identité récentes, un justificatif de domicile et un versement initial. L'ouverture peut aussi se faire en ligne.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-item-pro" data-category="digital">
                        <div class="faq-question-pro">
                            <span>Comment accéder à mes comptes en ligne ?</span>
                            <div class="faq-toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer-pro">
                            <div class="faq-answer-content">
                                <p>Vous pouvez accéder à vos comptes 24h/24 via :</p>
                                <ul>
                                    <li><strong>COCEC Mobile :</strong> Notre application smartphone complète.</li>
                                    <li><strong>COCEC USSD (*145#) :</strong> Accès sans internet pour les opérations essentielles.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="faq-item-pro" data-category="digital">
                        <div class="faq-question-pro">
                            <span>Puis-je lier mon compte COCEC au Mobile Money ?</span>
                            <div class="faq-toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer-pro">
                            <div class="faq-answer-content">
                                <p>Oui, nos services permettent des transferts fluides et instantanés entre votre compte COCEC et vos portefeuilles T-Money ou Flooz, dans les deux sens (dépôt et retrait).</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section Contact -->
                    <div class="faq-contact-section" data-aos="fade-up">
                        <h3>Vous ne trouvez pas votre réponse ?</h3>
                        <p>Notre équipe est là pour vous aider. N'hésitez pas à nous contacter directement.</p>
                        <a href="{{-- route('contact.index') --}}" class="btn-contact-faq">Nous Contacter</a>
                    </div>
                </main>
            </div>
        </div>
    </section>

    @include('includes.main.scroll')
    @include('includes.main.footer')
</body>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqSection = document.querySelector('.faq-pro-section');
    if (!faqSection) return;

    const categoryItems = faqSection.querySelectorAll('.faq-category-item');
    const faqItems = faqSection.querySelectorAll('.faq-item-pro');

    // --- Logique du filtre par catégorie ---
    categoryItems.forEach(categoryTab => {
        categoryTab.addEventListener('click', () => {
            const category = categoryTab.dataset.category;

            // Mettre à jour l'état actif des onglets
            categoryItems.forEach(t => t.classList.remove('active'));
            categoryTab.classList.add('active');

            // Afficher ou masquer les items de l'accordéon
            faqItems.forEach(item => {
                const itemCategory = item.dataset.category;
                const shouldBeVisible = (category === 'tous' || category === itemCategory);
                item.style.display = shouldBeVisible ? 'block' : 'none';
            });
        });
    });

    // --- Logique de l'accordéon ---
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question-pro');
        const answer = item.querySelector('.faq-answer-pro');
        const answerContent = item.querySelector('.faq-answer-content');

        question.addEventListener('click', () => {
            const isOpen = item.classList.contains('active');

            // Fermer tous les items avant d'en ouvrir un (comportement d'accordéon classique)
            // faqItems.forEach(i => {
            //     i.classList.remove('active');
            //     i.querySelector('.faq-answer-pro').style.maxHeight = '0px';
            //     i.querySelector('.faq-answer-pro').style.paddingBottom = '0px';
            // });

            if (isOpen) {
                item.classList.remove('active');
                answer.style.maxHeight = '0px';
                answer.style.paddingBottom = '0px';
            } else {
                item.classList.add('active');
                answer.style.maxHeight = answerContent.scrollHeight + 45 + 'px'; // +45 pour le padding
                answer.style.paddingBottom = '25px';
            }
        });
    });
});
</script>
@endsection