<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Refugios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Listado de Refugios</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Dirección</th>
                <th>Capacidad</th>
                <th>Teléfono</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($refugios as $ref)
                <tr>
                    <td>{{ $ref->nombre_refugio }}</td>
                    <td>{{ $ref->tipo_refugio }}</td>
                    <td>{{ $ref->direccion }}</td>
                    <td>{{ $ref->capacidad_maxima }}/{{ $ref->capacidad_actual }}</td>
                    <td>{{ $ref->telefono }}</td>
                    <td>{{ $ref->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
