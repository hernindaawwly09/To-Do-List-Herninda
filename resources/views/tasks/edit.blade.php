@extends('layouts.app')

@section('content')
<div class="container mx-auto px-2 sm:px-4 md:px-8 py-6 flex flex-col items-center">
    <div class="w-full max-w-md sm:max-w-lg md:max-w-xl bg-white p-6 sm:p-8 rounded shadow border-t-8 border-blue-400">
        <h1 class="text-2xl sm:text-3xl font-bold text-blue-600 mb-2 text-center">Edit Tugas</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-blue-900 font-semibold mb-1">Judul</label>
                <input type="text" name="title" class="w-full border border-blue-200 rounded px-3 py-2 focus:border-blue-400 focus:ring-blue-400" required value="{{ old('title', $task->title) }}">
                @error('title')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-blue-900 font-semibold mb-1">Deskripsi</label>
                <textarea name="description" class="w-full border border-blue-200 rounded px-3 py-2 focus:border-blue-400 focus:ring-blue-400">{{ old('description', $task->description) }}</textarea>
                @error('description')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-blue-900 font-semibold mb-1">Deadline</label>
                <input type="datetime-local" name="deadline" class="w-full border border-blue-200 rounded px-3 py-2 focus:border-blue-400 focus:ring-blue-400" value="{{ old('deadline', $task->deadline ? date('Y-m-d\TH:i', strtotime($task->deadline)) : '') }}">
                @error('deadline')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-blue-900 font-semibold mb-1">Prioritas</label>
                <select name="priority" class="w-full border border-blue-200 rounded px-3 py-2 focus:border-blue-400 focus:ring-blue-400" required>
                    <option value="high" @if(old('priority', $task->priority)=='high') selected @endif>Tinggi</option>
                    <option value="medium" @if(old('priority', $task->priority)=='medium') selected @endif>Sedang</option>
                    <option value="low" @if(old('priority', $task->priority)=='low') selected @endif>Rendah</option>
                </select>
                @error('priority')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-blue-900 font-semibold mb-1">Status</label>
                <select name="status" class="w-full border border-blue-200 rounded px-3 py-2 focus:border-blue-400 focus:ring-blue-400">
                    <option value="0" @if(!$task->status) selected @endif>Belum Selesai</option>
                    <option value="1" @if($task->status) selected @endif>Selesai</option>
                </select>
                @error('status')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
            </div>
            <div class="flex flex-col sm:flex-row justify-end gap-2 mt-6">
                <a href="{{ route('tasks.index') }}" class="text-blue-500 border border-blue-300 px-4 py-2 rounded hover:bg-blue-50 text-center">Batal</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection 