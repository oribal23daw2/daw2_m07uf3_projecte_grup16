@extends('disseny')
@section('content')
<div class="card mt-5">
  <div class="card-header">
    Afegeix un nou cotxe
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
    <form method="post" action="{{ url('/autos') }}">
        @csrf
        <div class="form-group">           
            <label for="Matricula_auto">Matrícula</label>
            <input type="text" class="form-control" name="Matricula_auto"/>
        </div>
        <div class="form-group">           
            <label for="Número_de_bastidor">Número de bastidor</label>
            <input type="text" class="form-control" name="Número_de_bastidor"/>
        </div>
        <div class="form-group">           
            <label for="Marca">Marca</label>
            <input type="text" class="form-control" name="Marca"/>
        </div>
        <div class="form-group">           
            <label for="Model">Model</label>
            <input type="text" class="form-control" name="Model"/>
        </div>
        <div class="form-group">           
            <label for="Color">Color</label>
            <input type="text" class="form-control" name="Color"/>
        </div>
        <div class="form-group">           
            <label for="Nombre_de_places">Nombre de places</label>
            <input type="number" class="form-control" name="Nombre_de_places"/>
        </div>
        <div class="form-group">           
            <label for="Nombre_de_portes">Nombre de portes</label>
            <input type="number" class="form-control" name="Nombre_de_portes"/>
        </div>
        <div class="form-group">           
            <label for="Grandària_del_maleter">Grandària del maleter</label>
            <input type="text" class="form-control" name="Grandària_del_maleter"/>
        </div>
        <div class="form-group">           
            <label for="Tipus_de_combustible">Tipus de combustible</label>
            <select class="form-control" name="Tipus_de_combustible">
                <option value="gasolina">Gasolina</option>
                <option value="diesel">Diesel</option>
                <option value="elèctric">Elèctric</option>
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
