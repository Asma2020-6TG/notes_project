<?php

namespace App\Http\Controllers\webnotes;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            'email'=>'required',
            'title' => 'required|unique:notes,title|max:100',
            'details' => 'required||max:250'
        ];
        $message=['email.required'=>'to add a note you must enter your email','title.required'=> 'you should insert note',
            'title.unique'=> 'try with another title',
            'details.required'=> 'what are note details?'
        ];
        $validator = Validator::make($request ->all(),$rules,$message);
        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        Note::create([
            'email' => $request ->email,
            'title'=> $request -> title,
            'details'=> $request -> details,
        ]);
        return redirect()->back()->with(['success'=>'Note added succefully']);
    }

        public function userNotes(){
        $id=Auth::id();
        $notes= Note::where('user_id',$id)->get();
        return view('NotesWeb.AllNotes',compact(notes));
        }
        public function allNotes()
    {
        $notes = Note::select('id','title','details')->get();
        return view('NotesWeb.AllNotes',compact('notes'));

    }
        public function editNote($note_id){
        $note = Note::find($note_id);
        if(!$note)
            return redirect() -> route('AllNotes') ->with(['error'=>'Note can not be edited']);
        $note= Note::select('id','title', 'details') -> find($note_id);
            return view('NotesWeb.EditNotes',compact('note'));
        }

    public function UpdateNote(NoteRequest $request, $note_id)
    {


        $note = Note::find($note_id);
        if (!$note)
            return redirect()->back();

        $note->update($request->all());

        return redirect()->back()->with(['success' => ' updated successfully ']);


    }


    public function delete($note_id){
        $note = Note::find($note_id);
        if(!$note)
            return redirect() -> back() ->with(['error'=>'Note can not be deleted']);

        $note->delete();
        return redirect()
            ->route('AllNotes')
            ->with(['success'=> 'note is deleted successfully']);
    }

    //relation one to many: user to his notes
    public function getUserNotes(){
        $user = User::first();
        $notes = $user->notes;
        foreach ($notes as $note){
            echo  $note -> title.'<br>';
        }
    }





}
