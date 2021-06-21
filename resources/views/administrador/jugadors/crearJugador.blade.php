@include("layouts/app")
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 pb-3 bg-white border-b border-gray-200">
                <div class="container mt-5 bg-light rounded">
                    <h2 class="text-center pt-4">Agregar nuevo jugador</h2>
                    <form class="container pb-4 text-uppercase font-monospace fs-6 fst-italic fw-bolder mt-5" method="POST" action="/jugadors">
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
                            El nacionalidad es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Nombre de jugador</p><input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{old('nombre')}}"></label>
                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Apellido</p><input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" value="{{old('apellido')}}"></label>
                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Fecha de Nacimiento</p><input type="date" name="fnacimiento" placeholder="Fecha de Nacimiento" class="form-control mb-2" value="{{old('fNacimiento')}}"></label>
                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Nacionalidad</p><input type="text" name="nacionalidad" placeholder="País de Nacimiento" class="form-control mb-2" value="{{old('nacionalidad', 'Uruguay')}}"></label>
                        <button type="submit" href="/jugadors/create" class="btn btn-primary ms-3"> Agregar Jugador </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>