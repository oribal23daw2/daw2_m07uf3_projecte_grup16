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
                <td>Nombre y Apellidos</td>
                <td>Edad</td>
                <td>Teléfono</td>
                <td>Dirección</td>
                <td>Ciudad</td>
                <td>País</td>
                <td>Email</td>
                <td>Número del permís de conducció</td>
                <td>Punts del permís de conducció</td>
                <td>Tipo de Tarjeta</td>
                <td>Número de la Tarjeta</td>
            </tr>
        </thead>
        <tbody>
            @foreach($dades_clients as $cli)
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
        </tbody>
    </table>
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ url('dashboard-basic') }}">Torna al dashboard dels Clients</a>
    </div>
</body>
</html>