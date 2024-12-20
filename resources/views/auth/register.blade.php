<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>4C | Refugios</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--Bootstrap 4-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!--BoxIcons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{asset ('css/boxicons.min.css')}}" rel="stylesheet">
    <!--Estilos css-->
    <link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
<div class="container2">
        <!--Fila del contenedor de los formularios-->
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-9 col-lg-5">
                <!--Logo-->
                <div class="login-logo">
                    <a href="#"><b>Registro</b> de Usuario</a>
                </div>
                <!--Cuerpo del formulario-->
                <div class="login-box-body">
                    <!--Titulo indicativo-->
                    <p class="login-box-msg">Crear un usuario</p>

                    <!--Validacion de errores-->
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li> {{$error}} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <!--Formulario de registro-->
                    <form action="{{ route('register') }}" method="POST">
                        <!--Token CSRF-->
                        @csrf
                        <div class="row">
                            <!--Inputs para los datos-->
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Nombre de usuario</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Correo Electrónico</label>
                                    <input type="email" class="form-control" name="email" placeholder="username@example.com" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                                    <i class="bx bx-show password-toggle" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Confirmar contraseña</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña" required>
                                    <i class="bx bx-show password-toggle" id="togglePasswordConfirmation"></i>
                                </div>
                            </div>
                            <!--
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ config('captcha.site_key') }}"></div>
                                </div>
                            </div>
                            -->
                        </div>
                        <!--Enlace para crear usuario y boton de inicio de sesion-->
                        <div class="row">
                            <div class="col-7 enlace">
                                <a href="{{ route('login') }}">Ya tengo un usuario</a>
                            </div>
                            <div class="col-5 boton2">
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<!--Script para el boton de mostrar y ocultar contraseña-->
<script>
    // Referencias a los campos de contraseña y confirmación de contraseña
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const passwordConfirmationInput = document.getElementById('password_confirmation');
    const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');

    // Función para alternar entre mostrar y ocultar la contraseña
    function togglePasswordVisibility(input, icon) {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;

        // Cambiar el ícono de visibilidad
        if (type === 'password') {
            icon.classList.remove('bx-hide');
            icon.classList.add('bx-show');
        } else {
            icon.classList.remove('bx-show');
            icon.classList.add('bx-hide');
        }
    }

    // Agregar evento para el campo de contraseña
    togglePassword.addEventListener('click', function() {
        togglePasswordVisibility(passwordInput, togglePassword);
    });

    // Agregar evento para el campo de confirmación de contraseña
    togglePasswordConfirmation.addEventListener('click', function() {
        togglePasswordVisibility(passwordConfirmationInput, togglePasswordConfirmation);
    });
</script>



    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
</body>
</html>

