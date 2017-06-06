<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Note;

class NoteController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|unique:notes|max:50',
            'content' => 'required|max:3000',
        ]);

        $request->user()->notes()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        $request->user()->save();
        return redirect()->route('home');
    }

    public function view($id) {
        $note = Note::findOrFail($id);

        return view('show', compact('note'));
    }

    public function edit($id) {
        $note = Note::findOrFail($id);

        return view('edit', compact('note'));
    }

    public function showTrashed(Request $request) {
        $trashedNotes = $request->user()->notes()->onlyTrashed()->paginate(6);

        return view('trashed', compact('trashedNotes'));
    }

    public function showShared(Request $request) {
        $sharedNotes = $request->user()->sharedNotes()->paginate(6);

        return view('shared', compact('sharedNotes'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required|unique:notes,title,'.$id.'|max:50',
            'content' => 'required|max:1000',
        ]);

        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        return redirect()->route('home');
    }

    public function delete(Request $request) {
        $note = Note::find($request->id);
        $note->delete();

        return redirect()->route('home');
    }

    public function restore(Request $request, $id) 
    {
        Note::withTrashed()
            ->where('id', $id)
            ->restore();
        
        return redirect()->route('trashed');
    }

    public function shareNote(Request $request, $note_id) {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $userToShareNoteWith = User::getUserByEmail($request->input('email'));

        if ($userToShareNoteWith === null) {
            return redirect()->route('home')->with('message', 'The user does not exist');
        }
        
        if ($request->user()->id === $userToShareNoteWith->id) {
            return redirect()->route('home')->with('message', 'This note belongs to you');
        }

        if ($userToShareNoteWith->sharedNotes()->where('note_id', $note_id)->exists()) {
            return redirect()->route('home')->with('message', 'Note has already been shared');
        }

        $userToShareNoteWith->sharedNotes()->attach($note_id);
        \BdHelpers::sendNotification('shared', [
            'email' => $userToShareNoteWith->email,
            'sharer' => "{$request->user()->name} ({$request->user()->email})",
            'name' => $userToShareNoteWith->name
        ]);

        return redirect()->route('home')->with('message', 'Note Successfully Shared');
    }

    public function permanentDelete(Request $request)
    {
        Note::withTrashed()
            ->where('id', $request->input('id'))
            ->forceDelete();

        return redirect()->route('trashed');
    }
}
