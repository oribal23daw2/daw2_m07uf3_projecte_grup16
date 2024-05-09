<x-app-layout>
@extends('disseny')
@section('content')
    <br>
    <h1>Dades de l'usuari</h1>
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
                    <td>ID</td>
                    <td>{{ $dades_user->id }}</td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td>{{ $dades_user->name }}</td>
                </tr>
                <tr>
                    <td>Tipus</td>
                    <td>{{ $dades_user->tipus }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $dades_user->email }}</td>
                </tr>
                <tr>
                    <td>Data de creació</td>
                    <td>{{ $dades_user->created_at }}</td>
                </tr>
                <tr>
                    <td>Data d'actualització</td>
                    <td>{{ $dades_user->updated_at }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="p-6 bg-white border-b border-gray-200">
        @if(Auth::user()->tipus == 'capDepartament')
        <a href="{{ url('dashboard') }}">Torna al dashboard</a>
    @else
        <a href="{{ url('dashboard-basic') }}">Torna al dashboard</a>
    @endif                  
        </div>
        <div class="p-6 bg-white border-b border-gray-200">
            <a href="{{ url('users') }}">Torna a la llista d'usuaris</a>
        </div>
    </div>
@endsection
</x-app-layout>