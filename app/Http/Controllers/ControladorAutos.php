<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;

class ControladorAutos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_autos = Auto::all();
        return view('llista-autos', compact('dades_autos'));
    }

    public function index_basic(){
        $dades_autos = Auto::all();
        return view('llista-basica', compact('dades_autos'));
    }
    
    public function create()
    {
        return view('crear-autos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $nouAuto = $request->validate([
            'Matricula_auto' => 'required|unique:autos',
            'Número_de_bastidor' => 'required',
            'Marca' => 'required',
            'Model' => 'required',
            'Color' => 'required',
            'Nombre_de_places' => 'required',
            'Nombre_de_portes' => 'required',
            'Grandària_del_maleter' => 'required',
            'Tipus_de_combustible' => 'required',
        ]);

        $auto = Auto::create($nouAuto);

        return view('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($tid)
    {
        $dades_auto = Auto::findOrFail($tid);
        return view('mostra', compact('dades_auto'));
    }

    public function show_basic($tid)
    {
        $dades_auto = Auto::findOrFail($tid);
        return view('mostra-basica', compact('dades_auto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit($tid)
    {
        $dades_auto = Auto::findOrFail($tid);
        return view('actualitza', compact('dades_auto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $noves_dades_auto = $request->validate([
            'Matricula_auto' => 'required|unique:autos,Matricula_auto,'.$id,
            'Número_de_bastidor' => 'required',
            'Marca' => 'required',
            'Model' => 'required',
            'Color' => 'required',
            'Nombre_de_places' => 'required',
            'Nombre_de_portes' => 'required',
            'Grandària_del_maleter' => 'required',
            'Tipus_de_combustible' => 'required',
        ]);

        Auto::findOrFail($id)->update($noves_dades_auto);

        return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tid)
    {
        $auto = Auto::findOrFail($tid)->delete();
        return view('dashboard');
    }
}
