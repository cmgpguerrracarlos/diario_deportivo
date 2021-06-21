<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts/app')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 pb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card mt-4 shadow-lg">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h3>Lista de Partidos</h3>
                                    <a href="/partidos/create" class="btn btn-primary btn-sm">Nuevo Partido</a>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Participantes</th>
                                                <th scope="col">Estado del Partido</th>
                                                <th scope="col">Fecha</th>
                                                <th width="280px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($partidos as $partido)
                                            <tr>
                                                <th scope="row"><a class="text-decoration-none text-dark" href="{{ route('equipos.show',$partido->local->id) }}">{{ $partido->local->nombre }}</a> vs. <a class="text-decoration-none text-dark" href="{{ route('equipos.show',$partido->visitante->id) }}">{{ $partido->visitante->nombre }}</a></th>
                                                <th scope="row">{{ $partido->estadoPartido }}</th>
                                                <td>{{ $partido->fecha->format('d-m-Y') }}</td>
                                                <td>
                                                    <form action="{{ route('partidos.destroy',$partido->id) }}" method="POST">
                                                        <a class="btn btn-info" href="{{ route('partidos.show',$partido->id) }}">Mostrar</a>
                                                        @can('partidos.create')
                                                        <a class="btn btn-primary" href="{{ route('partidos.edit',$partido->id) }}">Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar la liga: {{$partido->id}}?')">Eliminar</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $partidos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>