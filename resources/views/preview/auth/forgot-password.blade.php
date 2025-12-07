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
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Lupa Password</h2>
                <p class="text-sm text-gray-600">Masukkan email yang terdaftar untuk mereset kata sandi</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="space-y-5">
                    <!-- Email Field -->
                    <div class="mb-12">
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email<span class="text-red-600">*</span>
                        </label>
                        <input type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            placeholder="Masukkan Email"
                            required
                            autofocus
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-lg transition-colors">
                            Kirim Tautan Reset
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
