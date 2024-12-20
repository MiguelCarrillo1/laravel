@extends ('layouts.home')
@section ('contenido')

<section>
            <h2>¿Qué son los Refugios?</h2>
            <p>
                Los refugios son espacios temporales destinados a albergar a personas que se han visto desplazadas o afectadas por desastres naturales como terremotos, huracanes, inundaciones, entre otros. Estos lugares ofrecen protección, alimentos, agua y atención básica para garantizar la seguridad y bienestar de las personas durante la emergencia.
            </p>

        </section>
        <section>
            <h3>¿Cómo Funcionan los Refugios?</h3>
            <p>
                Los refugios están organizados por organizaciones gubernamentales, ONG y comunidades locales. Están equipados con lo necesario para ofrecer alojamiento temporal y atención básica (alimentación, primeros auxilios, higiene, etc.). Los refugios se activan cuando ocurre un desastre y se mantiene su operatividad durante el tiempo que dure la emergencia. 
            </p>
            <p>
                En muchos casos, los refugios también sirven como centros de coordinación para la distribución de ayuda y recursos, y como puntos de encuentro para personas separadas de sus familias.
            </p>

        </section>
        <section>
            <h3>Características de los Refugios</h3>

            <div class="features-section">
                <ul class="features-list">
                    <li>
                        <img src="{{ asset('imagenes/security-official_4011645.png') }}" alt="" class="feature-icon">
                        <strong>Seguridad:</strong> Están ubicados en áreas estratégicas para proteger a las personas de mayores riesgos (deslizamientos de tierra, inundaciones, etc.).</li>
                    <li>
                    <img src="{{ asset('imagenes/opportunity_7655778.png') }}" alt="" class="feature-icon">
                    <strong>Capacidad:</strong> Los refugios están diseñados para albergar a un número determinado de personas, y su capacidad se ajusta en función de la demanda.</li>
                    <li>
                    <img src="{{ asset('imagenes/forest-management_17312751.png') }}" alt="" class="feature-icon">
                    <strong>Recursos Básicos:</strong> Los refugios proporcionan comida, agua potable, servicios de higiene y atención médica básica.</li>
                    <li>
                    <img src="{{ asset('imagenes/insurance_10787345.png') }}" alt="" class="feature-icon">
                    <strong>Personal Capacitado:</strong> Cuentan con personal especializado en situaciones de emergencia, como médicos, voluntarios y personal de seguridad.</li>
                </ul>  
            </div> 
        </section>

@endsection