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

<form action="{{ route('user.profil.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($institution && $institution->id)
        <input type="hidden" name="id" value="{{ $institution->id }}">
    @endif

    <input type="hidden" id="selected_province" value="{{ $institution->province }}">
    <input type="hidden" id="selected_province_name" value="{{ $institution->province ? explode('|', $institution->province)[1] : '' }}">

    <input type="hidden" id="selected_city" value="{{ $institution->city }}">
    <input type="hidden" id="selected_city_name" value="{{ $institution->city ? explode('|', $institution->city)[1] : '' }}">

    <input type="hidden" id="selected_district" value="{{ $institution->district }}">
    <input type="hidden" id="selected_district_name" value="{{ $institution->district ? explode('|', $institution->district)[1] : '' }}">

    <input type="hidden" id="selected_village" value="{{ $institution->subdistrict }}">
    <input type="hidden" id="selected_village_name" value="{{ $institution->village ? explode('|', $institution->village)[1] : '' }}">

    <input type="hidden" name="docs_1_hidden" id="docs_1_hidden" value="{{ $institution->docs_1 }}">
    <input type="hidden" name="docs_2_hidden" id="docs_2_hidden" value="{{ $institution->docs_2 }}">
    <input type="hidden" name="photo_1_hidden" id="photo_1_hidden" value="{{ $institution->photo_1 }}">
    <input type="hidden" name="photo_2_hidden" id="photo_2_hidden" value="{{ $institution->photo_2 }}">
    <input type="hidden" name="photo_3_hidden" id="photo_3_hidden" value="{{ $institution->photo_3 }}">
    <input type="hidden" name="docs_3_hidden" id="docs_3_hidden" value="{{ $institution->docs_3 }}">

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
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                value="{{ old('pic_name', $institution->pic_name) }}"
                                name="pic_name"
                                id="pic_name" required>
                    </div>

                    <!-- Nama Lembaga Pendidikan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Nama Lembaga Pendidikan <span class="text-red-600">*</span>
                        </label>
                        <input type="text" 
                                placeholder="Masukkan nama lembaga pendidikan" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                value="{{ old('institution_name', $institution->institution_name) }}"
                                name="institution_name"
                                id="institution_name" required>
                    </div>

                    <!-- Nama Kepala Lembaga -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Nama Kepala Lembaga <span class="text-red-600">*</span>
                        </label>
                        <input type="text" 
                                placeholder="Masukkan nama kepala lembaga" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                value="{{ old('institution_head_name', $institution->institution_head_name) }}"
                                name="institution_head_name"
                                id="institution_head_name" required>
                    </div>

                    <!-- Jalur Pendidikan -->
                    <!-- <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Jalur Pendidikan <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none pr-10" name="education_path" id="education_path">
                                <option value="" disabled selected class="text-gray-400">Pilih Jalur Pendidikan</option>
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div> -->
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
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                value="{{ old('organizing_body_name', $institution->organizing_body_name) }}"
                                name="organizing_body_name"
                                id="organizing_body_name" required>
                    </div>

                    <!-- Nomor Telepon Lembaga -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Nomor Telepon Lembaga <span class="text-red-600">*</span>
                        </label>
                        <input type="text" 
                                placeholder="Masukkan nomor telepon lembaga" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                value="{{ old('institution_phone', $institution->institution_phone) }}"
                                name="institution_phone"
                                id="institution_phone" required>
                    </div>

            
            
                    <!-- Tanggal Berdiri -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Tanggal Berdiri <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                    placeholder="Masukkan Tanggal" 
                                    class="w-full px-4 py-2.5 pr-10 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" name="established_date" id="established_date" value="{{ old('established_date', $institution->established_date) }}"
                                    required>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Jenis Pendidikan Buddha -->
                    <!-- <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Jenis Pendidikan Buddha <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none pr-10" name="buddhist_education_type" id="buddhist_education_type">
                                <option value="" disabled selected class="text-gray-400">Pilih Jenis Pendidikan</option>
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div> -->
                </div>
            </div>

            <!-- Full-Width Section: Alamat Lengkap Badan Penyelenggara -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Alamat Lengkap Badan Penyelenggara <span class="text-red-600">*</span>
                </label>
                <textarea rows="4"  placeholder="Masukkan alamat lengkap badan penyelenggara" 
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent resize-none" name="organizing_body_address" id="organizing_body_address" required>{{ old('organizing_body_address', $institution->organizing_body_address) }}</textarea>
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
                                name="docs_1" 
                                id="docs_1" 
                                accept=".pdf,.jpg,.jpeg,.png" 
                                class="hidden"
                                onchange="handleFileSelect(this, 'docs_1_preview')">
                        <label for="docs_1" class="cursor-pointer">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-600">Drop files here or click to upload.</p>
                                <p id="docs_1_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                            </div>
                        </label>
                    </div>
                    <!-- <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p> -->
                    @if($institution->docs_1) <p class="text-sm text-gray-500 mt-2">
                    File tersedia: <a href="{{ asset($institution->docs_1) }}" download class="text-blue-600 hover:underline">
                    Download </a> </p>
                    @else <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    @endif
                </div>

                <!-- AD/ART -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        AD/ART <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" 
                                name="docs_2" 
                                id="docs_2" 
                                accept=".pdf,.jpg,.jpeg,.png" 
                                class="hidden"
                                onchange="handleFileSelect(this, 'docs_2_preview')">
                        <label for="docs_2" class="cursor-pointer">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-600">Drop files here or click to upload.</p>
                                <p id="docs_2_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                            </div>
                        </label>
                    </div>
                    <!-- <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p> -->
                    @if($institution->docs_2) <p class="text-sm text-gray-500 mt-2">
                    File tersedia: <a href="{{ asset($institution->docs_2) }}" download class="text-blue-600 hover:underline">
                    Download </a> </p>
                    @else <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    @endif
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
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white" name="province" id="province" required>
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
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white" name="city" id="city" required>
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
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white" 
                                name="district" id="district" required>
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
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white" name="village" id="village" required>
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
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" name="institution_full_address" id="institution_full_address">{{ old('institution_full_address', $institution->institution_full_address) }}</textarea>
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
                                name="photo_1" 
                                id="photo_1" 
                                accept=".jpg,.jpeg,.png" 
                                class="hidden"
                                onchange="handleFileSelect(this, 'photo_1_preview')">
                        <label for="photo_1" class="cursor-pointer">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-600">Drop files here or click to upload.</p>
                                <p id="photo_1_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                            </div>
                        </label>
                    </div>
                    <!-- <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p> -->
                    @if($institution->photo_1) <p class="text-sm text-gray-500 mt-2">
                    File tersedia: <a href="{{ asset($institution->photo_1) }}" download class="text-blue-600 hover:underline">
                    Download </a> </p>
                    @else <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    @endif
                </div>

                <!-- Foto Gedung Depan -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Foto Gedung Depan <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" 
                                name="photo_2" 
                                id="photo_2" 
                                accept=".jpg,.jpeg,.png" 
                                class="hidden"
                                onchange="handleFileSelect(this, 'photo_2_preview')">
                        <label for="photo_2" class="cursor-pointer">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-600">Drop files here or click to upload.</p>
                                <p id="photo_2_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                            </div>
                        </label>
                    </div>
                    <!-- <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p> -->
                    @if($institution->photo_2) <p class="text-sm text-gray-500 mt-2">
                    File tersedia: <a href="{{ asset($institution->photo_2) }}" download class="text-blue-600 hover:underline">
                    Download </a> </p>
                    @else <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    @endif
                </div>

                <!-- Foto Gedung Samping -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Foto Gedung Samping <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <input type="file" 
                                name="photo_3" 
                                id="photo_3" 
                                accept=".jpg,.jpeg,.png" 
                                class="hidden"
                                onchange="handleFileSelect(this, 'photo_3_preview')">
                        <label for="photo_3" class="cursor-pointer">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-600">Drop files here or click to upload.</p>
                                <p id="photo_3_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                            </div>
                        </label>
                    </div>
                    <!-- <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p> -->
                    @if($institution->photo_3) <p class="text-sm text-gray-500 mt-2">
                    File tersedia: <a href="{{ asset($institution->photo_3) }}" download class="text-blue-600 hover:underline">
                    Download </a> </p>
                    @else <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    @endif
                </div>

                <!-- Tambahan Foto Sarpras (Opsional) -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Tambahan Foto Sarpras (Opsional)
                    </label>
                    <div class="relative">
                        <input type="file" 
                                name="photo_4" 
                                id="photo_4" 
                                accept=".jpg,.jpeg,.png" 
                                class="hidden"
                                onchange="handleFileSelect(this, 'photo_4_preview')">
                        <label for="photo_4" class="cursor-pointer">
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-600">Drop files here or click to upload.</p>
                                <p id="photo_4_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                            </div>
                        </label>
                    </div>
                    <!-- <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p> -->
                    @if($institution->photo_4) <p class="text-sm text-gray-500 mt-2">
                    File tersedia: <a href="{{ asset($institution->photo_4) }}" download class="text-blue-600 hover:underline">
                    Download </a> </p>
                    @else <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    @endif
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
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white" name="bank_name" id="bank_name">
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
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" name="bank_account" id="bank_account" value="{{ old('bank_account', $institution->bank_account) }}">
                </div>

                <!-- Cabang Bank -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Cabang Bank <span class="text-red-600">*</span>
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none bg-white" name="bank_province" id="bank_province">
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
                            name="docs_3" 
                            id="docs_3" 
                            accept=".pdf,.jpg,.jpeg,.png" 
                            class="hidden"
                            onchange="handleFileSelect(this, 'docs_3_preview')">
                    <label for="docs_3" class="cursor-pointer">
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600">Drop files here or click to upload.</p>
                            <p id="docs_3_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                        </div>
                    </label>
                </div>
                <!-- <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p> -->
                @if($institution->photo_4) <p class="text-sm text-gray-500 mt-2">
                File tersedia: <a href="{{ asset($institution->photo_4) }}" download class="text-blue-600 hover:underline">
                Download </a> </p>
                @else <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end space-x-4 pt-4">
                <button type="button" 
                        onclick="window.location='{{ route('user.dashboard') }}'" 
                        class="px-6 py-2 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                    Batalkan
                </button>

                <button type="submit" id="button_submit"
                        class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    Simpan Draft
                </button>

            </div>
        </div>
    </div>
