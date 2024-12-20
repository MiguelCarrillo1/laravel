<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Refugiados</title>
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
    <h1>Listado de Refugiados</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Apellidos y Nombres</th>
                <th>Tipo Doc.</th>
                <th>Num. Doc.</th>
                <th>Nacionalidad</th>
                <th>Sexo</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $per)
                <tr>
                    <td>{{ $per->id_persona }}</td>
                    <td>{{ $per->apellido . ' ' . $per->nombre }}</td>
                    <td>{{ $per->tipo_documento }}</td>
                    <td>{{ $per->num_documento }}</td>
                    <td>{{ $per->nacionalidad }}</td>
                    <td>{{ $per->sexo }}</td>
                    <td>{{ $per->telefono }}</td>
                    <td>{{ $per->usuario_email ?: 'No asignado' }}</td>
                    <td>{{ $per->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
