<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Refugios</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <!-- Bootstrap 4 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/998vlkpmhf9rxnltg15honbj2z3yv68qf0iyf3bkqmyd45gg/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #333;">
    <a class="navbar-brand" href="#">Gestión de Refugios</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" id="boton-navbar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="{{url('refugio')}}">Refugios</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('refugiado')}}">Refugiados</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Incidencias</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Alertas</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Historial</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Asignar área en Refugio</a></li>
            <li class="nav-item"><a class="nav-link" href="../publicaciones/indexAdmin.blade.php">Foros</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('seguridad/usuario')}}">Usuarios</a></li>

            <li class="nav-item" id="notif-icon" class="notif-icon" role="button" aria-label="Notificaciones">
                <a class="nav-link" href="#"><i class="fa fa-bell"></i><span id="notif-badge">3</span></a>
            </li>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    
                    <button type="submit" class="btn btn-info CerrarSesion" style="background-color: transparent; width: 90%; border: none;outline: none; box-shadow: none;"><i class="fa fa-sign-out-alt"></i></button>
                    
                </form>
            </li>
        </ul>
    </div>
</nav>

<div id="notif-dropdown" class="notif-dropdown">
    <ul>
        <li><a href="#">Incidencia</a></li>
        <li><a href="#">Alerta</a></li>
        <li><a href="#">Cambio de estado</a></li>
    </ul>
</div>

<script>
    const notifIcon = document.getElementById("notif-icon");
    const notifDropdown = document.getElementById("notif-dropdown");
    notifIcon.addEventListener("click", function() {
        notifDropdown.classList.toggle("show");
    });
</script>

    <main>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <!--Contenido-->
                @yield('contenido')
                <!--Fin Contenido-->
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
