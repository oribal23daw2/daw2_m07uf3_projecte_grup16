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
            </tr>
        </thead>
        <tbody> 
            @if (isset($users))
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">No hay usuarios registrados.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
