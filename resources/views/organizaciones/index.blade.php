@extends ('layouts.user')
@section ('contenido')
<h2>Organizaciones Colaboradoras</h2>
        <p>
            Conoce las instituciones que trabajan junto a nosotros para garantizar una respuesta eficiente ante desastres naturales.
        </p>
        <h3>Organizaciones Ecuatorianas</h3>    
        <section class="tarjetas-container">
            
            <!-- Tarjeta 1: Cruz Roja -->
            <div class="tarjeta">
                <img src="{{ asset('imagenes/cruz_roja_logo.png') }}" alt="Cruz Roja Ecuatoriana" class="logo"
                style="width: 200%; max-width: 300px; height: auto; display: block; margin: 0 auto;">
                <h4>Cruz Roja Ecuatoriana</h4>
                <p><strong>Ámbito de acción:</strong> Asistencia médica y humanitaria.</p>
                <p><strong>Descripción:</strong> La Cruz Roja Ecuatoriana brinda apoyo en situaciones de emergencia y desastre a través de atención médica, albergues y servicios de evacuación.</p>
            </div>

            <!-- Tarjeta 2: Fundación Ecuatoriana de Voluntarios -->
            <div class="tarjeta">
                <img src="{{ asset('imagenes/fundacion_voluntarios_logo.png') }}" alt="Fundación Ecuatoriana de Voluntarios" class="logo"
                style="width: 100%; max-width: 150px; height: auto; display: block; margin: 0 auto;">
                <h4>Fundación Ecuatoriana de Voluntarios</h4>
                <p><strong>Ámbito de acción:</strong> Voluntariado en emergencias y desastres naturales.</p>
                <p><strong>Descripción:</strong> Esta fundación promueve el voluntariado en situaciones de crisis, organizando brigadas para apoyar en la atención a afectados y la reconstrucción de comunidades.</p>
            </div>

            <!-- Tarjeta 3: Protección Civil -->
            <div class="tarjeta">
                <img src="{{ asset('imagenes/proteccion_civil_logo.png') }}" alt="Protección Civil Ecuador" class="logo"
                style="width: 100%; max-width: 150px; height: auto; display: block; margin: 0 auto;">
                <h4>Protección Civil Ecuador</h4>
                <p><strong>Ámbito de acción:</strong> Coordinación de evacuaciones y rescates.</p>
                <p><strong>Descripción:</strong> Protección Civil Ecuador se encarga de coordinar evacuaciones y rescates en casos de desastres naturales, garantizando la seguridad de la población afectada.</p>
            </div>

            <!-- Tarjeta 4: Fundación de las Naciones Unidas -->
            <div class="tarjeta">
                <img src="{{ asset('imagenes/fundacion_naciones_unidas_logo.png') }}" alt="Fundación de las Naciones Unidas" class="logo"
                style="width: 100%; max-width: 150px; height: auto; display: block; margin: 0 auto;">
                <h4>Fundación de las Naciones Unidas</h4>
                <p><strong>Ámbito de acción:</strong> Respuesta internacional ante desastres.</p>
                <p><strong>Descripción:</strong> Fundación de las Naciones Unidas trabaja en colaboración con gobiernos y ONGs para coordinar y entregar ayuda internacional a las víctimas de desastres en Ecuador.</p>
            </div>

            <!-- Tarjeta 5: Ministerio de Salud Pública de Ecuador -->
            <div class="tarjeta">
                <img src="{{ asset('imagenes/ministerio_salud_logo.png') }}" alt="Ministerio de Salud Pública de Ecuador" 
                    class="logo" 
                    style="width: 100%; max-width: 150px; height: auto; display: block; margin: 0 auto;">
                <h4>Ministerio de Salud Pública de Ecuador</h4>
                <p><strong>Ámbito de acción:</strong> Salud pública y emergencias sanitarias.</p>
                <p><strong>Descripción:</strong> El Ministerio de Salud Pública juega un papel crucial en el manejo de emergencias sanitarias durante y después de desastres, proporcionando atención médica y apoyo psicológico.</p>
            </div>
            
<style>
.tarjetas-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.tarjeta {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    padding: 15px;
    transition: transform 0.3s;
}

.tarjeta:hover {
    transform: scale(1.05);
}
h3{
    text-align: center;
    color: #333;
}
h4 {
    color: #333;
    margin-bottom: 10px;
}

p {
    color: #555;
}
</style>
@endsection