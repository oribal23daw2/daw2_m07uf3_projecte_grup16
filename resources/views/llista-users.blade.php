<x-app-layout>
@extends('disseny')
@section('content')
<br>
<h1>Llista d'usuaris</h1>
<div class="mt-5">
  <table class="table">
    <thead>
        <tr class="table-primary">
          <th>ID</th>
          <th>Nom</th>
          <th>Tipus</th>
          <th>Email</th>
          <th>Accions sobre la taula</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dades_users as $usuari)
        <tr>
            <td>{{$usuari->id}}</td>
            <td>{{$usuari->name}}</td>
            <td>{{$usuari->tipus}}</td>
            <td>{{$usuari->email}}</td>
            <td class="text-left">
                <a href="{{ route('users.edit', $usuari->id)}}" class="btn btn-primary btn-sm">Edita</a>
                <form id="deleteForm" action="{{ route('users.destroy', $usuari->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button id="deleteButton" class="btn btn-danger btn-sm" type="submit">
                        Esborra
                    </button>
                </form>
                <a href="{{ route('users.show', $usuari->id)}}" class="btn btn-info btn-sm">Mostra més</a>
                <a href="{{ route('pdf.user', $usuari->id) }}" class="btn btn-primary btn-sm">Fes-ho PDF</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard</a>
</div>
</x-app-layout>
@endsection
