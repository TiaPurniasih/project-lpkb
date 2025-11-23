@extends('layouts.auth')

@section('contents')
<div class="min-h-screen flex flex-col lg:flex-row bg-white">
    <!-- Left Side - Form Section -->
    <div class="flex-1 flex flex-col justify-center px-6 sm:px-8 lg:px-12 py-8 lg:py-12">
        <div class="mx-auto w-full max-w-lg">
            <!-- Header -->
            <div class="mb-16 text-center">
                <h1 class="text-6xl font-bold text-red-600 mb-2">SIOPKB</h1>
                <p class="text-xl text-red-600 font-light">Sistem Izin Operasional Pendidikan Keagamaan Buddha</p>
            </div>

            <!-- Form Title -->
            <div class="mb-12 text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Sandi Baru</h2>
                <p class="text-sm text-gray-600">Masukkan email yang terdaftar untuk mereset kata sandi</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="space-y-5">
                    <!-- Email Address (Hidden or Visible) -->
                    <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

                    <!-- New Password Field -->
                    <div >
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Password baru<span class="text-red-600">*</span>
                        </label>
                        <input type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan password baru"
                            required
                            autofocus
                            autocomplete="new-password"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Konfirmasi Password baru<span class="text-red-600">*</span>
                        </label>
                        <input type="password" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            placeholder="Konfirmasi password baru"
                            required
                            autocomplete="new-password"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-12">
                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-lg transition-colors">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Side - Background Color Only -->
    <div class="hidden lg:flex lg:w-1/2 bg-[#faeae8]"></div>
</div>
@endsection
