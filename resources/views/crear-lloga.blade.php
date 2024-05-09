@extends('disseny')
@section('content')
<div class="card mt-5">
  <div class="card-header">
    Afegeix un nou lloguer
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
    <form method="post" action="{{ url('/lloga') }}">
        @csrf
        <div class="form-group">           
            <label for="DNI">DNI</label>
            <select name="DNI" class="form-control">
                <option value="">Selecciona un DNI</option>
                @foreach($clients as $client)
                    <option value="{{ $client->DNI }}">{{ $client->DNI }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">           
            <label for="Matricula_auto">Matrícula del vehicle</label>
            <select name="Matricula_auto" class="form-control">
                <option value="">Selecciona una matrícula del vehículo</option>
                @foreach($autos as $auto)
                    <option value="{{ $auto->Matricula_auto }}">{{ $auto->Matricula_auto }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">           
            <label for="Data_del_préstec">Data del préstec</label>
            <input type="date" class="form-control" name="Data_del_préstec"/>
        </div>
        <div class="form-group">           
            <label for="Data_de_devolució">Data de devolució</label>
            <input type="date" class="form-control" name="Data_de_devolució"/>
        </div>
        <div class="form-group">           
            <label for="Lloc_de_devolució">Lloc de devolució</label>
            <input type="text" class="form-control" name="Lloc_de_devolució"/>
        </div>
        <div class="form-group">           
            <label for="Preu_per_dia">Preu per dia</label>
            <input type="number" class="form-control" name="Preu_per_dia"/>
        </div>
        <div class="form-group">           
            <label for="Préstec_amb_retorn_de_dipòsit_ple">Préstec amb retorn de dipòsit ple</label>
            <select class="form-control" name="Préstec_amb_retorn_de_dipòsit_ple">
              <option value="1">Sí</option>
              <option value="0">No</option>    
            </select>
        </div>
        <div class="form-group">           
            <label for="Tipus_d_assegurança">Tipus d'assegurança</label>
            <select name="Tipus_d_assegurança">
                <option value="Franquícia_fins_a_1000_Euros">Franquícia fins a 1000 Euros</option>
                <option value="Franquíca_fins_500_Euros">Franquícia fins a 500 Euros</option>
                <option value="Sense_franquícia">Sense franquícia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
    </form>    
  </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard</a>
</div>
@endsection
