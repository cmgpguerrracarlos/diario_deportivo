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

    @csrf
    @error('nombre')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        El nombre es requerido
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror @if ($errors->has('apellido'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        El apellido es requerido
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror @if ($errors->has('fnacimiento'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Fecha de nacimiento es requerida
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror @if ($errors->has('nacionalidad'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        La nacionalidad es requerida
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form action="{{ route('jugadors.update',$jugador->id) }}" method="POST">
        @csrf
        @method('PUT')
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" value="{{$jugador->nombre}}"
                        placeholder="Ingrese nombre">
                </div>
            </div>
            </br>
            </br>
            </br>
            <div class="col-xs-12 col-sm-12 col-mdñ-12">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido" class="form-control" value="{{$jugador->apellido}}"
                        placeholder="Ingrese apellido">
                </div>
            </div>
            </br>
            </br>
            </br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nacionalidad:</strong>
                    <input type="text" name="nacionalidad" class="form-control" value="{{$jugador->nacionalidad}}"
                        placeholder="Ingrese nacionalidad">
                </div>
            </div>
            </br>
            </br>
            </br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de nacimiento:</strong>
                    <input type="date" name="fnacimiento" class="form-control" value="{{$jugador->fnacimiento}}"
                        placeholder="Ingrese fecha nacimiento">
                </div>
            </div>
            </br>
            </br>
            </br>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('jugadors.index') }}"> Regresar</a>
            </div>
        </div>
    </div>
</body>

</html>