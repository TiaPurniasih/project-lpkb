@extends('layouts.master_user')

@section('contents')
    <!-- Page Header with Breadcrumbs -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Pengaturan</h1>
        <div class="flex items-center text-sm text-gray-500">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <a href="{{ route('user.dashboard') }}" class="hover:text-gray-700">Home</a>
            <span class="mx-2">></span>
            <span>Pengaturan</span>
        </div>
    </div>

    <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (!empty($user->id))
            <input type="hidden" name="id" value="{{ $user->id }}">
        @endif

        <!-- Section 1: Identitas Lembaga -->
        <div class="mb-8">
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Pengaturan</h2>

                <div class="grid grid-cols-2 gap-6">

                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Nama Lembaga <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="name" id="name" placeholder="Masukkan nama"
                                value="{{ old('name', $user->name) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                required>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Nomor WhatsApp
                            </label>
                            <input type="text" name="phone" id="phone" placeholder="Masukkan nomor HP"
                                value="{{ old('phone', $user->phone) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Nama Penanggung Jawab <span class="text-red-600">*</span>
                            </label>
                            <input type="text" name="name" id="name" placeholder="Masukkan nama"
                                value="{{ old('name', $user->name) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                required>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Email <span class="text-red-600">*</span>
                            </label>
                            <input type="email" name="email" id="email" placeholder="Masukkan email"
                                value="{{ old('email', $user->email) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                required>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Password Baru
                            </label>
                            <input type="password" name="password" placeholder="Kosongkan jika tidak diganti"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="mb-8">
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Alamat Lembaga Pendidikan</h2>

                <div class="space-y-6">
                    <!-- Row 1: Provinsi and Kabupaten -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Provinsi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Provinsi <span class="text-red-600">*</span>
                            </label>
                            <div class="relative">
                                <select
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white"
                                    name="province" id="province" required>
                                    <option value="">Pilih Provinsi</option>
                                </select>
                                <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Kabupaten -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Kabupaten <span class="text-red-600">*</span>
                            </label>
                            <div class="relative">
                                <select
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white"
                                    name="city" id="city" required>
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                                <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Kecamatan and Kelurahan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kecamatan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Kecamatan <span class="text-red-600">*</span>
                            </label>
                            <div class="relative">
                                <select
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white"
                                    name="district" id="district" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Kelurahan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Kelurahan <span class="text-red-600">*</span>
                            </label>
                            <div class="relative">
                                <select
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white"
                                    name="village" id="village" required>
                                    <option value="">Pilih Kelurahan</option>
                                </select>
                                <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Lengkap Lembaga -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Alamat Lengkap Lembaga <span class="text-red-600">*</span>
                        </label>
                        <textarea rows="4" placeholder="Masukkan alamat lengkap lembaga"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            name="institution_full_address" id="institution_full_address"></textarea>
                    </div>

                    <div class="space-y-6">
                        <!-- Tanda Daftar Yayasan/Perkumpulan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                Tanda Daftar Yayasan/Perkumpulan dari Kementerian Agama <span class="text-red-600">*</span>
                            </label>
                            <div class="relative">
                                <input type="file" name="docs_1" id="docs_1" accept=".pdf,.jpg,.jpeg,.png"
                                    class="hidden" onchange="handleFileSelect(this, 'docs_1_preview')">
                                <label for="docs_1" class="cursor-pointer">
                                    <div
                                        class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="text-gray-600">Drop files here or click to upload.</p>
                                        <p id="docs_1_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                    </div>
                                </label>
                            </div>
                            <!-- <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p> -->

                            {{-- <p class="text-sm text-gray-500 mt-2">
                                    File tersedia: <a href="" download
                                        class="text-blue-600 hover:underline">
                                        Download </a> </p> --}}

                            <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>

                        </div>
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="button" onclick="window.location='{{ route('user.dashboard') }}'"
                                class="px-6 py-2 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                                Batalkan
                            </button>

                            <button type="submit"
                                class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                Simpan Pengaturan
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
