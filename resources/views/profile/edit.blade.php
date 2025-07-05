<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-6">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-blue-700 mb-2">Data Profil</h3>
                    <ul class="mb-4 text-gray-800">
                        <li><span class="font-semibold">Nama:</span> {{ $user->name }}</li>
                        <li><span class="font-semibold">Email:</span> {{ $user->email }}</li>
                        <li><span class="font-semibold">Tanggal Daftar:</span> {{ $user->created_at ? $user->created_at->format('d M Y H:i') : '-' }}</li>
                    </ul>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form', ['user' => $user])
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
