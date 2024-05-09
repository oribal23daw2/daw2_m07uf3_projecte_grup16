<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lloga;
use App\Models\Client;
use App\Models\Auto;

class ControladorLloga extends Controller
{
    /**
     * Muestra una lista de los registros de alquiler.
     */
    public function index()
    {
        $dades_lloga = Lloga::all();
        return view('llista-lloga', compact('dades_lloga'));
    }

    /**
     * Muestra el formulario para crear un nuevo registro de alquiler.
     */
    public function create()
    {
        $clients = Client::all();
        $options_dni = $clients->pluck('DNI', 'DNI')->toArray();
        $autos = Auto::all();
        return view('crear-lloga', compact('clients', 'options_dni', 'autos'));
    }
    

    /**
     * Almacena un nuevo registro de alquiler en la base de datos.
     */
    public function store(Request $request)
{
    $nouLloguer = $request->validate([
        'DNI' => 'required|string|exists:clients,DNI',
        'Matricula_auto' => 'required|string|exists:autos,Matricula_auto', // Cambio aquí
        'Data_del_préstec' => 'required|date',
        'Data_de_devolució' => 'required|date',
        'Lloc_de_devolució' => 'required',
        'Preu_per_dia' => 'required|numeric',
        'Préstec_amb_retorn_de_dipòsit_ple' => 'required|boolean',
        'Tipus_d_assegurança' => 'required|in:Franquícia_fins_a_1000_Euros,Franquíca_fins_500_Euros,Sense_franquícia',
    ]);

    $lloguer = Lloga::create($nouLloguer);

    return redirect('lloga');
}


    /**
     * Muestra los detalles de un registro de alquiler específico.
     */
    public function show(string $DNI, string $Matricula_auto)
{
    $dades_lloga = Lloga::where('DNI', $DNI)->where('Matricula_auto', $Matricula_auto)->firstOrFail();
    $dades_auto = Auto::where('Matricula_auto', $Matricula_auto)->firstOrFail();
    $dades_client = Client::where('DNI', $DNI)->firstOrFail();

    return view('mostra-lloga', compact('dades_lloga', 'dades_auto', 'dades_client'));
}

    /**
     * Muestra el formulario para editar un registro de alquiler.
     */
    public function edit($DNI, $Matricula_auto)
{
    $dades_lloga = Lloga::where('DNI', $DNI)->where('Matricula_auto', $Matricula_auto)->first();
    $dades_clients = Client::all();
    $dades_auto = Auto::all();

    return view('actualitza-lloga', compact('dades_lloga', 'dades_clients', 'dades_auto'));
}

    /**
     * Actualiza un registro de alquiler específico en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $noves_dades_lloga = $request->validate([
            'DNI' => 'required|exists:clients,DNI',
            'Matricula_auto' => 'required|exists:autos,Matricula_auto',
            'Data_del_préstec' => 'required|date',
            'Data_de_devolució' => 'required|date',
            'Lloc_de_devolució' => 'required',
            'Preu_per_dia' => 'required|numeric',
            'Préstec_amb_retorn_de_dipòsit_ple' => 'required|boolean',
            'Tipus_d_assegurança' => 'required|in:Franquícia_fins_a_1000_Euros,Franquíca_fins_500_Euros,Sense_franquícia',
        ]);

        Lloga::where('DNI', $request->DNI)
                    ->where('Matricula_auto', $request->Matricula_auto)
                    ->update($noves_dades_lloga);

        return redirect()->route('lloga.index')->with('success', 'Registre de lloguer actualitzat correctament.');
    }

    /**
     * Elimina un registro de alquiler específico de la base de datos.
     */
    public function destroy(string $Matricula_auto)
    {
        $lloguer = Lloga::findOrFail($Matricula_auto)->delete();
        return redirect()->route('lloga.index')->with('success', 'Registre de lloguer eliminat correctament.');
    }
}
