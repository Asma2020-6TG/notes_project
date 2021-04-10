<?php

namespace App\Http\Controllers\webnotes;

use App\Http\Controllers\Controller;
use App\Models\WebNotes\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Resources\Views\NotesWeb\ALLNotes;

class NotesController extends Controller
{
    public function create(){
        return view('NotesWeb.CreateNotes');
    }
    public function add(Request $request)
    {
        $rules=[
            'title' => 'required|unique:notes,title|max:100',
            'details' => 'required||max:250'
        ];
        $message=['title.required'=> 'you should insert note',
            'title.unique'=> 'try with another title',
            'details.required'=> 'what are note details?'
        ];
        $validator = Validator::make($request ->all(),$rules,$message);
        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        Note::create([
            'title'=> $request -> title,
            'details'=> $request -> details,
        ]);
        return redirect()->back()->with(['success'=>'Note added succefully']);
    }
        public function allNotes()
    {
        $notes = Note::select('id','title','details')->get();
        return view('NotesWeb.AllNotes',compact('notes'));

    }
        public function editNote($note_id){
        $note = Note::find($note_id);
        if(!$note)
            return redirect() -> back();
            $note= Note::select('id','title',"details") -> find($note_id);
            return view('NotesWeb.EditNotes',compact('note'));
        }

}
