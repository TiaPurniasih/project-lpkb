<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mula Dhammasekha - Dokumen - SIOPKB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    @include('components.pemohon-header')

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header with Breadcrumbs -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Mula Dhammasekha</h1>
            <div class="flex items-center text-sm text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <a href="{{ route('pemohon.dashboard') }}" class="hover:text-gray-700">Home</a>
                <span class="mx-2">></span>
                <a href="{{ route('pengajuan-izin') }}" class="hover:text-gray-700">Pengajuan Perizinan</a>
                <span class="mx-2">></span>
                <a href="{{ route('mula-dhammasekha') }}" class="hover:text-gray-700">Mula Dhammasekha</a>
                <span class="mx-2">></span>
                <span>Dokumen</span>
            </div>
        </div>

        <!-- Section: Dokumen -->
        <div class="mb-8">
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Dokumen</h2>
                
                <div class="space-y-6">
                    <!-- Surat Permohonan Pengajuan Izin -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Surat Permohonan Pengajuan Izin <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="surat_permohonan" 
                                   id="surat_permohonan" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'surat_permohonan_preview')">
                            <label for="surat_permohonan" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="surat_permohonan_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- SK Pendirian Mula Dhammasekha oleh Badan Penyelenggara -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            SK Pendirian Mula Dhammasekha oleh Badan Penyelenggara <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="sk_pendirian" 
                                   id="sk_pendirian" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'sk_pendirian_preview')">
                            <label for="sk_pendirian" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="sk_pendirian_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- SK Pengurus tentang tanggal pendirian -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            SK Pengurus tentang tanggal pendirian <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="sk_pengurus" 
                                   id="sk_pengurus" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'sk_pengurus_preview')">
                            <label for="sk_pengurus" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="sk_pengurus_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- SK Pengangkatan Kepala Sekolah + CV + Ijazah terakhir -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            SK Pengangkatan Kepala Sekolah + CV + Ijazah terakhir <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="sk_kepala_sekolah" 
                                   id="sk_kepala_sekolah" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'sk_kepala_sekolah_preview')">
                            <label for="sk_kepala_sekolah" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="sk_kepala_sekolah_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- Daftar Calon Pendidik + CV + Ijazah terakhir -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Daftar Calon Pendidik + CV + Ijazah terakhir <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="daftar_pendidik" 
                                   id="daftar_pendidik" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'daftar_pendidik_preview')">
                            <label for="daftar_pendidik" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="daftar_pendidik_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- Daftar Calon Tenaga Kependidikan + CV + Ijazah terakhir -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Daftar Calon Tenaga Kependidikan + CV + Ijazah terakhir <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="daftar_tenaga_kependidikan" 
                                   id="daftar_tenaga_kependidikan" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'daftar_tenaga_kependidikan_preview')">
                            <label for="daftar_tenaga_kependidikan" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="daftar_tenaga_kependidikan_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- Surat Pernyataan Kesanggupan Pembiayaan min. 1 tahun (bermaterai) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Surat Pernyataan Kesanggupan Pembiayaan min. 1 tahun (bermaterai) <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="surat_kesanggupan_pembiayaan" 
                                   id="surat_kesanggupan_pembiayaan" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'surat_kesanggupan_pembiayaan_preview')">
                            <label for="surat_kesanggupan_pembiayaan" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="surat_kesanggupan_pembiayaan_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- SK Struktur Manajemen & Personalia -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            SK Struktur Manajemen & Personalia <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="sk_struktur_manajemen" 
                                   id="sk_struktur_manajemen" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'sk_struktur_manajemen_preview')">
                            <label for="sk_struktur_manajemen" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="sk_struktur_manajemen_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- Dokumen Rencana Induk Pengembangan (RIP) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Dokumen Rencana Induk Pengembangan (RIP) <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="dokumen_rip" 
                                   id="dokumen_rip" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'dokumen_rip_preview')">
                            <label for="dokumen_rip" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="dokumen_rip_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- Foto Sarana & Prasarana -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Foto Sarana & Prasarana <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="foto_sarana_prasarana" 
                                   id="foto_sarana_prasarana" 
                                   accept=".jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'foto_sarana_prasarana_preview')">
                            <label for="foto_sarana_prasarana" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="foto_sarana_prasarana_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p>
                    </div>

                    <!-- Foto Gedung + Papan Nama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Foto Gedung + Papan Nama <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="foto_gedung_papan_nama" 
                                   id="foto_gedung_papan_nama" 
                                   accept=".jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'foto_gedung_papan_nama_preview')">
                            <label for="foto_gedung_papan_nama" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="foto_gedung_papan_nama_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">File (jpg, png) maks 2 MB</p>
                    </div>

                    <!-- Sertifikat/Surat Kepemilikan/Hibah Lahan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Sertifikat/Surat Kepemilikan/Hibah Lahan <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="sertifikat_lahan" 
                                   id="sertifikat_lahan" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'sertifikat_lahan_preview')">
                            <label for="sertifikat_lahan" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="sertifikat_lahan_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- Dokumen Studi Kelayakan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Dokumen Studi Kelayakan <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="dokumen_studi_kelayakan" 
                                   id="dokumen_studi_kelayakan" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'dokumen_studi_kelayakan_preview')">
                            <label for="dokumen_studi_kelayakan" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="dokumen_studi_kelayakan_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- Dokumen Kurikulum -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Dokumen Kurikulum <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="file" 
                                   name="dokumen_kurikulum" 
                                   id="dokumen_kurikulum" 
                                   accept=".pdf,.jpg,.jpeg,.png" 
                                   class="hidden"
                                   onchange="handleFileSelect(this, 'dokumen_kurikulum_preview')">
                            <label for="dokumen_kurikulum" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="dokumen_kurikulum_preview" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">file (pdf,jpg,png) maks 2 MB</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4 pt-4">
                        <a href="{{ route('mula-dhammasekha') }}" class="px-6 py-2 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                            Kembali
                        </a>
                        <button class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            Simpan Draft
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('components.pemohon-footer')

    <script>
        // Handle file selection
        function handleFileSelect(input, previewId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);
            
            if (file) {
                // Check file size (2 MB = 2 * 1024 * 1024 bytes)
                const maxSize = 2 * 1024 * 1024;
                if (file.size > maxSize) {
                    alert('File size exceeds 2 MB limit. Please choose a smaller file.');
                    input.value = '';
                    preview.classList.add('hidden');
                    return;
                }
                
                // Show file name
                preview.textContent = 'Selected: ' + file.name + ' (' + (file.size / 1024).toFixed(2) + ' KB)';
                preview.classList.remove('hidden');
            } else {
                preview.classList.add('hidden');
            }
        }

        // Add drag and drop functionality to all file upload areas
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = [
                'surat_permohonan', 'sk_pendirian', 'sk_pengurus', 'sk_kepala_sekolah',
                'daftar_pendidik', 'daftar_tenaga_kependidikan', 'surat_kesanggupan_pembiayaan',
                'sk_struktur_manajemen', 'dokumen_rip', 'foto_sarana_prasarana',
                'foto_gedung_papan_nama', 'sertifikat_lahan', 'dokumen_studi_kelayakan', 'dokumen_kurikulum'
            ];

            fileInputs.forEach(inputId => {
                const input = document.getElementById(inputId);
                if (input) {
                    const label = input.closest('.relative').querySelector('label[for="' + inputId + '"]');
                    const dropZone = label.querySelector('div');
                    const previewId = inputId + '_preview';

                    // Prevent default drag behaviors
                    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                        dropZone.addEventListener(eventName, preventDefaults, false);
                        document.body.addEventListener(eventName, preventDefaults, false);
                    });

                    function preventDefaults(e) {
                        e.preventDefault();
                        e.stopPropagation();
                    }

                    // Highlight drop zone when item is dragged over it
                    ['dragenter', 'dragover'].forEach(eventName => {
                        dropZone.addEventListener(eventName, () => {
                            dropZone.classList.add('border-red-400', 'bg-red-50');
                        }, false);
                    });

                    ['dragleave', 'drop'].forEach(eventName => {
                        dropZone.addEventListener(eventName, () => {
                            dropZone.classList.remove('border-red-400', 'bg-red-50');
                        }, false);
                    });

                    // Handle dropped files
                    dropZone.addEventListener('drop', (e) => {
                        const dt = e.dataTransfer;
                        const files = dt.files;

                        if (files.length > 0) {
                            input.files = files;
                            handleFileSelect(input, previewId);
                        }
                    }, false);
                }
            });
        });
    </script>
</body>
</html>

