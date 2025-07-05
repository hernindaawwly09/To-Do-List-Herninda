<?php

namespace App\Http\Controllers;

use App\Models\DailyNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyNoteController extends Controller
{
    public function index()
    {
        $notes = DailyNote::where('user_id', Auth::id())->orderBy('note_date', 'desc')->get();
        return view('daily_notes.index', compact('notes'));
    }

    public function create()
    {
        return view('daily_notes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'note_date' => 'required|date',
            'content' => 'required|string',
        ]);
        $validated['user_id'] = Auth::id();
        DailyNote::create($validated);
        return redirect()->route('daily-notes.index')->with('success', 'Catatan harian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $note = DailyNote::where('user_id', Auth::id())->findOrFail($id);
        return view('daily_notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $note = DailyNote::where('user_id', Auth::id())->findOrFail($id);
        $validated = $request->validate([
            'note_date' => 'required|date',
            'content' => 'required|string',
        ]);
        $note->update($validated);
        return redirect()->route('daily-notes.index')->with('success', 'Catatan harian berhasil diupdate.');
    }

    public function destroy($id)
    {
        $note = DailyNote::where('user_id', Auth::id())->findOrFail($id);
        $note->delete();
        return redirect()->route('daily-notes.index')->with('success', 'Catatan harian berhasil dihapus.');
    }
} 