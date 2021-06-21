<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diario Deportivo - Solicitud de Roles</title>
</head>

<body>
    @include("layouts/app")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card mt-4 shadow-lg">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3>Solicitud de Roles</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Nombre</th>
                                                    <th width="280px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <h3>Editor</h3>
                                                <hr>
                                                @if($editores->count() > 0)
                                                @foreach ($editores as $editor)
                                                <tr>
                                                    <th scope="row">{{ $editor->editor_id }}</th>
                                                    <th scope="row">{{ $editor->nombre }}</th>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <form class='form-inline' action="{{ route('roles.update', $editor->editor_id) }}" method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <button name="confirmar" class="btn btn-success" type="submit" value="confirmar">Confirmar</button>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <form class='form-inline' action="{{ route('roles.destroy',$editor->editor_id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button name="rechazar" class="btn btn-danger" type="submit" value="rechazar">Rechazar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <td class="fw-bold pt-3 alert text-center">No hay solicitudes pendientes</td>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Nombre</th>
                                                    <th width="280px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <h3>Administrador</h3>
                                                <hr>
                                                @if($administradores->count() > 0)
                                                @foreach ($administradores as $administrador)
                                                <tr>
                                                    <th scope="row">{{ $administrador->administrador_id }}</th>
                                                    <th scope="row">{{ $administrador->nombre }}</th>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <form action="{{ route('roles.update', $administrador->administrador_id) }}" method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <button name="rechazar" class="btn btn-success" type="submit" value="rechazar">Confirmar</button>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <form action="{{ route('roles.destroy',$administrador->administrador_id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button name="rechazar" class="btn btn-danger" type="submit" value="rechazar">Rechazar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <td class="fw-bold pt-3 alert text-center">No hay solicitudes pendientes</td>
                                                @endif
                                            </tbody>
                                        </table>
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