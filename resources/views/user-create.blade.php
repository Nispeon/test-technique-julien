{{-- Page de création de compte --}}

@include('layouts/head')

<body>

    <x-header />

    <main class="n-flex n-center n-column">

        {{-- Afficher les erreurs si échec de requetes --}}
        @if($errors->any())
        @foreach($errors->all() as $error)
        <h2 class="error">{{$error}}</h2>
        @endforeach
        @endif

        <form class="n-flex n-column n-center" method="post" action="{{ route('user.store') }}">
            @csrf

            <label for="name">Choisissez un pseudo</label>
            <input type="text" name="name" id="name" placeholder="Pseudo..." @if(isset($_POST['name']))
                value="{{$_POST['name']}}" @endif required>

            <label for="email">Entrez votre email</label>
            <input type="email" name="email" id="email" placeholder="Email..."
                @if(isset($_POST['email']))value="{{$_POST['email']}}" @endif required>

            <label for="password">Choisissez un mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe..." required>

            <label for="password_verif">Ré-entrez le même mot de passe</label>
            <input type="password" name="password_verif" id="password_verif" placeholder="Confimer le mot de passe..."
                required>

            <button type="submit">S'inscrire</button>
        </form>
    </main>


    <x-footer />

</body>

</html>
