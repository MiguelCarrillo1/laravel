@extends ('layouts.home')
@section ('contenido')
<h2>Información sobre Desastres Naturales</h2>
        <p>
            Mantente informado sobre los tipos de desastres naturales y cómo prepararte para ellos. Aquí encontrarás recursos, recomendaciones y pasos a seguir en caso de emergencia.
        </p>

        <h3>Tipos de Desastres Naturales</h3>
        <section class="tarjetas-container">

            <!-- Tarjeta 1: Terremoto -->
            <div class="tarjeta">
                <img src="{{ asset('imagenes/terremoto_logo.png') }}" alt="Terremoto" class="logo"
                style="width: 150%; max-width: 200px; height: auto; display: block; margin: 0 auto;">
                <h4>Terremotos</h4>
                <p><strong>Descripción:</strong> Los terremotos son movimientos sísmicos que ocurren debido a la liberación de energía en la corteza terrestre. Pueden causar daños a edificios, infraestructuras y poner en riesgo a las personas.</p>
                <h5>Pasos a seguir en caso de Terremoto:</h5>
                <ul>
                    <li>Busca refugio bajo muebles resistentes, como mesas o escritorios.</li>
                    <li>Mantente alejado de ventanas y objetos que puedan caer.</li>
                    <li>Si estás en la calle, aléjate de edificios, puentes y cables eléctricos.</li>
                    <li>Después de que pase el temblor, verifica tu entorno y asegúrate de que no haya daños graves antes de evacuar.</li>
                </ul>
            </div>

            <!-- Tarjeta 2: Inundaciones -->
            <div class="tarjeta">
                <img src="{{ asset('imagenes/inundacion_logo.png') }}" alt="Inundaciones" class="logo"
                style="width: 150%; max-width: 200px; height: auto; display: block; margin: 0 auto;">
                <h4>Inundaciones</h4>
                <p><strong>Descripción:</strong> Las inundaciones ocurren cuando los cuerpos de agua, como ríos o lagos, superan su capacidad y cubren áreas que normalmente no están sumergidas. Son especialmente peligrosas en áreas urbanas y cerca de ríos.</p>
                <h5>Pasos a seguir en caso de Inundación:</h5>
                <ul>
                    <li>Evacúa a las zonas más altas o a lugares de refugio a tiempo.</li>
                    <li>Evita caminar o conducir por áreas inundadas, ya que las aguas pueden ser profundas o contener objetos peligrosos.</li>
                    <li>Escucha las alertas y sigue las instrucciones de las autoridades locales.</li>
                    <li>Si estás atrapado en un lugar elevado, mantente alejado de las ventanas y espera ayuda.</li>
                </ul>
            </div>

            <!-- Tarjeta 3: Huracanes -->
            <div class="tarjeta">
                <img src="{{ asset('imagenes/huracan_logo.png') }}" alt="Huracanes" class="logo"
                style="width: 150%; max-width: 200px; height: auto; display: block; margin: 0 auto;">
                <h4>Huracanes</h4>
                <p><strong>Descripción:</strong> Los huracanes son tormentas tropicales con vientos extremadamente fuertes, lluvias intensas y mareas altas que pueden causar graves daños a viviendas, infraestructuras y poner en riesgo la vida de las personas.</p>
                <h5>Pasos a seguir en caso de Huracán:</h5>
                <ul>
                    <li>Aléjate de las zonas costeras y dirígete a un refugio seguro en el interior de tu casa o en refugios públicos.</li>
                    <li>Refuerza las ventanas y puertas para protegerte de los vientos fuertes.</li>
                    <li>Mantén un kit de emergencia con agua, alimentos no perecederos, linterna y baterías.</li>
                    <li>Sigue las alertas meteorológicas y las instrucciones de evacuación si es necesario.</li>
                </ul>
            </div>

        </section>

        <!-- Sección de Consejos Generales -->
        <section>
            <h3>Consejos Generales en Caso de Emergencia</h3>
            <p>Además de los pasos específicos para cada tipo de desastre, es importante seguir estas recomendaciones generales para mantenerte seguro durante cualquier emergencia:</p>

            <div class="features-section">

                <ul class="features-list">
                    <li>
                        <strong>Mantener la Calma:</strong> Mantén la calma y evita entrar en pánico.</li>
                    <li> 
                        <strong>Evacúrate:</strong> Preocura de tener un plan de emergencia familiar, con rutas de evacuación y puntos de encuentro.</li>
                    <li> 
                        <strong>Preparación Personal:</strong> Lleva contigo un kit de emergencia con números de contacto importantes y mantiene tu teléfono cargado.</li>
                    <li> 
                        <strong>Preparación Familiar:</strong> Si tienes tiempo, lleva contigo artículos esenciales como agua, alimentos, medicinas y documentos importantes.</li>
                </ul>
            </div>
        </section>
        <p>Quieres saber un poco sobre los mayores desastres que han ocurrido a lo largo de la historia, Descarga el siguiente archivo</p>
        <div style="text-align: center; margin-top: 30px;">
    <a href="{{ route('desastres.pdf') }}" class="btn btn-primary" style="padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px;">
        Descargar PDF
    </a>
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