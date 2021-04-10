<?php

namespace App\Http\Controllers\webnotes;

use App\Http\Controllers\Controller;
use App\Models\WebNotes\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function create(){
        return view('NotesWeb.CreateNotes');
    }
    public function add(Request $request)
    {
        Note::create([
            'title'=> $request -> Title,
            'content'=> $request -> Content,
            'details'=> $request -> Details,
        ]);
        return 'added successfully';
    }
}
