<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biographie</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/')}}css/app.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

        {{-- Scripts --}}
        <script src="https://kit.fontawesome.com/79d4761c9b.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

    </head>
    <body>

        <x-header/>

        <main>
            <section class="slider-sec">
                <div id="splide" class="splide">
                    <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide n-flex n-center"><img class="slider-cont" src="{{asset('/')}}img/slider/slider1.jfif"></li>
                        <li class="splide__slide n-flex n-center"><img class="slider-cont" src="{{asset('/')}}img/slider/slider2.jpg"></li>
                        <li class="splide__slide n-flex n-center"><img class="slider-cont" src="{{asset('/')}}img/slider/slider3.jpg"></li>
                    </ul>
                    </div>
                </div>
            </section>
            
        </main>

        <x-footer/>


        <script src="{{asset('/')}}js/app.js"></script>
        
    </body>
</html>