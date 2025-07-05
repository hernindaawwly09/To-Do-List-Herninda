@extends('layouts.app')

@section('content')
<div class="container mx-auto px-2 sm:px-4 md:px-8 py-6">
    <h1 class="text-3xl font-extrabold text-blue-400 text-center mb-2 flex items-center justify-center gap-2">
        <span>📝</span> To-Do List <span>✨</span>
    </h1>
    <p class="text-blue-600 text-center mb-6 text-lg">Kelola tugasmu dengan semangat setiap hari! 🦋</p>
    @if(session('success'))
        <div class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-3 rounded-xl mb-4 text-center shadow">
            {{ session('success') }}
        </div>
    @endif
    <!-- Statistik & Progress Bar -->
    <div class="mb-6 grid grid-cols-1 sm:grid-cols-4 gap-4 text-center">
        <div class="bg-blue-100 rounded-xl shadow-lg p-4">
            <div class="text-3xl font-bold text-green-600 flex items-center justify-center gap-1">✅ {{ $done }}</div>
            <div class="text-blue-700 font-semibold">Selesai</div>
        </div>
        <div class="bg-blue-50 rounded-xl shadow-lg p-4">
            <div class="text-3xl font-bold text-gray-600 flex items-center justify-center gap-1">🕒 {{ $not_done }}</div>
            <div class="text-blue-500 font-semibold">Belum Selesai</div>
        </div>
        <div class="bg-blue-200 rounded-xl shadow-lg p-4">
            <div class="text-3xl font-bold text-blue-800 flex items-center justify-center gap-1">⏰ {{ $overdue }}</div>
            <div class="text-blue-800 font-semibold">Overdue</div>
        </div>
        <div class="bg-blue-50 rounded-xl shadow-lg p-4 flex flex-col justify-center">
            <div class="text-blue-700 mb-1 font-semibold">Progress</div>
            <div class="w-full bg-blue-200 rounded-full h-5">
                <div class="bg-gradient-to-r from-blue-300 via-blue-400 to-blue-600 h-5 rounded-full flex items-center justify-end pr-2 transition-all duration-300" style="width: {{ $progress }}%">
                    <span class="text-white text-xs font-bold">{{ $progress }}%</span>
                </div>
            </div>
            <div class="text-sm text-blue-700 mt-1">Semangat! 💪</div>
        </div>
    </div>
    <!-- End Statistik & Progress Bar -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <div></div>
        <a href="{{ route('tasks.create') }}" class="bg-blue-300 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-xl shadow transition transform hover:scale-105 flex items-center gap-2">
            <span>➕</span> Tambah Tugas
        </a>
    </div>
    <div class="overflow-x-auto rounded-xl shadow-lg">
        <table class="min-w-full bg-white rounded-xl overflow-hidden">
            <thead class="bg-blue-100">
                <tr>
                    <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Judul</th>
                    <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Prioritas</th>
                    <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Deadline</th>
                    <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Status</th>
                    <th class="py-2 px-2 sm:px-4 text-xs sm:text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                <tr class="border-b hover:bg-blue-50 transition">
                    <td class="py-2 px-2 sm:px-4 text-sm break-words max-w-xs">{{ $task->title }}</td>
                    <td class="py-2 px-2 sm:px-4 text-sm">
                        @if($task->priority == 'high')
                            <span class="text-red-500 font-bold">🔴 Tinggi</span>
                        @elseif($task->priority == 'medium')
                            <span class="text-yellow-500 font-bold">🟠 Sedang</span>
                        @else
                            <span class="text-green-500 font-bold">🟢 Rendah</span>
                        @endif
                    </td>
                    <td class="py-2 px-2 sm:px-4 text-sm">{{ $task->deadline ? date('d M Y H:i', strtotime($task->deadline)) : '-' }}</td>
                    <td class="py-2 px-2 sm:px-4 text-sm">
                        @if($task->status)
                            <span class="bg-green-200 text-green-800 px-2 py-1 rounded-xl">Selesai 🎉</span>
                        @else
                            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-xl">Belum 😅</span>
                        @endif
                    </td>
                    <td class="py-2 px-2 sm:px-4 text-sm flex flex-col sm:flex-row gap-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded-xl text-center transition hover:scale-105">✏️ Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin hapus tugas?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-400 hover:bg-red-700 text-white px-2 py-1 rounded-xl w-full sm:w-auto transition hover:scale-105">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">Belum ada tugas. <span class="text-2xl">🥲</span></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 