<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/perros')->group(function () use ($router) {
    $router->post('/agregar', [PerroController::class, 'guardarPerro']);
    $router->put('/actualizar', [PerroController::class, 'actualizarPerro']);
    $router->delete('/eliminar', [PerroController::class, 'eliminarPerro']);
    $router->get('/all', [PerroController::class, 'listarPerros']);
    $router->get('/ver/{id}', [PerroController::class, 'filtrarPerros']);
});

Route::prefix('/interacciones')->group(function () use ($router) {
    $router->post('/agregar', [InteraccionController::class, 'guardarInteraccion']);
    $router->get('/all', [InteraccionController::class, 'listarInteracciones']);
    $router->get('/perro/{id}', [InteraccionController::class, 'verInteraccionesPorPerro']);
});