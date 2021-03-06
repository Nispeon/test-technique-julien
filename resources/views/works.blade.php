{{-- Page de listes des oeuvres --}}

@include('layouts/head')

<body>

    <x-header />

    <main class="works-main n-flex n-around">
        <div id="image-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($works as $work)
                    <li class="splide__slide">
                        <div class="work-card align-center n-flex n-even" href="{{route('works.show', $work->id)}}">
                            <h2>{{$work->title}}</h2>
                            <img class="slider-cont" src="{{asset('/')}}img/works/{{$work->thumbnail}}">
                            <p>{{$work->release_date}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div id="secondary-slider" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($works as $work2)
                    <li class="splide__slide">
                        <img class="slider-cont" src="{{asset('/')}}img/works/{{$work2->thumbnail}}">
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>


    <x-footer />

</body>

</html>
