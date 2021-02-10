@include('layouts/head')
    <body>

        <x-header/>

        <main>
            <form method="post" action="{{route('works.store')}}" enctype="multipart/form-data">
            @csrf
                <input type="text" name="title" placeholder="nom de l'oeuvre">

                <input type="file" name="thumbnail" placeholder="miniature">

                <textarea type="text" name="description" placeholder="desc de l'oeuvre"></textarea>

                <textarea type="text" name="synopsis" placeholder="synopsis de l'oeuvre"></textarea>

                <input type="date" name="release_date" placeholder="date de sortie">

                <button type="submit">Envoyer</button>
            </form>
        </main>



        <x-footer/>

    </body>
</html>
