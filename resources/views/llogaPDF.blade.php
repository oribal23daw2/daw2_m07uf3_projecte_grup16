<!DOCTYPE html>
<html>
<head>
    <title>Llista de Lloguers</title>
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
    <h1>Llista de Lloguers</h1>
    <table>
        <thead>
            <tr class="table-primary">
                <td>DNI</td>
                <td>Matrícula_auto</td>
                <td>Data_del_préstec</td>
                <td>Data_de_devolució</td>
                <td>Lloc_de_devolució</td>
                <td>Preu_per_dia</td>
                <td>Préstec_amb_retorn_de_dipòsit_ple</td>
                <td>Tipus_d_assegurança</td>
            </tr>
        </thead>
        <tbody> 
    @if($dades_lloga instanceof Illuminate\Support\Collection)
        @foreach ($dades_lloga as $lloguer)
            <tr>
                <td>{{ $lloguer->DNI }}</td>
                <td>{{ $lloguer->Matricula_auto }}</td>
                <td>{{ $lloguer->Data_del_préstec }}</td>
                <td>{{ $lloguer->Data_de_devolució }}</td>
                <td>{{ $lloguer->Lloc_de_devolució }}</td>
                <td>{{ $lloguer->Preu_per_dia }}</td>
                <td>{{ $lloguer->Préstec_amb_retorn_de_dipòsit_ple }}</td>
                <td>{{ $lloguer->Tipus_d_assegurança }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="8">No se encontraron registros de alquiler.</td>
        </tr>
    @endif
</tbody>

    </table>
</body>
</html>
