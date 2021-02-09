@include('layouts/head')
    <body>

        <x-header/>

        <form method="post" action="/testco">
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
