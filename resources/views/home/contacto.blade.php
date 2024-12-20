@extends ('layouts.home')
@section ('contenido')
<link rel="stylesheet" href="{{ asset('css/contacto.css')}}">
<h2>Contáctanos</h2>
        <p>
            Si tienes dudas, sugerencias o necesitas ayuda, no dudes en comunicarte con nosotros a través de los siguientes medios.
        </p>
        <div class="contact-container">
            <form action="/submit_contact_form" method="POST">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">ENVIAR</button>
            </form>
        </div>

       
            <h3 class="text-center">Información de Contacto</h3>
            <ul class="contact-info">
            <li><strong><i class="fas fa-phone-alt"></i> Teléfono:</strong> +1 234 567 890</li>
            <li><strong><i class="fas fa-envelope"></i> Email:</strong> contacto@gestionrefugios.com</li>
            <li><strong><i class="fas fa-map-marker-alt"></i> Dirección:</strong> Av. Central #456, Ciudad Refugio</li>
            </ul>

@endsection