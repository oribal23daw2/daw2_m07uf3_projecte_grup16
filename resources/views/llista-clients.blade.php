@extends('disseny')
@section('content')
<br>
<h1>Llista de clients</h1>
<div class="mt-5">
  <table class="table">
    <thead>
        <tr class="table-primary">
          <th>DNI</th>
          <th>Noms</th>
          <th>Edat</th>
          <th>Telèfon</th>
          <th>Adreça</th>
          <th>Ciutat</th>
          <th>País</th>
          <th>Email</th>
          <th>Accions sobre la taula</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dades_clients as $cli)
        <tr>
            <td>{{$cli->DNI}}</td>
            <td>{{$cli->Noms}}</td>
            <td>{{$cli->Edat}}</td>
            <td>{{$cli->Telèfon}}</td>
            <td>{{$cli->Adreça}}</td>
            <td>{{$cli->Ciutat}}</td>
            <td>{{$cli->País}}</td>
            <td>{{$cli->Email}}</td>
            <td class="text-left">
            <a href="{{ route('clients.edit', $cli->DNI)}}" class="btn btn-primary btn-sm">Edita</a>
            <form id="deleteForm" action="{{ route('clients.destroy', $cli->DNI)}}" method="post" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button id="deleteButton" class="btn btn-danger btn-sm" type="submit">
                    Esborra
                </button>
            </form>
            <a href="{{ route('clients.show', $cli->DNI)}}" class="btn btn-info btn-sm">Mostra més</a> 
        </td>

        <script>
            document.getElementById('deleteForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Evita que se envíe el formulario por defecto

                if (confirm('¿Seguro que deseas borrar este usuario?')) {
                    // Si el usuario confirma, envía el formulario
                    this.submit();
                } else {
                    // Si el usuario cancela, no hace nada
                    return false;
                }
            });
        </script>
         
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard</a>
</div>
@endsection
