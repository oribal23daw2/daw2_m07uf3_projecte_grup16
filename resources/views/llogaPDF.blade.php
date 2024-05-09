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
                <td>Matrícula automòbil</td>
                <td>Data del préstec</td>
                <td>Data de devolució</td>
                <td>Lloc de devolució</td>
                <td>Preu per dia</td>
                <td>Préstec amb retorn de dipòsit ple</td>
                <td>Tipus d'assegurança</td>
            </tr>
        </thead>
        <tbody> 
    @if (isset($dades_lloga))  
        <tr>
            <td>{{ $dades_lloga->DNI }}</td>
            <td>{{ $dades_lloga->Matricula_auto }}</td>
            <td>{{ $dades_lloga->Data_del_préstec }}</td>
            <td>{{ $dades_lloga->Data_de_devolució }}</td>
            <td>{{ $dades_lloga->Lloc_de_devolució }}</td>
            <td>{{ $dades_lloga->Preu_per_dia }}</td>
            <td>{{ $dades_lloga->Préstec_amb_retorn_de_dipòsit_ple }}</td>
            <td>{{ $dades_lloga->Tipus_d_assegurança }}</td>
        </tr>
    @endif
</tbody>

    </table>
</body>
</html>
