<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<style>
    :root {
        --primary-color: #EC281C;
        --dark-charcoal: #2D3748;
        --text-color: #4A5568;
        --light-gray-bg: #F7FAFC;
        --border-color: #E2E8F0;
        --font-family: 'Poppins', sans-serif;
    }

    .agency-hero-section {
        padding: 80px 0;
        background-color: var(--dark-charcoal);
        color: #FFFFFF;
        font-family: var(--font-family);
    }

    .agency-hero-section .section-title {
        font-size: 2.8rem;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .agency-hero-section .lead {
        font-size: 1.2rem;
        max-width: 700px;
        margin: 15px auto 30px auto;
        color: rgba(255, 255, 255, 0.8);
    }

    .agency-search-bar {
        position: relative;
        max-width: 600px;
        margin: 0 auto;
    }

    .agency-search-bar .search-icon {
        position: absolute;
        top: 50%;
        left: 20px;
        transform: translateY(-50%);
        color: #A0AEC0;
        font-size: 1.1rem;
    }

    .agency-search-bar input {
        width: 100%;
        padding: 16px 20px 16px 55px;
        border-radius: 10px;
        border: 2px solid var(--border-color);
        background-color: #FFFFFF;
        font-size: 1rem;
        color: var(--dark-charcoal);
        outline: none;
        transition: all 0.3s ease;
    }

    .agency-search-bar input::placeholder {
        color: #A0AEC0;
    }

    .agency-search-bar input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(236, 40, 28, 0.1);
    }

    .agency-main-section {
        padding: 80px 0;
        background-color: var(--light-gray-bg);
        font-family: var(--font-family);
    }

    .agency-page-layout {
        display: grid;
        grid-template-columns: 4fr 3fr;
        gap: 50px;
    }

    .agency-map-container {
        position: sticky;
        top: 120px;
        height: 85vh;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(45, 55, 72, 0.1);
        z-index: 10;
        overflow: hidden;
    }

    #agency-map {
        width: 100%;
        height: 100%;
    }

    .agency-list-header {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .agency-list-header h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark-charcoal);
        margin: 0;
    }

    #agency-count {
        background-color: #EDF2F7;
        color: var(--dark-charcoal);
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
    }

    .agency-list-container {
        height: 80vh;
        overflow-y: auto;
        padding-right: 15px;
    }

    .agency-list-container::-webkit-scrollbar {
        width: 6px;
    }

    .agency-list-container::-webkit-scrollbar-track {
        background: #EDF2F7;
    }

    .agency-list-container::-webkit-scrollbar-thumb {
        background-color: #CBD5E0;
        border-radius: 6px;
    }

    .agency-card {
        background: #FFFFFF;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        margin-bottom: 20px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    }

    .agency-card:hover {
        transform: translateY(-4px) scale(1.01);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.07), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .agency-card.active {
        border-color: var(--primary-color);
        box-shadow: 0 10px 15px -3px rgba(236, 40, 28, 0.1), 0 4px 6px -2px rgba(236, 40, 28, 0.05);
    }

    .agency-card .card-content {
        padding: 25px;
    }

    .agency-card .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .agency-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--dark-charcoal);
        margin: 0;
    }

    .status-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 8px;
    }

    .status-dot[data-status="Open"] {
        background-color: #38A169;
    }

    .status-dot[data-status="Close"] {
        background-color: #E53E3E;
    }

    .agency-status {
        font-weight: 500;
        font-size: 0.9rem;
    }

    .agency-info {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }

    .agency-info li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 12px;
        color: var(--text-color);
    }

    .agency-info .info-icon {
        color: var(--primary-color);
        font-size: 1rem;
        width: 20px;
        text-align: center;
        margin-right: 15px;
        margin-top: 2px;
    }

    .agency-actions {
        display: flex;
        gap: 10px;
    }

    .btn-action {
        flex: 1;
        padding: 10px 15px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        text-align: center;
        transition: all 0.2s ease;
        border: 2px solid transparent;
    }

    .btn-route {
        background-color: var(--primary-color);
        color: #FFFFFF;
    }

    .btn-route:hover {
        background-color: #c01e13;
    }

    .btn-call {
        background-color: transparent;
        color: var(--dark-charcoal);
        border-color: var(--border-color);
    }

    .btn-call:hover {
        background-color: var(--light-gray-bg);
    }

    .no-results-message {
        text-align: center;
        padding: 40px 20px;
        background-color: #fff;
        border-radius: 12px;
        border: 1px solid var(--border-color);
    }

    .no-results-message i {
        font-size: 2.5rem;
        color: #CBD5E0;
        margin-bottom: 15px;
    }

    .no-results-message p {
        font-size: 1.1rem;
        color: var(--text-color);
        font-weight: 500;
        margin: 0;
    }

    @media (max-width: 991px) {
        .agency-page-layout {
            grid-template-columns: 1fr;
        }

        .agency-map-container {
            position: relative;
            top: 0;
            height: 50vh;
        }

        .agency-list-container {
            height: auto;
            overflow-y: visible;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('includes.main.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="agency-hero-section text-center">
    <div class="container">
        <h2 class="section-title">Notre Réseau d'Agences</h2>
        <p class="lead">Proche de vous, pour vous servir. Trouvez l'agence COCEC qu'il vous faut.</p>
        <div class="agency-search-bar">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="agency-search-input" placeholder="Rechercher par nom ou par ville...">
        </div>
    </div>
</section>

<section class="agency-main-section">
    <div class="container">
        <div class="agency-page-layout">
            <!-- Colonne de la Carte -->
            <div class="agency-map-container">
                <div id="agency-map"></div>
            </div>

            <!-- Colonne de la Liste des Agences -->
            <div>
                <div class="agency-list-header">
                    <h3>Nos Agences</h3>
                    <span id="agency-count"></span>
                </div>
                <div class="agency-list-container" id="agency-list">
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('includes.main.scroll', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('includes.main.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const agencies = <?php echo json_encode($agencies, 15, 512) ?>;

        // =================================================================
        // NOUVELLE FONCTION POUR DÉTERMINER LE STATUT EN TEMPS RÉEL
        // =================================================================

        function getDynamicAgencyStatus() {
            const now = new Date();
            const day = now.getDay(); // 0 = Dimanche, 1 = Lundi, ..., 6 = Samedi
            const hour = now.getHours(); // 0-23 (format 24h)

            // Règle 1 : Fermé le weekend (Samedi et Dimanche)
            if (day === 0 || day === 6) {
                return {
                    text: 'Fermé',
                    className: 'Close'
                };
            }

            // Règle 2 : Ouvert en semaine entre 9h00 et 16h59
            // (hour >= 9) signifie "à partir de 9h"
            // (hour < 17) signifie "jusqu'à 16h59", donc on ferme à 17h pile.
            if (hour >= 9 && hour < 17) {
                return {
                    text: 'Ouvert',
                    className: 'Open'
                };
            }

            // Règle 3 : Dans tous les autres cas (en semaine, mais en dehors des heures), c'est fermé.
            return {
                text: 'Fermé',
                className: 'Close'
            };
        }

        const map = L.map('agency-map').setView([6.30, 1.0], 9);
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors © <a href="https://carto.com/attributions">CARTO</a>'
        }).addTo(map);

        const markersLayer = new L.LayerGroup().addTo(map);
        const agencyListContainer = document.getElementById('agency-list');
        const searchInput = document.getElementById('agency-search-input');
        const agencyCountSpan = document.getElementById('agency-count');

        const customIcon = L.icon({
            iconUrl: `data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"><path fill="%23EC281C" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/><path fill="none" d="M0 0h24v24H0z"/></svg>`,
            iconSize: [36, 36],
            iconAnchor: [18, 36],
            popupAnchor: [0, -36]
        });

        function renderListAndMarkers(filteredAgencies) {
            agencyListContainer.innerHTML = '';
            markersLayer.clearLayers();
            agencyCountSpan.textContent = `${filteredAgencies.length} agence(s) trouvée(s)`;

            if (filteredAgencies.length === 0) {
                agencyListContainer.innerHTML = `
<div class="no-results-message">
<i class="fas fa-store-slash"></i>
<p>Aucune agence ne correspond à votre recherche.</p>
</div>`;
                return;
            }

            // On récupère le statut une seule fois, il sera le même pour toutes les agences.
            const dynamicStatus = getDynamicAgencyStatus();

            filteredAgencies.forEach(agency => {
                // =================================================================
                // MODIFICATION : ON UTILISE LE STATUT DYNAMIQUE
                // Le statut de la base de données est maintenant ignoré.
                // =================================================================
                const statusText = dynamicStatus.text;
                const statusClass = dynamicStatus.className;

                const cardHTML = `
<div class="agency-card" id="agency-${agency.id}" data-id="${agency.id}">
<div class="card-content">
<div class="card-header">
<h3 class="agency-title">${agency.name}</h3>
<span class="agency-status">
<span class="status-dot" data-status="${statusClass}"></span>
${statusText}
</span>
</div>
<ul class="agency-info">
<li><i class="fas fa-map-marker-alt info-icon"></i> <div>${agency.address}</div></li>
<li><i class="fas fa-phone-alt info-icon"></i> <div>(+228) ${agency.phone}</div></li>
</ul>
<div class="agency-actions">
<a href="https://www.google.com/maps/dir/?api=1&destination=${agency.latitude},${agency.longitude}" target="_blank" class="btn-action btn-route"><i class="fas fa-directions"></i> Itinéraire</a>
<a href="tel:+228${agency.phone}" class="btn-action btn-call"><i class="fas fa-phone-alt"></i> Appeler</a>
</div>
</div>
</div>`;
                agencyListContainer.insertAdjacentHTML('beforeend', cardHTML);

                const marker = L.marker([agency.latitude, agency.longitude], {
                        icon: customIcon,
                        riseOnHover: true
                    })
                    .bindPopup(`<b>${agency.name}</b><br>${agency.address}`)
                    .on('click', () => handleInteraction(agency.id, 'marker'));

                marker.agencyId = agency.id;
                markersLayer.addLayer(marker);
            });
            attachCardEventListeners();
        }

        function handleInteraction(id, source = 'card') {
            const agency = agencies.find(a => a.id === id);
            if (!agency) return;

            map.flyTo([agency.latitude, agency.longitude], 15);

            markersLayer.eachLayer(marker => {
                if (marker.agencyId === id) {
                    marker.openPopup();
                }
            });

            document.querySelectorAll('.agency-card').forEach(c => c.classList.remove('active'));
            const activeCard = document.getElementById(`agency-${id}`);
            if (activeCard) {
                activeCard.classList.add('active');
                if (source === 'marker') {
                    activeCard.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            }
        }

        function attachCardEventListeners() {
            document.querySelectorAll('.agency-card').forEach(card => {
                card.addEventListener('click', function() {
                    handleInteraction(parseInt(this.dataset.id));
                });
            });
        }

        function filterAgencies() {
            const searchTerm = searchInput.value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            const filtered = agencies.filter(agency =>
                agency.name.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").includes(searchTerm) ||
                agency.address.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").includes(searchTerm)
            );
            renderListAndMarkers(filtered);
        }

        searchInput.addEventListener('input', filterAgencies);
        renderListAndMarkers(agencies);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/main/agency.blade.php ENDPATH**/ ?>