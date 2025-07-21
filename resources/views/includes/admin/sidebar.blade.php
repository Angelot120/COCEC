<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
            <span class="brand-logo-text">
                <img src="{{ URL::asset('assets/images/Logo.png') }}" alt="COCEC Logo">
            </span>
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <iconify-icon icon="mage:dashboard" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-menu-group-title">Actions</li>
            <li>
                <a href="{{ route('admin.announcements') }}">
                    <iconify-icon icon="mdi:bullhorn-outline" class="menu-icon"></iconify-icon>
                    <span>Annonces</span>
                </a>
            </li>
            <li class="dropdown">

                <a href="javascript:void(0)">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>

                    <span>Blog</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.blogs') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Liste des blogs
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('blog.create') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Ajouter un blog
                        </a>

                    </li>
                </ul>
                <!-- <a href="{{ route('admin.blogs') }}">
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
                        <a href="{{ route('settings.localities') }}">
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
                        <a href="{{ route('career.index') }}">Liste des offres</a>
                    </li>

                    <li>
                        <a href="{{ route('career.create') }}">Ajouter une offre</a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</aside>
