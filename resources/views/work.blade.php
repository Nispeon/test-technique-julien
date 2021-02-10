@include('layouts/head')
<?php $tit = $title[0]; ?>
<body>

    <x-header />

    <main class="single-main">
        <section class="work-tn n-flex n-center" ><img class="single-tn" src="{{asset('/')}}img/works/{{$tit->thumbnail}}" alt="Poster de l'oeuvre"><img class="slider-back" src="{{asset('/')}}img/works/{{$tit->thumbnail}}" alt="Poster de l'oeuvre"> </section>
        <section class="work-article">
            <h1>{{$tit->title}}</h1>
            <hr>
            <p class="align-justify">{{$tit->description}}</p>
            <h2>Synopsis</h2>
            <p class="align-justify">{{$tit->synopsis}}</p>
            <span>{{$tit->release_date}}</span>
        </section>

        <section class="single-comments n-flex">
            <form action="" method="post">
                @csrf
                <input type="text" name="comment" placeholder="Écrivez un commentaire ..." required>
                <button type="submit">Envoyer</button>
            </form>
            <div>
                <div>
                    <h3>Pseudo</h3>
                    <p>Posté le xxxx-xx-xx</p>
                </div>
                <p>Commentaire donc la je fais du long lorem sans raison je pense que la limite de caract-ère ne sera pas tres elevé, en soit je sais pas parce que les critiques de films peuvent etres assez longues quand même</p>
            </div>

        </section>

    </main>


    <x-footer />

</body>

</html>
