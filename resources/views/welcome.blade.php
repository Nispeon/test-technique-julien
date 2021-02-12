@include('layouts/head')

    <body>

        <x-header/>
        <main>

        <section class="main-banner w100 n-flex n-center">
            <h1 class="align-center">Louis D'Esposito</h1>
        </section>

        <section class="main-section main-works w100 n-flex n-center" href="/works">
            <div class="main-bg" style="background-image: url({{asset('/')}}img/works/main-bg.jpg)"></div>
            <h1>Œuvres <i class="fas fa-arrow-right"></i></h1>
        </section>

        <section class="main-section main-about w100 n-flex n-center" href="/about">
            <div class="main-bg" style="background-image: url({{asset('/')}}img/slider/slider1.jfif)"></div>
            <h1>Biographie <i class="fas fa-arrow-right"></i></h1>
        </section>

        </main>


        <x-footer/>

    </body>
</html>
