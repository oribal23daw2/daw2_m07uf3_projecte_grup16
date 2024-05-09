<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
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
    <h1>Lista de Usuarios</h1>
    <table>
        <thead>
            <tr class="table-primary">
                <td>Nombre</td>
                <td>Email</td>
                <td>Fecha de Creación</td>
                <td>Ultima modificació</td>
            </tr>
        </thead>
        <tbody> 
            @if (isset($dades_user))
            <tr>
                <td>{{ $dades_user->name }}</td>
                <td>{{ $dades_user->email }}</td>
                <td>{{ $dades_user->created_at }}</td>
                <td>{{ $dades_user->updated_at }}</td>
            </tr>
            @else
                @foreach ($dades_user as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
