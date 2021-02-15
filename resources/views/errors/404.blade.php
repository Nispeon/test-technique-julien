{{-- Page d'erreur 404 --}}

@include('layouts/head')

<body>

    <x-header />

    <main class="m404 n-flex n-center n-column">
        <h1>Erreur 404</h1>
        <h2>Je sais pas c'que tu fais ici, mais y'a rien à voir donc retourne au <a href="{{route('home')}}">menu</a>
            ... Où alors vient t'amuser <a href="https://www.nispeon.tk/" target="_blank"
                rel="noreferrer noopener">ici</a> ;)</h2>
    </main>

    <x-footer />

</body>

</html>
