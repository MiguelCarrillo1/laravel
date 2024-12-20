@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Agregar un nuevo refugio</h3>
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

{!!Form::open(array('url'=>'refugio','method'=>'POST','autocomplete'=>'off','files'=>true))!!}
{{Form::token()}}

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre_refugio">Nombre</label>
			<input type="text" name="nombre_refugio" required value="{{old('nombre_refugio')}}" class="form-control" placeholder="Nombre del refugio">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="tipo_refugio">Tipo</label>
			<input type="text" name="tipo_refugio" required value="{{old('tipo_refugio')}}" class="form-control" placeholder="Tipo del refugio">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Direccion del refugio">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="ubicacion">Ubicacion</label>
			<input type="text" name="ubicacion" value="{{old('ubicacion')}}" class="form-control" placeholder="Ubicacion del refugio">
		</div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-group">
			<label for="descripcion">Descripcion</label>
			<input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion del refugio" style="width: 100%; height: 100px;">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="capacidad_maxima">Capacidad total</label>
			<input type="number" name="capacidad_maxima" required value="0" class="form-control">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="capacidad_actual">Capacidad actual</label>
			<input type="number" name="capacidad_actual" required value="0" class="form-control">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="telefono">Telefono</label>
			<input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Telefono del gerente">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="contacto">Correo electronico</label>
			<input type="text" name="contacto" required value="{{old('contacto')}}" class="form-control" placeholder="Correo del refugio">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="recursos_disponibles">Recursos</label>
			<input type="text" name="recursos_disponibles" value="{{old('recursos_disponibles')}}" class="form-control" placeholder="Recurosos del refugio" style="width: 100%; height: 100px;">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="imagen">Imagen</label>
			<input type="file" name="imagen" class="form-control">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
	</div>

</div>

{!!Form::close()!!}
@endsection

