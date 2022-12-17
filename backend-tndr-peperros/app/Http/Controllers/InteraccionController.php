<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InteraccionRepository;
use App\Http\Requests\InteraccionRequest;
use App\Http\Requests\OtrasRequest;

class InteraccionController extends Controller
{
    //
    protected InteraccionRepository $interaccionRepo;

    public function __construct(InteraccionRepository $interaccionRepo)
    {
        $this->interaccionRepo = $interaccionRepo;
    }

    public function listarInteracciones()
    {
        return $this->interaccionRepo->listarInteracciones();
    }

    public function guardarInteraccion(InteraccionRequest $request)
    {
        return $this->interaccionRepo->guardarInteraccion($request);
    }

    public function verInteraccionesPorPerro($request)
    {
        return $this->interaccionRepo->verInteraccionesPorPerro($request);
    }


}
