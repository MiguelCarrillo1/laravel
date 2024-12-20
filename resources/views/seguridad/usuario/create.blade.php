@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<h3>Nuevo Usuario</h3>

		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li> {{$error}} </li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::open(array('url'=>'seguridad/usuario','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}

        <div class="row">
        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="username">Nombre</label>
					<input type="text" name="username" required placeholder="Nombre de usuario" class="form-control">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="email">Correo electronico</label>
					<input type="email" name="email" required placeholder="username@example.com" class="form-control">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="password">Contraseña</label>
					<input type="password" name="password" required placeholder="Contraseña" class="form-control">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="password">Confirmar contraseña</label>
					<input type="password" name="password_confirmation" required placeholder="Confirmar contraseña" class="form-control">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="rol">Rol</label>
					<select name="rol" id="rol" class="form-control">
						<option value="Administrador">Administrador</option>
						<option value="Voluntario">Voluntario</option>
						<option value="Usuario">Usuario</option>
					</select>
				</div>
			</div>
        </div>


		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{ URL('seguridad/usuario') }}" class="btn btn-danger">Cancelar</a>

		</div>

		{!!Form::close()!!}

	</div>
</div>
@endsection
