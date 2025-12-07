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
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Login</h2>
                <p class="text-sm text-gray-600">Masukkan email dan password Anda</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="space-y-5">
                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email<span class="text-red-600">*</span>
                        </label>
                        <input type="email" 
                            id="email" 
                            name="email" 
                            placeholder="Masukkan Email"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Password<span class="text-red-600">*</span>
                        </label>
                        <input type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan Password"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="text-right">
                        <p class="text-sm text-gray-600">
                            Lupa Password? 
                            <a href="{{ route('password.request') }}" class=" font-bold ">klik disini</a>
                        </p>
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-lg transition-colors">
                            Login
                        </button>
                    </div>
                </div>
            </form>

            <!-- Registration Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class=" font-bold ">Registrasi</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Right Side - Background Color Only -->
    <div class="hidden lg:flex lg:w-1/2 bg-[#faeae8]"></div>
</div>
@endsection
