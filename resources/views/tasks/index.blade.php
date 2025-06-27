@extends('layouts.app')

@section('content')
<div class="container mx-auto px-2 sm:px-4 md:px-8 py-6">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-blue-600">Daftar Tugas</h1>
            <p class="text-blue-900 text-sm sm:text-base">Kelola tugasmu dengan mudah di semua perangkat!</p>
        </div>
        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full sm:w-auto text-center">Tambah Tugas</a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto rounded shadow">
        <table class="min-w-full bg-white">
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
                            <span class="text-red-500 font-bold">Tinggi</span>
                        @elseif($task->priority == 'medium')
                            <span class="text-yellow-500 font-bold">Sedang</span>
                        @else
                            <span class="text-green-500 font-bold">Rendah</span>
                        @endif
                    </td>
                    <td class="py-2 px-2 sm:px-4 text-sm">{{ $task->deadline ? date('d M Y H:i', strtotime($task->deadline)) : '-' }}</td>
                    <td class="py-2 px-2 sm:px-4 text-sm">
                        @if($task->status)
                            <span class="bg-green-200 text-green-800 px-2 py-1 rounded">Selesai</span>
                        @else
                            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">Belum</span>
                        @endif
                    </td>
                    <td class="py-2 px-2 sm:px-4 text-sm flex flex-col sm:flex-row gap-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-center">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin hapus tugas?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-2 py-1 rounded w-full sm:w-auto">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">Belum ada tugas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 