@extends('disseny')
@section('content')
<div class="card mt-5">
  <div class="card-header">
    Afegeix un nou client
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
    <form method="post" action="{{ url('/clients') }}">
        @csrf
        <!-- https://laravel.com/docs/10.x/csrf -->
        <div class="form-group">           
            <label for="Dni_client">DNI</label>
            <input type="text" class="form-control" name="Dni_client"/>
        </div>
        <div class="form-group">           
            <label for="Nom_i_cognoms">Nom i cognoms</label>
            <input type="text" class="form-control" name="Nom_i_cognoms"/>
        </div>
        <div class="form-group">           
            <label for="Edat">Edat</label>
            <input type="number" class="form-control" name="Edat"/>
        </div>
        <div class="form-group">           
            <label for="Telèfon">Telèfon</label>
            <input type="tel" class="form-control" name="Telèfon"/>
        </div>
        <div class="form-group">           
            <label for="Adreça">Adreça</label>
            <input type="text" class="form-control" name="Adreça"/>
        </div>
        <div class="form-group">           
            <label for="Ciutat">Ciutat</label>
            <input type="text" class="form-control" name="Ciutat"/>
        </div>
        <div class="form-group">           
            <label for="País">País</label>
            <input type="text" class="form-control" name="País"/>
        </div>
        <div class="form-group">           
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="Email"/>
        </div>
        <div class="form-group">           
            <label for="Número_del_permís_de_conducció">Número del permís de conducció</label>
            <input type="text" class="form-control" name="Número_del_permís_de_conducció"/>
        </div>
        <div class="form-group">           
            <label for="Punts_del_permís_de_conducció">Punts del permís de conducció</label>
            <input type="number" class="form-control" name="Punts_del_permís_de_conducció"/>
        </div>
        <div class="form-group">           
            <label for="Tipus_de_targeta">Tipus de targeta</label>
            <select name="Tipus_de_targeta">
                <option value="Dèbit">Dèbit</option>
                <option value="Crèdit">Crèdit</option>
            </select>
        </div>
        <div class="form-group">           
            <label for="Número_de_la_targeta">Número de la targeta</label>
            <input type="text" class="form-control" name="Número_de_la_targeta"/>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
    </form>    
  </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard</a>
</div>
@endsection
