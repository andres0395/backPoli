<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sedes;
use Illuminate\Http\Request;

class SedesController extends Controller
{
    public function show()
    {
        return Sedes::all();
    }

    public function save(Request $request)
    {
        $sede = new Sedes;
        $sede->id_sede = $request->id_sede;
        $sede->nombre = $request->nombre;
        $sedeExist = Sedes::where('id_sede', $request->id_sede)->first();
        if (!$sedeExist){
            $saved = $sede->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe una Sede con ese Id', 'msg'=>$sedeExist], 500);
    }

    public function update(Request $request)
    {
        $sede = Sedes::find($request->id);
        if($sede->id_sede != $request->id_sede){
            $sedeExist = Sedes::where('id_sede', $request->id_sede)->first();
            if (!!$sedeExist) {
                return response()->json(['status' => false, 'message' => 'Ya existe una Sede con ese Id', 'msg'=>$sedeExist], 500);
            }
        }
        if (!$sede) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $sede->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $sede = Sedes::where('id_sede', $request->id_sede)->first();

        if (!$sede) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $sede->delete();


        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}
