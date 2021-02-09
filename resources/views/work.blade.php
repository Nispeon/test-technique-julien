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
    </main>


    <x-footer />

</body>

</html>
