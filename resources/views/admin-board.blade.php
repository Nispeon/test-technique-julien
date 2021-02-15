{{-- Page d'admin --}}

@include('layouts/head')

<body>

    <x-header />

    <main class="admin-main n-flex n-center">
        <section class="n-flex n-column n-center admin-sec">

            {{-- Lister les erreurs en cas d'échec de requêtes --}}
            @if($errors->any())
            @foreach($errors->all() as $error)
            <h2 class="error">{{$error}}</h2>
            @endforeach
            @endif

            {{-- Ajout d'oeuvre --}}
            <form class="admin-form n-flex n-column n-center" method="post" action="{{route('works.store')}}"
                enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Titre de l'oeuvre">

                <input type="file" name="thumbnail" placeholder="Miniature">

                <textarea type="text" name="description" placeholder="Description de l'oeuvre"></textarea>

                <textarea type="text" name="synopsis" placeholder="Synopsis de l'oeuvre"></textarea>

                <input type="date" name="release_date" placeholder="Date de sortie">

                <button type="submit">Envoyer</button>
            </form>
        </section>

        <section class="n-flex n-column n-center admin-sec">

            {{-- Choisir le film à modifier --}}
            <select id="workid">
                <option nb="">----Choisissez un film à modifer----</option>
                <?php $nb = 0; ?>
                @foreach ($titles as $title)
                <option nb="{{$nb}}" value="{{$title->id}}">{{$title->title}}</option>
                <?php $nb++; ?>
                @endforeach
            </select>

            {{-- Forms pour modifier chaque film --}}
            @foreach($titles as $title)
            <form class="upwork admin-form n-flex n-column n-center" method="post"
                action="{{route('works.update', $title->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="text" name="newtitle" placeholder="Nouveau nom de l'oeuvre" value="{{$title->title}}"
                    required>

                <textarea type="text" name="newdescription" placeholder="Nouvelle description de l'oeuvre"
                    required>{{$title->description}}</textarea>

                <textarea type="text" name="newsynopsis" placeholder="Nouveau synopsis de l'oeuvre"
                    required>{{$title->synopsis}}</textarea>

                <input type="date" name="newrelease_date" placeholder="Update la date de sortie"
                    value="{{$title->release_date}}" required>

                <button type="submit">Mettre à jour</button>
            </form>
            @endforeach
        </section>

        <section class="n-flex n-column n-center admin-sec">

            {{-- Supprimer un film --}}
            @foreach($titles as $title)
            <form
                onsubmit="return confirm('Tu es sûr.e de vouloir effacer {{$title->title}} de la base de donnée ? CETTE ACTION EST IRREVERSIBLE');"
                class="admin-form n-flex n-column n-center" method="post"
                action="{{route('works.destroy', $title->id)}}" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <button type="submit">SUPPRIMER {{$title->title}}</button>
            </form>
            @endforeach
        </section>
    </main>



    <x-footer />

</body>

</html>
