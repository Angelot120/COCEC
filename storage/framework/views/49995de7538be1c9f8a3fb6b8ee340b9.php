<!DOCTYPE html>
<html lang="fr">

<head>
    <?php echo $__env->yieldContent('css'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/images/Logo.png')); ?>">

    <!-- remix icon font css  -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/remixicon.css')); ?>">

    <!-- BootStrap css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/bootstrap.min.css')); ?>">

    <!-- Apex Chart css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/apexcharts.css')); ?>">

    <!-- Data Table css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/dataTables.min.css')); ?>" />
    <!-- Text Editor css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/editor-katex.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/editor.atom-one-dark.min.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/editor.quill.snow.css')); ?>" />
    <!-- Date picker css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/flatpickr.min.css')); ?>" />
    <!-- Calendar css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/full-calendar.css')); ?>" />
    <!-- Vector Map css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/jquery-jvectormap-2.0.5.css')); ?>" />
    <!-- Popup css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/magnific-popup.css')); ?>" />
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/slick.css')); ?>" />
    <!-- prism css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/prism.css')); ?>" />
    <!-- file upload css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/file-upload.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/lib/audioplayer.css')); ?>" />
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/css/style.css')); ?>" />


    <!-- Authers libraries CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/icon/flaticon_digicom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/vendor/splide/splide.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/vendor/swiper/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/vendor/animate-wow/animate.min.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">



    <!-- 
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/datatable/datatables.min.css')); ?>"> -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/admin/summernote/summernote.min.css')); ?>">
    <title>COCEC</title>
</head>

