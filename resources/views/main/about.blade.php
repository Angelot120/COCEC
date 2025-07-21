@extends('layout.main')


@section('content')

<body>
    @include('includes.main.loading')
    @include('includes.main.header')

    <br><br><br><br>

    <!-- Section Héros -->
    <section class="about-hero-section">
        <div class="container">
            <h4 class="sub-heading" data-aos="fade-up">À PROPOS DE LA COCEC</h4>
            <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Bâtir la confiance, financer l'avenir.</h2>
        </div>
    </section>

    <!-- Section Mot du Directeur -->
    <section class="director-section page-section">
        <div class="container">
            <div class="director-layout">
                <div class="director-photo-wrapper" data-aos="fade-right">
                    {{-- Remplacez par le vrai chemin de l'image du directeur --}}
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1887&auto=format&fit=crop" alt="Photo du Directeur Général">
                </div>
                <div class="director-quote" data-aos="fade-left">
                    <h3>Le mot du Directeur Général</h3>
                    <div class="quote-text">
                        <p>La COCEC, depuis sa création, a placé l’amélioration des conditions de vie au centre de ses stratégies. Notre grand défi est de continuer à proposer des produits innovants à moindre coût, en utilisant les nouvelles technologies pour faire de la COCEC une institution moderne et résolument tournée vers l’avenir. Avec la confiance renouvelée de nos clients et de nos partenaires, nous accomplirons des exploits.</p>
                    </div>
                    <div class="director-signature">
                        <div class="director-name">Nom du Directeur</div>
                        <div class="director-title">Directeur Général, COCEC</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Qui Sommes-Nous, Mission & Vision -->
    <section class="history-mission-section page-section">
        <div class="container">
            <div class="history-layout">
                <div class="history-content" data-aos="fade-up">
                    <h3 class="section-heading-sm">Notre Histoire, Notre Engagement</h3>
                    <p>La Coopérative Chrétienne d’Epargne et de Crédit (COCEC), créée en 2001, est un Système Financier Décentralisé agréé, intervenant essentiellement dans la zone Lomé commune et ses environs. Nous offrons nos services à toute personne sans distinction, en poursuivant quatre objectifs principaux :</p>
                    <ul>
                        <li><i class="fas fa-check-circle"></i>
                            <div>Collecter l’épargne de nos membres et leur consentir du crédit.</div>
                        </li>
                        <li><i class="fas fa-check-circle"></i>
                            <div>Favoriser la solidarité et la coopération entre les membres.</div>
                        </li>
                        <li><i class="fas fa-check-circle"></i>
                            <div>Promouvoir l’éducation économique, sociale et coopérative.</div>
                        </li>
                        <li><i class="fas fa-check-circle"></i>
                            <div>Accompagner nos clients dans la réalisation de leurs projets.</div>
                        </li>
                    </ul>
                    <p>Nous intervenons dans des domaines variés comme le commerce, l'agriculture, le transport, l'immobilier et bien d'autres, répondant aux besoins de financement des flux commerciaux formels et informels.</p>
                </div>
                <div class="mission-vision-stack" data-aos="fade-left">
                    <div class="mission-vision-box" data-aos="fade-up" data-aos-delay="100">
                        <h4>Notre Vision</h4>
                        <p>Devenir une institution de référence au Togo et à l’extérieur en matière de gouvernance, de contrôle et d’offres de produits et services de qualité à moindre coût.</p>
                    </div>
                    <div class="mission-vision-box" data-aos="fade-up" data-aos-delay="200">
                        <h4>Notre Mission</h4>
                        <p>Contribuer à l’amélioration de la qualité de vie en œuvrant à la réduction de la pauvreté par la mise à disposition de services d’épargne et de crédit adaptés et pérennes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Nos Valeurs -->
    <section class="values-section page-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Les Piliers de Notre Action</h2>
            <div class="values-grid">
                <div class="value-card-detailed" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-header"><i class="fas fa-cross value-icon"></i>
                        <h5 class="value-title">Crainte de Dieu</h5>
                    </div>
                    <p class="value-description">Convaincus qu'elle est le commencement de la sagesse, nous nous y attachons fermement pour remplir notre mission.</p>
                </div>
                <div class="value-card-detailed" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-header"><i class="fas fa-praying-hands value-icon"></i>
                        <h5 class="value-title">Foi</h5>
                    </div>
                    <p class="value-description">Par conviction, nous croyons que c’est par la foi en Dieu et en notre travail que notre vision sera réalisée.</p>
                </div>
                <div class="value-card-detailed" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-header"><i class="fas fa-users value-icon"></i>
                        <h5 class="value-title">Respect des Membres</h5>
                    </div>
                    <p class="value-description">Nous n'existons que par nos membres. À ce titre, nous leur devons une pleine considération et un grand respect.</p>
                </div>
                <div class="value-card-detailed" data-aos="fade-up" data-aos-delay="400">
                    <div class="value-header"><i class="fas fa-star value-icon"></i>
                        <h5 class="value-title">Qualité de Service</h5>
                    </div>
                    <p class="value-description">Chacun donne le meilleur de lui-même pour un service efficient, avec honnêteté, intégrité et professionnalisme.</p>
                </div>
                <div class="value-card-detailed" data-aos="fade-up" data-aos-delay="500">
                    <div class="value-header"><i class="fas fa-balance-scale value-icon"></i>
                        <h5 class="value-title">Responsabilité</h5>
                    </div>
                    <p class="value-description">Chaque dirigeant et employé est disposé à rendre compte des ressources et des tâches qui lui sont confiées.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Organigramme -->
    <section class="org-chart-section page-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Notre Structure Organisationnelle</h2>
            <div class="org-chart-image-wrapper" data-aos="fade-up" data-aos-delay="100">
                {{-- Remplacez par le chemin de votre image --}}
                <img src="{{ asset('images/organigramme.png') }}" alt="Organigramme de la COCEC">
            </div>
        </div>
    </section>

    @include('includes.main.scroll')
    @include('includes.main.footer')

</body>
@endsection