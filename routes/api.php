<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblFilmeController;
use App\Http\Controllers\TblEmpresaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/empresa',[TblEmpresaController::class, 'index']);
Route::get('/empresa/{codigo}',[TblEmpresaController::class,'show']);
Route::post('/empresa',[TblEmpresaController::class,'store']);
Route::put('/empresa/{codigo}',[TblEmpresaController::class,'update']);
Route::delete('/empresa/{id}',[TblEmpresaController::class,'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/filmes',[TblFilmeController::class, 'index']);
Route::get('/filmes/{codigo}',[TblFilmeController::class,'show']);
Route::post('/filmes',[TblFilmeController::class,'store']);
Route::put('/filmes/{codigo}',[TblFilmeController::class,'update']);
Route::delete('/filmes/{id}',[TblFilmeController::class,'destroy']);