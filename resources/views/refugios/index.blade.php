@extends ('layouts.user')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<center><h3>Refugios</h3></center><br>
        <h4>Comoce todos nuestros refugios descargando la siguiente lista </h4>
        <a href="{{ route('refugio.exportPdf') }}" target="_blank">
                        <button class="btn btn-primary">
                            <i class="fa fa-file-pdf-o"></i> Descarga </button> </a>
	</div>
</div>
<div class="row">
    @foreach($refugios as $refugio)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-header text-center" style="background-color: #333; color: white;">
                    <h5>Refugio: {{ $refugio->nombre_refugio }}</h5>
                    
                </div>
                <div class="card-body">
                    <p><strong>Ubicación:</strong> {{ $refugio->ubicacion }}</p>
                    <p><strong>Capacidad máxima:</strong> {{ $refugio->capacidad_maxima }} personas</p>
                    <p><strong>Capacidad actual:</strong> {{ $refugio->capacidad_actual }} personas</p>
                    <div>{!! $refugio->descripcion !!}</div> <!-- Interpreta el HTML -->
                    <button class="btn btn-info" onclick="location.href='{{ route('refugios.edit', $refugio->id_refugio) }}'">Quiero registrarme
                        </button>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection