<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\LoginController;

/*
Route::get("/ciudad",[CiudadController::class,'Listar']);
Route::get("/ciudad/insertar",[CiudadController::class,'Insertar']);
Route::post("/ciudad/insertar",[CiudadController::class,'InsertarPost']);

Route::get("/ciudad/actualizar",[CiudadController::class,'Actualizar']);
Route::post("/ciudad/actualizar",[CiudadController::class,'ActualizarPost']);

Route::get("/ciudad/eliminar",[CiudadController::class,'Eliminar']);
Route::post("/ciudad/eliminar",[CiudadController::class,'EliminarPost']);
*/
Route::prefix('ciudad')->group(function () {
    Route::get("/",[CiudadController::class,'Listar'])->middleware('auth');
    Route::get("/api",[CiudadController::class,'ListarAPI']);
    Route::get("/insertar",[CiudadController::class,'Insertar']);
    Route::post("/insertar",[CiudadController::class,'InsertarPost']);

    Route::get("/actualizar/{id}",[CiudadController::class,'Actualizar']);
    Route::post("/actualizar/{id}",[CiudadController::class,'ActualizarPost']);

    Route::get("/eliminar/{id}",[CiudadController::class,'Eliminar']);
    Route::post("/eliminar/{id}",[CiudadController::class,'EliminarPost']);
});

Route::prefix('login')->group(function () {
    Route::get("/",[LoginController::class,'login'])->name("login");
    Route::post("/",[LoginController::class,'authenticate']);
    Route::get("/logout",[LoginController::class,'logout']);
    
   
});

