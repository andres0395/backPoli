<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public function show()
    {
        return Periodo::all();
    }

    public function save(Request $request)
    {
        Periodo::truncate();
        $periodo = new Periodo;
        $periodo->fecha_inicio = $request->fecha_inicio;
        $periodo->fecha_fin = $request->fecha_fin;
        $periodo->fecha_inicio_pp = $request->fecha_inicio_pp;
        $periodo->fecha_fin_pp = $request->fecha_fin_pp;
        $periodo->fecha_inicio_sp = $request->fecha_inicio_sp;
        $periodo->fecha_fin_sp = $request->fecha_fin_sp;
        $periodo->fecha_inicio_santa = $request->fecha_inicio_santa;
        $periodo->fecha_fin_santa = $request->fecha_fin_santa;
        $periodo->detalle = $request->detalle;
        $periodo->total_semanas = $request->total_semanas;
        $periodoExist = Periodo::where('id', $request->id)->first();
        if (!$periodoExist){
            $saved = $periodo->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe una Periodo con ese Id', 'msg'=>$periodoExist], 500);

    }

    public function update(Request $request)
    {
        $periodo = Periodo::find($request->id);
        if($periodo->id != $request->id){
            $periodoExist = Periodo::where('id', $request->id)->first();
            if (!!$periodoExist) {
                return response()->json(['status' => false, 'message' => 'Ya existe una periodo con ese Id', 'msg'=>$periodoExist], 500);
            }
        }
        if (!$periodo) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $periodo->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $periodo = Periodo::where('id', $request->id)->first();

        if (!$periodo) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $periodo->delete();


        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}
