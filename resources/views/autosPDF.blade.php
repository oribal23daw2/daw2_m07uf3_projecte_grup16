<!DOCTYPE html>
<html>
<head>
    <title>Llista d'Autos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 10px; /* Ajustar según necesidad */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
        }
        .table-primary {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <h1>Llista d'Autos</h1>
    <table>
        <thead>
            <tr class="table-primary">
                <td>Matricula_auto</td>
                <td>Número_de_bastidor</td>
                <td>Marca</td>
                <td>Model</td>
                <td>Color</td>
                <td>Nombre_de_places</td>
                <td>Nombre_de_portes</td>
                <td>Grandària_del_maleter</td>
                <td>Tipus_de_combustible</td>
            </tr>
        </thead>
        <tbody> 
    @foreach ($dades_auto as $auto)
        <tr>
            <td>{{ $auto->Matricula_auto }}</td>
            <td>{{ $auto->Número_de_bastidor }}</td>
            <td>{{ $auto->Marca }}</td>
            <td>{{ $auto->Model }}</td>
            <td>{{ $auto->Color }}</td>
            <td>{{ $auto->Nombre_de_places }}</td>
            <td>{{ $auto->Nombre_de_portes }}</td>
            <td>{{ $auto->Grandària_del_maleter }}</td>
            <td>{{ $auto->Tipus_de_combustible }}</td>
        </tr>
    @endforeach
</tbody>
    </table>
</body>
</html>
