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
                                        <h3>Lista de Jugadores</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Nacimiento</th>
                                                    <th scope="col">Nacionalidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jugadores as $jugador)
                                                <tr>
                                                    <th scope="row"><a class="text-decoration-none text-dark" href="{{ route('jugadors.show', $jugador->id) }}">{{ $jugador->nombre }} {{ $jugador->apellido }}</a></th>
                                                    <td>{{ $jugador->fnacimiento->format('d-m-Y') }}</td>
                                                    <td>{{ $jugador->nacionalidad }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $jugadores->links() }}
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