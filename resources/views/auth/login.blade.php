<x-guest-layout>
    <div class="bg-blue-100 min-h-screen flex items-center justify-center py-4 px-2">
        <div class="w-full max-w-md sm:max-w-lg md:max-w-xl bg-white shadow-md overflow-hidden rounded-lg border-t-8 border-blue-400 px-4 sm:px-8 py-8 mx-auto">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-blue-500 text-center mb-2">Welcome to <span class="text-blue-700">To-Do List</span>! 📝</h2>
            <p class="text-blue-800 text-center mb-6 text-base sm:text-lg">Yuk, login dulu dan kelola tugasmu dengan mudah 😊</p>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-blue-900" />
                    <x-text-input id="email" class="block mt-1 w-full border-blue-200 focus:border-blue-400 focus:ring-blue-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-blue-900" />
                    <x-text-input id="password" class="block mt-1 w-full border-blue-200 focus:border-blue-400 focus:ring-blue-400" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-blue-300 text-blue-600 shadow-sm focus:ring-blue-400" name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-blue-900">{{ __('Remember me') }}</label>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between gap-2 mt-2">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-blue-500 hover:text-blue-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-blue-400 hover:bg-blue-700 text-white font-semibold rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <span class="text-blue-900">Belum punya akun?</span>
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold underline">Daftar di sini</a>
            </div>
        </div>
    </div>
</x-guest-layout>
