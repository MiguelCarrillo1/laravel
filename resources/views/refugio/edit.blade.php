@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<h3>Editar Refugio: {{$refugio->nombre_refugio}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li> {{$error}} </li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>

{!!Form::model($refugio,['method'=>'PATCH','route'=>['refugio.update',$refugio->id_refugio],'files'=>true])!!}
{{Form::token()}}

<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="nombre_refugio">Nombre</label>
			<input type="text" name="nombre_refugio" required value="{{$refugio->nombre_refugio}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="tipo_refugio">Tipo</label>
			<input type="text" name="tipo_refugio" required value="{{$refugio->tipo_refugio}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" required value="{{$refugio->direccion}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="ubicacion">Ubicacion</label>
			<input type="text" name="ubicacion" value="{{$refugio->ubicacion}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
		<div class="form-group">
			<label for="capacidad_maxima">Capacidad total</label>
			<input type="number" name="capacidad_maxima" required value="{{$refugio->capacidad_maxima}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
		<div class="form-group">
			<label for="capacidad_actual">Capacidad actual</label>
			<input type="number" name="capacidad_actual" required value="{{$refugio->capacidad_maxima}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label for="telefono">Telefono</label>
			<input type="text" name="telefono" required value="{{$refugio->telefono}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label for="contacto">Correo electronico</label>
			<input type="text" name="contacto" required value="{{$refugio->contacto}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label for="imagen">Imagen</label>
			<input type="file" name="imagen" class="form-control">
			@if (($refugio->imagen)!="")
			<center>
			<img src="{{asset('imagenes/refugios/'.$refugio->imagen)}}" height="100px" width="150px">
			</center>
			@endif
		</div>
	</div>


	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label for="estado">Estado del refugio</label>
			<select name="estado" class="form-control">
				@if ($refugio->estado=='Disponible')
					<option value="Disponible" selected>Disponible</option>
					<option value="No disponible">No disponible</option>
				@else
					<option value="Disponible">Disponible</option>
					<option value="No disponible" selected>No disponible</option>
				@endif
			</select>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<textarea name="descripcion" class="form-control" rows="5">{{$refugio->descripcion}}</textarea>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="recursos_disponibles">Recursos</label>
			<textarea name="recursos_disponibles" class="form-control" rows="3">{{$refugio->recursos_disponibles}}</textarea>
		</div>
	</div>


	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{ URL('refugio') }}" class="btn btn-danger">Cancelar</a>

		</div>
	</div>

</div>

<script>
    tinymce.init({
        selector: 'textarea[name="descripcion"]', // Selecciona el campo específico
        plugins: 'lists', // Habilita el plugin de listas
        toolbar: 'undo redo | bold italic underline | bullist numlist | removeformat', // Opciones de herramientas
        menubar: false, // Oculta el menú superior (opcional)
        height: 300 // Ajusta la altura del editor
    });
</script>

<script>
    tinymce.init({
        selector: 'textarea[name="recursos_disponibles"]', // Selecciona el campo específico
        plugins: 'lists', // Habilita el plugin de listas
        toolbar: 'undo redo | bold italic underline | bullist numlist | removeformat', // Opciones de herramientas
        menubar: false, // Oculta el menú superior (opcional)
        height: 300 // Ajusta la altura del editor
    });
</script>

{!!Form::close()!!}
@endsection
