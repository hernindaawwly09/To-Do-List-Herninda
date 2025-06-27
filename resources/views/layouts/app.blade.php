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
    </head>
    <body class="bg-blue-100 min-h-screen font-sans antialiased">
        <nav class="bg-blue-500 text-white px-6 py-4 mb-8 shadow border-b-4 border-blue-700">
            <div class="container mx-auto flex justify-between items-center">
                <span class="font-extrabold text-xl flex items-center gap-2">
                    <span class="text-blue-100">��</span> To-Do List
                </span>
                <div>
                    @auth
                        <span class="mr-4">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-blue-700 hover:bg-blue-800 px-3 py-1 rounded">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="mr-4 hover:underline">Login</a>
                        <a href="{{ route('register') }}" class="hover:underline">Register</a>
                    @endauth
                </div>
            </div>
        </nav>
        <div class="min-h-screen bg-gray-100">
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
    </body>
</html>
