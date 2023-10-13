<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios', 'index');
    Route::get('/usuarios/usuario/{id}', 'show');
    Route::post('/usuarios/usuario', 'store');
    Route::put('/usuarios/usuario/{id}', 'update');
    Route::delete('/usuarios/usuario/{id}', 'destroy');
});
