<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use App\Models\Type;

class NoteController extends Controller
{
    protected function index() {
        $notes = Note::all();
        return response()->json($notes);
    }
    protected function show($id) {
        $note = Note::with(['user', 'type'])->find($id);
        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }
        return response()->json($note);
    }
    protected function search($searchterm) {
        $notes = Note::where('title', 'like', '%' . $searchterm . '%')
                     ->orWhere('content', 'like', '%' . $searchterm . '%')
                     ->get();
        return response()->json($notes);
    }
    protected function store(Request $request) {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sprint' => 'nullable|string|max:100',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $note = Note::create([
            'type_id' => $request->type_id,
            'title' => $request->title,
            'description' => $request->description,
            'sprint' => $request->sprint,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        return response()->json($note, 201);
    }
    protected function update(Request $request, $id) {
        $note = Note::find($id);
        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $request->validate([
            'type_id' => 'sometimes|exists:types,id',
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
            'sprint' => 'sometimes|nullable|string|max:100',
            'content' => 'sometimes|string',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        $note->update($request->only(['type_id', 'title', 'description', 'sprint', 'content', 'user_id']));

        return response()->json($note);
    }
    protected function destroy($id) {
        $note = Note::find($id);
        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $note->delete();
        return response()->json(['message' => 'Note deleted successfully']);
    }
}


