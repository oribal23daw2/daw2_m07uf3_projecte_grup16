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
        <form method="post" action="{{ route('user.update', $dades_user->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" value="{{ $dades_user->name }}"/>
            </div>
            <div class="form-group">           
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $dades_user->email }}"/>
            </div>
            <div class="form-group">           
                <label for="tipus">Tipus</label>
                <select name="tipus">
                    <option value="treballador" {{ $dades_user->tipus == 'treballador' ? 'selected' : '' }}>Treballador</option>
                    <option value="capDepartament" {{ $dades_user->tipus == 'capDepartament' ? 'selected' : '' }}>Cap de Departament</option>
                </select>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('users') }}">Accés directe a la Llista d'Usuaris</a>
@endsection
