/**
 * JavaScript optimisé pour les performances - COCEC
 * Optimisations pour améliorer la vitesse de chargement et la fluidité
 */

(function() {
    'use strict';

    // Configuration des performances
    const PERFORMANCE_CONFIG = {
        lazyLoadThreshold: 100, // Distance en pixels pour le lazy loading
        animationThreshold: 50, // Distance pour déclencher les animations
        debounceDelay: 100, // Délai pour le debounce des événements
        throttleDelay: 16 // Délai pour le throttle (60fps)
    };

    // Cache des éléments DOM fréquemment utilisés
    const DOM_CACHE = {
        window: window,
        document: document,
        body: document.body,
        preloader: null,
        heroSwiper: null,
        animatedElements: new Set()
    };

    // Initialisation au chargement du DOM
    document.addEventListener('DOMContentLoaded', function() {
        initializePerformance();
        initializeLazyLoading();
        initializeAnimations();
        initializeSwiper();
        initializeCounters();
        initializeScrollOptimizations();
    });

    /**
     * Initialisation des optimisations de performance
     */
    function initializePerformance() {
        // Désactiver les animations si l'utilisateur préfère moins de mouvement
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            document.body.classList.add('reduced-motion');
        }

        // Optimisation du preloader
        DOM_CACHE.preloader = document.getElementById('preloader');
        if (DOM_CACHE.preloader) {
            // Masquer le preloader plus rapidement
            setTimeout(() => {
                DOM_CACHE.preloader.style.opacity = '0';
                setTimeout(() => {
                    DOM_CACHE.preloader.style.display = 'none';
                }, 500);
            }, 500);
        }

        // Optimisation des images
        optimizeImages();
    }

    /**
     * Optimisation du lazy loading des images
     */
    function initializeLazyLoading() {
        const lazyImages = document.querySelectorAll('img[data-src], .swiper-slide[data-background]');
        
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        loadImage(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: `${PERFORMANCE_CONFIG.lazyLoadThreshold}px`
            });

            lazyImages.forEach(img => imageObserver.observe(img));
        } else {
            // Fallback pour les navigateurs plus anciens
            lazyImages.forEach(img => loadImage(img));
        }
    }

    /**
     * Chargement d'une image avec lazy loading
     */
    function loadImage(element) {
        if (element.tagName === 'IMG') {
            const src = element.getAttribute('data-src');
            if (src) {
                element.src = src;
                element.classList.add('loaded');
                element.removeAttribute('data-src');
            }
        } else if (element.classList.contains('swiper-slide')) {
            const background = element.getAttribute('data-background');
            if (background) {
                element.style.setProperty('--bg-image', `url(${background})`);
                element.classList.add('loaded');
            }
        }
    }

    /**
     * Optimisation des animations avec Intersection Observer
     */
    function initializeAnimations() {
        const animatedElements = document.querySelectorAll('.fade-wrapper, .fade-top, .strength-item');
        
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !DOM_CACHE.animatedElements.has(entry.target)) {
                        animateElement(entry.target);
                        DOM_CACHE.animatedElements.add(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: `${PERFORMANCE_CONFIG.animationThreshold}px`
            });

            animatedElements.forEach(el => animationObserver.observe(el));
        } else {
            // Fallback : animer tous les éléments
            animatedElements.forEach(el => animateElement(el));
        }
    }

    /**
     * Animation d'un élément
     */
    function animateElement(element) {
        if (element.classList.contains('strength-item')) {
            element.classList.add('animate');
        } else {
            element.classList.add('fade-in');
        }
    }

    /**
     * Initialisation optimisée du Swiper
     */
    function initializeSwiper() {
        const swiperContainer = document.querySelector('.swiper-container-wrapper');
        if (!swiperContainer) return;

        // Configuration optimisée du Swiper
        DOM_CACHE.heroSwiper = new Swiper('.swiper-container-wrapper', {
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
            // Optimisations de performance
            watchSlidesProgress: false,
            watchSlidesVisibility: false,
            preloadImages: false,
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 1
            }
        });
    }

    /**
     * Initialisation optimisée des compteurs
     */
    function initializeCounters() {
        const counters = document.querySelectorAll('.odometer');
        let countersAnimated = new Set();

        if ('IntersectionObserver' in window) {
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !countersAnimated.has(entry.target)) {
                        animateCounter(entry.target);
                        countersAnimated.add(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => counterObserver.observe(counter));
        }
    }

    /**
     * Animation d'un compteur
     */
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-count') || '0');
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

    /**
     * Optimisations du scroll
     */
    function initializeScrollOptimizations() {
        // Throttle du scroll pour les performances
        let ticking = false;
        
        function updateOnScroll() {
            ticking = false;
            updateScrollBasedAnimations();
        }

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateOnScroll);
                ticking = true;
            }
        }

        // Écouteur de scroll optimisé
        window.addEventListener('scroll', requestTick, { passive: true });

        // Optimisation du header sticky
        const header = document.querySelector('.header.sticky-active');
        if (header) {
            let lastScrollTop = 0;
            
            window.addEventListener('scroll', () => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > 110) {
                    header.classList.add('fixed');
                } else {
                    header.classList.remove('fixed');
                }
                
                lastScrollTop = scrollTop;
            }, { passive: true });
        }
    }

    /**
     * Mise à jour des animations basées sur le scroll
     */
    function updateScrollBasedAnimations() {
        // Code pour les animations basées sur le scroll si nécessaire
    }

    /**
     * Optimisation des images
     */
    function optimizeImages() {
        // Optimisation des images existantes
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            // Ajouter loading="lazy" si pas déjà présent
            if (!img.hasAttribute('loading')) {
                img.setAttribute('loading', 'lazy');
            }
            
            // Optimisation des images de fond
            if (img.style.backgroundImage) {
                img.style.backgroundSize = 'cover';
                img.style.backgroundPosition = 'center';
            }
        });
    }

    /**
     * Fonction utilitaire pour le debounce
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Fonction utilitaire pour le throttle
     */
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    // Optimisation des événements de redimensionnement
    window.addEventListener('resize', debounce(() => {
        // Recalculer les dimensions si nécessaire
        if (DOM_CACHE.heroSwiper) {
            DOM_CACHE.heroSwiper.update();
        }
    }, PERFORMANCE_CONFIG.debounceDelay));

    // Optimisation pour les appareils mobiles
    if ('ontouchstart' in window) {
        document.body.classList.add('touch-device');
    }

    // Optimisation pour les connexions lentes
    if ('connection' in navigator) {
        if (navigator.connection.effectiveType === 'slow-2g' || 
            navigator.connection.effectiveType === '2g') {
            document.body.classList.add('slow-connection');
        }
    }

})(); 