@include('layouts/app')
<div class="container py-5">
	@if(session()->has('login'))
	<div class="alert alert-success alert-dismissible fade show shadow-lg rounded" role="alert">
		<strong>{{ session()->get('login') }}</strong>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
	<div class="row flex flex-row justify-content-center">
		@foreach ($noticias as $noticia)
		<div class="card col-md-5 m-2 text-center">
			<div class="card-header">
				<span>
					<small style="float: left">{{$noticia->updated_at->diffForHumans()}}</small>
					<small style="float: right"><i class="fa fa-eye" aria-hidden="true"> {{$noticia->cantVisual}}</i></small>
				</span>
				<h1><a class="text-reset text-decoration-none" href="{{ route('noticias.show',$noticia->id) }}">
						{{ $noticia->tituloNoticia }}
					</a>
				</h1>
			</div><a class="text-reset text-decoration-none mt-1" href="{{ route('noticias.show',$noticia->id) }}">
				<div class="card-body w-full h-80">
					<h1>
						{{ $noticia->copeteNoticia }}
					</h1>
				</div>
				<div class="card-body w-full h-80">
					@if ($noticia->direccion)
					<img id="imagen" src="{{URL::asset('storage/'.$noticia->direccion)}}">
					@else
					<img id="imagen"
						src="https://3.bp.blogspot.com/-q11rITGRRag/WMDnW8qFiSI/AAAAAAAAD90/9fvxhkfRHNMAK6cjmFf3yqvnj6M8BpgQQCK4B/s1600/canchas-de-futbol-14.jpg">
					@endif
				</div>
			</a>
		</div>
		@endforeach
		{{ $noticias->links() }}
	</div>
</div>

<style>
	#imagen {
		width: 12em;
		height: auto;
		border: solid black 1px;
	}
</style>