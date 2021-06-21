@include('layouts/app')
<div id="wrappy">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('noticias.index') }}">Regresar</a>
			</div>
		</div>
	</div>
	<br>
	<br>
	@if ($errors->any())
	<div class="alert alert-danger">
		Hubo un problema con la edición.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{ route('noticias.update',$noticia->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7">
				<div class="form-group">
					<strong>Id de la noticia: {{$noticia->id}}</strong>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div class="form-group">
					<strong>Titulo de la noticia:</strong>
					<input type="text" name="tituloNoticia" placeholder="Titulo" class="form-control mb-2"
						value="{{$noticia->tituloNoticia}}">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div class="form-group">
					<strong>Copete de la noticia:</strong>
					<input type="text" name="copeteNoticia" placeholder="Copete" class="form-control mb-2"
						value="{{$noticia->copeteNoticia}}">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-8">
				<div class="form-group">
					<strong>Cuerpo de la noticia:</strong>
					<textarea type="text" name="cuerpoNoticia" class="form-control mb-2" rows="5">{{$noticia->cuerpoNoticia}}</textarea>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-10">
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
			</br>
			</br>
			<div class="row mb-3">
				<div class="col">
					<div class="image-wrapper">
						@if ($noticia->direccion)
						<img id="picture" src="{{URL::asset('storage/'.$noticia->direccion)}}">
						@else
						<img id="picture"
							src="https://3.bp.blogspot.com/-q11rITGRRag/WMDnW8qFiSI/AAAAAAAAD90/9fvxhkfRHNMAK6cjmFf3yqvnj6M8BpgQQCK4B/s1600/canchas-de-futbol-14.jpg"
							alt="">
						@endif
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<input type="file" name="direccion" id="direccion" accept="image/*">
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Aceptar</button>
			</div>
		</div>
	</form>
</div>

<style>
	#wrappy {
		margin-left: 2em;
	}

	.image-wrapper {
		position: relative;
		padding-bottom: 56.25%;
	}

	.image-wrapper img {
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