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

    Route::get('create','App\Http\Controllers\webnotes\NotesController@create');
    Route::post('add','App\Http\Controllers\webnotes\NotesController@add') -> name('notes.add');

    Route::get('edit','App\Http\Controllers\webnotes\NotesController@edit');
    Route::post('update','App\Http\Controllers\webnotes\NotesController@update') -> name('notes.update');

    Route::get('delete/{note_id}', 'App\Http\Controllers\webnotes\NotesController@delete')->name('notes.delete');

    Route::get('AllNotes','App\Http\Controllers\webnotes\NotesController@AllNotes', function ()
    {
        return view('AllNotes');
    });


