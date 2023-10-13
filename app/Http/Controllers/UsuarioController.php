<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

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

    public function show($id)
    {

        return Usuario::find($id);
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

    public function destroy($id)
    {
        $usuarioEliminar = Usuario::find($id);

        if ($usuarioEliminar) {
            $usuarioEliminar->delete();
            return "Usuario Eliminado";
        } else {
            return "Ocurrio un error";
        }
    }
}
