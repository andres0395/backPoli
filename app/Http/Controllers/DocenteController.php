<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use Illuminate\Http\Request;
use App\Models\Contratop1;

class DocenteController extends Controller
{
    public function show()
    {
        return Docente::all();
    }

    public function save(Request $request)
    {
        $docente = new Docente;
        $docente->id_docente = $request->id_docente;
        $docente->id_genero = $request->id_genero;
        $docente->nombre = $request->nombre;
        $docente->nivel = $request->nivel;
        $docente->categoria = $request->categoria;
        $docente->estudios = $request->estudios;
        $docente->valor_hora = $request->valor_hora;
        $docente->tipo_docente = $request->tipo_docente;
        $docente->fecha_nacimiento = $request->fecha_nacimiento;
        // 1 catedra 2 vinculado
        $docenteExist = Docente::where('id_docente', $request->id_docente)->first();
        if (!$docenteExist){
            $saved = $docente->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente'], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe una Docente con ese Id', 'msg'=>$docenteExist], 500);

    }

    public function update(Request $request)
    {
        $docente = Docente::find($request->id);
        if($docente->id_docente != $request->id_docente){
            $docenteExist = Docente::where('id_docente', $request->id_docente)->first();
            if (!!$docenteExist) {
                return response()->json(['status' => false, 'message' => 'Ya existe una Docente con ese Id', 'msg'=>$docenteExist], 500);
            }
        }
        if (!$docente) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $docente->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $docente = Docente::where('id_docente', $request->id_docente)->first();
        if (!$docente) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $docente->delete();
        Contratop1::where('id_docente', $request->id_docente)->update(['estado' => 'CA',
        'motivo' => 'Docente Retirado','notificaciones' => false]);
        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}
