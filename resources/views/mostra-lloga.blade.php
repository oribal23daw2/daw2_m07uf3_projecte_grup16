<x-app-layout>
@extends('disseny')
@section('content')
    <br>
    <h1>Dades del lloguer</h1>
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
                    <td>{{ $dades_lloga->DNI }}</td>
                </tr>
                <tr>
                    <td>Matricula automòbil</td>
                    <td>{{ $dades_lloga->Matricula_auto }}</td>
                </tr>
                <tr>
                    <td>Data del préstec</td>
                    <td>{{ $dades_lloga->Data_del_préstec }}</td>
                </tr>
                <tr>
                    <td>Data de devolució</td>
                    <td>{{ $dades_lloga->Data_de_devolució }}</td>
                </tr>
                <tr>
                    <td>Lloc de devolució</td>
                    <td>{{ $dades_lloga->Lloc_de_devolució }}</td>
                </tr>
                <tr>
                    <td>Preu per dia</td>
                    <td>{{ $dades_lloga->Preu_per_dia }} €</td>
                </tr>
                <tr>
                    <td>Préstec amb retorn de dipòsit ple</td>
                    <td>{{ $dades_lloga->Préstec_amb_retorn_de_dipòsit_ple == 1 ? 'Sí' : 'No' }}</td>
                </tr>
                <tr>
                    <td>Tipus d'assegurança</td>
                    <td>{{ $dades_lloga->Tipus_d_assegurança }}</td>
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
            <a href="{{ url('lloga') }}">Torna a la llista de lloguers</a>
        </div>
    </div>
</x-app-layout>
@endsection
