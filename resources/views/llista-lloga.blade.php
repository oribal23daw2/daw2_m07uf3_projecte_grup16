@extends('disseny')
@section('content')
    <br>
    <h1>Llista de lloguers</h1>
    <div class="mt-5">
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th>DNI</th>
                    <th>Matícula automòbil</th>
                    <th>Data del préstec</th>
                    <th>Data de devolució</th>
                    <th>Lloc de devolució</th>
                    <th>Preu per dia</th>
                    <th>Préstec amb retorn de dipòsit ple</th>
                    <th>Tipus d'assegurança</th>
                    <th>Accions sobre la taula</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dades_lloga as $lloguer)
                    <tr>
                        <td>{{ $lloguer->client->DNI }}</td>
                        <td>{{ $lloguer->Matricula_auto }}</td>
                        <td>{{ $lloguer->Data_del_préstec }}</td>
                        <td>{{ $lloguer->Data_de_devolució }}</td>
                        <td>{{ $lloguer->Lloc_de_devolució }}</td>
                        <td>{{ $lloguer->Preu_per_dia }}</td>
                        <td>{{ $lloguer->Préstec_amb_retorn_de_dipòsit_ple == 1 ? 'Sí' : 'No' }}</td>
                        <td>{{ $lloguer->Tipus_d_assegurança }}</td>
                        <td class="text-left">
                            <a href="{{ route('lloga.edit', ['DNI' => $lloguer->DNI, 'Matricula_auto' => $lloguer->Matricula_auto]) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form id="deleteForm" action="{{ route('lloga.destroy', ['DNI' => $lloguer->DNI, 'Matricula_auto' => $lloguer->Matricula_auto]) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button id="deleteButton" class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Seguro que deseas borrar este lloguer?')">Esborra</button>
                            </form>
                            <a href="{{ route('lloga.show', ['DNI' => $lloguer->DNI, 'Matricula_auto' => $lloguer->Matricula_auto]) }}" class="btn btn-info btn-sm">Mostra més</a>
                            <a href="{{ route('pdf.lloga', ['DNI' => $lloguer->DNI, 'Matricula_auto' => $lloguer->Matricula_auto]) }}" class="btn btn-primary btn-sm">Generar PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-6 bg-white border-b border-gray-200">
    @if(Auth::user()->tipus == 'capDepartament')
        <a href="{{ url('dashboard') }}">Torna al dashboard</a>
    @else
        <a href="{{ url('dashboard-basic') }}">Torna al dashboard</a>
    @endif
    </div>
@endsection
