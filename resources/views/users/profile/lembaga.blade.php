@extends('layouts.master_user')

@section('contents')
<!-- Page Header with Breadcrumbs -->
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Profil Lembaga</h1>
    <div class="flex items-center text-sm text-gray-500">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        <a href="{{ route('user.dashboard') }}" class="hover:text-gray-700">Home</a>
        <span class="mx-2">></span>
        <span>Profil Lembaga</span>
    </div>
</div>

<!-- Section 1: Identitas Lembaga -->
<div class="mb-8">
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Identitas Lembaga</h2>
        
        <div class="grid grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Nama Penanggung Jawab -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nama Penanggung Jawab <span class="text-red-600">*</span>
                    </label>
                    <input type="text" 
                            placeholder="Masukkan nama penanggung jawab" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>

                <!-- Nama Lembaga Pendidikan -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nama Lembaga Pendidikan <span class="text-red-600">*</span>
                    </label>
                    <input type="text" 
                            placeholder="Masukkan nama lembaga pendidikan" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>

                <!-- Nama Kepala Lembaga -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nama Kepala Lembaga <span class="text-red-600">*</span>
                    </label>
                    <input type="text" 
                            placeholder="Masukkan nama kepala lembaga" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>

                <!-- Jalur Pendidikan -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Jalur Pendidikan <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none pr-10">
                            <option value="" disabled selected class="text-gray-400">Pilih Jalur Pendidikan</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Nama Badan Penyelenggara -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nama Badan Penyelenggara <span class="text-red-600">*</span>
                    </label>
                    <input type="text" 
                            placeholder="Masukkan nama badan penyelenggara" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>

                <!-- Nomor Telepon Lembaga -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nomor Telepon Lembaga <span class="text-red-600">*</span>
                    </label>
                    <input type="text" 
                            placeholder="Masukkan nomor telepon lembaga" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>

                <!-- Tanggal Berdiri -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Tanggal Berdiri <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <input type="text" 
                                placeholder="Masukkan Tanggal" 
                                class="w-full px-4 py-2.5 pr-10 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Jenis Pendidikan Buddha -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Jenis Pendidikan Buddha <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none pr-10">
                            <option value="" disabled selected class="text-gray-400">Pilih Jenis Pendidikan</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Full-Width Section: Alamat Lengkap Badan Penyelenggara -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-900 mb-2">
                Alamat Lengkap Badan Penyelenggara <span class="text-red-600">*</span>
            </label>
            <textarea rows="4" 
                        placeholder="Masukkan alamat lengkap badan penyelenggara" 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none"></textarea>
        </div>
    </div>
</div>

<!-- Section 2: Dokumen Penyelenggara -->
<div class="mb-8">
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Dokumen Penyelenggara</h2>
        
        <div class="space-y-6">
            <!-- Tanda Daftar Yayasan/Perkumpulan -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Tanda Daftar Yayasan/Perkumpulan dari Kementerian Agama <span class="text-red-600">*</span>
                </label>
                <div class="relative">
                    <input type="file" 
                            name="tanda_daftar" 
                            id="tanda_daftar" 
                            accept=".pdf,.jpg,.jpeg,.png" 
                            class="hidden"
                            onchange="handleFileSelect(this, 'tanda_daftar_preview')">
                    <label for="tanda_daftar" class="cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600">Drop files here or click to upload.</p>
                            <p id="tanda_daftar_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                        </div>
                    </label>
                </div>
                <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
            </div>

            <!-- AD/ART -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    AD/ART <span class="text-red-600">*</span>
                </label>
                <div class="relative">
                    <input type="file" 
                            name="ad_art" 
                            id="ad_art" 
                            accept=".pdf,.jpg,.jpeg,.png" 
                            class="hidden"
                            onchange="handleFileSelect(this, 'ad_art_preview')">
                    <label for="ad_art" class="cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600">Drop files here or click to upload.</p>
                            <p id="ad_art_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                        </div>
                    </label>
                </div>
                <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
            </div>
        </div>
    </div>
</div>

