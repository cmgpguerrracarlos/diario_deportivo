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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('ligas.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    @csrf
    @error('nombreLiga')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        El nombre es requerido
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    @error('participantes')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        La cantidad de participantes es requerida
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    <form action="{{ route('ligas.update',$liga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombreLiga" class="form-control" value="{{$liga->nombreLiga}}"
                        placeholder="Ingrese nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Participantes:</strong>
                    <input type="number" name="participantes" class="form-control" value="{{$liga->participantes}}"
                        placeholder="Cantidad de Participantes">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sistema de Juego:</strong><br>
                    <select name="sistemaDeJuego">
                        <option value="Solo_Ida">Solo ida</option>
                        <option value="Ida_y_Vuelta">Ida y Vuelta</option>
                        <option value="Grupos_y_Eliminatoria">Grupos y eliminatoria</option>
                        <option value="Eliminatoria">Eliminatoria</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </div>
    </form>
    </div>
</body>

</html>