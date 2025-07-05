@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-extrabold text-blue-400 text-center mb-2 flex items-center justify-center gap-2">
        <span>📔</span> Catatan Harian <span>🌤️</span>
    </h1>
    <p class="text-blue-600 text-center mb-6 text-lg">Tulis momen harianmu dengan penuh inspirasi! ✨</p>
    @if(session('success'))
        <div class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-xl mb-4 text-center shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-4 text-right">
        <a href="{{ route('daily-notes.create') }}" class="bg-blue-300 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-xl shadow transition transform hover:scale-105 flex items-center gap-2">
            <span>📝</span> Tambah Catatan
        </a>
    </div>
    <div class="overflow-x-auto rounded-xl shadow-lg">
        <table class="min-w-full bg-white rounded-xl overflow-hidden">
            <thead class="bg-blue-100">
                <tr>
                    <th class="py-2 px-4 text-xs sm:text-sm">Tanggal</th>
                    <th class="py-2 px-4 text-xs sm:text-sm">Isi Catatan</th>
                    <th class="py-2 px-4 text-xs sm:text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notes as $note)
                <tr class="border-b hover:bg-blue-50 transition">
                    <td class="py-2 px-4 text-sm">📅 {{ $note->note_date }}</td>
                    <td class="py-2 px-4 text-sm break-words max-w-xs">{{ $note->content }}</td>
                    <td class="py-2 px-4 text-sm flex flex-col sm:flex-row gap-2">
                        <a href="{{ route('daily-notes.edit', $note->id) }}" class="bg-yellow-300 hover:bg-yellow-400 text-white px-2 py-1 rounded-xl text-center transition hover:scale-105">✏️ Edit</a>
                        <form action="{{ route('daily-notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Yakin hapus catatan?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-300 hover:bg-red-500 text-white px-2 py-1 rounded-xl w-full sm:w-auto transition hover:scale-105">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-4 text-center text-gray-500">Belum ada catatan harian. <span class="text-2xl">😴</span></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 