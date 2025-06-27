@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl sm:text-3xl font-bold text-blue-600 mb-6 text-center">Tambah Tugas</h1>
    <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg mx-auto">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Judul</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" required value="{{ old('title') }}">
            @error('title')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Deskripsi</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
            @error('description')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Deadline</label>
            <input type="datetime-local" name="deadline" class="w-full border rounded px-3 py-2" value="{{ old('deadline') }}">
            @error('deadline')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Prioritas</label>
            <select name="priority" class="w-full border rounded px-3 py-2" required>
                <option value="high" @if(old('priority')=='high') selected @endif>Tinggi</option>
                <option value="medium" @if(old('priority')=='medium') selected @endif>Sedang</option>
                <option value="low" @if(old('priority')=='low') selected @endif>Rendah</option>
            </select>
            @error('priority')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('tasks.index') }}" class="mr-4 text-blue-500">Batal</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection 