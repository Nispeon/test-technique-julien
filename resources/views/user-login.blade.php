@include('layouts/head')
    <body>

        <x-header/>
        <main class="n-flex n-center">
            <form class="n-flex n-center n-column" method="post" action="/testco">
            @csrf

                <label for="email">Entrez votre email</label>
                <input type="email" name="email" placeholder="Email..." @if(isset($_POST['email']))value="{{$_POST['email']}}" @endif required>

                <label for="password">Entrez votre mot de passe</label>
                <input type="password" name="password" placeholder="Mot de passe..." required>

                <button type="submit">Se connecter</button>

            </form>
        </main>


        <x-footer/>

    </body>
</html>
