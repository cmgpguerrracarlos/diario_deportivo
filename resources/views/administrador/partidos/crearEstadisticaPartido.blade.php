@include("layouts/app")
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 pb-3 bg-white border-b border-gray-200">
                <div class="container mt-5 bg-light rounded">
                    @if(session()->has('posesion'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-lg rounded" role="alert">
                        <strong>{{ session()->get('posesion') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h2 class="text-center pt-4">Agregar estadisticas de un partido</h2>
                    <form class="container pb-4 text-uppercase font-monospace fs-6 fst-italic fw-bolder mt-5"
                        method="POST"
                        action="{{ route('cargarEstadisticas', ['idPartido' => $partido->id, 'idLocal' => $equipoLocal->id, 'idVisitante' => $equipoVisitante->id])}}">
                        @csrf
                        <div class="container d-flex">
                            <div class="col-4">
                                <article>
                                    Fecha del Partido: {{ $partido->fecha->format('d-m-Y') }}
                                </article>
                            </div>
                            <div class="col-4">
                                <h3 class="mb-4"><ins><strong>Local</strong></ins></h3>
                                <h3>{{ $equipoLocal->nombre }}</h3>
                                <label for="golesL">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Goles</p>
                                    <input type="number" name="golesL" placeholder="Goles" class="form-control mb-2"
                                        value="{{old('golesL')}}">
                                </label>
                                <br>

                                <label for="posesionL">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Posesion
                                    </p>
                                    <input type="number" name="posesionL" placeholder="Posesion"
                                        class="form-control mb-2" value="{{old('posesionL')}}">
                                </label>
                                <br>

                                <label for="tirosTotalesL">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Tiros
                                        Totales</p>
                                    <input type="number" name="tirosTotalesL" placeholder="Tiros Totales"
                                        class="form-control mb-2" value="{{old('tirosTotalesL')}}">
                                </label>
                                <br>

                                <label for="tirosPuertaL">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Tiros
                                        Puerta</p>
                                    <input type="number" name="tirosPuertaL" placeholder="Tiros Puerta"
                                        class="form-control mb-2" value="{{old('tirosPuertaL')}}">
                                </label>
                                <br>

                                <label for="cornerL">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Corner</p>
                                    <input type="number" name="cornerL" placeholder="Corner" class="form-control mb-2"
                                        value="{{old('cornerL')}}">
                                </label>
                                <br>
                                <label for="offsideL">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Offside</p>
                                    <input type="number" name="offsideL" placeholder="Offside" class="form-control mb-2"
                                        value="{{old('offsideL')}}">
                                </label>
                                <br>

                                <label for="faltasL">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Faltas</p>
                                    <input type="number" name="faltasL" placeholder="Faltas" class="form-control mb-2"
                                        value="{{old('faltasL')}}">
                                </label>
                                <br>

                                <label for="amarillasL">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Amarillas
                                    </p>
                                    <input type="number" name="amarillasL" placeholder="Amarillas"
                                        class="form-control mb-2" value="{{old('amarillasL')}}">
                                </label>
                                <br>

                                <label for="rojasL">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Rojas</p>
                                    <input type="number" name="rojasL" placeholder="Rojas" class="form-control mb-2"
                                        value="{{old('rojasL')}}">
                                </label>
                                <br>
                            </div>
                            <div class="col-4">
                                <h3 class="mb-4"><ins><strong>Visitante</strong></ins></h3>
                                <h3> {{ $equipoVisitante->nombre }}</h3>
                                <label for="golesV">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Goles</p>
                                    <input type="number" name="golesV" placeholder="Goles" class="form-control mb-2"
                                        value="{{old('golesV')}}">
                                </label>
                                <br>

                                <label for="posesionV">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Posesion
                                    </p>
                                    <input type="number" name="posesionV" placeholder="Posesion"
                                        class="form-control mb-2" value="{{old('posesionV')}}">
                                </label>
                                <br>

                                <label for="tirosTotalesV">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Tiros
                                        Totales</p>
                                    <input type="number" name="tirosTotalesV" placeholder="Tiros Totales"
                                        class="form-control mb-2" value="{{old('tirosTotalesV')}}">
                                </label>
                                <br>

                                <label for="tirosPuertaV">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Tiros
                                        Puerta</p>
                                    <input type="number" name="tirosPuertaV" placeholder="Tiros Puerta"
                                        class="form-control mb-2" value="{{old('tirosPuertaV')}}">
                                </label>
                                <br>

                                <label for="cornerV">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Corner</p>
                                    <input type="number" name="cornerV" placeholder="Corner" class="form-control mb-2"
                                        value="{{old('cornerV')}}">
                                </label>
                                <br>
                                <label for="offsideV">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Offside</p>
                                    <input type="number" name="offsideV" placeholder="Offside" class="form-control mb-2"
                                        value="{{old('offsideV')}}">
                                </label>
                                <br>

                                <label for="faltasV">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Faltas</p>
                                    <input type="number" name="faltasV" placeholder="Faltas" class="form-control mb-2"
                                        value="{{old('faltasV')}}">
                                </label>
                                <br>

                                <label for="amarillasV">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Amarillas
                                    </p>
                                    <input type="number" name="amarillasV" placeholder="Amarillas"
                                        class="form-control mb-2" value="{{old('amarillasV')}}">
                                </label>
                                <br>

                                <label for="rojasV">
                                    <p class="text-center p-1 text-light" style="background-color: #002766;">Rojas</p>
                                    <input type="number" name="rojasV" placeholder="Rojas" class="form-control mb-2"
                                        value="{{old('rojasV')}}">
                                </label>
                                <br>

                                <button type="submit" class="btn btn-primary mt-4"> Agregar las
                                    estadisticas </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>