<!-- Section 3: Alamat Lembaga Pendidikan -->
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
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white">
                            <option value="">Pilih Provinsi</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Kabupaten -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Kabupaten <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white">
                            <option value="">Pilih Kabupaten</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
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
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white">
                            <option value="">Pilih Kecamatan</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Kelurahan -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Kelurahan <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white">
                            <option value="">Pilih Kelurahan</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Alamat Lengkap Lembaga -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Alamat Lengkap Lembaga <span class="text-red-600">*</span>
                </label>
                <textarea rows="4" 
                            placeholder="Masukkan alamat lengkap lembaga" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"></textarea>
            </div>
        </div>
    </div>
</div>

<!-- Section 4: Sarana & Foto -->
<div class="mb-8">
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Sarana & Foto</h2>
        
        <div class="space-y-6">
            <!-- Foto Sarpras -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Foto Sarpras <span class="text-red-600">*</span>
                </label>
                <div class="relative">
                    <input type="file" 
                            name="foto_sarpras" 
                            id="foto_sarpras" 
                            accept=".jpg,.jpeg,.png" 
                            class="hidden"
                            onchange="handleFileSelect(this, 'foto_sarpras_preview')">
                    <label for="foto_sarpras" class="cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600">Drop files here or click to upload.</p>
                            <p id="foto_sarpras_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                        </div>
                    </label>
                </div>
                <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p>
            </div>

            <!-- Foto Gedung Depan -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Foto Gedung Depan <span class="text-red-600">*</span>
                </label>
                <div class="relative">
                    <input type="file" 
                            name="foto_gedung_depan" 
                            id="foto_gedung_depan" 
                            accept=".jpg,.jpeg,.png" 
                            class="hidden"
                            onchange="handleFileSelect(this, 'foto_gedung_depan_preview')">
                    <label for="foto_gedung_depan" class="cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600">Drop files here or click to upload.</p>
                            <p id="foto_gedung_depan_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                        </div>
                    </label>
                </div>
                <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p>
            </div>

            <!-- Foto Gedung Samping -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Foto Gedung Samping <span class="text-red-600">*</span>
                </label>
                <div class="relative">
                    <input type="file" 
                            name="foto_gedung_samping" 
                            id="foto_gedung_samping" 
                            accept=".jpg,.jpeg,.png" 
                            class="hidden"
                            onchange="handleFileSelect(this, 'foto_gedung_samping_preview')">
                    <label for="foto_gedung_samping" class="cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600">Drop files here or click to upload.</p>
                            <p id="foto_gedung_samping_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                        </div>
                    </label>
                </div>
                <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p>
            </div>

            <!-- Tambahan Foto Sarpras (Opsional) -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Tambahan Foto Sarpras (Opsional)
                </label>
                <div class="relative">
                    <input type="file" 
                            name="tambahan_foto_sarpras" 
                            id="tambahan_foto_sarpras" 
                            accept=".jpg,.jpeg,.png" 
                            class="hidden"
                            onchange="handleFileSelect(this, 'tambahan_foto_sarpras_preview')">
                    <label for="tambahan_foto_sarpras" class="cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600">Drop files here or click to upload.</p>
                            <p id="tambahan_foto_sarpras_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                        </div>
                    </label>
                </div>
                <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p>
            </div>
        </div>
    </div>
</div>

<!-- Section 5: Rekening -->
<div class="mb-8">
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Rekening</h2>
        
        <div class="space-y-6">
            <!-- Bank Fields Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Pilih Bank -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Pilih Bank <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white">
                            <option value="">Pilih Bank</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Nomor Rekening -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nomor Rekening <span class="text-red-600">*</span>
                    </label>
                    <input type="text" 
                            placeholder="Nomor Rekening" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>

                <!-- Cabang Bank -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Cabang Bank <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white">
                            <option value="">Cabang Bank</option>
                        </select>
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Upload Foto Rekening -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Upload Foto Rekening <span class="text-red-600">*</span>
                </label>
                <div class="relative">
                    <input type="file" 
                            name="foto_rekening" 
                            id="foto_rekening" 
                            accept=".pdf,.jpg,.jpeg,.png" 
                            class="hidden"
                            onchange="handleFileSelect(this, 'foto_rekening_preview')">
                    <label for="foto_rekening" class="cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600">Drop files here or click to upload.</p>
                            <p id="foto_rekening_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                        </div>
                    </label>
                </div>
                <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4 pt-4">
                <button class="px-6 py-2 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                    Batalkan
                </button>
                <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    Simpan Draft
                </button>
            </div>
        </div>
    </div>
</div>
@endsection