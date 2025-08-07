<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-logo">
            <span class="brand-logo-text">
                <img src="<?php echo e(URL::asset('assets/images/Logo.png')); ?>" alt="COCEC Logo">
            </span>
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <iconify-icon icon="mage:dashboard" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Actions</li>


            <li class="dropdown">
                
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:bullhorn-outline" class="menu-icon"></iconify-icon>
                    <span>Annonces</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?php echo e(route('announcement.index')); ?>">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Liste des annonces
                        </a>

                    </li>
                    <li>
                        <a href="<?php echo e(route('announcement.create')); ?>">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Ajouter une annonce
                        </a>

                    </li>
                </ul>
            </li>

            <li class="dropdown">

                <a href="javascript:void(0)">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>

                    <span>Blog</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?php echo e(route('admin.blogs')); ?>">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Liste des blogs
                        </a>

                    </li>
                    <li>
                        <a href="<?php echo e(route('blog.create')); ?>">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Ajouter un blog
                        </a>

                    </li>
                </ul>
                <!-- <a href="<?php echo e(route('admin.blogs')); ?>">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>Blog</span>
                </a> -->
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:cog-outline" class="menu-icon"></iconify-icon>
                    <span>Système</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?php echo e(route('settings.localities')); ?>">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Localités
                        </a>
                    </li>


                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:briefcase-outline" class="menu-icon"></iconify-icon>
                    <span>Emploi</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?php echo e(route('career.index')); ?>">Liste des offres</a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('career.create')); ?>">Ajouter une offre</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('jobList.index')); ?>">Liste des demandes </a>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:map-marker-outline" class="menu-icon"></iconify-icon>
                    <span>Agences</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?php echo e(route('agency.index')); ?>">Liste des agences</a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('agency.create')); ?>">Ajouter une agence</a>
                    </li>

                </ul>
            </li>


            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="mdi:account-group-outline" class="menu-icon"></iconify-icon>
                    <span>Gestion de compte</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="<?php echo e(route('accounts.physical.index')); ?>">Demande physique</a>
                    </li>

                     <li>
                        <a href="<?php echo e(route('accounts.moral.index')); ?>">Demande morale</a>
                    </li> 

                </ul>
            </li>

        </ul>
    </div>
</aside>
<?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/includes/admin/sidebar.blade.php ENDPATH**/ ?>