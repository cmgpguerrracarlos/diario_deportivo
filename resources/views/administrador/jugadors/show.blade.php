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
    <section class="d-flex flex-column align-items-start">
        <div class="p-3 mt-3">
            <h1> {{ $jugador->nombre }} {{ $jugador->apellido }}</h1>
        </div>

        <div class="p-4 mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de Nacimiento:</strong>
                    {{ $jugador->fnacimiento->format('d-m-Y')  }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nacionalidad:</strong>
                    {{ $jugador->nacionalidad  }}
                    {{ $jugador->teamName }}
                </div>
            </div>
        </div>
        <div class="p-3">
            @if($equipo != null)
            <span class="display-6">Equipo actual: <strong> {{$equipo->nombre}} </strong></span>
            <a href="{{ route('equipo.listarOpciones', ['idEquipo' => $equipo->id, 'idJugador' => $jugador->id]) }}"
                onclick="return confirm('El jugador pertenece al equipo {{ $equipo->nombre }}, ¿Seguro desea cambiarlo?')"
                class="btn btn-primary">Cambiar equipo</a>
            @else
            <a href="{{ route('equipo.listarOpciones', ['idEquipo' => 'null', 'idJugador' => $jugador->id]) }}"
                class="btn btn-primary">Asignar equipo</a>
            @endif
            <a class="btn btn-primary" href="{{ route('jugadors.index') }}"> Volver </a>
        </div>
    </section>

</body>

</html>