<body>
    <?php echo $__env->yieldContent('content'); ?>

    <!-- <script src="<?php echo e(URL::asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/datatable/datatables.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script> -->


    <!-- jQuery library js -->
    <!-- <script src="<?php echo e(URL::asset('assets/js/lib/jquery-3.7.1.min.js')); ?>"></script> -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/jquery.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/admin/js/script.js')); ?>"></script>

    <?php echo $__env->yieldContent('js'); ?>

    <!-- Bootstrap js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/bootstrap.bundle.min.js')); ?>"></script>
    <!-- Apex Chart js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/apexcharts.min.js')); ?>"></script>
    <!-- Data Table js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/dataTables.min.js')); ?>"></script>
    <!-- Iconify Font js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/iconify-icon.min.js')); ?>"></script>
    <!-- jQuery UI js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/jquery-ui.min.js')); ?>"></script>
    <!-- Vector Map js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/jquery-jvectormap-2.0.5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <!-- Popup js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/magnific-popup.min.js')); ?>"></script>
    <!-- Slick Slider js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/slick.min.js')); ?>"></script>
    <!-- prism js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/prism.js')); ?>"></script>
    <!-- file upload js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/file-upload.js')); ?>"></script>
    <!-- audioplayer -->
    <script src="<?php echo e(URL::asset('assets/admin/js/lib/audioplayer.js')); ?>"></script>

    <!-- main js -->
    <script src="<?php echo e(URL::asset('assets/admin/js/app.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('assets/admin/js/homeOneChart.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('assets/admin/summernote/summernote.min.js')); ?>"></script>


    <!-- libraries JS -->
    <script src="<?php echo e(URL::asset('assets/admin/vendor/splide/splide.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/admin/vendor/splide/splide-extension-auto-scroll.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/admin/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/admin/vendor/animate-wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/admin/vendor/fslightbox/fslightbox.js')); ?>"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Bannière de Cookies pour l'Admin -->
    <div id="cookie-banner-admin" class="cookie-banner-admin" style="display: none;">
        <div class="cookie-content-admin">
            <div class="cookie-text-admin">
                <h4>🍪 Politique de Cookies - Administration</h4>
                <p>Cette interface d'administration utilise des cookies et du stockage local pour :</p>
                <ul>
                    <li>Gérer votre session d'administration</li>
                    <li>Sauvegarder vos préférences (thème, paramètres d'interface)</li>
                    <li>Améliorer les performances et la sécurité</li>
                </ul>
                <p>Ces cookies sont essentiels au bon fonctionnement de l'administration.</p>
            </div>
            <div class="cookie-actions-admin">
                <button id="accept-cookies-admin" class="btn btn-primary">Accepter</button>
                <button id="reject-cookies-admin" class="btn btn-outline-secondary">Refuser</button>
            </div>
        </div>
    </div>

    <!-- Styles pour la bannière de cookies admin -->
    <style>
        .cookie-banner-admin {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 20px;
            z-index: 9999;
            box-shadow: 0 -5px 20px rgba(0,0,0,0.4);
            animation: slideUp 0.5s ease-out;
        }
        
        @keyframes slideUp {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }
        
        .cookie-content-admin {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }
        
        .cookie-text-admin h4 {
            margin: 0 0 10px 0;
            color: #e2e8f0;
            font-size: 18px;
        }
        
        .cookie-text-admin p {
            margin: 0 0 10px 0;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .cookie-text-admin ul {
            margin: 10px 0;
            padding-left: 20px;
            font-size: 14px;
        }
        
        .cookie-text-admin li {
            margin: 5px 0;
        }
        
        .cookie-actions-admin {
            display: flex;
            gap: 10px;
            flex-shrink: 0;
        }
        
        .cookie-actions-admin .btn {
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 6px;
        }
        
        .cookie-actions-admin .btn-primary {
            background: #EC281C;
            border-color: #EC281C;
        }
        
        .cookie-actions-admin .btn-primary:hover {
            background: #d4241a;
            border-color: #d4241a;
        }
        
        .cookie-actions-admin .btn-outline-secondary {
            color: #e2e8f0;
            border-color: #e2e8f0;
        }
        
        .cookie-actions-admin .btn-outline-secondary:hover {
            background: #e2e8f0;
            color: #1a202c;
        }
        
        @media (max-width: 768px) {
            .cookie-content-admin {
                flex-direction: column;
                text-align: center;
            }
            
            .cookie-actions-admin {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
    </style>

    <!-- Script pour la bannière de cookies admin -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cookieBanner = document.getElementById('cookie-banner-admin');
            const acceptBtn = document.getElementById('accept-cookies-admin');
            const rejectBtn = document.getElementById('reject-cookies-admin');
            
            // Vérifier si l'utilisateur a déjà fait un choix
            const cookieChoice = localStorage.getItem('cookieChoice');
            
            if (!cookieChoice) {
                // Afficher la bannière après 1 seconde (plus rapide pour l'admin)
                setTimeout(() => {
                    cookieBanner.style.display = 'block';
                }, 1000);
            }
            
            // Gérer l'acceptation des cookies
            acceptBtn.addEventListener('click', function() {
                localStorage.setItem('cookieChoice', 'accepted');
                localStorage.setItem('cookieConsentDate', new Date().toISOString());
                hideCookieBanner();
                
                // Message de confirmation
                console.log('Cookies acceptés pour l\'administration');
            });
            
            // Gérer le refus des cookies
            rejectBtn.addEventListener('click', function() {
                localStorage.setItem('cookieChoice', 'rejected');
                localStorage.setItem('cookieConsentDate', new Date().toISOString());
                hideCookieBanner();
                
                // Désactiver certaines fonctionnalités non essentielles
                disableNonEssentialFeatures();
                
                console.log('Cookies refusés pour l\'administration');
            });
            
            function hideCookieBanner() {
                cookieBanner.style.animation = 'slideDown 0.5s ease-out';
                setTimeout(() => {
                    cookieBanner.style.display = 'none';
                }, 500);
            }
            
            function disableNonEssentialFeatures() {
                // Désactiver le thème sombre/clair si refusé
                localStorage.removeItem('theme');
                
                // Forcer le thème clair par défaut
                document.documentElement.setAttribute('data-theme', 'light');
            }
        });
        
        // Animation de fermeture
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideDown {
                from { transform: translateY(0); }
                to { transform: translateY(100%); }
            }
        `;
        document.head.appendChild(style);
    </script>

</body>

</html><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/layout/admin.blade.php ENDPATH**/ ?>