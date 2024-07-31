<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscoController;
use App\Http\Controllers\MusicaController;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\SearchController;

Route::get('/teste', function () {
    return "Api Funcional!";
});
Route::get('/musicas/album/{id_album}', [MusicaController::class, 'getByAlbumId']);
Route::get('/disco',[DiscoController::class, 'index']);
Route::get('/disco/{id}',[DiscoController::class, 'show']);
Route::post('/disco',[DiscoController::class, 'store']);
Route::put('/disco/{id}',[DiscoController::class, 'update']);
Route::delete('/disco/{id}',[DiscoController::class, 'destroy']);

Route::get('/busca', [SearchController::class, 'search']);


Route::apiResource('musicas', MusicaController::class);

