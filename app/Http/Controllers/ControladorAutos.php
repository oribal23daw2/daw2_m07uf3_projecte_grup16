<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;
use Illuminate\Database\Eloquent\Model;

class ControladorAutos extends Controller
{
    protected $primaryKey = 'tid';
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
            'Matricula_auto' => 'required|unique:autos|max:7',
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

        return redirect('autos');
    }

    /**
     * Display the specified resource.
     */
    public function show($Matricula_auto)
    {
        $dades_auto = Auto::findOrFail($Matricula_auto);
        return view('mostra-cotxes', compact('dades_auto'));
    }

    public function show_basic($Matricula_auto)
    {
        $dades_auto = Auto::findOrFail($Matricula_auto);
        return view('mostra-basica', compact('dades_auto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit($Matricula_auto)
    {
        $dades_auto = Auto::findOrFail($Matricula_auto);
        return view('actualitza-cotxes', compact('dades_auto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Matricula_auto)
    {
        // Validar los datos del formulario
        $noves_dades_auto = $request->validate([
            'Matricula_auto' => 'required|unique:autos|max:7',
            'Número_de_bastidor' => 'required',
            'Marca' => 'required',
            'Model' => 'required',
            'Color' => 'required',
            'Nombre_de_places' => 'required',
            'Nombre_de_portes' => 'required',
            'Grandària_del_maleter' => 'required',
            'Tipus_de_combustible' => 'required',
        ]);

        Auto::findOrFail($Matricula_auto)->update($noves_dades_auto);

        return redirect('autos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Matricula_auto)
    {
        $auto = Auto::findOrFail($Matricula_auto)->delete();
        return redirect('autos');
    }
}
