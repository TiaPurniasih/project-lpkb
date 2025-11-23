@extends('layouts.auth')

@section('contents')
<div class="min-h-screen flex flex-col lg:flex-row bg-white">
    <!-- Left Side - Form Section -->
    <div class="flex-1 flex flex-col justify-center px-6 sm:px-8 lg:px-12 py-8 lg:py-12">
        <div class="mx-auto w-full max-w-md">
            <!-- Header -->
            <div class="mb-16 text-center">
                <h1 class="text-6xl font-bold text-red-600 mb-2">SIOPKB</h1>
                <p class="text-lg text-red-600">Sistem Izin Operasional Pendidikan Keagamaan Buddha</p>
            </div>

            <!-- Form Title -->
            <div class="mb-6 mt-4 text-center">
                <h2 class="text-xl font-bold text-gray-900 mb-1">Daftar Akun Pemohon Baru</h2>
                <p class="text-sm text-gray-600">Silahkan lengkapi form berikut</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <!-- Nama Lembaga -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nama Lembaga<span class="text-red-600">*</span>
                        </label>
                        <input type="text" name="name" placeholder="Masukkan Nama Lembaga"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Nomor WhatsApp -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nomor WhatsApp<span class="text-red-600">*</span>
                        </label>
                        <input type="text" name="nomor_whatsapp" placeholder="Masukkan Nomor WhatsApp"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('nomor_whatsapp')" class="mt-1" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email<span class="text-red-600">*</span>
                        </label>
                        <input type="email" name="email" placeholder="Masukkan Email"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Password<span class="text-red-600">*</span>
                        </label>
                        <input type="password" name="password" placeholder="Masukkan Password"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Konfirmasi Password<span class="text-red-600">*</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <!-- Address Dropdowns - Stacked Vertically -->
                    <div class="space-y-4">
                        <!-- Provinsi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Provinsi<span class="text-red-600">*</span>
                            </label>
                            <div class="relative">
                                <select name="provinsi"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm bg-white appearance-none pr-10">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('provinsi')" class="mt-1" />
                        </div>

                        <!-- Kabupaten -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Kabupaten<span class="text-red-600">*</span>
                            </label>
                            <div class="relative">
                                <select name="kabupaten"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm bg-white appearance-none pr-10">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('kabupaten')" class="mt-1" />
                        </div>

                        <!-- Kecamatan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Kecamatan<span class="text-red-600">*</span>
                            </label>
                            <div class="relative">
                                <select name="kecamatan"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm bg-white appearance-none pr-10">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('kecamatan')" class="mt-1" />
                        </div>

                        <!-- Kelurahan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Kelurahan<span class="text-red-600">*</span>
                            </label>
                            <div class="relative">
                                <select name="kelurahan"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm bg-white appearance-none pr-10">
                                    <option value="">Pilih Kelurahan</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('kelurahan')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Alamat Lengkap -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Alamat Lengkap Lembaga<span class="text-red-600">*</span>
                        </label>
                        <textarea name="alamat_lengkap" rows="3" placeholder="Masukkan alamat lengkap"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none text-sm resize-none"></textarea>
                        <x-input-error :messages="$errors->get('alamat_lengkap')" class="mt-1" />
                    </div>

                    <!-- File Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Upload Dokumen Verifikasi Awal<span class="text-red-600">*</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-gray-400 transition-colors cursor-pointer">
                            <input type="file" name="dokumen" id="dokumen" class="hidden" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            <label for="dokumen" class="cursor-pointer flex flex-col items-center">
                                <svg class="h-12 w-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-sm text-gray-600">Drop files here or click to upload</p>
                                <p class="text-xs text-gray-400 mt-1">Ukuran maksimal tiap file 2 MB</p>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('dokumen')" class="mt-1" />
                    </div>

                    <!-- Register Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-4 rounded-lg transition-colors">
                            Registrasi
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="text-red-600 hover:text-red-700 font-medium">Login</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Right Side - Illustration Section -->
    <div class="hidden lg:flex lg:w-1/2 bg-[#faeae8] relative overflow-hidden">
        <div class="flex items-center justify-center w-full h-full p-12">
        </div>
    </div>
</div>
@endsection
