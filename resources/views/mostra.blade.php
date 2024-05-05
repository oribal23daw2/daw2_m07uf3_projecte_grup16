@extends('disseny')
@section('content')
    <h1>Dades del client</h1>
    <div class="mt-5">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th scope="col">CAMP</th>
                    <th scope="col">VALOR</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DNI</td>
                    <td>{{ $dades_client->DNI }}</td>
                </tr>
                <tr>
                    <td>Noms</td>
                    <td>{{ $dades_client->Noms }}</td>
                </tr>
                <tr>
                    <td>Edat</td>
                    <td>{{ $dades_client->Edat }}</td>
                </tr>
                <tr>
                    <td>Telèfon</td>
                    <td>{{ $dades_client->Telèfon }}</td>
                </tr>
                <tr>
                    <td>Adreça</td>
                    <td>{{ $dades_client->Adreça }}</td>
                </tr>
                <tr>
                    <td>Ciutat</td>
                    <td>{{ $dades_client->Ciutat }}</td>
                </tr>
                <tr>
                    <td>País</td>
                    <td>{{ $dades_client->País }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $dades_client->Email }}</td>
                </tr>
				<tr>
                    <td>Número permís conducció</td>
                    <td>{{ $dades_client->Número_permís_conducció }}</td>
                </tr>
				<tr>
                    <td>Punts del permís de conducció</td>
                    <td>{{ $dades_client->Punts_permís_conducció }}</td>
                </tr>
				<tr>
                    <td>Tipus de targeta</td>
                    <td>{{ $dades_client->Tipus_targeta }}</td>
                </tr>
				<tr>
                    <td>Número targeta</td>
                    <td>{{ $dades_client->Número_targeta }}</td>
                </tr>
            </tbody>
        </table>
        <div class="p-6 bg-white border-b border-gray-200">
            <a href="{{ url('dashboard') }}">Torna al dashboard</a>                     
        </div>
        <div class="p-6 bg-white border-b border-gray-200">
            <a href="{{ url('clients') }}">Torna a la llista</a>
        </div>
    </div>
@endsection
