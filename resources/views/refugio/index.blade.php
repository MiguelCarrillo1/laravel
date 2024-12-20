@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

	<h3>Listado de Refugios 
            <a href="{{ route('refugio.create') }}">
                <button class="btn btn-success">Nuevo</button>
            </a>
            <a href="{{ route('refugio.exportPdf') }}" target="_blank">
                <button class="btn btn-primary">
                    <i class="fa fa-file-pdf-o"></i> Descargar PDF
                </button>
            </a>
        </h3>

		@include('refugio.search')

	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="text-align: center;">
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Dirección</th>
					<th>Capacidad</th>
					<th>Telefono gere.</th>
					<th>Contacto</th>
					<th>Recursos</th>
					<th>Imagen</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>

				@foreach ($refugios as $ref)
				<tr>
					<td>{{ $ref->nombre_refugio}}</td>
					<td>{{ $ref->tipo_refugio}}</td>
					<td>{{ $ref->direccion}}</td>
					<td>{{ $ref->capacidad_maxima.'/'.$ref->capacidad_actual}}</td>
					<td>{{ $ref->telefono}}</td>
					<td>{{ $ref->contacto}}</td>
					<td>{{ $ref->recursos_disponibles}}</td>
					
					<td>
						<img src="{{asset('imagenes/refugios/'.$ref->imagen)}}" alt="{{ $ref->nombre_refugio}}" height="100px" width="100px" class="img-thumbnail">
					</td>

					<td>
					    @if($ref->estado == 'Disponible')
					        <span class="badge badge-success">{{ $ref->estado }}</span>
					    @else
					        <span class="badge badge-danger">{{ $ref->estado }}</span>
					    @endif
					</td>

					<td>
						<button class="btn btn-info" onclick="location.href='{{ route('refugio.edit', $ref->id_refugio) }}'">
						    <i class="fa fa-edit"></i> Editar
						</button>
						<a href="" data-target="#modal-delete-{{$ref->id_refugio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('refugio.modal')
				@endforeach

			</table>
		</div>
		<div class="d-flex justify-content-center">
		    {{ $refugios->links() }}
		</div>
	</div>
</div>

@endsection