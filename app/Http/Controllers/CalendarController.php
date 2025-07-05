<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\DailyNote;
use App\Models\DailyReflection;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }

    public function apiEvents()
    {
        $userId = Auth::id();
        $events = [];

        // Tasks
        $tasks = Task::where('user_id', $userId)->whereNotNull('deadline')->get();
        foreach ($tasks as $task) {
            $events[] = [
                'id' => 'task-' . $task->id,
                'title' => '📝 ' . $task->title,
                'start' => $task->deadline,
                'color' => $task->status ? '#60A5FA' : '#FBBF24',
                'url' => route('tasks.show', $task->id),
                'type' => 'task',
                'allDay' => true,
            ];
        }

        // Daily Notes
        $notes = DailyNote::where('user_id', $userId)->get();
        foreach ($notes as $note) {
            $events[] = [
                'id' => 'note-' . $note->id,
                'title' => '📔 Catatan Harian',
                'start' => $note->date,
                'color' => '#A7F3D0',
                'url' => route('daily-notes.show', $note->id),
                'type' => 'note',
            ];
        }

        // Daily Reflections
        $reflections = DailyReflection::where('user_id', $userId)->get();
        foreach ($reflections as $reflection) {
            $events[] = [
                'id' => 'reflection-' . $reflection->id,
                'title' => '🌱 Refleksi Harian',
                'start' => $reflection->date,
                'color' => '#F472B6',
                'url' => route('daily-reflections.index') . '?date=' . $reflection->date,
                'type' => 'reflection',
            ];
        }

        return response()->json($events);
    }
}
