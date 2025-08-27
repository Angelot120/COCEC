<!-- La structure complète de la popup/modale -->
<div id="popup-overlay" class="popup-overlay">
    <div class="popup-container">
        <!-- Bouton pour fermer la modale -->
        <button class="popup-close" aria-label="Fermer">×</button>

        <!-- Votre contenu original est maintenant ici à l'intérieur -->
        <section id="popup-data">
            <?php if($announcement): ?>
            <div id="popup-announcement" class="popup-content">
                <h2><?php echo e($announcement->title); ?></h2>
                <?php if($announcement->image): ?>
                <img src="<?php echo e(asset('storage/' . $announcement->image)); ?>" alt="Annonce">
                <?php endif; ?>
                <p><?php echo e($announcement->description); ?></p>
            </div>
            <?php else: ?>
            <div id="popup-newsletter" class="popup-content">
                <h2>Inscris-toi à notre newsletter</h2>
                <p>Reçois nos meilleures offres et actualités directement dans ta boîte mail.</p>
                <form id="popup-newsletter-form" action="<?php echo e(route('newsletter.subscribe')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Votre adresse e-mail" required>
                        <button type="submit">S’inscrire</button>
                    </div>
                </form>
            </div>
            <?php endif; ?>
        </section>
    </div>
</div><?php /**PATH D:\COCEC\resources\views/includes/main/popup.blade.php ENDPATH**/ ?>