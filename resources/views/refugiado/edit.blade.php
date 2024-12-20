@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Refugiado: {{$persona->nombre}}</h3>
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

{!!Form::model($persona,['method'=>'PATCH','route'=>['refugiados.update',$persona->id_persona],'files'=>true])!!}
{{Form::token()}}

<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="nombre">Nombres</label>
			<input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="apellido">Apellidos</label>
			<input type="text" name="apellido" required value="{{$persona->apellido}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="tipo_documento">Tipo documento</label>
			<select name="tipo_documento" class="form-control">
				@if ($persona->tipo_documento=='Cédula')
					<option value="Cédula" selected>Cédula</option>
					<option value="Pasaporte">Pasaporte</option>
				@else
					<option value="Cédula">Cédula</option>
					<option value="Pasaporte" selected>Pasaporte</option>
				@endif
			</select>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="num_documento">Numero de documento</label>
			<input type="text" name="num_documento" value="{{$persona->num_documento}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="nacionalidad">Nacionalidad</label>
			<input type="text" name="nacionalidad" value="{{$persona->nacionalidad}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="foto_perfil">Foto de perfil</label>
			<input type="file" name="foto_perfil" class="form-control">
			@if (($persona->foto_perfil)!="")
			<center>
			<img src="{{asset('imagenes/refugiados/'.$persona->foto_perfil)}}" height="100px" width="150px">
			</center>
			@endif
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="fecha_nacimiento">Fecha de nacimiento</label>
			<input type="date" name="fecha_nacimiento" value="{{$persona->fecha_nacimiento}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="sexo">Sexo</label>
			<select name="sexo" class="form-control">
				@if ($persona->sexo=='Masculino')
					<option value="Masculino" selected>Masculino</option>
					<option value="Femenino">Femenino</option>
				@else
					<option value="Masculino">Masculino</option>
					<option value="Femenino" selected>Femenino</option>
				@endif
			</select>
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" required value="{{$persona->direccion}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="form-group">
			<label for="email">Correo electronico</label>
			<input type="text" name="email" required value="{{$persona->email}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label for="telefono">Telefono</label>
			<input type="text" name="telefono" required value="{{$persona->telefono}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label for="tipo_sanguineo">Tipo sanguineo</label>
			<select name="tipo_sanguineo" id="tipo_sanguineo" class="form-control">
				@if ($persona->tipo_sanguineo=='A+')
					<option value="A+" selected>A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				@elseif ($persona->tipo_sanguineo=='A-')
					<option value="A+">A+</option>
				    <option value="A-" selected>A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				@elseif ($persona->tipo_sanguineo=='B+')
					<option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+" selected>B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				@elseif ($persona->tipo_sanguineo=='B-')
					<option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-" selected>B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				@elseif ($persona->tipo_sanguineo=='AB+')
					<option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+" selected>AB+</option>
				    <option value="AB-">AB-</option>
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				@elseif ($persona->tipo_sanguineo=='AB-')
					<option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-" selected>AB-</option>
				    <option value="O+">O+</option>
				    <option value="O-">O-</option>
				@elseif ($persona->tipo_sanguineo=='O+')
					<option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				    <option value="O+" selected>O+</option>
				    <option value="O-">O-</option>
				@else
					<option value="A+">A+</option>
				    <option value="A-">A-</option>
				    <option value="B+">B+</option>
				    <option value="B-">B-</option>
				    <option value="AB+">AB+</option>
				    <option value="AB-">AB-</option>
				    <option value="O+">O+</option>
				    <option value="O-" selected>O-</option>
				@endif
			</select>
		</div>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<label for="estado">Estado del refugiado</label>
			<select name="estado" class="form-control">
				@if ($persona->estado=='Activo')
					<option value="Activo" selected>Activo</option>
					<option value="Inactivo">Inactivo</option>
				@else
					<option value="Activo">Activo</option>
					<option value="Inactivo" selected>Inactivo</option>
				@endif
			</select>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="discapacidad">Discapacidad</label>
			<textarea type="text" name="discapacidad"class="form-control">{{$persona->discapacidad}}</textarea>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="patologia">Patologia</label>
			<textarea type="text" name="patologia"class="form-control">{{$persona->patologia}}</textarea>
		</div>
	</div>

	<div class="col-lg12 col-md-12 col-sm-12 col-xs-12">
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

