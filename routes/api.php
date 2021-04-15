<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;



Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
});
Route::resource('notas',NotaController::class);

