<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Models\Contratop1;

class UsuariosController extends Controller
{
    public function show()
    {
        return Usuarios::all();
    }

    public function save(Request $request)
    {
        $usuario = new Usuarios;
        $usuario->id_usuario = $request->id_usuario;
        $usuario->id_perfil = $request->id_perfil;
        $usuario->id_dependencia = $request->id_dependencia;
        $usuario->clave = $request->clave;
        $usuario->estado = $request->estado;
        $usuarioExist = Usuarios::where('id_usuario', $request->id_usuario)->first();
        if (!$usuarioExist){
            $saved = $usuario->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe un Usuario con ese Id', 'msg'=>$usuarioExist], 500);

    }

    public function update(Request $request)
    {
        $usuario = Usuarios::find($request->id);
        if($usuario->id_usuario != $request->id_usuario){
            $usuarioExist = Usuarios::where('id_usuario', $request->id_usuario)->first();
            if (!!$usuarioExist) {
                return response()->json(['status' => false, 'message' => 'Ya existe un Usuario con ese Id', 'msg'=>$usuarioExist], 500);
            }
        }
        if (!$usuario) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $usuario->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $usuario = Usuarios::where('id_usuario', $request->id_usuario)->first();

        if (!$usuario) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $usuario->delete();

        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}

