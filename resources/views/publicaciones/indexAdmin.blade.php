@extends ('layouts.admin')
@section ('contenido')
<div class="container mt-4">
    <h1 class="mb-4">Foro de Publicaciones</h1>

    <!-- Mensajes de éxito o error -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Caja de nueva publicación -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Nueva Publicación</h5>
            {!! Form::open(['route' => 'publicaciones.store', 'method' => 'POST']) !!}
                @csrf
                <div class="form-group">
                    {!! Form::textarea('contenido', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => '¿Qué deseas compartir?', 'required' => true]) !!}
                </div>
                <div class="form-group mt-3">
                    {!! Form::submit('Publicar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Listado de publicaciones -->
    <h3 class="mb-4">Publicaciones Recientes</h3>
    <div class="publicaciones-list">
        @forelse ($publicaciones as $public)
            <div class="card mb-3">
                <div class="card-body">
                    <!-- Información del usuario y la fecha -->
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>{{ $public->usuario->username ?? 'Usuario desconocido' }}</strong>
                            <small class="text-muted">
                                | {{ \Carbon\Carbon::parse($public->fecha_publicacion)->format('d/m/Y H:i') }}
                            </small>
                        </div>
                        @if($public->id_usuario === auth()->id())
                            <!-- Botones de acción (editar, eliminar) -->
                            <div>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $public->id_publicacion }}">Editar</button>
                                <form action="{{ route('publicaciones.destroy', $public->id_publicacion) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta publicación?')">Eliminar</button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <!-- Contenido de la publicación -->
                    <p>{{ $public->contenido }}</p>
                </div>

                <!-- Respuestas (comentarios) -->
                <div class="card-footer">
                    <h5>Respuestas:</h5>
                    @foreach($public->respuestas as $respuesta)
                        <div class="media mb-3">
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>{{ $respuesta->usuario->username ?? 'Usuario desconocido' }}</strong>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($respuesta->fecha_respuesta)->format('d/m/Y H:i') }}</small>
                                    </div>
                                    @if($respuesta->id_usuario === auth()->id())
                                        <!-- Botones de acción (editar, eliminar) -->
                                        <div>
                                            <!-- Editar respuesta -->
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModalRespuesta{{ $respuesta->id_respuesta }}">Editar</button>
                                            <!-- Eliminar respuesta -->
                                            <form action="{{ route('respuestas.destroy', $respuesta->id_respuesta) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta respuesta?')">Eliminar</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <p>{{ $respuesta->contenido }}</p>
                            </div>
                        </div>

                        <!-- Modal para editar respuesta -->
                        <div class="modal fade" id="editModalRespuesta{{ $respuesta->id_respuesta }}" tabindex="-1" role="dialog" aria-labelledby="editModalRespuestaLabel{{ $respuesta->id_respuesta }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalRespuestaLabel{{ $respuesta->id_respuesta }}">Editar Respuesta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($respuesta, ['route' => ['respuestas.update', $respuesta->id_respuesta], 'method' => 'PATCH']) !!}
                                            @csrf
                                            <div class="form-group">
                                                {!! Form::textarea('contenido', $respuesta->contenido, ['class' => 'form-control', 'rows' => 3, 'required' => true]) !!}
                                            </div>
                                            <div class="form-group mt-3">
                                                {!! Form::submit('Actualizar Respuesta', ['class' => 'btn btn-primary']) !!}
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Formulario para añadir respuesta -->
                    <form action="{{ route('respuestas.store', $public->id_publicacion) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="contenido" class="form-control" rows="3" placeholder="Escribe una respuesta..." required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">Responder</button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-center">No hay publicaciones todavía. ¡Sé el primero en publicar algo!</p>
        @endforelse
    </div>

    <!-- Paginación -->
    <div class="mt-3">
        {{ $publicaciones->links() }}
    </div>
    
</div>
<style>
    /* Estilo general de la página */
body {
    background-color: #f8f9fa; /* Fondo gris claro */
    font-family: 'Arial', sans-serif;
}

/* Título principal */
h1 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #007bff;
}

/* Estilo para los mensajes de éxito */
.alert-success {
    background-color: #28a745;
    color: white;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Tarjetas de publicaciones */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #6c757d;
}

/* Botones */
.btn {
    border-radius: 5px;
    padding: 10px 20px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary, .btn-success {
    background-color: #007bff;
    border: none;
    color: white;
}

.btn-primary:hover, .btn-success:hover {
    background-color: #0056b3;
}

.btn-warning {
    background-color: #ffc107;
    color: #212529;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
}

.btn-sm {
    font-size: 0.875rem;
}

/* Respuestas (comentarios) */
.media {
    background-color: #f1f1f1;
    padding: 15px;
    border-radius: 8px;
}

.media-body {
    margin-left: 10px;
}

.media-body p {
    font-size: 1rem;
}

/* Espaciado y separación de elementos */
.mb-4, .mb-3 {
    margin-bottom: 30px;
}

.mt-3 {
    margin-top: 20px;
}

.text-muted {
    font-size: 0.875rem;
}

/* Modal */
.modal-content {
    border-radius: 10px;
}

.modal-header {
    background-color: #007bff;
    color: white;
    border-radius: 10px 10px 0 0;
}

.modal-body {
    padding: 20px;
}

/* Espaciado del formulario de publicación */
.form-group textarea {
    border-radius: 8px;
    padding: 10px;
    border: 1px solid #ccc;
    font-size: 1rem;
    width: 100%;
}

.form-group textarea:focus {
    border-color: #007bff;
    outline: none;
}

/* Listado de publicaciones */
.publicaciones-list {
    margin-top: 20px;
}

/* Paginación */
.pagination {
    justify-content: center;
    margin-top: 40px;
}

.pagination a, .pagination span {
    border-radius: 50%;
    padding: 8px 16px;
    font-size: 1rem;
    margin: 0 5px;
    color: #007bff;
    border: 1px solid #007bff;
    transition: all 0.3s ease;
}

.pagination a:hover, .pagination span:hover {
    background-color: #007bff;
    color: white;
    cursor: pointer;
}

/* Estilo para el área de texto de respuestas */
textarea[name="contenido"] {
    border-radius: 8px;
    padding: 10px;
    border: 1px solid #ccc;
    font-size: 1rem;
    width: 100%;
}

textarea[name="contenido"]:focus {
    border-color: #28a745;
    outline: none;
}

</style>

@endsection
