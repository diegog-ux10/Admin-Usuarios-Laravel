<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuarioNuevo = new Usuario();
        $usuarioNuevo->nombre = $request->nombre;
        $usuarioNuevo->apellido = $request->apellido;
        $usuarioNuevo->email = $request->email;
        $usuarioNuevo->fecha_registro = now();
        $usuarioNuevo->save();
        return "Usuario Guardado Exitosamente!";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        return Usuario::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $usuarioNuevo = Usuario::find($id);
        if ($usuarioNuevo) {
            $usuarioNuevo->nombre = $request->nombre;
            $usuarioNuevo->apellido = $request->apellido;
            $usuarioNuevo->email = $request->email;
            $usuarioNuevo->save();
            return "usuario guardado";
        } else {
            return "Ocurrio un error";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the user by ID
        $usuarioEliminar = Usuario::find($id); // Replace $usuarioEliminarId with the actual ID of the user you want to delete

        if ($usuarioEliminar) {
            $usuarioEliminar->delete();
            return "Usuario Eliminado";
        } else {
            return "Ocurrio un error";
        }
    }
}
