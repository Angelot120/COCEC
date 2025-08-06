// Script professionnel pour le header responsive - Tailles fixes optimales

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
    
    // Fonction pour appliquer les tailles fixes optimales
    function applyOptimalSizes() {
        const menuItems = document.querySelectorAll('.header-menu-wrap ul li');
        const menuLinks = document.querySelectorAll('.header-menu-wrap ul li a');
        
        if (!isMobile() && menuItems.length > 0) {
            // Tailles fixes optimales pour tous les écrans desktop
            const optimalMargin = '0 20px';
            const optimalFontSize = '16px';
            const optimalPadding = '25px 0';
            
            menuItems.forEach(item => {
                item.style.margin = optimalMargin;
            });
            
            menuLinks.forEach(link => {
                link.style.fontSize = optimalFontSize;
                link.style.padding = optimalPadding;
                link.style.fontWeight = '600';
                link.style.lineHeight = '1.2';
                link.style.textTransform = 'uppercase';
                link.style.letterSpacing = '0.5px';
            });
        }
    }
    
    // Fonction principale pour ajuster tout
    function adjustHeader() {
        ensureHamburgerVisible();
        handleMainMenu();
        applyOptimalSizes();
    }
    
    // Exécuter au chargement
    adjustHeader();
    
    // Exécuter lors du redimensionnement de la fenêtre
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(adjustHeader, 100);
    });
    
    // Exécuter lors du changement d'orientation
    window.addEventListener('orientationchange', function() {
        setTimeout(adjustHeader, 150);
    });
    
    // Debug: Afficher les informations de debug dans la console
    function debugInfo() {
        console.log('=== DEBUG HEADER (Version Pro) ===');
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