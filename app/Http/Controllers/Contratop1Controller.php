<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contratop1;
use Carbon\Carbon;


class Contratop1Controller extends Controller
{
    public function show()
    {
        $fechaHoy = Carbon::now();
        $contratos = Contratop1::whereDate('fecha_fin', '>=', $fechaHoy)->get();
        return $contratos;
    }
    public function showByUser(Request $request)
    {
        $fechaHoy = Carbon::now();
        $id_usuario = $request->id_usuario;
        $contratos = Contratop1::whereDate('fecha_fin', '>=', $fechaHoy)->where('id_usuario', $id_usuario)->get();
        return $contratos;
    }

    public function save(Request $request)
    {
        $contratop1 = new Contratop1;
        $contratop1->id_contratop1 = $request->id_contratop1;
        $contratop1->id_categoria_contrato = $request->id_categoria_contrato;
        $contratop1->id_docente = $request->id_docente;
        $contratop1->id_usuario = $request->id_usuario;
        $contratop1->fecha_inicio = $request->fecha_inicio;
        $contratop1->fecha_fin = $request->fecha_fin;
        $contratop1->total_semanas = $request->total_semanas;
        $contratop1->fecha_contrato = $request->fecha_contrato;
        $contratop1->id_dependencia = $request->id_dependencia;
        $contratop1->valor_hora = $request->valor_hora;
        $contratop1->valor_total = $request->valor_total;
        $contratop1->asignatura = $request->asignaturas;
        $contratop1->estado = $request->estado;
        $contratop1Exist = Contratop1::where('id_contratop1', $request->id_contratop1)->first();
        if (!$contratop1Exist){
            $saved = $contratop1->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente','msg'=>$request], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe una Contratop1 con ese Id', 'msg'=>$contratop1Exist], 500);

    }

    public function update(Request $request)
    {
        $contratop1 = Contratop1::find($request->id);
        if($contratop1->id_contratop1 != $request->id_contratop1){
            $contratop1Exist = Contratop1::where('id_contratop1', $request->id_contratop1)->first();
            if (!!$contratop1Exist) {
                return response()->json(['status' => false, 'message' => 'Ya existe una Contrato con ese Id', 'msg'=>$contratop1Exist], 500);
            }
        }
        if (!$contratop1) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $contratop1->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $contratop1 = Contratop1::where('id_contratop1', $request->id_contratop1)->first();

        if (!$contratop1) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $contratop1->delete();


        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}

