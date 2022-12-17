<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PerroRepository;
use App\Http\Requests\PerroRequest;

class PerroController extends Controller
{
    //
    protected PerroRepository $perroRepo;
    public function __construct(PerroRepository $perroRepo)
    {
        $this->perroRepo = $perroRepo;
    }

    public function listarPerros()
    {
        return $this->perroRepo->listarPerros();
    }

    public function guardarPerro(PerroRequest $request)
    {
        return $this->perroRepo->guardarPerro($request);
    }

    public function filtrarPerros(Request $request)
    {
        return $this->perroRepo->filtrarPerros($request);
    }

    public function actualizarPerro(Request $request)
    {
        return $this->perroRepo->actualizarPerro($request);
    }

    public function eliminarPerro(Request $request)
    {
        return $this->perroRepo->eliminarPerro($request);
    }


}
