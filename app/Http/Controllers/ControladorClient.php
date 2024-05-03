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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario
    $nouClient = $request->validate([
        'Dni_client' => 'required|unique:clients',
        'Nom_i_cognoms' => 'required',
        'Edat' => 'required',
        'Telèfon' => 'required',
        'Adreça' => 'required',
        'Ciutat' => 'required',
        'País' => 'required',
        'Email' => 'required',
        'Número_del_permís_de_conducció' => 'required',
        'Punts_del_permís_de_conducció' => 'required',
        'Tipus_de_targeta' => 'required',
        'Número_de_la_targeta' => 'required',
    ]);

    $client = Client::create($nouClient);

    return view('dashboard');
}


    /**
     * Display the specified resource.
     */
    public function show($tid)
    {
        $dades_client = Client::findOrFail($tid);
        return view('mostra', compact('dades_client'));
    }

    public function show_basic($tid)
    {
        $dades_client = Client::findOrFail($tid);
        return view('mostra-basica', compact('dades_client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tid)
    {
        $dades_client = Client::findOrFail($tid);
        return view('actualitza', compact('dades_client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validar los datos del formulario
    $noves_dades_Client = $request->validate([
        'Dni_client' => 'required|unique:clients,Dni_client,'.$id,
        'Nom_i_cognoms' => 'required',
        'Edat' => 'required',
        'Telèfon' => 'required',
        'Adreça' => 'required',
        'Ciutat' => 'required',
        'País' => 'required',
        'Email' => 'required',
        'Número_del_permís_de_conducció' => 'required',
        'Punts_del_permís_de_conducció' => 'required',
        'Tipus_de_targeta' => 'required',
        'Número_de_la_targeta' => 'required',
    ]);

    Client::findOrFail($id)->update($noves_dades_Client);

    return view('dashboard');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tid)
    {
        $client = Client::findOrFail($tid)->delete();
        return view('dashboard');
    }
}
