<header class="main-header w100 n-flex n-center">
    <nav class="main-nav n-flex n-center n-between w100">
        <div class="n-flex n-center n-even">
            <a href="{{url('/')}}">Accueil</a>
            <a href="{{url('/')}}">Œuvres</a>
            <a href="{{url('/')}}">Biography</a>
        </div>
        <div class="nav-icons n-flex">

            @if(isset($_SESSION['online']))
                <a href="{{ route('user.edit', $_SESSION["id"] ) }}"><i class="fas fa-user"></i></a>
                <a href="/disconnect">Déconnexion</a>
            @else
                <a href="{{ route('user.create') }}">S'inscrire</a>
                <a>Se connecter</a>
            @endif
        </div>
        
    </nav>
</header>