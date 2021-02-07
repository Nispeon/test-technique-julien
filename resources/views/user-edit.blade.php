<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profil</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/')}}css/app.css">

        {{-- Scripts --}}
        <script src="https://kit.fontawesome.com/79d4761c9b.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <x-header/>

        <form action="{{route('user.update', $_SESSION['id'])}}" method="post">
            @csrf
            @method('PATCH')

            <label for="update">Changer votre pseudo ?</label>
            <input type="text" name="upname" placeholder="Nouveau pseudo..." value="{{$_SESSION['name']}}">

            <label for="newpass">Changer de mot de passe ? </label>
            <input type="password" name="newpass" placeholder="Nouveau mot de passe..." autocomplete="off">

            <label for="oldpass">Entrez votre ancien mot de passe pour confirmer</label>
            <input type="password" name="oldpass" placeholder="Mot de passe actuel..." required>

            <button type="submit">Enregistrer les modifications</button>

        </form>

        <x-footer/>
        
    </body>
</html>