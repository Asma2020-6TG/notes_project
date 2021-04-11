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
//add new note
    Route::get('create','App\Http\Controllers\webnotes\NotesController@create');
    Route::post('add','App\Http\Controllers\webnotes\NotesController@add') -> name('notes.add');
// edit and update
    Route::get('editNote/{note_id}','App\Http\Controllers\webnotes\NotesController@editNote');
    Route::post('updateNote','App\Http\Controllers\webnotes\NotesController@update') -> name('notes.update');
// delete note
    Route::get('delete/{note_id}', 'App\Http\Controllers\webnotes\NotesController@delete')->name('notes.delete');
//select one note by its id
    Route::get('select/{note_id}','App\Http\Controllers\webnotes\NotesController@delete' );

//show all notes with bottons of delete and edit
    Route::get('AllNotes','App\Http\Controllers\webnotes\NotesController@AllNotes', function ()
    {
        return view('NotesWeb.AllNotes');
    });
//show all user's notes
Route::get('UserNotes','App\Http\Controllers\webnotes\NotesController@UserNotes', function ()
{
    return view('NotesWeb.UserNotes');
});
//relationship one to many
Route::get('user-has-many','App\Http\Controllers\webnotes\NotesController@getUserNotes');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
