<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    {!! Html::style('lib/bootstrap/fontawesome/css/all.css') !!}
    {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('css/isi2.css') !!}

    <title>@yield('titrePage')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark static-top" style="background-image:url(http://127.0.0.1/Projet_ISI2/images/navbar.png);">
    <div class="container">

        <a class="navbar-brand" href="{{url('/')}}">
            <img src="http://127.0.0.1/Projet_ISI2/images/logo.png" alt="Notre logo" style="width:20%;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @foreach($lesCategories as $categories)
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('Produit/'.$categories->getIdCat())}}">{{{$categories->getNomCat()}}}
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                @endforeach
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('Panier')}}">Panier
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Bienvenue,  {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{url('mesCommandes')}}">Mes commandes</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                            Se connecter
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('login') }}">Se Connecter</a>
                            <a href="{{ route('register') }}">S'inscrire</a>
                        </div>

                    </li>
                @endauth


            </ul>
        </div>
    </div>
</nav>
<header>
    <div class="container">
        <h1>@yield('titreItem')</h1>
    </div>
</header>
    <div class ="container">
        @yield('contenu')
        {!! Html::script('lib/jquery/jquery-3.4.1.min.js') !!}
        {!! Html::script('lib/js/bootstrap.bundle.js') !!}
        {!! Html::script('lib/js/bootstrap.js') !!}
        {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')!!}
    </div>

</body>
<footer>
    <div class="container">
        <p>Contactez-nous sur : <span class="fab fa-facebook-square"></span></p>
        <p>Suivez-nous sur : <span class="fab fa-instagram"></span></p>
    </div>
</footer>
</html>
