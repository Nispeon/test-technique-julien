{{-- Fichier contenant le header à include sur toutes les autres pages --}}
<header class="main-header w100 n-flex n-center">
    <nav class="main-nav n-flex n-center n-between w100">
        <div class="nav-bars">
            <i id="burger" class="fas fa-bars"></i>
        </div>

        <div id="resp" class="nav-2 w100 n-flex n-center n-between">
            <div id="nav-cont-1" class="n-flex n-center n-even">

                {{-- Affichage des liens --}}
                <a href="{{url('/')}}">Accueil</a>
                <a href="{{route('works.index')}}">Œuvres</a>
                <a href="{{url('/about')}}">Biographie</a>
            </div>
            <div id="nav-cont-2" class="nav-icons n-flex">

                {{-- Affichage des fonctions utilisateurs, changent si connecté ou pas --}}
                @if(session()->has('id'))
                <a href="{{ route('user.edit', session()->get('id') ) }}">{{session()->get('name')}}  <i class="fas fa-user"></i></a>
                <a href="/disconnect">Déconnexion</a>
                @else
                <a href="{{ route('user.create') }}">S'inscrire</a>
                <a href="/login">Se connecter</a>
                @endif
            </div>
        </div>


    </nav>
</header>
