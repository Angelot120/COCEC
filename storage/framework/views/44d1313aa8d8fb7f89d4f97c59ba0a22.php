<?php $__env->startSection('content'); ?>

<body>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- ./ preloader -->

    <?php echo $__env->make('includes.main.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="page-header-pro">
        
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Blog</h1>

                
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- ./ page-header -->

    <section class="blog-details pt-130 pb-130">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-wrap">
                        <div class="blog-details-img mb-40">
                            <img src="<?php echo e($blog->image ? asset('storage/' . $blog->image) : asset('assets/images/blog.jpg')); ?>" alt="<?php echo e($blog->title); ?>">
                        </div>
                        <ul class="post-meta">
                            <li><i class="fa-regular fa-calendar"></i>24 Feb, 2024</li>
                            <li><i class="fa-regular fa-user"></i>by admin</li>
                        </ul>
                        <div class="blog-details-content">
                            <h2 class="details-title mb-25"><?php echo e($blog->title); ?></h2>
                            <p>
                                <?php echo e($blog->short_description); ?>

                            </p>

                            <?php echo $blog->long_description; ?>

                        </div>

                        <div class="comments-area">
                            <div class="section-heading">
                                <h2 class="section-title"><?php echo e($comments->count()); ?> Commentaire(s)</h2>
                            </div>
                            <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="comment-item" id="comment-<?php echo e($comment->id); ?>">
                                <div class="comment-thumb">
                                    <?php echo e(strtoupper(substr($comment->name, 0, 2))); ?>

                                </div>
                                <div class="comment-info">
                                    <div class="comments-meta">
                                        <span><?php echo e($comment->created_at->format('d M, Y')); ?></span>
                                    </div>
                                    <h3 class="author"><?php echo e($comment->name); ?> 
                                        <?php if($comment->user && $comment->user->is_admin): ?>
                                            <span class="support-tag">Officiel</span>
                                        <?php endif; ?>
                                    </h3>
                                    <p><?php echo e($comment->body); ?></p>
                                    <?php if(auth()->guard()->check()): ?>
                                    <button class="reply comment-reply-btn" data-comment-id="<?php echo e($comment->id); ?>">
                                        <i class="fa-solid fa-reply"></i> Répondre
                                    </button>
                                    <?php if(Auth::user()->is_admin || Auth::id() == $comment->user_id): ?>
                                    <button class="comment-delete-btn" data-comment-id="<?php echo e($comment->id); ?>" 
                                            data-delete-url="<?php echo e(route('blog.comments.destroy', $comment)); ?>" 
                                            data-csrf="<?php echo e(csrf_token()); ?>">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <p class="text-muted small">Connectez-vous pour répondre</p>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Formulaire de réponse -->
                                <div class="reply-form-wrapper" id="reply-form-<?php echo e($comment->id); ?>" style="display: none;">
                                    <form class="reply-form" action="<?php echo e(route('blog.comments.store')); ?>" method="POST" novalidate>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="blog_id" value="<?php echo e($blog->id); ?>">
                                        <input type="hidden" name="parent_id" value="<?php echo e($comment->id); ?>">
                                        <input type="hidden" name="name" value="<?php echo e(auth()->user()->name ?? ''); ?>">
                                        <input type="hidden" name="email" value="<?php echo e(auth()->user()->email ?? ''); ?>">
                                        <div class="form-group">
                                            <textarea name="body" class="form-control" rows="3" 
                                                      placeholder="Écrivez votre réponse à <?php echo e($comment->name); ?>..." required></textarea>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <button type="submit" class="btn-submit-comment">
                                            <span>Répondre</span>
                                        </button>
                                    </form>
                                </div>

                                <!-- Réponses -->
                                <?php if($comment->replies->isNotEmpty()): ?>
                                <div class="comment-replies">
                                    <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="comment-item item-2" id="comment-<?php echo e($reply->id); ?>">
                                        <div class="comment-thumb">
                                            <?php echo e(strtoupper(substr($reply->name, 0, 2))); ?>

                                        </div>
                                        <div class="comment-info">
                                            <div class="comments-meta">
                                                <span><?php echo e($reply->created_at->format('d M, Y')); ?></span>
                                            </div>
                                            <h3 class="author"><?php echo e($reply->name); ?>

                                                <?php if($reply->user && $reply->user->is_admin): ?>
                                                    <span class="support-tag">Officiel</span>
                                                <?php endif; ?>
                                            </h3>
                                            <p><?php echo e($reply->body); ?></p>
                                            <?php if(auth()->guard()->check()): ?>
                                            <?php if(Auth::user()->is_admin || Auth::id() == $reply->user_id): ?>
                                            <button class="comment-delete-btn" data-comment-id="<?php echo e($reply->id); ?>" 
                                                    data-delete-url="<?php echo e(route('blog.comments.destroy', $reply)); ?>" 
                                                    data-csrf="<?php echo e(csrf_token()); ?>">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <p class="text-muted small">Connectez-vous pour répondre</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-center text-muted">Soyez la première personne à laisser un commentaire !</p>
                            <?php endif; ?>
                        </div>
                        <!-- ./ comments-area -->
                        <div class="form-wrap pt-70">
                            <div class="blog-contact-form">
                                <h2 class="title">Laisser un commentaire</h2>
                                <div class="request-form">
                                    <form id="main-comment-form" action="<?php echo e(route('blog.comments.store')); ?>" method="POST" novalidate>
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="blog_id" value="<?php echo e($blog->id); ?>">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-item">
                                                    <input type="text" id="comment-name" name="name" class="form-control" 
                                                           placeholder="Votre Nom" required 
                                                           value="<?php echo e(auth()->user()->name ?? ''); ?>">
                                                    <div class="icon"><i class="fa-regular fa-user"></i></div>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-item">
                                                    <input type="email" id="comment-email" name="email" class="form-control" 
                                                           placeholder="Votre Email" required 
                                                           value="<?php echo e(auth()->user()->email ?? ''); ?>">
                                                    <div class="icon"><i class="fa-sharp fa-regular fa-envelope"></i></div>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="form-item message-item">
                                                    <textarea id="comment-message" name="body" cols="30" rows="5" 
                                                              class="form-control" placeholder="Votre commentaire..." required></textarea>
                                                    <div class="icon"><i class="fa-light fa-messages"></i></div>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="submit-btn">
                                            <button type="submit" class="btn-submit-comment">
                                                <i class="fas fa-paper-plane"></i>
                                                <span>Soumettre</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ./ form-wrap -->
                    </div>
                </div>
                <!-- Sidebar Widgets -->
                <div class="col-lg-4">
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Recent Posts</h3>
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$blog): ?>
                        <p>Aucun autre poste</p>
                        <?php endif; ?>
                        <div class="sidebar-post">
                            <img src="<?php echo e($blog->image ? asset('storage/' . $blog->image) : asset('assets/images/blog.jpg')); ?>" alt="<?php echo e($blog->title); ?>">
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li><i class="fa-light fa-circle-user"></i>by David Smith</li>
                                </ul>
                                <h3 class="title"><a href="#"><?php echo e($blog->title); ?></a></h3>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Blog Details -->
    <?php echo $__env->make('includes.main.scroll', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>




<?php $__env->startSection('css'); ?>
<style>
    /* Styles pour les commentaires */
    .support-tag {
        background: var(--bz-color-theme-primary);
        color: white;
        font-size: 0.7rem;
        padding: 2px 6px;
        border-radius: 3px;
        margin-left: 8px;
        font-weight: 500;
    }

    .comment-reply-btn, .comment-delete-btn {
        background: none;
        border: none;
        color: var(--bz-color-theme-primary);
        font-size: 0.9rem;
        cursor: pointer;
        padding: 5px 10px;
        margin-right: 10px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .comment-reply-btn:hover, .comment-delete-btn:hover {
        background: rgba(236, 40, 28, 0.1);
    }

    .comment-delete-btn {
        color: #dc3545;
    }

    .comment-delete-btn:hover {
        background: rgba(220, 53, 69, 0.1);
    }

    .reply-form-wrapper {
        margin-top: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 3px solid var(--bz-color-theme-primary);
    }

    .reply-form textarea {
        width: 100% !important;
        min-width: 100% !important;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
        resize: vertical;
        box-sizing: border-box;
    }

    .reply-form-wrapper {
        margin-top: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 3px solid var(--bz-color-theme-primary);
        width: 100%;
    }

    /* Avatar avec initiales */
    .comment-thumb {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--bz-color-theme-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 1.2rem;
        text-transform: uppercase;
    }

    .comment-thumb img {
        display: none;
    }

    .btn-submit-comment {
        background: var(--bz-color-theme-primary);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-submit-comment:hover {
        background: #c82116;
        transform: translateY(-1px);
    }

    .comment-replies {
        margin-left: 30px;
        margin-top: 15px;
        padding-left: 20px;
        border-left: 2px solid #eee;
    }

    .invalid-feedback {
        display: none;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }

    .is-invalid + .invalid-feedback {
        display: block;
    }
</style>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function() {
        // GESTION DES BOUTONS RÉPONDRE
        $(document).on('click', '.comment-reply-btn', function() {
            const commentId = $(this).data('comment-id');
            const replyForm = $(`#reply-form-${commentId}`);
            
            // Masquer tous les autres formulaires de réponse
            $('.reply-form-wrapper').not(replyForm).hide();
            
            // Afficher/masquer le formulaire de réponse
            replyForm.toggle();
        });

        // SOUMISSION DU FORMULAIRE PRINCIPAL VIA AJAX
        $("#main-comment-form").on("submit", function(e) {
            e.preventDefault();

            const $form = $(this);
            const $submitBtn = $form.find('.btn-submit-comment');
            const $btnText = $submitBtn.find('span');
            const $btnIcon = $submitBtn.find('i');

            // Réinitialiser les erreurs
            $form.find(".form-control").removeClass("is-invalid");
            $form.find(".invalid-feedback").text("");

            // État de chargement
            $submitBtn.prop("disabled", true);
            $btnText.text("Envoi en cours...");
            $btnIcon.removeClass('fa-paper-plane').addClass('fa-spinner fa-spin');

            $.ajax({
                url: $form.attr("action"),
                method: "POST",
                data: $form.serialize(),
                headers: {
                    "X-CSRF-TOKEN": $form.find('input[name="_token"]').val()
                },
                success: function(data) {
                    Swal.fire({
                        icon: "success",
                        title: "Commentaire envoyé ! 🎉",
                        text: data.message,
                        confirmButtonColor: "var(--bz-color-theme-primary)",
                    });
                    
                    // Recharger la page pour afficher le nouveau commentaire
                    location.reload();
                },
                error: function(jqXHR) {
                    if (jqXHR.status === 422) {
                        const errors = jqXHR.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            const field = $form.find(`[name="${key}"]`);
                            field.addClass("is-invalid");
                            field.siblings(".invalid-feedback").text(value[0]);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: 'Une erreur est survenue. Veuillez réessayer.',
                            confirmButtonColor: "var(--bz-color-theme-primary)",
                        });
                    }
                },
                complete: function() {
                    // Restaurer l'état normal du bouton
                    $submitBtn.prop("disabled", false);
                    $btnText.text("Soumettre");
                    $btnIcon.removeClass('fa-spinner fa-spin').addClass('fa-paper-plane');
                }
            });
        });

        // SOUMISSION DES FORMULAIRES DE RÉPONSE VIA AJAX
        $(document).on("submit", ".reply-form", function(e) {
            e.preventDefault();

            const $form = $(this);
            const $submitBtn = $form.find('.btn-submit-comment');
            const $btnText = $submitBtn.find('span');

            // Réinitialiser les erreurs
            $form.find(".form-control").removeClass("is-invalid");
            $form.find(".invalid-feedback").text("");

            // État de chargement
            $submitBtn.prop("disabled", true);
            $btnText.text("Envoi...");

            $.ajax({
                url: $form.attr("action"),
                method: "POST",
                data: $form.serialize(),
                headers: {
                    "X-CSRF-TOKEN": $form.find('input[name="_token"]').val()
                },
                success: function(data) {
                    Swal.fire({
                        icon: "success",
                        title: "Réponse envoyée ! 🎉",
                        text: data.message,
                        confirmButtonColor: "var(--bz-color-theme-primary)",
                    });
                    
                    // Recharger la page pour afficher la nouvelle réponse
                    location.reload();
                },
                error: function(jqXHR) {
                    if (jqXHR.status === 422) {
                        const errors = jqXHR.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            const field = $form.find(`[name="${key}"]`);
                            field.addClass("is-invalid");
                            field.siblings(".invalid-feedback").text(value[0]);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur',
                            text: 'Une erreur est survenue. Veuillez réessayer.',
                            confirmButtonColor: "var(--bz-color-theme-primary)",
                        });
                    }
                },
                complete: function() {
                    // Restaurer l'état normal du bouton
                    $submitBtn.prop("disabled", false);
                    $btnText.text("Répondre");
                }
            });
        });

        // SUPPRESSION DES COMMENTAIRES
        $(document).on("click", ".comment-delete-btn", function() {
            const commentId = $(this).data('comment-id');
            const deleteUrl = $(this).data('delete-url');
            const csrfToken = $(this).data('csrf');

            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Supprimé !',
                                text: data.message,
                                confirmButtonColor: "var(--bz-color-theme-primary)",
                            });
                            
                            // Supprimer l'élément du DOM
                            $(`#comment-${commentId}`).fadeOut(300, function() {
                                $(this).remove();
                                
                                // Mettre à jour le compteur de commentaires
                                const commentCount = $('.comment-item').length;
                                $('.section-title').text(commentCount + ' Commentaire(s)');
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: 'Impossible de supprimer le commentaire.',
                                confirmButtonColor: "var(--bz-color-theme-primary)",
                            });
                        }
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/main/blog/detail.blade.php ENDPATH**/ ?>