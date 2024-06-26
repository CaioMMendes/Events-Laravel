<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"
        referrerpolicy="no-referrer" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        referrerpolicy="no-referrer" crossorigin="anonymous"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"
        referrerpolicy="no-referrer">
    <link href="/css/styles.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    <title>@yield('title')</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-sans">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class=" navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/hdcevents_logo.svg" alt="Events Logo">
                    Events</a>
                <ul class="navbar-nav">
                    <li class="nav-link">
                        <a href="/" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('events.create') }}" class="nav-link">Criar Eventos</a>
                    </li>
                    @auth
                        <li class="nav-link">
                            <a href="/dashboard" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-link">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="nav-item">
                                    <button class="nav-link" href="{{ route('logout') }}" id="logout-button"
                                        onclick="event.preventDefault();
                        this.closest('form').submit(); "
                                        type="button">
                                        {{ __('Logout') }}
                                    </button>
                                </div>
                            </form>
                        </li>
                    @endauth

                    @guest

                        <li class="nav-link">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-link">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                    @endguest

                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                @if (session('msg'))
                    <p class='msg'>{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>



    <footer> Caio Martins | &copy; {{ date('Y') }} </footer>

</body>

</html>
