<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reportes;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function show()
    {
        return Reportes::all();
    }

    public function save(Request $request)
    {
        $reporte = new Reportes;
        $reporte->id_reporte = $request->id_reporte;
        $reporte->id_usuario = $request->id_usuario;
        $reporte->id_contratop3 = $request->id_contratop3;
        $reporte->fecha_reporte = $request->fecha_reporte;
        $reporteExist = Reportes::where('id_reporte', $request->id_reporte)->first();
        if (!$reporteExist){
            $saved = $reporte->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe un Reporte con ese Id', 'msg'=>$reporteExist], 500);

    }

    public function update(Request $request)
    {
        $reporte = Reportes::find($request->id);
        if($reporte->id_reporte != $request->id_reporte){
            $reporteExist = Reportes::where('id_reporte', $request->id_reporte)->first();
            if (!!$reporteExist) {
                return response()->json(['status' => false, 'message' => 'Ya existe un Reporte con ese Id', 'msg'=>$reporteExist], 500);
            }
        }
        if (!$reporte) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $reporte->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $reporte = Reportes::where('id_reporte', $request->id_reporte)->first();

        if (!$reporte) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $reporte->delete();

        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}
