@include('layouts/app')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card mt-4 shadow-lg">
                                    Equipos:
                                    @foreach($equipos as  $equipo)
                                        <div><a href="/equipos/{{$equipo->id}}">{{$equipo->nombre}} {{$equipo->nomCorto}} </a></div>
                                    @endforeach
                                </div>
                                <div class="card mt-4 shadow-lg">
                                   Jugadores:
                                   @foreach($jugadores as  $jugador)
                                   <div><a href="/jugadors/{{$jugador->id}}">{{$jugador->nombre}} {{$jugador->apellido}} </a></div>
                                    @endforeach
                                </div>
                                <div class="card mt-4 shadow-lg">
                                    Ligas:
                                    @foreach($ligas as  $liga)
                                    <div><a href="/ligas/{{$liga->id}}">{{$liga->nombreLiga}}</a></div>
                                    @endforeach
                                </div>
                                <div class="card mt-4 shadow-lg">
                                    Noticias:
                                    @foreach($noticias as  $noticia)
                                    <div>
                                    <a href="/noticia/{{$noticia->id}}">{{$noticia->tituloNoticia}}</a> 
                                    </div>
                                    @endforeach
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