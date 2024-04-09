<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contratop2;

class Contratop2Controller extends Controller
{
    public function show()
    {
        return Contratop2::all();
    }

    public function save(Request $request)
    {
        $contratop2 = new Contratop2;
        $contratop2->id_contratop2 = $request->id_contratop2;
        $contratop2->id_contratop1 = $request->id_contratop1;
        $contratop2->id_asignatura = $request->id_asignatura;
        $contratop2->grupo = $request->grupo;
        $contratop2->total_horas_clase = $request->total_horas_clase;
        $contratop2->total_horas_asesoria = $request->total_horas_asesoria;
        $contratop2->total_horas_evaluacion = $request->total_horas_evaluacion;
        $contratop2Exist = Contratop2::where('id_contratop2', $request->id_contratop2)->first();
        if (!$contratop2Exist){
            $saved = $contratop2->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe un Contrato con ese Id', 'msg'=>$contratop2Exist], 500);

    }

    public function update(Request $request)
    {
        $contratop2 = Contratop2::find($request->id);
        if($contratop2->id_contratop2 != $request->id_contratop2){
            $contratop2Exist = Contratop2::where('id_contratop2', $request->id_contratop2)->first();
            if (!!$contratop2Exist) {
                return response()->json(['status' => false, 'message' => 'Ya existe un contrato con ese Id', 'msg'=>$contratop2Exist], 500);
            }
        }
        if (!$contratop2) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $contratop2->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $contratop2 = Contratop2::where('id_contratop2', $request->id_contratop2)->first();

        if (!$contratop2) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $contratop2->delete();


        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}
