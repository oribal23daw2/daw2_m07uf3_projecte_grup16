<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ControladorClient extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_clients = Client::all();
        return view('llista-clients', compact('dades_clients'));
    }

    public function index_basic(){
        $dades_clients = Client::all();
        return view('llista-basica', compact('dades_clients'));
    }
    
    public function create()
    {
        return view('crear-client');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $nouClient = $request->validate([
        'DNI' => 'required|unique:clients',
        'Noms' => 'required',
        'Edat' => 'required',
        'Telèfon' => 'required',
        'Adreça' => 'required',
        'Ciutat' => 'required',
        'País' => 'required',
        'Email' => 'required',
        'Número_permís_conducció' => 'required',
        'Punts_permís_conducció' => 'required',
        'Tipus_targeta' => 'required',
        'Número_targeta' => 'required',
    ]);

    $client = Client::create($nouClient);

    return redirect('/dashboard')->with('success', '¡Client creat correctament!');
}


    /**
     * Display the specified resource.
     */
    public function show($DNI)
    {
        $dades_client = Client::findOrFail($DNI);
        return view('mostra', compact('dades_client'));
    }

    public function show_basic($DNI)
    {
        $dades_client = Client::findOrFail($DNI);
        return view('mostra-basica', compact('dades_client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit($DNI)
    {
        $dades_client = Client::findOrFail($DNI);
        return view('actualitza', compact('dades_client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $DNI)
    {
        // Validar los datos del formulario
        $noves_dades_client = $request->validate([
            'DNI' => 'required|unique:clients,DNI,'.$DNI.',DNI',
            'Noms' => 'required',
            'Edat' => 'required',
            'Telèfon' => 'required',
            'Adreça' => 'required',
            'Ciutat' => 'required',
            'País' => 'required',
            'Email' => 'required',
            'Número_permís_conducció' => 'required',
            'Punts_permís_conducció' => 'required',
            'Tipus_targeta' => 'required',
            'Número_targeta' => 'required',
        ]);
    
        Client::findOrFail($DNI)->update($noves_dades_client);
    
        return view('clients');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($DNI)
    {
        $client = Client::findOrFail($DNI)->delete();
        return redirect('/clients')->with('success', '¡Client esborrat correctament!');
    }
}