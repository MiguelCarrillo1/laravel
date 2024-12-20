<!DOCTYPE html>
<html>
<head>
    <title>Refugiado PDF</title>
</head>
<body>
<table class="table table-striped table-bordered table-condensed table-hover">
				<thead style="text-align: center;">
					<th>ID</th>
					<th>Apell. y nombres</th>
					<th>Foto</th>
					<th>Tipo doc.</th>
					<th>Num. doc.</th>
					<th>Nacionalidad</th>
					<th>Tipo san.</th>
					<th>Sexo</th>
					<th>Telefono</th>
					<th>Email</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>

				@foreach ($personas as $per)
				<tr>
					<td>{{ $per->id_persona}}</td>
					<td>{{ $per->apellido.' '.$per->nombre}}</td>
					<td>
						<img src="{{asset('imagenes/refugiados/'.$per->foto_perfil)}}" alt="{{ $per->nombre}}" height="100px" width="100px" class="img-thumbnail">
					</td>
					<td>{{ $per->tipo_documento}}</td>
					<td>{{ $per->num_documento}}</td>
					<td>{{ $per->nacionalidad}}</td>
					<td>{{ $per->tipo_sanguineo}}</td>
					<td>{{ $per->sexo}}</td>
					<td>{{ $per->telefono}}</td>
					<td>
					    @if($per->usuario_email)
					        <span>{{ $per->usuario_email }}</span>
					    @else
					        <span>No asignado</span>
					    @endif
					</td>
					<td>
					    @if($per->estado == 'Activo')
					        <span class="badge badge-success">{{ $per->estado }}</span>
					    @else
					        <span class="badge badge-danger">{{ $per->estado }}</span>
					    @endif
					</td>

					<td>
						<button class="btn btn-info" onclick="location.href='{{ route('refugiados.edit', $per->id_persona) }}'">
						    <i class="fa fa-edit"></i> Editar
						</button>
						<a href="" data-target="#modal-delete-{{$per->id_persona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('refugiado.modal')
				@endforeach

			</table>
</body>
</html>