</div>
</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#established_date", {
            dateFormat: "Y-m-d",
            allowInput: true
        });
    });

    $(document).ready(function() {
        $("#institution_phone").on("input", function() {
            let val = $(this).val();

            val = val.replace(/\D/g, '');

            if (val.length > 0 && val[0] !== '0') {
                val = '0' + val.substring(1);
            }

            $(this).val(val);
        });

        function checkFormStatus() {
            let fields = [
                'pic_name', 
                'institution_name', 
                'institution_head_name',
                'organizing_body_name', 
                'institution_phone', 
                'established_date',
                'organizing_body_address',
                'docs_1', 
                'docs_2',
                'province', 
                'city', 
                'district', 
                'village', 
                'institution_full_address',
                'photo_1', 
                'photo_2', 
                'photo_3', 
                // 'photo_4',
                'bank_name', 
                'bank_account', 
                'bank_province', 
                'docs_3'
            ];

            let allFilled = true;

            fields.forEach(function(name) {
                let field = $(`[name="${name}"]`);
                
                if (field.length === 0) return;
                
                if (field.attr('type') === 'file') {
                    let hiddenVal = $(`#${name}_hidden`).val() || '';
                    if (field[0].files.length === 0 && hiddenVal === '') {
                        allFilled = false;
                    }
                } else {
                    if (field.val() === null || field.val().trim() === '') {
                        allFilled = false;
                    }
                }
            });

            if (allFilled) {
                $('#button_submit').text('Simpan');
            } else {
                $('#button_submit').text('Simpan Draft');
            }
        }

        checkFormStatus();

        $('input, select, textarea').on('input change', function() {
            checkFormStatus();
        });
    });
