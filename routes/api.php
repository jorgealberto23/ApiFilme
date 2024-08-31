<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblFilmeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/',function(){return response()->json(['Sucesso'=>true]);});
Route::get('/filmes',[TblFilmeController::class, 'index']);
Route::get('/filmes/{codigo}',[TblFilmeController::class,'show']);
Route::post('/filmes',[TblFilmeController::class,'store']);
Route::put('/filmes/{codigo}',[TblFilmeController::class,'update']);
Route::delete('/filmes/{id}',[TblFilmeController::class,'destroy']);