<x-guest-layout>
    <div class="bg-blue-100 min-h-screen flex items-center justify-center py-4 px-2">
        <div class="w-full max-w-md sm:max-w-lg md:max-w-xl bg-white shadow-md overflow-hidden rounded-lg border-t-8 border-blue-400 px-4 sm:px-8 py-8 mx-auto">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-blue-500 text-center mb-2">Yuk, Daftar <span class="text-blue-700">To-Do List</span>! 📝</h2>
            <p class="text-blue-800 text-center mb-6 text-base sm:text-lg">Buat akunmu dan mulai kelola tugas dengan mudah 🚀</p>
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-blue-900" />
                    <x-text-input id="name" class="block mt-1 w-full border-blue-200 focus:border-blue-400 focus:ring-blue-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-blue-900" />
                    <x-text-input id="email" class="block mt-1 w-full border-blue-200 focus:border-blue-400 focus:ring-blue-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-blue-900" />
                    <x-text-input id="password" class="block mt-1 w-full border-blue-200 focus:border-blue-400 focus:ring-blue-400" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-blue-900" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-blue-200 focus:border-blue-400 focus:ring-blue-400" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="flex flex-col sm:flex-row items-center justify-between gap-2 mt-2">
                    <a class="underline text-sm text-blue-500 hover:text-blue-700 mr-0 sm:mr-4" href="{{ route('login') }}">
                        Sudah punya akun?
                    </a>
                    <button type="submit" class="w-full sm:w-auto px-4 py-2 bg-blue-400 hover:bg-blue-700 text-white font-semibold rounded shadow focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
