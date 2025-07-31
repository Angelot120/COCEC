<?php $__env->startSection('css'); ?>
<style>
    /* ------------------------------------------- */
    /*    STYLE PRO DE LA PAGE DÉTAILS PRODUIT     */
    /* ------------------------------------------- */

    .product-details-section {
        padding: 100px 0;
        background-color: #f7f8fc;
        font-family: 'Poppins', sans-serif;
    }

    .product-hero {
        background: linear-gradient(135deg, #EC281C 0%, #ff6b6b 100%);
        color: white;
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .product-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        pointer-events: none;
    }

    .product-hero-content {
        position: relative;
        z-index: 2;
    }

    .product-icon-large {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.9;
    }

    .product-title-large {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .product-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }

    .product-content {
        background: white;
        border-radius: 20px;
        padding: 50px;
        margin-top: -50px;
        position: relative;
        z-index: 3;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }

    .product-description {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
        margin-bottom: 40px;
    }

    .features-section, .requirements-section {
        margin-bottom: 40px;
    }

    .section-title {
        color: #EC281C;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .section-title i {
        margin-right: 10px;
    }

    .features-list, .requirements-list {
        list-style: none;
        padding: 0;
    }

    .features-list li, .requirements-list li {
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
        position: relative;
        padding-left: 30px;
    }

    .features-list li:last-child, .requirements-list li:last-child {
        border-bottom: none;
    }

    .features-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #28a745;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .requirements-list li::before {
        content: '•';
        position: absolute;
        left: 0;
        color: #EC281C;
        font-weight: bold;
        font-size: 1.5rem;
    }

    .cta-section {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        margin-top: 40px;
    }

    .cta-title {
        color: #EC281C;
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .cta-description {
        color: #666;
        margin-bottom: 25px;
    }

    .breadcrumb-custom {
        background: transparent;
        padding: 0;
        margin-bottom: 30px;
    }

    .breadcrumb-custom .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
    }

    .breadcrumb-custom .breadcrumb-item.active {
        color: white;
    }

    .breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.6);
    }

    /* Loading state */
    .loading-state {
        text-align: center;
        padding: 100px 0;
    }

    .loading-spinner {
        width: 50px;
        height: 50px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #EC281C;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .product-title-large {
            font-size: 2rem;
        }
        
        .product-content {
            padding: 30px 20px;
            margin-top: -30px;
        }
        
        .product-icon-large {
            font-size: 3rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<body>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Loading State -->
    <div id="loadingState" class="loading-state">
        <div class="loading-spinner"></div>
        <p>Chargement des détails du produit...</p>
    </div>

    <!-- Product Details Content -->
    <div id="productContent" style="display: none;">
        <!-- Hero Section -->
        <section class="product-hero">
            <div class="container">
                <div class="product-hero-content text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-custom">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('product.index')); ?>">Produits</a></li>
                            <li class="breadcrumb-item active" aria-current="page" id="breadcrumbProduct">Produit</li>
                        </ol>
                    </nav>
                    
                    <div class="product-icon-large" id="productIcon">
                        <i class="fas fa-cog"></i>
                    </div>
                    
                    <h1 class="product-title-large" id="productTitle">Titre du Produit</h1>
                    <p class="product-subtitle" id="productSubtitle">Description courte du produit</p>
                </div>
            </div>
        </section>

        <!-- Product Content -->
        <section class="product-details-section">
            <div class="container">
                <div class="product-content">
                    <div class="product-description" id="productDescription">
                        Description détaillée du produit...
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="features-section">
                                <h3 class="section-title">
                                    <i class="fas fa-star"></i>
                                    Caractéristiques
                                </h3>
                                <ul class="features-list" id="featuresList">
                                    <!-- Features will be loaded here -->
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="requirements-section">
                                <h3 class="section-title">
                                    <i class="fas fa-clipboard-list"></i>
                                    Conditions requises
                                </h3>
                                <ul class="requirements-list" id="requirementsList">
                                    <!-- Requirements will be loaded here -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="cta-section">
                        <h4 class="cta-title">Intéressé par ce produit ?</h4>
                        <p class="cta-description">Nos conseillers sont à votre disposition pour vous accompagner et répondre à toutes vos questions.</p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="<?php echo e(route('contact')); ?>" class="bz-primary-btn red-btn">
                                <i class="fas fa-phone"></i> Nous contacter
                            </a>
                            <a href="<?php echo e(route('product.index')); ?>" class="bz-primary-btn hero-btn">
                                <i class="fas fa-arrow-left"></i> Retour aux produits
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php echo $__env->make('includes.main.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Récupérer le slug du produit depuis l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const productSlug = urlParams.get('slug');
    
    if (!productSlug) {
        window.location.href = '<?php echo e(route("product.index")); ?>';
        return;
    }

    // Charger les données du produit
    loadProductDetails(productSlug);
});

async function loadProductDetails(slug) {
    try {
        // Charger le fichier JSON
        const response = await fetch('<?php echo e(asset("assets/data/products.json")); ?>');
        const data = await response.json();
        
        // Trouver le produit correspondant
        const product = data.products.find(p => p.slug === slug);
        
        if (!product) {
            // Produit non trouvé, rediriger vers la liste
            window.location.href = '<?php echo e(route("product.index")); ?>';
            return;
        }

        // Afficher les détails du produit
        displayProductDetails(product);
        
        // Masquer le loading et afficher le contenu
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('productContent').style.display = 'block';
        
    } catch (error) {
        console.error('Erreur lors du chargement des données:', error);
        // En cas d'erreur, rediriger vers la liste
        window.location.href = '<?php echo e(route("product.index")); ?>';
    }
}

function displayProductDetails(product) {
    // Mettre à jour le titre de la page
    document.title = `${product.title} - COCEC`;
    
    // Mettre à jour le breadcrumb
    document.getElementById('breadcrumbProduct').textContent = product.title;
    
    // Mettre à jour l'icône
    document.getElementById('productIcon').innerHTML = `<i class="${product.icon}"></i>`;
    
    // Mettre à jour le titre
    document.getElementById('productTitle').textContent = product.title;
    
    // Mettre à jour la description courte
    document.getElementById('productSubtitle').textContent = product.short_description;
    
    // Mettre à jour la description détaillée
    document.getElementById('productDescription').textContent = product.description;
    
    // Mettre à jour les caractéristiques
    const featuresList = document.getElementById('featuresList');
    featuresList.innerHTML = '';
    product.features.forEach(feature => {
        const li = document.createElement('li');
        li.textContent = feature;
        featuresList.appendChild(li);
    });
    
    // Mettre à jour les conditions requises
    const requirementsList = document.getElementById('requirementsList');
    requirementsList.innerHTML = '';
    product.requirements.forEach(requirement => {
        const li = document.createElement('li');
        li.textContent = requirement;
        requirementsList.appendChild(li);
    });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/main/product/details.blade.php ENDPATH**/ ?>