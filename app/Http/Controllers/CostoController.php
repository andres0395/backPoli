<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Costo;

class CostoController extends Controller
{
    public function show()
    {
        return Costo::all();
    }

    public function save(Request $request)
    {
        $costo = new Costo;
        $costo->id_costo = $request->id_costo;
        $costo->nivel = $request->nivel;
        $costo->categoria = $request->categoria;
        $costo->valor_hora = $request->valor_hora;
        $costoExist = Costo::where('id_costo', $request->id_costo)->first();
        if (!$costoExist){
            $saved = $costo->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe un Costo con ese Id', 'msg'=>$costoExist], 500);

    }

    public function update(Request $request)
    {
        $costo = Costo::find($request->id);
        if($costo->id_costo != $request->id_costo){
            $costoExist = Costo::where('id_dependencia', $request->id_costo)->first();
            if (!!$costoExist) {
                return response()->json(['status' => false, 'message' => 'Ya existe un Costo con ese Id', 'msg'=>$costoExist], 500);
            }
        }
        if (!$costo) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $costo->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $costo = Costo::where('id_costo', $request->id_costo)->first();

        if (!$costo) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $costo->delete();


        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}

