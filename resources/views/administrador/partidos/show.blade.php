@include("layouts/app")
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 pb-3 bg-white border-b border-gray-200">
                <div class="container mt-5 bg-light rounded">
                    @if(session()->has('estadoPartido'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-lg rounded" role="alert">
                        <strong>{{ session()->get('estadoPartido') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="container d-flex">
                        <div class="col-4 mt-4  pb-4">
                            <div class="card mb-5">
                                <div class="card-header mt-4 text-light badge rounded-pill"
                                    style="background-color: #002766;">
                                    <h3 class="pt-3">Fecha del Partido</h3>
                                </div>
                                <div class="div card-body">
                                    <p class="fs-3 fw-bolder text-center">{{ $partido->fecha->format('d - m - Y') }}
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header mt-4 text-light badge rounded-pill"
                                    style="background-color: #002766;">
                                    <h2 class="text-center text-uppercase pt-4"> Acciones </h2>
                                </div>
                                <div class="card-body d-flex justify-content-between">
                                    <div class="container">
                                        @if($partido->estadoPartido == "Finalizado")
                                        <div class="row">
                                            @foreach ($acciones as $accion)
                                            @if ($accion->accion != "Asistencia")
                                            <div class="mt-3 border-bottom">
                                                @if($accion->accion == 'Gol')
                                                <i class="fas fa-futbol"></i>
                                                @else
                                                @if ($accion->accion == 'Gol en contra')
                                                <i class="fas fa-futbol" style="color: red"></i>
                                                @else
                                                @if ($accion->accion == 'Amarilla')
                                                <i class="fas fa-square" style="color: yellow"></i>
                                                @else
                                                @if ($accion->accion == 'Roja')
                                                <i class="fas fa-square" style="color: red"></i>
                                                @endif
                                                @endif
                                                @endif
                                                @endif
                                                {{$accion->minuto}}'
                                                {{$accion->nombre}} {{$accion->apellido}}
                                            </div>
                                            <br>
                                            @endif
                                            @endforeach
                                        </div>
                                        @else
                                        <h5 class="text-center mt-5">No hay acciones
                                        </h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container card d-flex mt-4">
                            <div class="card-header mt-4 text-light badge rounded-pill"
                                style="background-color: #002766;">
                                <h2 class="text-center text-uppercase pt-4">Estadisticas</h2>
                            </div>
                            <div class="card-body d-flex justify-content-between mx-5">
                                @if($partido->estadoPartido == "Finalizado")
                                <div class="col-4 ">
                                    <h3 class="mb-4 text-center"><ins><strong>Local</strong></ins></h3>
                                    <h3 class="fw-bolder text-center">{{ $estadisticaLocal->nombre }}</h3>
                                    <p class="fs-1 text-center">{{$estadisticaLocal->goles}}</p>
                                    <label for="posesionL">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Posesión
                                        </p>
                                        <input type="number" name="posesionL" placeholder="Posesion"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaLocal->posesion}}" readonly>
                                    </label>
                                    <br>

                                    <label for="tirosTotalesL">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Tiros
                                            Totales</p>
                                        <input type="number" name="tirosTotalesL" placeholder="Tiros Totales"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaLocal->tirosTotales}}" readonly>
                                    </label>
                                    <br>

                                    <label for="tirosPuertaL">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Tiros
                                            Puerta</p>
                                        <input type="number" name="tirosPuertaL" placeholder="Tiros Puerta"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaLocal->tirosPuerta}}" readonly>
                                    </label>
                                    <br>

                                    <label for="cornerL">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Corner
                                        </p>
                                        <input type="number" name="cornerL" placeholder="Corner"
                                            class="form-control mb-2 text-center" value="{{$estadisticaLocal->corner}}"
                                            readonly>
                                    </label>
                                    <br>
                                    <label for="offsideL">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Offside
                                        </p>
                                        <input type="number" name="offsideL" placeholder="Offside"
                                            class="form-control mb-2 text-center" value="{{$estadisticaLocal->offside}}"
                                            readonly>
                                    </label>
                                    <br>

                                    <label for="faltasL">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Faltas
                                        </p>
                                        <input type="number" name="faltasL" placeholder="Faltas"
                                            class="form-control mb-2 text-center" value="{{$estadisticaLocal->faltas}}"
                                            readonly>
                                    </label>
                                    <br>

                                    <label for="amarillasL">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Amarillas
                                        </p>
                                        <input type="number" name="amarillasL" placeholder="Amarillas"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaLocal->amarillas}}" readonly>
                                    </label>
                                    <br>

                                    <label for="rojasL">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Rojas
                                        </p>
                                        <input type="number" name="rojasL" placeholder="Rojas"
                                            class="form-control mb-2 text-center" value="{{$estadisticaLocal->rojas}}"
                                            readonly>
                                    </label>
                                    <br>
                                </div>
                                <div class="col-4">
                                    <h3 class="mb-4 text-center"><ins><strong>Visitante</strong></ins></h3>
                                    <h3 class="fw-bolder text-center"> {{ $estadisticaVisitante->nombre }}
                                    </h3>
                                    <p class="fs-1 text-center">{{$estadisticaVisitante->goles}}</p>
                                    <label for="posesionV">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Posesión
                                        </p>
                                        <input type="number" name="posesionV" placeholder="Posesion"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaVisitante->posesion}}" readonly>
                                    </label>
                                    <br>

                                    <label for="tirosTotalesV">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Tiros
                                            Totales</p>
                                        <input type="number" name="tirosTotalesV" placeholder="Tiros Totales"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaVisitante->tirosTotales}}" readonly>
                                    </label>
                                    <br>

                                    <label for="tirosPuertaV">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Tiros
                                            Puerta</p>
                                        <input type="number" name="tirosPuertaV" placeholder="Tiros Puerta"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaVisitante->tirosPuerta}}" readonly>
                                    </label>
                                    <br>

                                    <label for="cornerV">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Corner
                                        </p>
                                        <input type="number" name="cornerV" placeholder="Corner"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaVisitante->corner}}" readonly>
                                    </label>
                                    <br>
                                    <label for="offsideV">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Offside
                                        </p>
                                        <input type="number" name="offsideV" placeholder="Offside"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaVisitante->offside}}" readonly>
                                    </label>
                                    <br>

                                    <label for="faltasV">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Faltas
                                        </p>
                                        <input type="number" name="faltasV" placeholder="Faltas"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaVisitante->faltas}}" readonly>
                                    </label>
                                    <br>

                                    <label for="amarillasV">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Amarillas
                                        </p>
                                        <input type="number" name="amarillasV" placeholder="Amarillas"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaVisitante->amarillas}}" readonly>
                                    </label>
                                    <br>

                                    <label for="rojasV">
                                        <p class="text-center p-1 text-light" style="background-color: #002766;">
                                            Rojas
                                        </p>
                                        <input type="number" name="rojasV" placeholder="Rojas"
                                            class="form-control mb-2 text-center"
                                            value="{{$estadisticaVisitante->rojas}}" readonly>
                                    </label>
                                    <br>
                                </div>
                                @else
                                <h5 class="text-center mt-5">Las estadísticas no están disponibles por el
                                    momento
                                </h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('estadisticas.create')
    <div class="p-3">
        <a class="btn btn-info" href="{{ route('crearAcciones', $partido->id) }}"> Cargar
            Acciones
        </a>
        <a class="btn btn-info" href="{{ route('crearEstadistica', $partido->id) }}"> Cargar
            Estadisticas
        </a>
        <a class="btn btn-primary" href="{{ route('partidos.index') }}" title="Go back">
            Regresar </a>
    </div>
    @endcan
</div>
</div>