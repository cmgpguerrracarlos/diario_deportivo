<!DOCTYPE html>
<html lang="es">

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"	integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<title>Diario Deportivo</title>
</head>

<body class="antialiased">
	<nav class="navbar navbar-expand-lg navbar-dark shadow-lg" style="background-color: #002766;">
		<div class="container-fluid">
			<a class="navbar-brand text-light pe-4 border-end" href="/">
				<h3>Diario Deportivo</h3>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link text-light" aria-current="page" href="/jugadors/lista">Jugadores</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="/equipos/lista">Equipos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="/ligas/lista">Ligas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="/partidos/">Partidos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="/noticia/">Noticias</a>
					</li>
					@can('panel.administracion')
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Administración
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							@can('roles.index')
							<li><a class="dropdown-item" href="{{ route('roles.index') }}">Solicitudes de Roles</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							@endcan
							@can('jugadores.create')
							<li><a class="dropdown-item" href="/jugadores/create">Crear Jugador</a></li>
							@endcan
							@can('equipos.create')
							<li><a class="dropdown-item" href="/equipos/create">Crear Equipo</a></li>
							@endcan
							@can('jugadores.create')
							<li><a class="dropdown-item" href="/jugadors">Administrar Jugadores</a></li>
							@endcan
							@can('equipos.create')
							<li><a class="dropdown-item" href="/equipos">Administrar Equipos</a></li>
							@endcan
							@can('ligas.create')
							<li><a class="dropdown-item" href="/ligas">Administrar Ligas</a></li>
							@endcan
							{{-- @can('partidos.create') --}}
							<li><a class="dropdown-item" href="/partidos">Administrar Partidos</a></li>
							{{-- @endcan --}}
							@can('noticias.create')
							<li><a class="dropdown-item" href="/noticia/lista">Administrar Noticias</a></li>
							@endcan
						</ul>
					</li>
					@endcan
				</ul>
				<form class="d-flex" method="GET" action="/buscar">
					<input class="form-control me-2" name="search" type="search" placeholder="Buscar..." aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Buscar</button>
				</form>
				@if (Route::has('login'))
				<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
					@auth

					<li class="nav-item dropdown btn">
						<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							{{ Auth::user()->username }}
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="{{ url('/logout') }}">
									{{ __('Cerrar Sesión') }}</a></li>
						</ul>
					</li>
					</form>
					</ul>
					</li>
					@else
					<a href="{{ route('login') }}" class="text-sm text-gray-700 underline btn btn-light ms-5">Iniciar Sesión</a>

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

	@section('content')

	@show
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>