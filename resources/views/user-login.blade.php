<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Se connecter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/')}}css/app.css">

        {{-- Scripts --}}
        <script src="https://kit.fontawesome.com/79d4761c9b.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <x-header/>

        <form method="post" action="{{ route('user.login') }}">
            @csrf

            <label for="email">Entrez votre email</label>
            <input type="mail" name="email" placeholder="Email..." @if(isset($_POST['email']))value="{{$_POST['email']}}" @endif required>

            <label for="password">Entrez votre mot de passe</label>
            <input type="password" name="password" placeholder="Mot de passe..." required>

            <button type="submit">Se connecter</button>
        </form>

        <x-footer/>
        
    </body>
</html>