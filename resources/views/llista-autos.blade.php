<x-app-layout>
@extends('disseny')
@section('content')
<br>
<h1>Llista de autos</h1>
<div class="mt-5">
  <table class="table">
    <thead>
        <tr class="table-primary">
          <th>Matrícula</th>
          <th>Número de bastidor</th>
          <th>Marca</th>
          <th>Model</th>
          <th>Color</th>
          <th>Nombre de places</th>
          <th>Nombre de portes</th>
          <th>Grandària del maleter</th>
          <th>Tipus de combustible</th>
          <th>Accions sobre la taula</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dades_autos as $auto)
        <tr>
            <td>{{$auto->Matricula_auto}}</td>
            <td>{{$auto->Número_de_bastidor}}</td>
            <td>{{$auto->Marca}}</td>
            <td>{{$auto->Model}}</td>
            <td>{{$auto->Color}}</td>
            <td>{{$auto->Nombre_de_places}}</td>
            <td>{{$auto->Nombre_de_portes}}</td>
            <td>{{$auto->Grandària_del_maleter}}</td>
            <td>{{$auto->Tipus_de_combustible}}</td>
            <td class="text-left">
            <a href="{{ route('autos.edit', $auto->Matricula_auto)}}" class="btn btn-primary btn-sm">Edita</a>
            <form id="deleteForm" action="{{ route('autos.destroy', $auto->Matricula_auto)}}" method="post" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button id="deleteButton" class="btn btn-danger btn-sm" type="submit">
                    Esborra
                </button>
            </form>
            <a href="{{ route('autos.show', $auto->Matricula_auto)}}" class="btn btn-info btn-sm">Mostra més</a>
            <a href="{{ route('pdf.auto', $auto->Matricula_auto) }}" class="btn btn-primary btn-sm">Fes-ho PDF</a> 
        </td>

        <script>
            document.getElementById('deleteForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Evita que se envíe el formulario por defecto

                if (confirm('¿Seguro que deseas borrar este auto?')) {
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
@if(Auth::user()->tipus == 'capDepartament')
        <a href="{{ url('dashboard') }}">Torna al dashboard</a>
    @else
        <a href="{{ url('dashboard-basic') }}">Torna al dashboard</a>
    @endif
</div>
</x-app-layout>
@endsection
