<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/css/homepage-styles.css" rel="stylesheet" />
    <script src="/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>@yield('title')</title>
    {{-- @vite('resources/css/app.css') --}}
</head>

<body class="font-sans">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/hdcevents_logo.svg" alt="Events Logo">
                    Events</a>
                <ul class="navbar-nav">
                    <li class="nav-link">
                        <a href="/" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-link">
                        <a href="/events/create" class="nav-link">Criar Eventos</a>
                    </li>
                    <li class="nav-link">
                        <a href="/" class="nav-link">Etnrar</a>
                    </li>
                    <li class="nav-link">
                        <a href="/" class="nav-link">Cadastrar</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>




    @yield('content')

    <footer> &copy; Caio Martins </footer>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>