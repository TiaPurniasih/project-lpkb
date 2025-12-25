@extends('layouts.master_user')

@section('contents')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Detail</h1>
    <div class="flex items-center text-sm text-gray-500">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        <a href="{{ route('pemohon.dashboard') }}" class="hover:text-gray-700">Home</a>
        <span class="mx-2">></span>
        <a href="{{ route('pemohon.riwayat-pengajuan') }}" class="hover:text-gray-700">Riwayat Pengajuan Izin</a>
        <span class="mx-2">></span>
        <span>Detail</span>
    </div>
</div>

<div class="inline-flex border border-red-600 rounded-lg overflow-hidden mb-8" role="group">
    <button id="btn-profil" 
            onclick="switchTab('profil')" 
            class="px-6 py-2 bg-red-600 text-white font-medium border-r border-red-600 focus:outline-none">
        Profil Lembaga
    </button>
    <button id="btn-dokumen" 
            onclick="switchTab('dokumen')" 
            class="px-6 py-2 bg-white text-red-600 font-medium border-r border-red-600 focus:outline-none">
        Dokumen Persyaratan
    </button>
    <button id="btn-riwayat" 
            onclick="switchTab('riwayat')" 
            class="px-6 py-2 bg-white text-red-600 font-medium focus:outline-none">
        Riwayat
    </button>
</div>

<!-- Profil Lembaga Content -->
<div id="formal-cards">
    <!-- Approval Status Card -->
    <div class="mb-8 bg-white rounded-lg border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div>
                    <p class="text-sm font-medium text-gray-900">Disetujui 5 September 2025</p>
                </div>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500 text-white">
                    Disetujui Pusat
                </span>
            </div>
            <button class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Download Sertifikat
            </button>
        </div>
    </div>

    <!-- Form Card (Identitas Lembaga Details) -->
    <div class="mb-8 bg-white rounded-lg border border-gray-200 p-6">
        <div class="grid grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <!-- Nama Penanggung Jawab -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nama Penanggung Jawab
                    </label>
                    <input type="text" 
                            value="Alexandra Dewi" 
                            readonly
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                </div>

                <!-- Nama Lembaga Pendidikan -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nama Lembaga Pendidikan
                    </label>
                    <input type="text" 
                            value="Kelas Buddha Jakarta" 
                            readonly
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                </div>

                <!-- Nama Kepala Lembaga -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nama Kepala Lembaga
                    </label>
                    <input type="text" 
                            value="Alexandra Dewi" 
                            readonly
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                </div>

                <!-- Jalur Pendidikan -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Jalur Pendidikan
                    </label>
                    <input type="text" 
                            value="Formal" 
                            readonly
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Nama Badan Penyelenggara -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nama Badan Penyelenggara
                    </label>
                    <input type="text" 
                            value="Pendidikan Buddha Jakarta" 
                            readonly
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                </div>

                <!-- Nomor Telepon Lembaga -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Nomor Telepon Lembaga
                    </label>
                    <input type="text" 
                            value="089643816331" 
                            readonly
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                </div>

                <!-- Tanggal Berdiri -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Tanggal Berdiri
                    </label>
                    <div class="relative">
                        <input type="text" 
                                value="10 Januari 2004" 
                                readonly
                                class="w-full px-4 py-2.5 pr-10 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Jenis Pendidikan Buddha -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Jenis Pendidikan Buddha
                    </label>
                    <input type="text" 
                            value="Nava Dhammasekha" 
                            readonly
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                </div>
            </div>
        </div>
    </div>

    <!-- Dokumen Penyelenggara Card -->
    <div class="mb-8 bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Dokumen Penyelenggara</h2>
        
        <div class="space-y-6">
            <!-- Tanda Daftar Yayasan/Perkumpulan -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Tanda Daftar Yayasan/Perkumpulan dari Kementerian Agama
                </label>
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-sm text-gray-900">Akta Notaris.pdf</span>
                </div>
                <p class="text-sm text-gray-500 mt-2">file (jpg,png) maks 2 MB</p>
            </div>

            <!-- AD/ART -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    AD/ART
                </label>
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-sm text-gray-900">AD/ART.pdf</span>
                </div>
                <p class="text-sm text-gray-500 mt-2">file (jpg,png) maks 2 MB</p>
            </div>
        </div>
    </div>

    <!-- Alamat Lembaga Card -->
    <div class="mb-8 bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Alamat Lembaga</h2>
        
        <div class="space-y-6">
            <!-- Two Column Layout: Provinsi, Kabupaten, Kecamatan, Kelurahan -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Provinsi -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Provinsi
                        </label>
                        <input type="text" 
                                value="DKI Jakarta" 
                                readonly
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                    </div>

                    <!-- Kecamatan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Kecamatan
                        </label>
                        <input type="text" 
                                value="Jakarta Pusat" 
                                readonly
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Kabupaten -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Kabupaten
                        </label>
                        <input type="text" 
                                value="Jakarta" 
                                readonly
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                    </div>

                    <!-- Kelurahan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Kelurahan
                        </label>
                        <input type="text" 
                                value="Kali Besar" 
                                readonly
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">
                    </div>
                </div>
            </div>

            <!-- Alamat Lengkap Lembaga -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Alamat Lengkap Lembaga
                </label>
                <textarea rows="3" 
                            readonly
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 cursor-not-allowed">Jl. Kali Besar Timur, Jakarta 11110 Indonesia</textarea>
            </div>

            <!-- Toggle Switch: Samakan dengan Alamat Badan Penyelenggara -->
            <div class="flex items-center space-x-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" checked class="sr-only peer" disabled>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                </label>
                <span class="text-sm font-medium text-gray-900">Samakan dengan Alamat Badan Penyelenggara</span>
            </div>
        </div>
    </div>
</div>

<!-- Dokumen Persyaratan Content -->
<div id="dokumen-content" class="hidden">
    <div class="text-center py-12 text-gray-500">
        <p>Dokumen Persyaratan content will be displayed here</p>
    </div>
</div>

<!-- Riwayat Content -->
<div id="riwayat-content" class="hidden">
    <div class="text-center py-12 text-gray-500">
        <p>Riwayat content will be displayed here</p>
    </div>
</div>
@endsection
