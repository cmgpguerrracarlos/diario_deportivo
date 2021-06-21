@include('layouts/app')
<div class="py-12">
	<div class="max-w-7xl mx-auto sm:px-7 lg:px-8">
		<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
			<div class="p-6 bg-white border-b border-gray-200 pb-5">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-12">
							<div class="card mt-4 shadow-lg">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h3>Lista de Noticias</h3>
									@can('noticias.create')
										<a href="/noticia/create" class="btn btn-primary btn-sm">Nueva Noticia</a>
									@endcan
								</div>
								<div class="card-body">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Titulo</th>
												<th scope="col">Copete</th>
												<th scope="col">Tipo</th>
												<th scope="col">Imagen</th>
												<th width="280px">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($noticias as $noticia)
											<tr>
												<th scope="row">{{ $noticia->tituloNoticia }}</th>
												<td>{{ $noticia->copeteNoticia }}</td>
												<td>{{ $noticia->tipoNoticia }}</td>
												<td>
												@if ($noticia->direccion)
													<img id="imagen" src="{{URL::asset('storage/'.$noticia->direccion)}}">
												@else
													<img id="imagen" src="https://3.bp.blogspot.com/-q11rITGRRag/WMDnW8qFiSI/AAAAAAAAD90/9fvxhkfRHNMAK6cjmFf3yqvnj6M8BpgQQCK4B/s1600/canchas-de-futbol-14.jpg">
												@endif
												</td>
												<td>
													<form action="{{ route('noticias.destroy',$noticia->id) }}" method="POST">
														<a class="btn btn-info" href="{{ route('noticias.show',$noticia->id) }}">Mostrar</a>
														<a class="btn btn-primary" href="{{ route('noticias.edit',$noticia->id) }}">Editar</a>
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-danger"
															onclick="return confirm('¿Desea eliminar la noticia?')">Eliminar</button>
													</form>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									{{ $noticias->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	#imagen{
		width:4em;
		height:2.4em;
		border: solid black 1px;
	}
</style>