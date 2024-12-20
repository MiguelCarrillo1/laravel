<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Refugios</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #333;">
    <a class="navbar-brand" href="#">Gestión de Refugios</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" id="boton-navbar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('home')}}">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('refugios')}}">Refugios</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('desastres')}}">Desastres naturales</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('organizacioneshome')}}">Organizaciones</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('quienes_somos')}}">¿Quienes somos?</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('contacto')}}">Contacto</a></li>


            <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle usericon" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-user-circle'></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                </div>
            </li>

            <!-- Botones de "Login" y "Register" en pantalla pequeñas -->
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
 
        </ul>
    </div>
</nav>

    <main>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <!--Contenido-->
                @if(Route::currentRouteName() === 'home')

                    <div class="welcome-section">
                        <div class="welcome-text">
                            <h2>Bienvenido al Sistema de Gestión de Refugios</h2>
                            <p>Este sistema está diseñado para organizar y gestionar refugios en caso de desastres naturales.</p>
                            <div class="welcome-image">
                                <img src="{{ asset('imagenes/banner.png') }}" alt="Imagen de Bienvenida">
                            </div>
                        </div>
                    </div>

                    <div class="features-section">
                        <h3 class="text-center">Nuestras Características</h3>
                        <ul class="features-list">
                            <li>
                            <img src="../imagenes/image 5.png" alt="" class="feature-icon">
                            <strong>Gestión de recursos</strong>: Administra las necesidades de los refugios.</li>
                            <li>
                            <img src="../imagenes/image 6.png" alt="" class="feature-icon">
                            <strong>Localización rápida</strong>: Encuentra refugios cercanos rápidamente.</li>
                            <li>
                            <img src="../imagenes/image 7.png" alt="" class="feature-icon">
                            <strong>Comunicación eficiente</strong>: Facilita la coordinación entre equipos.</li>
                        </ul>
                    </div>
                    
                @endif

                @yield('contenido')
                <!--Fin Contenido-->
                <br>
            </div>
        </div>
    </div>
    </main>
    <footer>
        <p>&copy; 2024 Sistema de Gestión de Refugios</p>
    </footer>

    <script src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

</body>
</html>
