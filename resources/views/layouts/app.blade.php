<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- BARRA DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logosuperatec.png') }}" alt="Superatec Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Sobre Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cms.blog.index') }}">Blog/Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contáctanos</a></li>
                
                    @auth
                        <!-- Verificación solo para el rol de Admin -->
                        @if (Auth::user()->hasRole('Admin'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="cmsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Administrador
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="cmsDropdown">
                                    <li><a class="dropdown-item" href="{{ route('cms.pages.index') }}">Gestión de Páginas</a></li>
                                    <li><a class="dropdown-item" href="{{ route('cms.blog.index') }}">Gestión de Blog</a></li>
                                    <li><a class="dropdown-item" href="{{ route('usuarios.index') }}">Gestión de Usuarios/Roles</a></li>
                                </ul>
                            </li>
                        @endif
                
                        <!-- Opciones comunes para todos los usuarios autenticados -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Mi Perfil</a></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button class="nav-link btn btn-link" type="submit">Cerrar Sesión</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</head>
<body>
    <div id="app">
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
