<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyReflection;
use Illuminate\Support\Facades\Auth;

class DailyReflectionController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();
        $reflection = DailyReflection::where('user_id', Auth::id())
            ->where('date', $today)
            ->first();
        return view('daily_reflections.index', compact('reflection', 'today'));
    }

    public function store(Request $request)
    {
        $today = now()->toDateString();
        $validated = $request->validate([
            'what_went_well' => 'required|string',
            'what_to_improve' => 'required|string',
        ]);
        $reflection = DailyReflection::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'date' => $today,
            ],
            [
                'what_went_well' => $validated['what_went_well'],
                'what_to_improve' => $validated['what_to_improve'],
            ]
        );
        return redirect()->route('daily-reflections.index')->with('success', 'Refleksi harian tersimpan!');
    }
}
