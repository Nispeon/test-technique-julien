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

        <main class="about-main">
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

            <section class="about-bio n-flex n-center n-even">
                <h2 class="about-h1 align-justify">Lois D'esposito</h2>
                <p class="about-p align-justify">
                    Producteurs
                    <br><br>
                    Assistant (réalisation,..)
                    <br><br>
                    Acteurs
                    <br><br>
                    Réalisateurs
                    <br><br>
                    Louis D'esposito commence sa carrière comme second assistant réalisateur sur des films 
                    tels que "Chorus Line" ou "Cotton Club" jusqu'en 1987 où il devient premier assistant 
                    sur de gros projets comme "Stuart Little 2", "La prison de verre", 
                    "Hollow man, l'homme sans ombre", "Souviens-toi l'été dernier" et 
                    "Souviens-toi l'été dernier 2" ou encore "Basic Instinct". 
                    <br><br>
                    Mais c'est en entrant à la Marvel que Louis D'Esposito va se vouer corps et âme à la production. 
                    On le retrouve à la production de pratiquement tous les films de l'Univers Cinématographique Marvel.
                    
                    Il est à ce jour coprésident de Marvel Studios.</p>
            </section>
            
        </main>

        <x-footer/>


        <script src="{{asset('/')}}js/app.js"></script>
        
    </body>
</html>