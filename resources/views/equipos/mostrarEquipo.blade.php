<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información {{$equipo->nombre}} - Diario Deportivo</title>
</head>

<body>
    @include('layouts/app')
    <div class="container mt-3 bg-light shadow-lg rounded pb-5">
        @if(session()->has('estadoPartido'))
        <div class="alert alert-warning alert-dismissible fade show shadow-lg rounded" role="alert">
            <strong>{{ session()->get('estadoPartido') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-lg rounded" role="alert">
            <strong>{{ session()->get('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session()->has('quitar'))
        <div class="alert alert-danger alert-dismissible fade show shadow-lg rounded" role="alert">
            <strong>{{ session()->get('quitar') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h1 class="ms-2 mt-2">{{$equipo->nombre}}</h1>
        <div class="card mt-4 mb-3 shadow-lg w-75 mx-auto">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{route('equipos.index')}}" class="btn btn-primary text-light fw-bolder">Volver a Equipos</a>
                <h3>Lista de Jugadores</h3>
                @can('jugadores.create')
                <a href="{{ route('equipos.agregar', $equipo->id) }}"
                    class="btn btn-primary text-light fw-bolder">Agregar Jugadores</a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Nacionalidad</th>
                            @can('jugadores.create')<th width="280px"></th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jugadores as $jugador)
                        <tr>
                            <th scope="row">{{ $jugador->nombre }}</th>
                            <td>{{ $jugador->apellido }}</td>
                            <td>{{ $jugador->fnacimiento->format('d-m-Y') }}</td>
                            <td>{{ $jugador->nacionalidad }}</td>
                            @can('jugadores.create')
                            <td>
                                <a class="btn btn-info" href="{{ route('jugadors.show',$jugador->id) }}">Perfil</a>
                                <a class="btn btn-danger"
                                    href="{{ route('equipos.quitar',['idEquipo' => $equipo->id, 'idJugador' => $jugador->id]) }}">Quitar</a>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>