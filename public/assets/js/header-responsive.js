// Script simple : tailles réduites et menu burger fonctionnel

document.addEventListener('DOMContentLoaded', function() {
    
    // Fonction pour vérifier si on est sur mobile
    function isMobile() {
        return window.innerWidth <= 991;
    }
    
    // Fonction pour vérifier la plage d'écran
    function getScreenRange() {
        const width = window.innerWidth;
        if (width >= 1200) return 'large';
        if (width >= 992 && width <= 1199) return 'medium-large';
        if (width >= 768 && width <= 991) return 'medium';
        return 'small';
    }
    
    // Fonction pour appliquer les tailles selon la plage d'écran
    function applyResponsiveSizes() {
        const menuItems = document.querySelectorAll('.header-menu-wrap ul li');
        const menuLinks = document.querySelectorAll('.header-menu-wrap ul li a');
        const screenRange = getScreenRange();
        
        if (!isMobile() && menuItems.length > 0) {
            let margin, fontSize, padding;
            
            switch(screenRange) {
                case 'large':
                    margin = '0 22px';
                    fontSize = '14px';
                    padding = '26px 0';
                    break;
                case 'medium-large':
                    margin = '0 18px';
                    fontSize = '13px';
                    padding = '24px 0';
                    break;
                case 'medium':
                    margin = '0 15px';
                    fontSize = '13px';
                    padding = '22px 0';
                    break;
                default:
                    margin = '0 10px';
                    fontSize = '12px';
                    padding = '20px 0';
            }
            
            menuItems.forEach(item => {
                item.style.margin = margin;
            });
            
            menuLinks.forEach(link => {
                link.style.fontSize = fontSize;
                link.style.padding = padding;
            });
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
    
    // Fonction pour s'assurer que le menu burger fonctionne
    function ensureBurgerMenuWorks() {
        const sidebarIcon = document.querySelector('.sidebar-icon-2');
        const sidebarTrigger = document.querySelector('.sidebar-trigger');
        
        if (isMobile()) {
            // S'assurer que le bouton hamburger est visible
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
            
            // S'assurer que le sidebar est accessible
            const sidebarArea = document.getElementById('sidebar-area');
            if (sidebarArea) {
                sidebarArea.style.zIndex = '9999';
            }
        }
    }
    
    // Fonction principale
    function adjustHeader() {
        handleMainMenu();
        applyResponsiveSizes();
        ensureBurgerMenuWorks();
    }
    
    // Exécuter au chargement
    adjustHeader();
    
    // Exécuter lors du redimensionnement
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(adjustHeader, 100);
    });
});

// Fonction globale pour forcer la mise à jour
window.forceHeaderUpdate = function() {
    const event = new Event('resize');
    window.dispatchEvent(event);
}; 