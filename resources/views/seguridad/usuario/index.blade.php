@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

		<h3>Listado de Usuarios <a href="{{url('seguridad/usuario/create')}}"><button class="btn btn-success">Nuevo</button></a>
		<a href="{{ route('usuario.exportPdfUsuarios') }}">
        <button class="btn btn-danger">Exportar PDF</button>
    </a>
	</h3>

		@include('seguridad.usuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Localizado</th>
					<th>Rol</th>
					<th>Opciones</th>
				</thead>

				@foreach ($usuarios as $usu)
				<tr>
					<td>{{ $usu->id}}</td>
					<td>{{ $usu->username}}</td>
					<td>{{ $usu->email}}</td>
					<td>Refugio: </td>
					<td>{{ $usu->rol}}</td>
					<td>
						<button class="btn btn-info" onclick="location.href='{{ route('usuario.edit', $usu->id) }}'">
						    <i class="fa fa-edit"></i> Editar
						</button>
						<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('seguridad.usuario.modal')
				@endforeach

			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>
@endsection

