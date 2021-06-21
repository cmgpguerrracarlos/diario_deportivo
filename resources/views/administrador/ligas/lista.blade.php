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
                        <div class="col-md-8">
                            <div class="card mt-4 shadow-lg">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h3>Lista de Ligas</h3>
                                    <a href="/ligas/create" class="btn btn-primary btn-sm">Nueva Liga</a>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Participantes</th>
                                                <th scope="col">Sistema de juego</th>
                                                <th width="280px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ligas as $liga)
                                            <tr>
                                                <th scope="row"><a class="text-decoration-none text-dark" href="{{ route('ligas.show', $liga->id) }}">{{ $liga->nombreLiga }}</th></a>
                                                <td>{{ $liga->participantes }}</td>
                                                <td>{{ $liga->sistemaDeJuego }}</td>
                                                <td>
                                                    <form action="{{ route('ligas.destroy',$liga->id) }}" method="POST">
                                                        <a class="btn btn-info" href="{{ route('ligas.show',$liga->id) }}">Mostrar</a>
                                                        <a class="btn btn-primary" href="{{ route('ligas.edit',$liga->id) }}">Editar</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar la liga: {{$liga->nombreLiga}}?')">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $ligas->links() }}
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