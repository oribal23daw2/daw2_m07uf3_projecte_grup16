<x-app-layout>
@extends('disseny')
@section('content')
<div class="card mt-5">
  <div class="card-header">
    Afegeix un nou usuari
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
    <form method="post" action="{{ url('/users') }}">
        @csrf
        <!-- https://laravel.com/docs/10.x/csrf -->
        <div class="form-group">           
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">           
            <label for="tipus">Tipus</label>
            <select name="tipus">
                <option value="treballador">Treballador</option>
                <option value="capDepartament">Cap de Departament</option>
            </select>
        </div>
        <div class="form-group">           
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email"/>
        </div>
        <div class="form-group">           
            <label for="password">Contrasenya</label>
            <input type="password" class="form-control" name="password"/>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
    </form>    
  </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard</a>
</div>
</x-app-layout>
@endsection
