<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\webnotes\NotesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route:resource('create','NotesController@create');
//Route::group(['prefix' => 'note'], function (){
    Route::get('create','App\Http\Controllers\webnotes\NotesController@create');
    Route::post('add','App\Http\Controllers\webnotes\NotesController@add');
//});
