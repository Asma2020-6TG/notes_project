<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['middleware'=>'api','namespace'=>'ApiNotes'], function(){
    Route::post('get-notes','ApiNotesController@index');
});

