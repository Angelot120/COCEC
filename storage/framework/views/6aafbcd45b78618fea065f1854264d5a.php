<div class="navbar-header">

    <?php if(!Auth::check()): ?>
        <?php
            header('Location: ' . route('login'));
            exit();
        ?>
    <?php endif; ?>


    <div class="row align-items-center justify-content-between">
        <div class="col-auto">
            <div class="d-flex flex-wrap align-items-center gap-4">
                <button type="button" class="sidebar-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                    <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                </button>
                <button type="button" class="sidebar-mobile-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                </button>
                <form class="navbar-search">
                    <input type="text" name="search" placeholder="Search">
                    <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                </form>
            </div>
        </div>
        <div class="col-auto">
            



            <div class="dropdown">
                <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                    data-bs-toggle="dropdown">
                    <?php if(Auth::user()->profile_image): ?>
                        <img src="<?php echo e(Storage::url(Auth::user()->profile_image)); ?>" alt="Photo de profil"
                            class="w-40-px h-40-px object-fit-cover rounded-circle">
                    <?php else: ?>
                        <div
                            class="w-40-px h-40-px bg-<?php echo e(Auth::user()->role->value === 'super_admin' ? 'danger' : (Auth::user()->role->value === 'dg' ? 'warning' : (Auth::user()->role->value === 'informaticien' ? 'info' : 'success'))); ?> rounded-circle d-flex justify-content-center align-items-center">
                            <iconify-icon icon="ph:user-fill" class="text-white text-lg"></iconify-icon>
                        </div>
                    <?php endif; ?>
                </button>
                <div class="dropdown-menu to-top dropdown-menu-sm">
                    <div
                        class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                        <div>
                            <h6 class="text-lg text-primary-light fw-semibold mb-2"><?php echo e(Auth::user()->name); ?></h6>
                            <span
                                class="text-secondary-light fw-medium text-sm"><?php echo e(Auth::user()->role->getLabel()); ?></span>
                        </div>
                        <button type="button" class="hover-text-danger">
                            <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                        </button>
                    </div>
                    <ul class="to-top-list">
                        <li>
                            <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                href="<?php echo e(route('admin.profile')); ?>">
                                <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon> Mon
                                Profil</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                href="<?php echo e(route('admin.dashboard')); ?>">
                                <iconify-icon icon="tabler:message-check" class="icon text-xl"></iconify-icon> Tableau
                                de bord</a>
                        </li>
                        
                        <li>
                            <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3"
                                href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>Déconnexion
                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    </ul>
                </div>
            </div><!-- Profile dropdown end -->
        </div>
    </div>
</div>
</div>
<?php /**PATH D:\COCEC\resources\views/includes/admin/appbar.blade.php ENDPATH**/ ?>