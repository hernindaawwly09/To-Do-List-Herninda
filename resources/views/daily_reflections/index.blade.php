@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-xl">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-6 flex items-center justify-center gap-2">
        <span>🌱</span> Daily Reflection / Habit Journal <span>📝</span>
    </h1>
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-4 text-center shadow">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form method="POST" action="{{ route('daily-reflections.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold mb-2" for="what_went_well">Apa yang berjalan baik hari ini?</label>
                <textarea name="what_went_well" id="what_went_well" rows="3" class="w-full rounded-lg border-gray-300 focus:border-blue-400 focus:ring-blue-400" required>{{ old('what_went_well', $reflection->what_went_well ?? '') }}</textarea>
                @error('what_went_well')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-2" for="what_to_improve">Apa yang ingin kamu perbaiki?</label>
                <textarea name="what_to_improve" id="what_to_improve" rows="3" class="w-full rounded-lg border-gray-300 focus:border-blue-400 focus:ring-blue-400" required>{{ old('what_to_improve', $reflection->what_to_improve ?? '') }}</textarea>
                @error('what_to_improve')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-blue-400 hover:bg-blue-600 text-white px-6 py-2 rounded-full shadow font-bold w-full transition">Simpan Refleksi</button>
        </form>
        @if($reflection)
            <div class="mt-8 bg-blue-50 rounded-xl p-4">
                <h2 class="text-lg font-bold text-blue-700 mb-2 flex items-center gap-2 justify-center">Refleksi Hari Ini ({{ $today }})</h2>
                <div class="mb-2">
                    <span class="font-semibold">Apa yang berjalan baik hari ini?</span><br>
                    <span>{{ $reflection->what_went_well }}</span>
                </div>
                <div>
                    <span class="font-semibold">Apa yang ingin kamu perbaiki?</span><br>
                    <span>{{ $reflection->what_to_improve }}</span>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection 