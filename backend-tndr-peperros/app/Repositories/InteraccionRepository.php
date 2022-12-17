<?php
namespace App\Repositories;

//use App\Models\Perro;
use App\Models\Interaccion;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

use App\Repositories\ValidationRepository;

class InteraccionRepository 
{
    protected ValidationRepository $validationRepo;
    
    public function __construct(ValidationRepository $validationRepo)
    {
        $this->validationRepo = $validationRepo;
    }
    public function listarInteracciones()
    {
        //$perros = Perro::all();
        $interacciones = Interaccion::all();
        //$interacciones = Interaccion::all();
        return response()->json(["interacciones" => $interacciones], Response::HTTP_OK);
    }
/*
    public function filtrarPerros($request)
    {
        $perros = Perro::where('id', $request->id)->with(['interaccion'])->get();
        return response()->json(["perros" => $perros], Response::HTTP_OK);
    }
*/
    public function guardarInteraccion($request)
    {
        $result = $this->validationRepo->validarExistencia($request->perro_interesado_id, $request->perro_candidato_id);
        if ($result == 0){
            return response()->json(["error" => "No se ha podido registrar esta interacción ya que existe"], Response::HTTP_BAD_REQUEST);
            
        }

        if ($result == 1){
            $interaccion = Interaccion::create([
                "perro_interesado_id" => $request->perro_interesado_id,
                "perro_candidato_id" => $request->perro_candidato_id,
                "preferencia" => $request->preferencia
            ]);
            //return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
            return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
        }

        else{
            return response()->json(["error" => "Hubo un error al intentar registrar la interacción"], Response::HTTP_OK);
        }
        
    }
/*
    public function actualizarInteraccin($request)
    {
        try {
            $interaccion = Libro::findorFail($request->id);
            isset($request->nombre) &&  $perros->perro_nombre = $request->nombre;
            isset($request->interaccion) && $perros->interaccion_id = $request->interaccion;
            $perros->save();
            
            $perros = Perro::where('id', $request->id)
            ->update([
                'perro_nombre' => $request->nombre,
                'interaccion_id' => $request->interaccion_id
            ]);

            return response()->json(["perros" => $perros], Response::HTTP_OK);
        } catch (Exception $e) 
        {
            Log::info([
                "error" => $e,
                "message" => $e->getMessage(),
                "linea" => $e->getLine(),
                "archivo" => $e->getFile(), 
            ]);
            return response()->json(["error" => $e->getMessage()], Response:HTTP_BAD_REQUEST);
        }
        
    }
*/
    public function eliminarInteraccion($request)
    {
        try {
            $interacciones = Interaccion::find($request->id)->delete();
            return response()->json(["interacciones" => $interacciones], Response::HTTP_OK);
        }
        catch (Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }

    public function verInteraccionesPorPerro($request)
    {
        Log::info($request);
        $interacciones = Interaccion::where('perro_interesado_id', $request)->get();
        return response()->json(["interacciones" => $interacciones], Response::HTTP_OK);
    }
}

