<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-body-tertiary h-100 shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">Boolfolio</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/projects') ? 'active' : '' }}"
                                href="{{ route('admin.projects.index') }}">{{ __('Progetti') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/types') ? 'active' : '' }}"
                                href="{{ route('admin.types.index') }}">{{ __('Tipi') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/technologies') ? 'active' : '' }}"
                                href="{{ route('admin.technologies.index') }}">{{ __('Tecnologie') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.dashboard.home') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>


    <footer class="bg-body-tertiary border-top">
        <div class="container h-100 d-flex flex-wrap justify-content-between align-items-center">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    logo
                </a>
                <span class="mb-3 mb-md-0 text-muted">© 2023 Christian Arca</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3">
                    <a class="text-muted" href="#">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="text-muted" href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li class="ms-3">
                    <a class="text-muted" href="#">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
</body>

</html>
