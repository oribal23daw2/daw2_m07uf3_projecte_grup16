@extends('disseny')
@section('content')
<h1>Llista d'empleats</h1>
<div class="mt-5">
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>tid</td>
          <td>Nom</td>
          <td>Cognoms</td>          
          <td>Accions sobre la taula</td>           
        </tr>
    </thead>
    <tbody>
        @foreach($dades_clients as $cli)
        <tr>
            <td>{{$cli->tid}}</td>
            <td>{{$cli->nom}}</td>
            <td>{{$cli->cognoms}}</td>                       
            <td class="text-left">
            <a href="{{ route('clis.edit', $cli->tid)}}" class="btn btn-primary btn-sm">Edita</a>
            <form action="{{ route('clis.destroy', $cli->tid)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">
                Esborra
              </button>
            </form>
            <a href="{{ route('clis.show', $cli->tid)}}" class="btn btn-info btn-sm">Mostra</a>  
          </td>            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<div class="p-6 bg-white border-b border-gray-200">
	<a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection