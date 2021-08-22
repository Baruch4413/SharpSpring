<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () {
    }

    public function index (Request $request) {
        return response()->json(Note::orderBy('id', 'desc')->paginate(100));
    }

    public function store (Request $request) {
        $note = Note::create([
            'title' => $request->input('title', ''),
            'body' => $request->input('body', ''),
            'user_id' => auth()->user()->id,
        ]);
        if ( $note ) {
            return response()->json('The note has been saved', 200);
        }
        return response()->json('There has been an error', 400);
    }

    public function edit (Request $request) {
        $note = Note::find($request->input('id', 0));
        return response()->json($note);
    }

    public function update (Request $request) {
        $note = Note::find($request->input('id'));
        if ( ! $note ) {
            return response()->json('Note not found', 404);
        }
        $note->title = $request->input('title', '');
        $note->body = $request->input('body', '');
        if ( $note->save() ) {
            return response()->json('The note has been saved', 200);
        }
        return response()->json('There has been an error', 400);
    }

    public function destroy (Request $request) {
        $note = Note::find($request->input('id', 0));
        $note->delete();
        return response()->json('Note deleted', 200);
    }

}
