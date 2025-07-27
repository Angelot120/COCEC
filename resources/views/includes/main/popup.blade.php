<!-- La structure complète de la popup/modale -->
<div id="popup-overlay" class="popup-overlay">
    <div class="popup-container">
        <!-- Bouton pour fermer la modale -->
        <button class="popup-close" aria-label="Fermer">×</button>

        <!-- Votre contenu original est maintenant ici à l'intérieur -->
        <section id="popup-data">
            @if($announcement)
            <div id="popup-announcement" class="popup-content">
                <h2>{{ $announcement->title }}</h2>
                @if($announcement->image)
                <img src="{{ asset('storage/' . $announcement->image) }}" alt="Annonce">
                @endif
                <p>{{ $announcement->description }}</p>
            </div>
            @else
            <div id="popup-newsletter" class="popup-content">
                <h2>Inscris-toi à notre newsletter</h2>
                <p>Reçois nos meilleures offres et actualités directement dans ta boîte mail.</p>
                <form id="popup-newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Votre adresse e-mail" required>
                        <button type="submit">S’inscrire</button>
                    </div>
                </form>
            </div>
            @endif
        </section>
    </div>
</div>