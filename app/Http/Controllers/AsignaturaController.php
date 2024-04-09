<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\Contratop2;

class AsignaturaController extends Controller
{
    public function show()
    {
        return Asignatura::all();
    }

    public function save(Request $request)
    {
        $asignatura = new Asignatura;
        $asignatura->id_asignatura = $request->id_asignatura;
        $asignatura->id_abreviatura = $request->id_abreviatura;
        $asignatura->id_tipo_asignatura = $request->id_tipo_asignatura;
        $asignatura->nombre = $request->nombre;
        $asignatura->horas_clase = $request->horas_clase;
        $asignatura->horas_asesoria = $request->horas_asesoria;
        $asignatura->horas_evaluacion = $request->horas_evaluacion;
        $asignaturaExist = Asignatura::where('id_asignatura', $request->id_dependencia)->first();
        if (!$asignaturaExist){
            $saved = $asignatura->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe una Asignatura con ese Id', 'msg'=>$asignaturaExist], 500);

    }
    public function update(Request $request)
    {
        $asignatura = Asignatura::find($request->id);
        if($asignatura->id_asignatura != $request->id_asignatura){
            $asignaturaExist = Asignatura::where('id_asignatura', $request->id_asignatura)->first();
            if (!!$asignaturaExist) {
                return response()->json(['status' => false, 'message' => 'Ya existe una Asignatura con ese Id', 'msg'=>$asignaturaExist], 500);
            }
        }
        if (!$asignatura) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $asignatura->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $asignatura = Asignatura::where('id_asignatura', $request->id_asignatura)->first();

        if (!$asignatura) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $asignatura->delete();


        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}
