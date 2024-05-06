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
        <form method="post" action="{{ route('autos.update', $dades_auto->Matricula_auto) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="Matricula_auto">Matrícula</label>
                <input type="text" class="form-control" name="Matricula_auto" value="{{ $dades_auto->Matricula_auto }}"/>
            </div>
            <div class="form-group">           
                <label for="Número_de_bastidor">Número de bastidor</label>
                <input type="text" class="form-control" name="Número_de_bastidor" value="{{ $dades_auto->Número_de_bastidor }}"/>
            </div>
            <div class="form-group">           
                <label for="Marca">Marca</label>
                <input type="text" class="form-control" name="Marca" value="{{ $dades_auto->Marca }}"/>
            </div>
            <div class="form-group">           
                <label for="Model">Model</label>
                <input type="text" class="form-control" name="Model" value="{{ $dades_auto->Model }}"/>
            </div>
            <div class="form-group">           
                <label for="Color">Color</label>
                <input type="text" class="form-control" name="Color" value="{{ $dades_auto->Color }}"/>
            </div>
            <div class="form-group">           
                <label for="Nombre_de_places">Número de plazas</label>
                <input type="number" class="form-control" name="Nombre_de_places" value="{{ $dades_auto->Nombre_de_places }}"/>
            </div>
            <div class="form-group">           
                <label for="Nombre_de_portes">Número de puertas</label>
                <input type="number" class="form-control" name="Nombre_de_portes" value="{{ $dades_auto->Nombre_de_portes }}"/>
            </div>
            <div class="form-group">           
                <label for="Grandària_del_maleter">Tamaño del maletero</label>
                <input type="text" class="form-control" name="Grandària_del_maleter" value="{{ $dades_auto->Grandària_del_maleter }}"/>
            </div>
            <div class="form-group">           
                <label for="Tipus_de_combustible">Tipo de combustible</label>
                <select name="Tipus_de_combustible">
                    <option value="gasolina" {{ $dades_auto->Tipus_de_combustible == 'gasolina' ? 'selected' : '' }}>Gasolina</option>
                    <option value="diesel" {{ $dades_auto->Tipus_de_combustible == 'diesel' ? 'selected' : '' }}>Diésel</option>
                    <option value="elèctric" {{ $dades_auto->Tipus_de_combustible == 'elèctric' ? 'selected' : '' }}>Eléctrico</option>
                </select>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Actualitza</button>
        </form>
    </div>
</div>
<br><a href="{{ url('autos') }}">Accés directe a la Llista d'Autos</a>
@endsection
