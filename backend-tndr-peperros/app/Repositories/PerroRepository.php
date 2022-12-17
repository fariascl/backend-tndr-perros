<?php
namespace App\Repositories;

use App\Models\Perro;
use App\Models\Interaccion;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class PerroRepository 
{
    public function listarPerros()
    {
        $perros = Perro::all();
        $interaccion = Interaccion::all();
        return response()->json(["perros" => $perros, "interaccion" => $interaccion], Response::HTTP_OK);
    }

    public function filtrarPerros($request)
    {
        $perros = Perro::where('id', $request->id)->get();
        return response()->json(["perros" => $perros], Response::HTTP_OK);
    }

    public function guardarPerro($request)
    {
        $perros = Perro::create([
            "perro_nombre" => $request->nombre,
            "perro_imagen" => $request->imagen,
            "perro_descripcion" => $request->descripcion
        ]);

        return response()->json(["perros" => $perros], Response::HTTP_OK);
    }

    public function actualizarPerro($request)
    {
        try {
            $perros = Perro::findorFail($request->id);
            if (isset($request->nombre) &&  $perros->perro_nombre = $request->nombre)
            $perros = Perro::where('id', $request->id)
            ->update([
                'perro_nombre' => $request->nombre
            ]);

            if (isset($request->imagen) &&  $perros->perro_imagen = $request->imagen)
            $perros = Perro::where('id', $request->id)
            ->update([
                'perro_nombre' => $request->imagen
            ]);
            //Log::info(['error' => $request->descripcion]);

            if (isset($request->descripcion) && $perros->perro_descripcion = $request->descripcion)
            $perros = Perro::where('id', $request->id)
            ->update([
                'perro_descripcion' => $request->descripcion
            ]);
            /* ,
                'perro_imagen' => $request->imagen,
                'perro_descripcion' => $request->descripcion */


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

    public function eliminarPerro($request)
    {
        try {
            $ifexist = Perro::where('id', $request->id)->first();
            if ($ifexist != null){
                $perros = Perro::find($request->id)->delete();
                return response()->json(["perros" => $perros], Response::HTTP_OK);
            }
            return response()->json(["msg" => "el id del perro que intenta eliminar no existe"], Response::HTTP_OK);
            //$perros = Perro::findorFail($request->id);
            
            
        }
        catch (Exception $e)
        {
            return response()->json(["error" => $e], Response::HTTP_BAD_REQUEST);
        }
    }
}

