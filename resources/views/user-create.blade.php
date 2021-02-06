<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Créer un compte</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/')}}css/app.css">

        {{-- Scripts --}}
        <script src="https://kit.fontawesome.com/79d4761c9b.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <x-header/>

        <form method="post" action="{{ route('user.store') }}">
            @csrf

            <label for="name">Choisissez un pseudo</label>
            <input type="text" name="name" placeholder="Pseudo..." @if(isset($_POST['name'])) value="{{$_POST['name']}}" @endif required>

            <label for="email">Entrez votre email</label>
            <input type="mail" name="email" placeholder="Email..." @if(isset($_POST['email']))value="{{$_POST['email']}}" @endif required>

            <label for="password">Choisissez un mot de passe</label>
            <input type="password" name="password" placeholder="Mot de passe..." required>

            <label for="password_verif">Ré-entrez le même mot de passe</label>
            <input type="password" name="password_verif" placeholder="Confimer le mot de passe..." required>

            <button type="submit">S'inscrire</button>
        </form>

        <x-footer/>
        
    </body>
</html>