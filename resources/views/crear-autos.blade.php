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
            <label for="Marca">Marca</label>
            <input type="text" class="form-control" name="Marca"/>
        </div>
        <div class="form-group">           
            <label for="Model">Model</label>
            <input type="text" class="form-control" name="Model"/>
        </div>
        <div class="form-group">           
            <label for="Any">Any</label>
            <input type="text" class="form-control" name="Any"/>
        </div>
        <div class="form-group">           
            <label for="Preu">Preu</label>
            <input type="text" class="form-control" name="Preu"/>
        </div>
        <div class="form-group">           
            <label for="Descripcio">Descripció</label>
            <textarea class="form-control" name="Descripcio"></textarea>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
    </form>    
  </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard</a>
</div>
@endsection
