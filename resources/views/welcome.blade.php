@extends('layouts/head')

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
