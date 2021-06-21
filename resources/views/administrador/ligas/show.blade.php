<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts/app')
    <div class="container bg-light mt-5 shadow-lg">
        <section class="d-flex flex-column align-items-start">
            <div class="p-1 m-4">
                <h1> {{ $liga->nombreLiga }}</h1>
            </div>
            <div class="p-2 m-4 d-flex justify-content-beetwen">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong class="fw-bolder h2">Sistema de juego</strong>
                        <p class="display-6">{{ $liga->sistemaDeJuego  }}</p>
                    </div>
                    <div class="form-group">
                        <strong class="fw-bolder h2">Cantidad participantes</strong>
                        <p class="display-6">{{ $liga->participantes  }}</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="card shadow-lg">
                        <div class="card-header mt-2" style="background-color: #002766">
                            <div class="lead text-white fw-bolder text-center">Equipos Participantes</div>
                        </div>
                        <div class="card-body">
                            @foreach($ligas as $equipo)
                            <div class="w-100 border border-dark p-1 col-6 d-flex justify-content-center m-1" style="background-color: #002766">
                                <a class="text-decoration-none text-light" href="/equipos/{{$equipo->equipo_id}}">{{$equipo->nombre}}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-3">
                <a class="btn btn-primary" href="{{ route('ligas.index') }}" title="Go back"> Regresar </a>
            </div>
        </section>
    </div>
</body>

</html>