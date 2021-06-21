@include("layouts/app")
<div class="py-12">
	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
			<div class="p-6 pb-3 bg-white border-b border-gray-200">
				<div class="container mt-5 bg-light rounded">
					<h2 class="text-center pt-4">Agregar nueva noticia</h2>
					<form class="container pb-4 text-uppercase font-monospace fs-6 fst-italic fw-bolder mt-5" method="POST" action="/noticia" enctype="multipart/form-data">
						@csrf
						@error('tituloNoticia')
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							El Titulo es requerido
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@enderror
						@error('copeteNoticia')
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							El Copete es requerido
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@enderror
						<label for="">
							<p class="text-center p-1 text-light" style="background-color: #002766;">Titulo</p>
							<input type="text" name="tituloNoticia" placeholder="Titulo" class="form-control mb-2"
								value="{{old('tituloNoticia')}}">
						</label>
						<br>
						<label for="">
							<p class="text-center p-1 text-light" style="background-color: #002766;">Copete</p>
							<input type="text" name="copeteNoticia" placeholder="Copete" class="form-control mb-2"
								value="{{old('copeteNoticia')}}">
						</label>
						<br>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<strong>Tipo de la noticia:</strong>
								<select name="tipoNoticia">
									<option value="Analisis">Analisis</option>
									<option value="DatoColor">Dato Color</option>
									<option value="Fichaje">Fichaje</option>
									<option value="Información">Información</option>
								</select>
							</div>
						</div>
						<br>
						
						
						<div class="form-group mb-5">
							<label for="exampleFormControlTextarea1">Cuerpo de la noticia</label>
							<textarea class="form-control rounded-0" id="{{old('cuerpoNoticia')}}" name="cuerpoNoticia" rows="10"></textarea>
						</div>

						<div class="row mb-3">
							<div class="col">
								<div class="image-wrapper">
									<img id="picture" src="https://3.bp.blogspot.com/-q11rITGRRag/WMDnW8qFiSI/AAAAAAAAD90/9fvxhkfRHNMAK6cjmFf3yqvnj6M8BpgQQCK4B/s1600/canchas-de-futbol-14.jpg" alt="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<input type="file" name="direccion" id="direccion" accept="image/*">
								</div>
							</div>
						</div>
						<br>
						<input id="id_creador" name="id_creador" type="hidden" value="{{ Auth::user()->id }}">
						<button type="submit" href="/noticias/create" class="btn btn-primary ms-3"> Agregar Noticia </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.image-wrapper{
		position: relative;
		padding-bottom: 56.25%;
	}

	.image-wrapper img{
		position: absolute;
		object-fit: cover;
		width: 100%;
		height: 100%;
	}
</style>
<script>
	document.getElementById("direccion").addEventListener('change', cambiarImagen);
	function cambiarImagen(event){
		var file = event.target.files[0];
		var reader = new FileReader();
		reader.onload = (event) => { document.getElementById("picture").setAttribute('src', event.target.result);};
		reader.readAsDataURL(file);
	}
</script>