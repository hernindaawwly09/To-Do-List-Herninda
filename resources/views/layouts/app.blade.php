<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        @stack('styles')
    </head>
    <body class="bg-blue-100 min-h-screen font-sans antialiased">
        <nav class="bg-gradient-to-r from-blue-300 via-blue-200 to-blue-400 text-blue-900 px-6 py-4 mb-8 shadow-lg border-b-4 border-blue-400 rounded-b-2xl">
            <div class="container mx-auto flex justify-between items-center">
                <span class="font-extrabold text-2xl flex items-center gap-2 tracking-wide">
                    <span class="text-blue-500">📝</span> <span class="drop-shadow">To-Do List</span> <span class="text-yellow-300">✨</span>
                </span>
                <div class="flex items-center gap-2">
                    @auth
                        <span class="mr-4 flex items-center gap-1 bg-blue-100 px-3 py-1 rounded-full shadow text-blue-700 font-semibold"><span>👤</span> {{ Auth::user()->name }}</span>
                        <a href="{{ route('tasks.index') }}" class="mr-2 hover:bg-blue-200 hover:text-blue-900 px-3 py-1 rounded-full transition flex items-center gap-1"><span>📋</span> Tugas</a>
                        <a href="{{ route('daily-notes.index') }}" class="mr-2 hover:bg-blue-200 hover:text-blue-900 px-3 py-1 rounded-full transition flex items-center gap-1"><span>📔</span> Catatan</a>
                        <a href="{{ route('daily-reflections.index') }}" class="mr-2 hover:bg-blue-200 hover:text-blue-900 px-3 py-1 rounded-full transition flex items-center gap-1"><span>🌱</span> Refleksi</a>
                        <a href="{{ route('calendar.index') }}" class="mr-2 hover:bg-blue-200 hover:text-blue-900 px-3 py-1 rounded-full transition flex items-center gap-1"><span>🗓️</span> Kalender</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-blue-400 hover:bg-blue-600 text-white px-3 py-1 rounded-full shadow transition flex items-center gap-1"><span>🚪</span> Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="mr-2 hover:bg-blue-200 hover:text-blue-900 px-3 py-1 rounded-full transition flex items-center gap-1"><span>🔑</span> Login</a>
                        <a href="{{ route('register') }}" class="hover:bg-blue-200 hover:text-blue-900 px-3 py-1 rounded-full transition flex items-center gap-1"><span>📝</span> Register</a>
                    @endauth
                </div>
            </div>
        </nav>
        <div class="min-h-screen bg-blue-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        @stack('scripts')
    </body>
</html>
