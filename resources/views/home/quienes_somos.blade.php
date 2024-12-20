@extends ('layouts.home')
@section ('contenido')
<link rel="stylesheet" href="{{ asset('css/quienes_somos.css')}}">
    
<section>
            <h2>Sobre Nosotros</h2>
            <p>
                Somos una organización dedicada a coordinar esfuerzos para la gestión y administración de refugios en casos de desastres naturales. Trabajamos en conjunto con instituciones locales, nacionales e internacionales para garantizar la seguridad y bienestar de las comunidades afectadas.
            </p>
        </section>

        <section>
            <h3>Nuestra Misión</h3>
            <p>
                Brindar soluciones efectivas y rápidas para la protección de las personas afectadas por desastres naturales, promoviendo la colaboración entre diversas organizaciones y fomentando la prevención.
            </p>
        </section>

        <section>
            <h3>Nuestro Equipo</h3>
            <p>
                Nuestro equipo está compuesto por profesionales y voluntarios altamente comprometidos con la causa. Cada miembro desempeña un papel clave en la gestión eficiente y efectiva de los refugios y en la atención a las víctimas de desastres naturales.
            </p>
            <div class="team-members">
                <ul class="features-list">
                    <li>
                    <img src="{{ asset('imagenes/manager_360448.png') }}" alt="" class="feature-icon">    
                    <strong>Administradores:</strong> Supervisan y gestionan las operaciones del sistema, asegurando la correcta administración de los refugios.</li>
                    <li>
                    <img src="{{ asset('imagenes/teamwork_2849186.png') }}" alt="" class="feature-icon">
                    <strong>Coordinadores:</strong> Gestionan los refugios y los recursos locales, optimizando la distribución de ayuda en las zonas afectadas.</li>
                    <li>
                    <img src="{{ asset('imagenes/friendship_3896103.png') }}" alt="" class="feature-icon"><strong>Voluntarios:</strong> Ayudan en la operación diaria, brindando apoyo directo a las comunidades y colaborando en la organización de eventos de preparación y prevención.</li>
                </ul>
            </div>
        </section>
            <div class="text-center">
            <h2 class="title">Siguenos:</h2>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com" target="_blank" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="social-icon">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://linkedin.com" target="_blank" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>

        <style>
        .title {
            text-align: center;
            margin-top: 80px;
            margin-bottom: 20px;
            font-size: 25px;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        
        .social-icon {
            font-size: 24px;
            margin: 0 10px;
            color: #333;
            text-decoration: none;
        }
        
        .social-icon:hover {
            color:rgb(13, 44, 199);
            transform: scale(1.2);
        }   
        </style>

@endsection