</script>

<script>
    $(document).ready(function() { 
        let selectedProvince = $("#selected_province").val();
        let selectedCity = $("#selected_city").val();
        let selectedDistrict = $("#selected_district").val();
        let selectedVillage = $("#selected_village").val();

        loadProvinces();

        function loadProvinces() {
            $.getJSON("/api/provinces", function(response) {
                $("#province").html('<option value="">Pilih Provinsi</option>');
                $.each(response.data, function(index, item) {
                    let value = `${item.code}|${item.name}`;
                    let selected = value === selectedProvince ? "selected" : "";
                    $("#province").append(`<option value="${value}" ${selected}>${item.name}</option>`);
                });

                if (selectedProvince) $("#province").trigger("change");
            });
        }

        $("#province").on("change", function() {
            let val = $(this).val();
            let id = val ? val.split('|')[0] : '';
            let name = val ? val.split('|')[1] : '';
            $("#selected_province").val(val);
            $("#selected_province_name").val(name);

            selectedCity = $("#selected_city").val();
            $("#city").html('<option value="">Loading...</option>');
            $("#district").html('<option value="">Pilih Kecamatan</option>');
            $("#village").html('<option value="">Pilih Kelurahan</option>');

            if (!id) {
                $("#city").html('<option value="">Pilih Kabupaten</option>');
                return;
            }

            $.getJSON(`/api/regencies/${id}`, function(response) {
                $("#city").html('<option value="">Pilih Kabupaten</option>');
                $.each(response.data, function(index, item) {
                    let value = `${item.code}|${item.name}`;
                    let selected = value === selectedCity ? "selected" : "";
                    $("#city").append(`<option value="${value}" ${selected}>${item.name}</option>`);
                });
                if (selectedCity) $("#city").trigger("change");
            });
        });

        $("#city").on("change", function() {
            let val = $(this).val();
            let id = val ? val.split('|')[0] : '';
            let name = val ? val.split('|')[1] : '';
            $("#selected_city").val(val);
            $("#selected_city_name").val(name);

            selectedDistrict = $("#selected_district").val();
            $("#district").html('<option value="">Loading...</option>');
            $("#village").html('<option value="">Pilih Kelurahan</option>');

            if (!id) {
                $("#district").html('<option value="">Pilih Kecamatan</option>');
                return;
            }

            $.getJSON(`/api/districts/${id}`, function(response) {
                $("#district").html('<option value="">Pilih Kecamatan</option>');
                $.each(response.data, function(index, item) {
                    let value = `${item.code}|${item.name}`;
                    let selected = value === selectedDistrict ? "selected" : "";
                    $("#district").append(`<option value="${value}" ${selected}>${item.name}</option>`);
                });
                if (selectedDistrict) $("#district").trigger("change");
            });
        });

        $("#district").on("change", function() {
            let val = $(this).val();
            let id = val ? val.split('|')[0] : '';
            let name = val ? val.split('|')[1] : '';
            $("#selected_district").val(val);
            $("#selected_district_name").val(name);

            selectedVillage = $("#selected_village").val();
            console.log(selectedVillage);
            $("#village").html('<option value="">Loading...</option>');

            if (!id) {
                $("#village").html('<option value="">Pilih Kelurahan</option>');
                return;
            }

            $.getJSON(`/api/villages/${id}`, function(response) {
                $("#village").html('<option value="">Pilih Kelurahan</option>');
                $.each(response.data, function(index, item) {
                    let value = `${item.code}|${item.name}`;
                    let selected = value === selectedVillage ? "selected" : "";
                    $("#village").append(`<option value="${value}" ${selected}>${item.name}</option>`);
                });
            });
        });

        $("#village").on("change", function() {
            let val = $(this).val();
            let name = val ? val.split('|')[1] : '';
            $("#selected_village").val(val);
            $("#selected_village_name").val(name);
        });
    });
