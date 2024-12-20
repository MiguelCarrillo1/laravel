@extends ('layouts.user')

@section ('contenido')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <center>
                <h3>Llene el formulario para poder registrarse en el refugio</h3>
            </center><br>

            @if (count($errors) > 0)
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

    {!! Form::model($refugio, ['method' => 'PATCH', 'route' => ['refugios.update', $refugio->id_refugio], 'files' => true]) !!}
    {{ Form::token() }}

    <div class="row">
        <!-- Nombres -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombres</label>
                <input type="text" name="nombre" required value="{{ old('nombre', $persona->nombre ?? '') }}" class="form-control" id="nombre">
            </div>
        </div>

        <!-- Apellidos -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="apellido">Apellidos</label>
                <input type="text" name="apellido" required value="{{ old('apellido', $persona->apellido ?? '') }}" class="form-control" id="apellido">
            </div>
        </div>

        <!-- Tipo de documento -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="tipo_documento">Tipo documento</label>
                <select name="tipo_documento" class="form-control" id="tipo_documento">
				    <option value="Cédula" {{ (old('tipo_documento', $persona->tipo_documento ?? '') == 'Cédula') ? 'selected' : '' }}>Cédula</option>
				    <option value="Pasaporte" {{ (old('tipo_documento', $persona->tipo_documento ?? '') == 'Pasaporte') ? 'selected' : '' }}>Pasaporte</option>
				</select>
            </div>
        </div>

        <!-- Numero de documento -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="num_documento">Numero de documento</label>
                <input type="text" name="num_documento" value="{{ old('num_documento', $persona->num_documento ?? '') }}" class="form-control" id="num_documento">
            </div>
        </div>

        <!-- Nacionalidad -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="nacionalidad">Nacionalidad</label>
                <input type="text" name="nacionalidad" value="{{ old('nacionalidad', $persona->nacionalidad ?? '') }}" class="form-control" id="nacionalidad">
            </div>
        </div>

        <!-- Foto de perfil -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="foto_perfil">Foto de perfil</label>
		        <input type="file" name="foto_perfil" class="form-control" id="foto_perfil">

		        @if (isset($persona) && !empty($persona->foto_perfil))
		            <center>
		                <img src="{{ asset('imagenes/refugiados/'.$persona->foto_perfil) }}" height="100px" width="150px">
		            </center>
		        @endif
		    </div>
		</div>

        <!-- Fecha de nacimiento -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $persona->fecha_nacimiento ?? '') }}" class="form-control" id="fecha_nacimiento">
            </div>
        </div>

        <!-- Sexo -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="sexo">Sexo</label>
		        <select name="sexo" class="form-control" id="sexo">
		            <option value="Masculino" {{ isset($persona) && $persona->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
		            <option value="Femenino" {{ isset($persona) && $persona->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
		        </select>
		    </div>
		</div>

        <!-- Dirección -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="direccion">Dirección</label>
		        <input type="text" name="direccion" required value="{{ isset($persona) ? $persona->direccion : old('direccion') }}" class="form-control" id="direccion">
		    </div>
		</div>

        <!-- Correo electrónico -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="email">Correo electrónico</label>
		        <input type="email" name="email" required value="{{ isset($persona) ? $persona->email : auth()->user()->email }}" class="form-control" id="email">
		    </div>
		</div>

        <!-- Teléfono -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="telefono">Teléfono</label>
		        <input type="text" name="telefono" required value="{{ isset($persona) ? $persona->telefono : old('telefono') }}" class="form-control" id="telefono">
		    </div>
		</div>


        <!-- Tipo sanguíneo -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="tipo_sanguineo">Tipo sanguíneo</label>
		        <select name="tipo_sanguineo" id="tipo_sanguineo" class="form-control">
		            @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $tipo)
		                <option value="{{ $tipo }}" {{ isset($persona) && $persona->tipo_sanguineo == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
		            @endforeach
		        </select>
		    </div>
		</div>


        <!-- Discapacidad -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="discapacidad">Discapacidad</label>
		        <textarea name="discapacidad" class="form-control" id="discapacidad">{{ isset($persona) ? $persona->discapacidad : old('discapacidad') }}</textarea>
		    </div>
		</div>

        <!-- Patología -->
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		    <div class="form-group">
		        <label for="patologia">Patología</label>
		        <textarea name="patologia" class="form-control" id="patologia">{{ isset($persona) ? $persona->patologia : old('patologia') }}</textarea>
		    </div>
		</div>

        <!-- Botones -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <center>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Registrarse</button>
                </div>
            </center>
        </div>
    </div>

    {!! Form::close() !!}
</div>

<style>
    .form-group label {
        font-weight: bold;
        color: #4a4a4a;
    }
    
    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .container {
        margin-top: 50px;
    }
</style>


@endsection
