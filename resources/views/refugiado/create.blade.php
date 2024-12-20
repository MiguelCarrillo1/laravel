@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Agregar un nuevo refugiado</h3>
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

{!!Form::open(array('url'=>'refugiados','method'=>'POST','autocomplete'=>'off','files'=>true))!!}
{{Form::token()}}

<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="nombre">Nombres</label>
			<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre del refugiado">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="apellido">Apellidos</label>
			<input type="text" name="apellido" required value="{{old('apellido')}}" class="form-control" placeholder="Apellidos del refugiado">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="tipo_documento">Tipo documento</label>
			<select name="tipo_documento" id="tipo_documento" class="form-control">
				<option value="Cédula">Cédula</option>
				<option value="Pasaporte">Pasaporte</option>
			</select>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="num_documento">Numero de documento</label>
			<input type="text" name="num_documento" value="{{old('num_documento')}}" class="form-control" placeholder="Ejemplo: 1302586974">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="nacionalidad">Nacionalidad</label>
			<input type="text" name="nacionalidad" value="{{old('nacionalidad')}}" class="form-control" placeholder="Nacionalidad del refugiado">
		</div>
	</div>


	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="foto_perfil">Foto de perfil</label>
			<input type="file" name="foto_perfil" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="fecha_nacimiento">Fecha de nacimiento</label>
			<input type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="sexo">Sexo</label>
			<select name="sexo" id="sexo" class="form-control">
				<option value="Masculino">Masculino</option>
				<option value="Femenino">Femenino</option>
			</select>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Dirección del refugiado">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="telefono">Telefono</label>
			<input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Ejemplo: 0987654321">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="email">Correo electronico</label>
			<input type="text" name="email" required value="{{old('email')}}" class="form-control" placeholder="Correo del refugiado">
		</div>
	</div>
	
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="tipo_sanguineo">Tipo sanguineo</label>
			<select name="tipo_sanguineo" id="tipo_sanguineo" class="form-control">
				<option value="A+">A+</option>
			    <option value="A-">A-</option>
			    <option value="B+">B+</option>
			    <option value="B-">B-</option>
			    <option value="AB+">AB+</option>
			    <option value="AB-">AB-</option>
			    <option value="O+">O+</option>
			    <option value="O-">O-</option>
			</select>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="discapacidad">Discapacidad</label>
			<textarea type="text" name="discapacidad" value="{{old('discapacidad')}}" class="form-control"></textarea>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="patologia">Patologia</label>
			<textarea type="text" name="patologia" value="{{old('patologia')}}" class="form-control"></textarea>
		</div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<center>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{ URL('refugiados') }}" class="btn btn-danger">Cancelar</a>
		</div>
		</center>
	</div>

</div>

{!!Form::close()!!}
@endsection

