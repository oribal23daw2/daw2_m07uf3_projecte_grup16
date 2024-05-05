<!DOCTYPE html>
<html>
<head>
    <title>Llista de Clients</title>
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
    <h1>Llista de Clients</h1>
    <table>
        <thead>
            <tr class="table-primary">
                <td>DNI</td>
                <td>Noms</td>
                <td>Edad</td>
                <td>Telèfon</td>
                <td>Direcció</td>
                <td>Ciutat</td>
                <td>País</td>
                <td>Email</td>
                <td>Número del permís de conducció</td>
                <td>Punts del permís de conducció</td>
                <td>Tipus de targeta</td>
                <td>Número de la targeta</td>
            </tr>
        </thead>
        <tbody> 
            @if (isset($dades_clients))   
                <tr>
                    <td>{{ $dades_clients->DNI }}</td>
                    <td>{{ $dades_clients->Noms }}</td>
                    <td>{{ $dades_clients->Edat }}</td>
                    <td>{{ $dades_clients->Telèfon }}</td>
                    <td>{{ $dades_clients->Adreça }}</td>
                    <td>{{ $dades_clients->Ciutat }}</td>
                    <td>{{ $dades_clients->País }}</td>
                    <td>{{ $dades_clients->Email }}</td>
                    <td>{{ $dades_clients->Número_permís_conducció }}</td>
                    <td>{{ $dades_clients->Punts_permís_conducció }}</td>
                    <td>{{ $dades_clients->Tipus_targeta }}</td>
                    <td>{{ $dades_clients->Número_targeta }}</td>
                </tr>
            @else
                @foreach ($dades_clients as $cli)
                    <tr>
                    <td>{{ $cli->DNI }}</td>
                    <td>{{ $cli->Noms }}</td>
                    <td>{{ $cli->Edat }}</td>
                    <td>{{ $cli->Telèfon }}</td>
                    <td>{{ $cli->Adreça }}</td>
                    <td>{{ $cli->Ciutat }}</td>
                    <td>{{ $cli->País }}</td>
                    <td>{{ $cli->Email }}</td>
                    <td>{{ $cli->Número_permís_conducció }}</td>
                    <td>{{ $cli->Punts_permís_conducció }}</td>
                    <td>{{ $cli->Tipus_targeta }}</td>
                    <td>{{ $cli->Número_targeta }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ url('dashboard-basic') }}">Torna al dashboard dels Clients</a>
    </div>
</body>
</html>