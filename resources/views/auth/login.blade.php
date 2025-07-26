@extends('layout.admin')

<body>

    <style>
.auth-left {
    height: 100vh; /* Toute la hauteur de l'écran */
    width: 50%;     /* Ajuste selon ton design */
    position: relative;
}

.auth-left img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Remplit sans déformer */
    display: block;
}
</style>

    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ URL::asset('assets/images/LoginImage.jpg') }}" alt="" >
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <div class="text-center">
                        <a href="index.html" class="mb-40 max-w-290-px">
                            <img src="{{ URL::asset('assets/images/logo.png') }}" alt="">
                        </a>
                    </div>
                    <h4 class="mb-12">Connectez-vous à votre compte</h4>
                    <p class="mb-32 text-secondary-light text-lg">Bienvenue! Veuillez entrer vos informations</p>
                </div>

                @if ($errors->any())
                <ul class="alert alert-danger" style="color: red; list-style: none;">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
                @endif

                @if ($message = Session::get('error'))
                <div style="color: red;">{{ $message }}</div><br>
                @endif

                <form id="loginForm" action="{{ route('login.process') }}" method="POST" onsubmit="showLoading()">
                    @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" required class="form-control h-56-px bg-neutral-50 radius-12" name="email" placeholder="Email">
                    </div>
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" required class="form-control h-56-px bg-neutral-50 radius-12" id="password" name="password" placeholder="Mot de passe">
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#password"></span>
                    </div>
                    <div class="">
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-check style-check d-flex align-items-center">
                                <input class="form-check-input border border-neutral-300" type="checkbox" value="" id="remeber">
                                <label class="form-check-label" for="remeber">Se souvenir de moi</label>
                            </div>
                            <a href="javascript:void(0)" class="text-primary-600 fw-medium">Mot de passe oublié?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"> Se connecter</button>

                </form>
            </div>
        </div>
    </section>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white bg-opacity-75" style="z-index: 1050; display: none;">
        <div class="text-center">
            <div class="spinner-border text-primary mb-3" style="width: 3rem; height: 3rem;" role="status"></div>
            <div class="fw-medium text-primary">Connexion en cours...</div>
        </div>
    </div>


</body>
@section('js')
<script>
    // ================== Password Show Hide Js Start ==========
    function initializePasswordToggle(toggleSelector) {
        $(toggleSelector).on('click', function() {
            $(this).toggleClass("ri-eye-off-line");
            var input = $($(this).attr("data-toggle"));
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }
    // Call the function
    initializePasswordToggle('.toggle-password');
    // ========================= Password Show Hide Js End ===========================

    function showLoading() {
        console.log('showLoading déclenché via:', event ? event.type : 'unknown');
        const overlay = document.getElementById('loadingOverlay');
        overlay.style.display = 'flex';
        overlay.classList.remove('hidden');

        const submitBtn = document.querySelector('#loginForm button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Connexion...`;
        }

        // Timeout to prevent eternal loading
        setTimeout(() => {
            overlay.classList.add('hidden');
            setTimeout(() => {
                overlay.style.display = 'none';
            }, 300);
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Se connecter';
            }
        }, 10000);
    }


    window.addEventListener('DOMContentLoaded', function() {
        const overlay = document.getElementById('loadingOverlay');
        overlay.style.display = 'none'; // Explicitly hide on page load
        overlay.classList.add('hidden');

        const submitBtn = document.querySelector('#loginForm button[type="submit"]');
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Se connecter';
        }

        // Check for errors and ensure overlay stays hidden
        const hasErrors = document.querySelector('.alert-danger, .invalid-feedback');
        if (hasErrors) {
            console.log('Errors detected, ensuring overlay is hidden');
            overlay.style.display = 'none';
            overlay.classList.add('hidden');
        }
    });
</script>


@endsection