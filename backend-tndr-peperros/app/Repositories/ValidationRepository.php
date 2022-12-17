<?php
namespace App\Repositories;

//use App\Models\Perro;
use App\Models\Interaccion;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class ValidationRepository 
{

    public function validarExistencia($id_perro_interesado, $id_perro_candidato)
    {
        try {
            $ifexist = Interaccion::where('perro_interesado_id', $id_perro_interesado)->where('perro_candidato_id', $id_perro_candidato)->first();
            if ($ifexist){
                Log::info($ifexist);
                //$perros = Perro::find($request->id)->delete();
                return 0;
                //return response()->json(["perros" => $perros], Response::HTTP_OK);
            }
            return 1;
            
            
        }
        catch (Exception $e)
        {
            return 2;
        }
    }
}

