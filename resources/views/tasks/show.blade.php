@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-xl">
    <h1 class="text-2xl font-bold text-blue-600 mb-6 flex items-center gap-2">
        <span>📝</span> Detail Tugas
    </h1>
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="mb-4">
            <span class="font-semibold">Judul:</span><br>
            <span>{{ $task->title }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Deskripsi:</span><br>
            <span>{{ $task->description ?? '-' }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Deadline:</span><br>
            <span>{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->translatedFormat('l, d F Y') : '-' }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Prioritas:</span><br>
            <span>{{ ucfirst($task->priority) }}</span>
        </div>
        <div class="mb-4">
            <span class="font-semibold">Status:</span><br>
            <span>{{ $task->status ? 'Selesai ✅' : 'Belum Selesai 🕒' }}</span>
        </div>
        <a href="{{ route('tasks.edit', $task->id) }}" class="bg-blue-400 hover:bg-blue-600 text-white px-4 py-2 rounded-full shadow font-bold transition">Edit Tugas</a>
    </div>
</div>
@endsection 