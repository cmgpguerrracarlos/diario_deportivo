<!DOCTYPE html>
<html lang="es">

<head>
    <!---Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Master Page</title>
</head>

<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-dark shadow-lg" style="background-color: #002766;">
        <div class="container-fluid">
            <a class="navbar-brand text-light pe-4 border-end" href="">
                <h3>Diario Deportivo</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="/jugadors">Jugadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/equipos">Equipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/ligas">Ligas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administración
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Crear Notas</a></li>
                            <li><a class="dropdown-item" href="#">Modificar Notas</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar Notas</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Solicitudes de Administrador</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/jugadores">Crear Jugador</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    
                    <li class="nav-item dropdown btn">
                        <a class="nav-link dropdown-toggle btn-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link class="text-decoration-none" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-dropdown-link>
                        </form></li>
                        </ul>
                    </li>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline btn btn-light ms-5">Log in</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline btn btn-light ms-1">Registro</a>
                    @endif
                    @endauth
                </div>
                @endif
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
            </div>
        </div>
    </nav>

    <!---Bootstrap Script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>

</html>