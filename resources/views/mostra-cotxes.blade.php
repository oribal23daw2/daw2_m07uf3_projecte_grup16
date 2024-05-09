<x-app-layout>
@extends('disseny')
@section('content')
    <br>
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
                    <td>Matricula_auto</td>
                    <td>{{ $dades_auto->Matricula_auto }}</td>
                </tr>
                <tr>
                    <td>Número de bastidor</td>
                    <td>{{ $dades_auto->Número_de_bastidor }}</td>
                </tr>
                <tr>
                    <td>Marca</td>
                    <td>{{ $dades_auto->Marca }}</td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td>{{ $dades_auto->Model }}</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>{{ $dades_auto->Color }}</td>
                </tr>
                <tr>
                    <td>Nombre de places</td>
                    <td>{{ $dades_auto->Nombre_de_places }}</td>
                </tr>
                <tr>
                    <td>Nombre de portes</td>
                    <td>{{ $dades_auto->Nombre_de_portes }}</td>
                </tr>
                <tr>
                    <td>Grandària del maleter</td>
                    <td>{{ $dades_auto->Grandària_del_maleter }}</td>
                </tr>
                <tr>
                    <td>Tipus de combustible</td>
                    <td>{{ $dades_auto->Tipus_de_combustible }}</td>
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
            <a href="{{ url('autos') }}">Torna a la llista</a>
        </div>
    </div>
</x-app-layout>
@endsection
