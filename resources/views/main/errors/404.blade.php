@extends('layout.main')

@section('css')
<style>
    /* ------------------------------------------- */
    /*      STYLE PAGE 404 "WOAOH"                 */
    /* ------------------------------------------- */
    :root {
        --color-primary: #EC281C;
        --color-secondary: #0D1B2A;
        --color-text: #495057;
        --color-background: #f8f9fa;
        --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: var(--color-background);
        color: var(--color-text);
        margin: 0;
        display: grid;
        place-items: center;
        min-height: 100vh;
        text-align: center;
        overflow: hidden;
        position: relative;
    }

    /* Formes géométriques en fond */
    body::before,
    body::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: var(--color-primary);
        opacity: 0.05;
        z-index: -1;
    }

    body::before {
        width: 300px;
        height: 300px;
        top: -100px;
        left: -100px;
    }

    body::after {
        width: 400px;
        height: 400px;
        bottom: -150px;
        right: -150px;
    }

    .error-container {
        max-width: 600px;
        padding: 40px;
        position: relative;
    }

    /* Animation du "404" */
    .error-code {
        font-size: 10rem;
        font-weight: 700;
        color: #e9ecef;
        position: relative;
        z-index: 1;
        margin: 0;
        line-height: 1;
        animation: bounceIn 1s ease-out;
    }

    .error-illustration {
        font-size: 5rem;
        color: var(--color-primary);
        margin-top: -120px;
        /* Chevauchement avec le 404 */
        margin-bottom: 30px;
        position: relative;
        z-index: 2;
        animation: float 4s ease-in-out infinite;
    }

    .error-illustration i {
        text-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .error-title {
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--color-secondary);
        margin-top: 0;
        margin-bottom: 15px;
        animation: fadeInDown 0.8s ease-out 0.2s backwards;
    }

    .error-message {
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 30px;
        animation: fadeIn 1s ease-out 0.5s backwards;
    }

    .error-actions .btn-home {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background-color: var(--color-primary);
        color: #FFFFFF;
        padding: 15px 30px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: var(--transition);
        box-shadow: 0 4px 15px rgba(236, 40, 28, 0.3);
        animation: fadeInUp 0.8s ease-out 0.7s backwards;
    }

    .error-actions .btn-home:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 20px rgba(236, 40, 28, 0.4);
    }

    .quick-links {
        margin-top: 40px;
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        animation: fadeInUp 0.8s ease-out 0.9s backwards;
    }

    .quick-links a {
        color: var(--color-text);
        text-decoration: none;
        font-weight: 500;
        padding: 5px 10px;
        border-bottom: 2px solid transparent;
        transition: var(--transition);
    }

    .quick-links a:hover {
        color: var(--color-primary);
        border-bottom-color: var(--color-primary);
    }

    /* Animations */
    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }

        50% {
            opacity: 1;
            transform: scale(1.05);
        }

        70% {
            transform: scale(0.9);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @media (max-width: 576px) {
        .error-code {
            font-size: 8rem;
        }

        .error-illustration {
            font-size: 4rem;
            margin-top: -90px;
        }

        .error-title {
            font-size: 2rem;
        }
    }
</style>
@endsection

@section('content')

<body>
    @include('includes.main.loading')
    @include('includes.main.header')

    <br><br><br><br>


    <div class="error-container">
        <h1 class="error-code">404</h1>

        <div class="error-illustration">
            <i class="fas fa-map-signs"></i>
        </div>

        <h2 class="error-title">Page Introuvable</h2>

        <p class="error-message">
            Oups ! Il semble que le chemin que vous avez emprunté n'existe plus.
            Mais ne vous inquiétez pas, nous pouvons vous remettre sur la bonne voie.
        </p>

        <div class="error-actions">
            <a href="{{ url('/') }}" class="btn-home">
                <i class="fas fa-home"></i>
                Retourner à l'accueil
            </a>
        </div>

        <div class="quick-links">
            <a href="{{-- route('votre.route.agences') --}}">Nos Agences</a>
            <a href="{{-- route('votre.route.contact') --}}">Contact</a>
            <a href="{{-- route('votre.route.faq') --}}">FAQ</a>
        </div>
    </div>


    @include('includes.main.scroll')
    @include('includes.main.footer')
</body>
@endsection