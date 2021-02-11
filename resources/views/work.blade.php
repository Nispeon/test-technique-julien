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

        <hr>
        <h2 class="align-center comtit">Commentaires</h2>
        <hr>

        <section class="single-comments n-flex">
            <form class="n-flex" action="{{route('comment.store')}}" method="post">
                @csrf
                <input type="hidden" name="postId" value="{{$tit->id}}">
                <input type="text" name="comment" placeholder="Écrivez un commentaire ..." autocomplete="off" required>
                <button type="submit">Envoyer</button>
            </form>

            @foreach($coms as $com)
            <div>
                <div>
                    <h3>{{$com->name}}</h3>
                    <p>le {{$com->posted_at}}</p>
                </div>
                <p>{{$com->content}}</p>
            </div>
            @endforeach

        </section>

    </main>


    <x-footer />

</body>

</html>
