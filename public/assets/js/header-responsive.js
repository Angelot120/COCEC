// Script pour améliorer la responsivité du header - Version douce

document.addEventListener('DOMContentLoaded', function() {
    
    // Fonction pour vérifier si on est sur mobile
    function isMobile() {
        return window.innerWidth <= 991;
    }
    
    // Fonction pour forcer l'affichage du bouton hamburger sur mobile
    function ensureHamburgerVisible() {
        const sidebarIcon = document.querySelector('.sidebar-icon-2');
        const sidebarTrigger = document.querySelector('.sidebar-trigger');
        
        if (isMobile()) {
            if (sidebarIcon) {
                sidebarIcon.style.display = 'block';
                sidebarIcon.style.visibility = 'visible';
                sidebarIcon.style.opacity = '1';
            }
            
            if (sidebarTrigger) {
                sidebarTrigger.style.display = 'flex';
                sidebarTrigger.style.visibility = 'visible';
                sidebarTrigger.style.opacity = '1';
            }
        }
    }
    
    // Fonction pour gérer le menu principal
    function handleMainMenu() {
        const menuWrap = document.querySelector('.header-menu-wrap');
        
        if (isMobile()) {
            if (menuWrap) {
                menuWrap.style.display = 'none';
            }
        } else {
            if (menuWrap) {
                menuWrap.style.display = 'flex';
            }
        }
    }
    
    // Fonction pour ajuster dynamiquement les marges du menu - Version douce
    function adjustMenuMargins() {
        const menuItems = document.querySelectorAll('.header-menu-wrap ul li');
        const windowWidth = window.innerWidth;
        
        if (!isMobile() && menuItems.length > 0) {
            let margin = 15; // Valeur par défaut
            
            if (windowWidth >= 1800) {
                margin = 25;
            } else if (windowWidth >= 1600) {
                margin = 20;
            } else if (windowWidth >= 1400) {
                margin = 18;
            } else if (windowWidth >= 1200) {
                margin = 15;
            } else if (windowWidth >= 992) {
                margin = 12;
            }
            
            menuItems.forEach(item => {
                item.style.margin = `0 ${margin}px`;
            });
        }
    }
    
    // Fonction pour ajuster la taille de la police - Version douce
    function adjustFontSizes() {
        const menuLinks = document.querySelectorAll('.header-menu-wrap ul li a');
        const windowWidth = window.innerWidth;
        
        if (!isMobile() && menuLinks.length > 0) {
            let fontSize = '15px'; // Valeur par défaut
            
            if (windowWidth >= 1800) {
                fontSize = '16px';
            } else if (windowWidth >= 1600) {
                fontSize = '16px';
            } else if (windowWidth >= 1400) {
                fontSize = '16px';
            } else if (windowWidth >= 1200) {
                fontSize = '15px';
            } else if (windowWidth >= 992) {
                fontSize = '15px';
            }
            
            menuLinks.forEach(link => {
                link.style.fontSize = fontSize;
            });
        }
    }
    
    // Fonction pour ajuster le padding - Version douce
    function adjustPadding() {
        const menuLinks = document.querySelectorAll('.header-menu-wrap ul li a');
        const windowWidth = window.innerWidth;
        
        if (!isMobile() && menuLinks.length > 0) {
            let padding = '23px 0'; // Valeur par défaut
            
            if (windowWidth >= 1800) {
                padding = '25px 0';
            } else if (windowWidth >= 1600) {
                padding = '25px 0';
            } else if (windowWidth >= 1400) {
                padding = '23px 0';
            } else if (windowWidth >= 1200) {
                padding = '23px 0';
            } else if (windowWidth >= 992) {
                padding = '22px 0';
            }
            
            menuLinks.forEach(link => {
                link.style.padding = padding;
            });
        }
    }
    
    // Fonction pour préserver la lisibilité
    function preserveReadability() {
        const menuLinks = document.querySelectorAll('.header-menu-wrap ul li a');
        
        menuLinks.forEach(link => {
            // S'assurer que les propriétés de lisibilité sont préservées
            link.style.fontWeight = '600';
            link.style.lineHeight = '1.2';
            link.style.textTransform = 'uppercase';
            link.style.letterSpacing = '0.5px';
            
            // Éviter les textes trop petits
            const currentFontSize = parseInt(window.getComputedStyle(link).fontSize);
            if (currentFontSize < 13) {
                link.style.fontSize = '13px';
            }
        });
    }
    
    // Fonction principale pour ajuster tout
    function adjustHeader() {
        ensureHamburgerVisible();
        handleMainMenu();
        adjustMenuMargins();
        adjustFontSizes();
        adjustPadding();
        preserveReadability();
    }
    
    // Exécuter au chargement
    adjustHeader();
    
    // Exécuter lors du redimensionnement de la fenêtre
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(adjustHeader, 150); // Délai légèrement plus long
    });
    
    // Exécuter lors du changement d'orientation
    window.addEventListener('orientationchange', function() {
        setTimeout(adjustHeader, 200);
    });
    
    // Debug: Afficher les informations de debug dans la console
    function debugInfo() {
        console.log('=== DEBUG HEADER (Version douce) ===');
        console.log('Window width:', window.innerWidth);
        console.log('Is mobile:', isMobile());
        console.log('Menu wrap display:', document.querySelector('.header-menu-wrap')?.style.display);
        console.log('Sidebar icon display:', document.querySelector('.sidebar-icon-2')?.style.display);
        console.log('Sidebar trigger display:', document.querySelector('.sidebar-trigger')?.style.display);
        
        // Afficher les tailles de police actuelles
        const menuLinks = document.querySelectorAll('.header-menu-wrap ul li a');
        menuLinks.forEach((link, index) => {
            console.log(`Menu item ${index + 1} font-size:`, window.getComputedStyle(link).fontSize);
        });
        
        console.log('===================================');
    }
    
    // Décommentez la ligne suivante pour activer le debug
    // debugInfo();
    
    // Debug lors du redimensionnement
    window.addEventListener('resize', function() {
        // Décommentez la ligne suivante pour activer le debug lors du redimensionnement
        // debugInfo();
    });
});

// Fonction globale pour forcer la mise à jour (peut être appelée depuis la console)
window.forceHeaderUpdate = function() {
    const event = new Event('resize');
    window.dispatchEvent(event);
};

// Fonction pour restaurer les styles par défaut
window.resetHeaderStyles = function() {
    const menuLinks = document.querySelectorAll('.header-menu-wrap ul li a');
    const menuItems = document.querySelectorAll('.header-menu-wrap ul li');
    
    menuLinks.forEach(link => {
        link.style.fontSize = '';
        link.style.padding = '';
        link.style.fontWeight = '600';
        link.style.lineHeight = '1.2';
        link.style.textTransform = 'uppercase';
        link.style.letterSpacing = '0.5px';
    });
    
    menuItems.forEach(item => {
        item.style.margin = '';
    });
    
    console.log('Styles du header restaurés');
}; 