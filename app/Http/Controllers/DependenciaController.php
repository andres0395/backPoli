<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dependencia;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class DependenciaController extends Controller
{
    public function show()
    {
        return Dependencia::all();
    }

    public function save(Request $request)
    {
        $dependencia = new Dependencia;
        $dependencia->id_dependencia = $request->id_dependencia;
        $dependencia->nombre = $request->nombre;
        $dependenciaExist = Dependencia::where('id_dependencia', $request->id_dependencia)->first();
        if (!$dependenciaExist){
            $saved = $dependencia->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe una Dependecia con ese Id', 'msg'=>$dependenciaExist], 500);

    }

    public function update(Request $request)
    {
        $dependencia = Dependencia::find($request->id);
        if($dependencia->id_dependencia != $request->id_dependencia){
            $dependenciaExist = Dependencia::where('id_dependencia', $request->id_dependencia)->first();
            if (!!$dependenciaExist) {
                return response()->json(['status' => false, 'message' => 'Ya existe una Dependecia con ese Id', 'msg'=>$dependenciaExist], 500);
            }
        }
        if (!$dependencia) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $dependencia->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $dependencia = Dependencia::where('id_dependencia', $request->id_dependencia)->first();

        if (!$dependencia) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $dependencia->delete();


        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}
