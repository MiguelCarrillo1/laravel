<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desastres Naturales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
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
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Principales Desastres Naturales en la Historia</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Zona</th>
                <th>Impacto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($desastres as $desastre)
                <tr>
                    <td>{{ $desastre['fecha'] }}</td>
                    <td>{{ $desastre['zona'] }}</td>
                    <td>{{ $desastre['impacto'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
