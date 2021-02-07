<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accueil</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/')}}css/app.css">
        

        {{-- Scripts --}}
        <script src="https://kit.fontawesome.com/79d4761c9b.js" crossorigin="anonymous"></script>
    </head>

    <body class="antialiased">

        <x-header/>

       <section class="main-banner w100 n-flex n-center">
            <h1>Louis D'Esposito</h1>
       </section>
       <section class="main-works w100 n-flex n-center" href="/works">
            <h1>Œuvres <i class="fas fa-arrow-right"></i></h1>
        </section>
        <section class="main-about w100 n-flex n-center" href="/about">
            <h1>Biographie <i class="fas fa-arrow-right"></i></h1>
        </section>

        <x-footer/>

    </body>
</html>
