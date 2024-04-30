<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ipc;
use Illuminate\Http\Request;
use App\Models\Costo;
use App\Models\Docente;

class IpcController extends Controller
{
    public function show()
    {
        return Ipc::all();
    }

    public function save(Request $request)
    {
        $ipc = new Ipc;
        $ipc->id_ipc = $request->id_ipc;
        $ipc->id_usuario = $request->id_usuario;
        $ipc->porcentaje = $request->porcentaje;
        $ipc->fecha_aplicacion = $request->fecha_aplicacion;
        $ipcExist = Ipc::where('id_ipc', $request->id_ipc)->first();
        $Costo = Costo::all();
        $Docente = Docente::all();
        if (!$ipcExist){
            $saved = $ipc->save();
            if (!$saved) {
                return response()->json(['status' => false, 'message' => 'Error al guardar'], 500);
            }
            foreach ($Costo as $key => $value) {
                Costo::where('id', $value['id'])->update(['valor_hora' => $value['valor_hora']*$ipc->porcentaje]);
            }
            foreach ($Docente as $key => $value) {
                Docente::where('id', $value['id'])->update(['valor_hora' => $value['valor_hora']*$ipc->porcentaje]);
            }
            return response()->json(['status' => true, 'message' => 'Creado exitosamente','msg'=>$Costo], 201);
        }
        return response()->json(['status' => false, 'message' => 'Ya existe un Ipc con ese Id', 'msg'=>$ipcExist], 500);

    }

    public function update(Request $request)
    {
        $ipc = Ipc::find($request->id);
        if($ipc->id_ipc != $request->id_ipc){
            $ipcExist = Ipc::where('id_ipc', $request->id_ipc)->first();
            if (!!$ipcExist) {
                return response()->json(['status' => false, 'message' => 'Ya existe un Ipc con ese Id', 'msg'=>$ipcExist], 500);
            }
        }
        if (!$ipc) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $updated = $ipc->update($request->all());

        if (!$updated) {
            return response()->json(['status' => false, 'message' => 'Error al actualizar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Actualizado exitosamente'], 200);
    }

    public function delete(Request $request)
    {
        $ipc = Ipc::where('id_ipc', $request->id_ipc)->first();

        if (!$ipc) {
            return response()->json(['status' => false, 'message' => 'Dato no encontrado'], 404);
        }
        $deleted = $ipc->delete();


        if (!$deleted) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar'], 500);
        }

        return response()->json(['status' => true, 'message' => 'Eliminado exitosamente'], 200);
    }
}

