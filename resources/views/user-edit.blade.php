@include('layouts/head')
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
