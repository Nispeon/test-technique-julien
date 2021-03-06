{{-- Page d'édition de compte --}}

@include('layouts/head')

<body>

    <x-header />

    <main class="main-edit n-flex n-center n-column">

        <h1>{{session()->get('name')}}</h1>
        <form class="u-edit n-flex n-column" action="{{route('user.update', session()->get('id'))}}" method="post">
            @csrf
            @method('PATCH')

            <label for="update">Changer votre pseudo ?</label>
            <input type="text" id="update" name="upname" placeholder="Nouveau pseudo..."
                value="{{session()->get('name')}}">

            <label for="newpass">Changer de mot de passe ? </label>
            <input type="password" id="newpass" name="newpass" placeholder="Nouveau mot de passe..." autocomplete="off">

            <label for="oldpass">Entrez votre ancien mot de passe pour confirmer</label>
            <input type="password" id="oldpass" name="password" placeholder="Mot de passe actuel..." required>

            <button type="submit">Enregistrer les modifications</button>

        </form>

    </main>

    <x-footer />

</body>

</html>
