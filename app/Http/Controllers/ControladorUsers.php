<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ControladorUsers extends Controller
{
    /**
     * Muestra una lista de los usuarios.
     */
    public function index()
    {
        $dades_users = User::all();
        return view('llista-users', compact('dades_users'));
    }

    public function create()
    {
        return view('crear-users');
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        $nouUsuari = $request->validate([
            'name' => 'required',
            'tipus' => 'required|in:treballador,capDepartament',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $nouUsuari['password'] = bcrypt($request->password);

        User::create($nouUsuari);

        return redirect()->route('/usuaris')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Muestra los detalles de un usuario específico.
     */
    public function show($id)
    {
        $dades_user = User::findOrFail($id);
        return view('mostra-usuario', compact('dades_user'));
    }

    /**
     * Muestra el formulario para editar un usuario.
     */
    public function edit($id)
    {
        $dades_user = User::findOrFail($id);
        return view('actualitza-user', compact('dades_user'));
    }

    /**
     * Actualiza un usuario específico en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $noves_dades_usuari = $request->validate([
            'name' => 'required',
            'tipus' => 'required|in:treballador,capDepartament',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:8',
        ]);

        if ($request->has('password')) {
            $noves_dades_usuari['password'] = bcrypt($request->password);
        }

        User::findOrFail($id)->update($noves_dades_usuari);

        return redirect()->route('users')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Elimina un usuario específico de la base de datos.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

    }
}
