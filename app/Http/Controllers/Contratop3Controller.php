<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contratop3;

class Contratop3Controller extends Controller
{
    public function show()
    {
        return Contratop3::all();
    }

    public function save(Request $request)
    {
        $contratop3 = new Contratop3;
        $contratop3->id_contratop3 = $request->id_contratop3;
        $contratop3->id_contratop2 = $request->id_contratop2;
        $contratop3->id_estado_contrato = $request->id_estado_contrato;
        $contratop3->total_horas= $request->total_horas;
        $contratop3->valor_total = $request->valor_total;
        $contratop3->fecha_contrato = $request->fecha_contrato;
        $contratop3Exist = Contratop3::where('id_contratop3', $request->id_contratop3)->first();
        if (!$contratop3Exist){
            $saved = $contratop3->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe un Contrato con ese Id', 'msg'=>$contratop3Exist], 500);

    }

    public function update(Request $request)
    {
        $contratop3 = Contratop3::find($request->id);
        if($contratop3->id_contratop3 != $request->id_contratop3){
            $contratop3Exist = Contratop3::where('id_contratop3', $request->id_contratop3)->first();
            if (!!$contratop3Exist) {
                return response()->json(['status' => false, 'message' => 'Ya existe un Contrato con ese Id', 'msg'=>$contratop3Exist], 500);
            }
        }
        if (!$contratop3) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $contratop3->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $contratop3 = Contratop3::where('id_contratop3', $request->id_contratop3)->first();

        if (!$contratop3) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $contratop3->delete();


        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}
