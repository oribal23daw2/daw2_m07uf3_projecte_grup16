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
            @if (isset($dades_autos))   
                <tr>
                    <td>{{ $dades_autos->Matricula_auto }}</td>
                    <td>{{ $dades_autos->Número_de_bastidor }}</td>
                    <td>{{ $dades_autos->Marca }}</td>
                    <td>{{ $dades_autos->Model }}</td>
                    <td>{{ $dades_autos->Color }}</td>
                    <td>{{ $dades_autos->Nombre_de_places }}</td>
                    <td>{{ $dades_autos->Nombre_de_portes }}</td>
                    <td>{{ $dades_autos->Grandària_del_maleter }}</td>
                    <td>{{ $dades_autos->Tipus_de_combustible }}</td>
                </tr>
            @else
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
            @endif
        </tbody>
    </table>
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ url('dashboard-basic') }}">Torna al dashboard dels Autos</a>
    </div>
</body>
</html>
