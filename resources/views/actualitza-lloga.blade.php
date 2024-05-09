<x-app-layout>
@extends('disseny')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        Actualització de dades
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('lloga.update', $dades_lloga->Matricula_auto) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">           
                <label for="DNI">DNI</label>
                <select name="DNI" class="form-control">
                    <option value="">Selecciona un DNI</option>
                    @foreach($dades_clients as $client)
                        <option value="{{ $client->DNI }}" {{ $client->DNI == $dades_lloga->DNI ? 'selected' : '' }}>{{ $client->DNI }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">           
                <label for="Matricula_auto">Matrícula del vehicle</label>
                <select name="Matricula_auto" class="form-control">
                    <option value="">Selecciona una matrícula del vehículo</option>
                    @foreach($dades_auto as $auto)
                        <option value="{{ $auto->Matricula_auto }}" {{ $auto->Matricula_auto == $dades_lloga->Matricula_auto ? 'selected' : '' }}>{{ $auto->Matricula_auto }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">           
                <label for="Data_del_préstec">Data del préstec</label>
                <input type="date" class="form-control" name="Data_del_préstec" value="{{ $dades_lloga->Data_del_préstec }}"/>
            </div>
            <div class="form-group">           
                <label for="Data_de_devolució">Data de devolució</label>
                <input type="date" class="form-control" name="Data_de_devolució" value="{{ $dades_lloga->Data_de_devolució }}"/>
            </div>
            <div class="form-group">           
                <label for="Lloc_de_devolució">Lloc de devolució</label>
                <input type="text" class="form-control" name="Lloc_de_devolució" value="{{ $dades_lloga->Lloc_de_devolució }}"/>
            </div>
            <div class="form-group">           
                <label for="Preu_per_dia">Preu per dia</label>
                <input type="number" class="form-control" name="Preu_per_dia" value="{{ $dades_lloga->Preu_per_dia }}"/>
            </div>
            <div class="form-group">
                <label for="Préstec_amb_retorn_de_dipòsit_ple">Préstec amb retorn de dipòsit ple</label>
                <select class="form-control" name="Préstec_amb_retorn_de_dipòsit_ple">
                    <option value="1" {{ $dades_lloga->Préstec_amb_retorn_de_dipòsit_ple == 1 ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ $dades_lloga->Préstec_amb_retorn_de_dipòsit_ple == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group">           
                <label for="Tipus_d_assegurança">Tipus d'assegurança</label>
                <select name="Tipus_d_assegurança">
                    <option value="Franquícia_fins_a_1000_Euros" {{ $dades_lloga->Tipus_d_assegurança == 'Franquícia_fins_a_1000_Euros' ? 'selected' : '' }}>Franquícia fins a 1000 Euros</option>
                    <option value="Franquíca_fins_500_Euros" {{ $dades_lloga->Tipus_d_assegurança == 'Franquíca_fins_500_Euros' ? 'selected' : '' }}>Franquíca fins a 500 Euros</option>
                    <option value="Sense_franquícia" {{ $dades_lloga->Tipus_d_assegurança == 'Sense_franquícia' ? 'selected' : '' }}>Sense franquícia</option>
                </select>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('lloga') }}">Accés directe a la Llista de Lloguers</a>
</x-app-layout>
@endsection
