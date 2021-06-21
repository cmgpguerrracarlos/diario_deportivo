@include("layouts/app")
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 pb-3 bg-white border-b border-gray-200">
                <div class="container mt-5 bg-light rounded">
                    <h2 class="text-center pt-4">Agregar nuevo equipo</h2>
                    <form class="container pb-4 text-uppercase font-monospace fs-6 fst-italic fw-bolder mt-5" method="POST" action="/equipos">
                        @csrf
                        @error('nombre')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            El nombre es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        @if ($errors->has('nomCorto'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            El nombre corto es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        @if ($errors->has('tresLetras'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            El nombre en tres letras es requerido.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Nombre</p><input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{old('nombre')}}"></label>
                        <br>
                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Nombre corto</p><input type="text" name="nomCorto" placeholder="Nombre corto" class="form-control mb-2" value="{{old('nomCorto')}}"></label>
                        <br>
                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Tres letras</p><input type="text" name="tresLetras" placeholder="Tres letras" class="form-control mb-2" id="{{old('tresLetras')}}"></label>
                        <br>
                        <button type="submit" href="/equipos/create" class="btn btn-primary ms-3"> Agregar Equipo </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>