</script>

<script>
    const banks = [
        { code: "BCA", name: "Bank Central Asia (BCA)" },
        { code: "BRI", name: "Bank Rakyat Indonesia (BRI)" },
        { code: "BNI", name: "Bank Negara Indonesia (BNI)" },
        { code: "MANDIRI", name: "Bank Mandiri" },
        { code: "BTN", name: "Bank Tabungan Negara (BTN)" },
        { code: "BSI", name: "Bank Syariah Indonesia (BSI)" }
    ];
    
    $(document).ready(function() {
        const selectedBank = "{{ $institution->bank_name ?? '' }}";
        const selectedBranch = "{{ $institution->bank_province ?? '' }}";

        $("#bank_name").html(`<option value="">Pilih Bank</option>`);
        banks.forEach(bank => {
            let selected = String(bank.code) === String(selectedBank) ? "selected" : "";
            $("#bank_name").append(`<option value="${bank.code}" ${selected}>${bank.name}</option>`);
        });

        $.getJSON("/api/provinces", function (response) {
            $("#bank_province").html('<option value="">Pilih Cabang (Provinsi)</option>');

            $.each(response.data, function (index, prov) {
                let selected = String(prov.code) === String(selectedBranch) ? "selected" : "";
                $("#bank_province").append(
                    `<option value="${prov.code}" ${selected}>${prov.name}</option>`
                );
            });
        });
    });


    function handleFileSelect(input, previewId) {
        const file = input.files[0];
        if (!file) return;

        const $preview = $("#" + previewId);

        $preview.removeClass("hidden");
        $preview.text(file.name);
    }
</script>

@endsection