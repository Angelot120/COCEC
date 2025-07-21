@extends('layout.main')

@section('css')
<style>
    /* === STYLES COMMUNS "PRESTIGE" === */
    :root {
        --primary-color: #EC281C;
        --dark-charcoal: #1A202C;
        --text-color: #4A5568;
        --light-gray-bg: #F7FAFC;
        --border-color: #E2E8F0;
        --font-family: 'Poppins', sans-serif;
    }

    body {
        font-family: var(--font-family);
    }

    /* === STYLES DE LA PAGE FAQ === */
    .faq-pro-section {
        padding: 100px 0 0 0;
        /* Réduction du padding bas pour lier avec la section suivante */
        background-color: #FFFFFF;
    }

    .faq-pro-section .section-heading .sub-heading {
        color: var(--primary-color);
    }

    .faq-pro-section .section-heading .section-title {
        color: var(--dark-charcoal);
        font-weight: 700;
        font-size: 2.8rem;
    }

    .faq-pro-section .section-heading .lead {
        color: var(--text-color);
        max-width: 700px;
        margin: 15px auto 0;
    }

    .faq-layout {
        display: grid;
        grid-template-columns: 0.8fr 2fr;
        gap: 50px;
        margin-top: 60px;
        align-items: flex-start;
    }

    .faq-categories-list {
        position: sticky;
        top: 120px;
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

    .faq-question-pro:hover {
        color: var(--primary-color);
    }

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
        padding: 0 25px 0 25px;
        color: var(--text-color);
        line-height: 1.8;
    }

    .faq-answer-content ul {
        padding-left: 20px;
        margin-top: 15px;
    }

    .faq-answer-content li {
        margin-bottom: 10px;
    }

    .faq-item-pro.active .faq-toggle-icon {
        transform: rotate(135deg);
        background-color: var(--primary-color);
        color: #FFFFFF;
    }

    /* === STYLE DE LA SECTION AVIS & QUESTIONS === */
    .community-section {
        padding: 80px 0;
        background-color: var(--light-gray-bg);
        border-top: 1px solid var(--border-color);
    }

    .community-wrapper {
        max-width: 800px;
        margin: 0 auto;
    }

    .community-wrapper .section-heading {
        margin-bottom: 40px;
    }

    .comment-form-wrapper {
        padding: 40px;
        background-color: #FFFFFF;
        border: 1px solid var(--border-color);
        border-radius: 16px;
        margin-bottom: 60px;
    }

    .comment-form-wrapper .form-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--dark-charcoal);
        margin-bottom: 30px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        font-weight: 500;
        color: var(--dark-charcoal);
        margin-bottom: 8px;
    }

    .form-control-pro {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        background-color: #FFFFFF;
        font-size: 1rem;
        color: var(--text-color);
        transition: all 0.3s ease;
    }

    .form-control-pro:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(236, 40, 28, 0.1);
    }

    textarea.form-control-pro {
        min-height: 120px;
        resize: vertical;
    }

    .btn-submit-comment {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background-color: var(--primary-color);
        color: #FFFFFF;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit-comment:hover {
        background-color: #c01e13;
        transform: translateY(-2px);
    }

    .comments-list-wrapper .list-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--dark-charcoal);
        margin-bottom: 30px;
    }

    .comments-list {
        list-style: none;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .comment-item {
        display: flex;
        gap: 20px;
    }

    .comment-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        flex-shrink: 0;
    }

    .comment-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .comment-content {
        flex-grow: 1;
    }

    .comment-header {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
        gap: 10px;
    }

    .comment-author {
        font-weight: 600;
        color: var(--dark-charcoal);
    }

    .comment-author .support-tag {
        background-color: var(--primary-color);
        color: #fff;
        font-size: 0.7rem;
        padding: 3px 8px;
        border-radius: 5px;
        margin-left: 8px;
        font-weight: 500;
    }

    .comment-date {
        font-size: 0.85rem;
        color: var(--text-color);
    }

    .comment-body p {
        color: var(--text-color);
        line-height: 1.7;
        margin: 0;
    }

    .comment-reply-btn {
        background: none;
        border: none;
        color: var(--primary-color);
        font-weight: 600;
        cursor: pointer;
        padding: 5px 0;
        margin-top: 10px;
        font-size: 0.9rem;
    }

    .comment-reply-btn i {
        margin-right: 5px;
    }

    .comment-replies {
        list-style: none;
        padding: 25px 0 0 25px;
        margin-top: 25px;
        border-left: 2px solid var(--border-color);
    }

    /* --- Section Contact (déplacée en bas) --- */
    .faq-contact-wrapper {
        padding-top: 80px;
        background: #FFFFFF;
    }

    /* Nouveau conteneur pour le contact */
    .faq-contact-section {
        padding: 40px;
        background: var(--dark-charcoal);
        border-radius: 16px;
        text-align: center;
        color: #FFFFFF;
    }

    .faq-contact-section h3 {
        color: #FFFFFF;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .faq-contact-section p {
        color: var(--subtle-text, #A0AEC0);
        margin-bottom: 25px;
    }

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

    .btn-contact-faq:hover {
        background-color: #FFFFFF;
        color: var(--primary-color);
        transform: translateY(-2px);
    }

    /* --- Responsive --- */
    @media (max-width: 991px) {
        .faq-layout {
            grid-template-columns: 1fr;
        }

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

    {{-- En-tête de page --}}
    <section class="page-header-pro">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">FAQ</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ./ page-header -->

    {{-- Section FAQ --}}
    <section class="faq-pro-section">
        <div class="container">
            <div class="section-heading text-center" data-aos="fade-up">
                <h4 class="sub-heading">Aide & Support</h4>
                <h2 class="section-title">Réponses à vos Questions</h2>
                <p class="lead">Parcourez nos catégories pour trouver rapidement les informations dont vous avez besoin sur nos services et procédures.</p>
            </div>

            <div class="faq-layout">
                <aside class="faq-categories-list" data-aos="fade-right">
                    {{-- Navigation des catégories --}}
                    <div class="faq-category-item active" data-category="tous"><i class="fas fa-globe-americas"></i><span>Toutes les questions</span></div>
                    <div class="faq-category-item" data-category="general"><i class="fas fa-info-circle"></i><span>Général</span></div>
                    <div class="faq-category-item" data-category="comptes"><i class="fas fa-wallet"></i><span>Comptes & Crédits</span></div>
                    <div class="faq-category-item" data-category="digital"><i class="fas fa-mobile-alt"></i><span>Services Digitaux</span></div>
                </aside>

                <main class="faq-accordion-container" data-aos="fade-left" data-aos-delay="200">
                    {{-- Accordéon des questions --}}
                    <div class="faq-item-pro" data-category="general">
                        <div class="faq-question-pro"><span>Qu'est-ce que la COCEC ?</span>
                            <div class="faq-toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer-pro">
                            <div class="faq-answer-content">
                                <p>La COCEC (Coopérative Chrétienne d’Epargne et de Crédit) est une institution de microfinance dédiée à l'amélioration des conditions de vie de ses membres en offrant des services financiers accessibles et adaptés.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-item-pro" data-category="general">
                        <div class="faq-question-pro"><span>Qui peut devenir membre ?</span>
                            <div class="faq-toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer-pro">
                            <div class="faq-answer-content">
                                <p>Toute personne morale ou physique, quel que soit son secteur d'activité, peut devenir membre et bénéficier de nos services, en adhérant à nos valeurs et objectifs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="faq-item-pro" data-category="comptes">
                        <div class="faq-question-pro"><span>Quels types de comptes proposez-vous ?</span>
                            <div class="faq-toggle-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer-pro">
                            <div class="faq-answer-content">
                                <p>Nous proposons une gamme variée de comptes :</p>
                                <ul>
                                    <li><strong>Compte Épargne</strong></li>
                                    <li><strong>Compte Courant</strong></li>
                                    <li><strong>Compte Tontine</strong></li>
                                    <li><strong>Compte Épargne Projet</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="faq-item-pro" data-category="digital">
                        <div class="faq-question-pro"><span>Comment accéder à mes comptes en ligne ?</span>
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
                </main>
            </div>
        </div>
    </section>

    <br><br>

    <section class="community-section">
        <div class="container">
            <div class="community-wrapper">
                <div class="section-heading text-center" data-aos="fade-up">
                    <h2 class="section-title">Avis & Questions des Membres</h2>
                    <p class="lead">Lisez les témoignages de nos membres ou posez une question que notre FAQ ne couvre pas.</p>
                </div>

                <!-- Formulaire -->
                <div class="comment-form-wrapper" data-aos="fade-up">
                    <h3 class="form-title">Exprimez-vous</h3>
                    <form action="#" method="POST">
                        <div class="form-grid">
                            <div class="form-group"><label for="comment-name" class="form-label">Votre Nom</label><input type="text" id="comment-name" class="form-control-pro" required></div>
                            <div class="form-group"><label for="comment-email" class="form-label">Votre Email</label><input type="email" id="comment-email" class="form-control-pro" required></div>
                        </div>
                        <div class="form-group full-width"><label for="comment-message" class="form-label">Votre Question ou Avis</label><textarea id="comment-message" class="form-control-pro" placeholder="Posez votre question ou laissez un avis..." required></textarea></div>
                        <button type="submit" class="btn-submit-comment"><i class="fas fa-paper-plane"></i><span>Soumettre</span></button>
                    </form>
                </div>

                <!-- Liste des Avis & Questions -->
                <div class="comments-list-wrapper" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="list-title">Discussions Récentes</h3>
                    <ol class="comments-list">
                        <!-- Avis Client -->
                        <li class="comment-item">
                            <div class="comment-avatar"><img src="https://i.pravatar.cc/100?u=marie" alt="Avatar"></div>
                            <div class="comment-content">
                                <div class="comment-header"><span class="comment-author">Marie Claire</span><span class="comment-date">Il y a 1 jour</span></div>
                                <div class="comment-body">
                                    <p>Très satisfaite du service ! J'ai ouvert un compte épargne projet et l'accompagnement est excellent. C'est bien plus qu'une simple institution financière.</p>
                                </div>
                                <button class="comment-reply-btn"><i class="fas fa-reply"></i> Répondre</button>
                            </div>
                        </li>
                        <!-- Question et Réponse -->
                        <li class="comment-item">
                            <div class="comment-avatar"><img src="https://i.pravatar.cc/100?u=ahmed" alt="Avatar"></div>
                            <div class="comment-content">
                                <div class="comment-header"><span class="comment-author">Ahmed Diallo</span><span class="comment-date">Il y a 3 jours</span></div>
                                <div class="comment-body">
                                    <p>Bonjour, est-il possible d'obtenir un crédit pour l'achat de matériel agricole ? Je ne vois pas cette option dans la FAQ. Merci.</p>
                                </div>
                                <button class="comment-reply-btn"><i class="fas fa-reply"></i> Répondre</button>
                                <ol class="comment-replies">
                                    <li class="comment-item">
                                        <div class="comment-avatar"><img src="{{-- Chemin vers le logo COCEC --}}" alt="Avatar Support"></div>
                                        <div class="comment-content">
                                            <div class="comment-header"><span class="comment-author">Support COCEC <span class="support-tag">Officiel</span></span><span class="comment-date">Il y a 3 jours</span></div>
                                            <div class="comment-body">
                                                <p>Bonjour Ahmed, absolument. Nous proposons des crédits adaptés au secteur agricole. Nous vous invitons à vous rapprocher de votre agence la plus proche pour discuter de votre projet avec un conseiller. Excellente journée !</p>
                                            </div>
                                            <button class="comment-reply-btn"><i class="fas fa-reply"></i> Répondre</button>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Contact (Maintenant à la fin) --}}
    <div class="faq-contact-wrapper">
        <div class="container" data-aos="fade-up">
            <div class="faq-contact-section">
                <h3>Vous ne trouvez pas votre réponse ?</h3>
                <p>Notre équipe est là pour vous aider. N'hésitez pas à nous contacter directement.</p>
                <a href="{{ route('contact') }}" class="btn-contact-faq">Nous Contacter</a>
            </div>
        </div>
    </div>
    <br>


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

        categoryItems.forEach(categoryTab => {
            categoryTab.addEventListener('click', () => {
                const category = categoryTab.dataset.category;
                categoryItems.forEach(t => t.classList.remove('active'));
                categoryTab.classList.add('active');
                faqItems.forEach(item => {
                    item.style.display = (category === 'tous' || item.dataset.category === category) ? 'block' : 'none';
                });
            });
        });

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question-pro');
            const answer = item.querySelector('.faq-answer-pro');
            const answerContent = item.querySelector('.faq-answer-content');
            question.addEventListener('click', () => {
                const isOpen = item.classList.contains('active');
                if (isOpen) {
                    item.classList.remove('active');
                    answer.style.maxHeight = '0px';
                    answer.style.paddingBottom = '0px';
                } else {
                    item.classList.add('active');
                    answer.style.maxHeight = answerContent.scrollHeight + 45 + 'px';
                    answer.style.paddingBottom = '25px';
                }
            });
        });
    });
</script>
@endsection