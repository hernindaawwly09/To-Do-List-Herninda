@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl sm:text-3xl font-bold text-blue-600 mb-6 text-center">Tambah Catatan Harian</h1>
    <form action="{{ route('daily-notes.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg mx-auto">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Tanggal</label>
            <input type="date" name="note_date" class="w-full border rounded px-3 py-2" required value="{{ old('note_date', date('Y-m-d')) }}">
            @error('note_date')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Isi Catatan</label>
            <textarea name="content" class="w-full border rounded px-3 py-2" required>{{ old('content') }}</textarea>
            @error('content')<div class="text-red-500 text-sm">{{ $message }}</div>@enderror
        </div>
        <div class="flex justify-end">
            <a href="{{ route('daily-notes.index') }}" class="mr-4 text-blue-500">Batal</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection 