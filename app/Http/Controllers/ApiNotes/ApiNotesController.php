<?php

namespace App\Http\Controllers\ApiNotes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiNotesController extends Controller
{
   public function index(){
         $notes = Note::get();
         return response()-> json($notes);
   }
}
