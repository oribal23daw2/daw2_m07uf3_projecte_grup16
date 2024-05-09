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
        <form method="post" action="{{ route('clients.update', $dades_client->DNI) }}">
			@csrf
            @method('PATCH')
			<div class="form-group">
            <label for="DNI">DNI</label>
            <input type="text" class="form-control" name="DNI" value="{{ $dades_client->DNI }}"/>
        </div>
            <div class="form-group">           
            <label for="Noms">Nom i cognoms</label>
            <input type="text" class="form-control" name="Noms" value="{{ $dades_client->Noms }}"/>
        </div>
        <div class="form-group">           
            <label for="Edat">Edat</label>
            <input type="number" class="form-control" name="Edat" value="{{ $dades_client->Edat }}"/>
        </div>
        <div class="form-group">           
            <label for="Telèfon">Telèfon</label>
            <input type="tel" class="form-control" name="Telèfon" value="{{ $dades_client->Telèfon }}"/>
        </div>
        <div class="form-group">           
            <label for="Adreça">Adreça</label>
            <input type="text" class="form-control" name="Adreça" value="{{ $dades_client->Adreça }}"/>
        </div>
        <div class="form-group">           
            <label for="Ciutat">Ciutat</label>
            <input type="text" class="form-control" name="Ciutat" value="{{ $dades_client->Ciutat }}"/>
        </div>
        <div class="form-group">           
            <label for="País">País</label>
            <input type="text" class="form-control" name="País" value="{{ $dades_client->País }}"/>
        </div>
        <div class="form-group">           
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="Email" value="{{ $dades_client->Email }}"/>
        </div>
        <div class="form-group">           
            <label for="Número_permís_conducció">Número del permís de conducció</label>
            <input type="text" class="form-control" name="Número_permís_conducció" value="{{ $dades_client->Número_permís_conducció }}"/>
        </div>
        <div class="form-group">           
            <label for="Punts_permís_conducció">Punts del permís de conducció</label>
            <input type="number" class="form-control" name="Punts_permís_conducció" value="{{ $dades_client->Punts_permís_conducció }}"/>
        </div>
        <div class="form-group">           
            <label for="Tipus_targeta">Tipus de targeta</label>
            <select name="Tipus_targeta" value="{{ $dades_client->Tipus_targeta }}">
                <option value="Dèbit">Dèbit</option>
                <option value="Crèdit">Crèdit</option>
            </select>
        </div>
        <div class="form-group">           
            <label for="Número_targeta">Número targeta</label>
            <input type="text" class="form-control" name="Número_targeta" value="{{ $dades_client->Email }}"/>
        </div>
			<button type="submit" class="btn btn-block btn-primary">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('clients') }}">Accés directe a la Llista de clients</a>
</x-app-layout>
@endsection
