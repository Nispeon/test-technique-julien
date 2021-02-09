@include('layouts/head')
<?php $tit = $title[0]; ?>
<body>

    <x-header />

    <main>
        <section class="work-tn" style="background-image: url({{asset('/')}}img/works/{{$tit->thumbnail}})"></section>
        <section class="work-article">
            <h1>{{$tit->title}}</h1>
            <hr>
            <p>{{$tit->description}}</p>
            <p>{{$tit->synopsis}}</p>
            <span>{{$tit->release_date}}</span>
        </section>
    </main>


    <x-footer />

</body>

</html>
