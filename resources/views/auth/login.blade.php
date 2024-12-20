<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>4C | Refugios</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!--Bootstrap 4-->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
        <!--BoxIcons-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="{{asset ('css/boxicons.min.css')}}" rel="stylesheet">
        <!--Estilos css-->
        <link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
        <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

         <!-- Estilos para la animación del logo -->
         <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .captcha-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            border: 1px solid #d3d3d3;
            border-radius: 5px;
            background-color: #fff;
            padding: 15px;
            width: 320px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .captcha-top {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .captcha-check {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            border: 2px solid #d3d3d3;
            border-radius: 3px;
            margin-right: 10px;
            cursor: pointer;
        }
        .captcha-check.checked {
            background-color: #4caf50;
            border-color: #4caf50;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .captcha-check.checked:before {
            content: "✓";
            color: white;
            font-size: 14px;
            font-weight: bold;
        }
        .captcha-text {
            font-size: 14px;
            color: #333;
        }
        .captcha-footer {
            display: flex;
            align-items: center;
            font-size: 12px;
            color: #777;
            margin-top: 10px;
        }
        .captcha-footer img {
            width: 18px;
            height: 18px;
            margin-right: 5px;
        }
        .captcha-footer a {
            text-decoration: none;
            color: #007bff;
            margin-left: 5px;
        }
        .captcha-footer a:hover {
            text-decoration: underline;
        }
    </style>
    </head>

    <body>
    <div class="container">
        <!--Fila del contenedor de los formularios-->
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 col-lg-5">
                <!--Logo-->
                <div class="login-logo">
                    <a href="#"><b>Iniciar</b> Sesión</a>
                </div>

                <!--Cuerpo del formulario-->
                <div class="login-box-body">
                    <!--Titulo indicativo-->
                    <p class="login-box-msg">Ingresa tus credenciales</p>

                    <!--Validacion de errores-->
                    @if (count($errors)>0)
                        <div class="errors">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li> {{$error}} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!--Formulario de registro-->
                    <form action="{{ route('login') }}" method="POST">
                        <!--Token CSRF-->
                        @csrf
                        <div class="row">
                            <!--Inputs para los datos-->
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Usuario o correo electronico</label>
                                    <input type="text" class="form-control" name="username_or_email" placeholder="Username o email" required autofocus>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>

                                    <i class="bx bx-show password-toggle" id="togglePassword"></i>
                                </div>
                            </div>
                        </div>


                           <!-- Simulación de reCAPTCHA -->
        

                           <div class="captcha-container">
                                <div class="captcha-top">
                                    <div class="captcha-check" id="captcha-check"></div>
                                    <div class="captcha-text">No soy un robot</div>
                                </div>
                                <div class="captcha-footer">
                                    <img src="{{ asset('imagenes/reCAPTCHA.png') }}" alt="reCAPTCHA logo">
                                    <span>reCAPTCHA</span>
                                    <a href="#" title="Política de privacidad">Privacidad</a>
                                    -
                                    <a href="#" title="Términos y condiciones">Términos</a>
                                </div>
                            </div>

                        <!--Enlace para crear usuario y boton de inicio de sesion-->
                        <div class="row">
                            <div class="col-7 enlace">
                                <a href="{{ route('register') }}">Crear un usuario</a>
                            </div>
                            <div class="col-5 boton1">
                                <button type="submit" class="btn btn-primary" style="">Iniciar Sesión</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Scrip para la funcionalidad del boton de ver/ocultar contraseña-->
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        // Función para alternar entre mostrar y ocultar la contraseña
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            // Cambiar el ícono de visibilidad
            if (type === 'password') {
                togglePassword.classList.remove('bx-hide');
                togglePassword.classList.add('bx-show');
            } else {
                togglePassword.classList.remove('bx-show');
                togglePassword.classList.add('bx-hide');
            }

        });
        const captchaCheck = document.getElementById('captcha-check');
        captchaCheck.addEventListener('click', () => {
            captchaCheck.classList.toggle('checked');
            // Aquí puedes agregar validaciones o callbacks adicionales.
        });
    </script>

        <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{ asset('js/popper.min.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        
    </body>
</html>

