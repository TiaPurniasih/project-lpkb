<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pemohon - SIOPKB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    @include('components.pemohon-header')

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1">
        <!-- Alert -->
        <div class="mb-8 bg-[#faeae8] border border-orange-300 rounded-lg p-4 flex items-start">
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-orange-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
            </div>
            <div class="ml-3 flex-1">
                <h3 class="text-sm font-semibold text-gray-900">Akun dalam Proses Verifikasi</h3>
                <p class="text-sm text-gray-700 mt-1">Data registrasi Anda sedang diperiksa oleh Kanwil Kementerian Agama. Anda belum dapat mengajukan permohonan izin sampai proses verifikasi selesai.</p>
            </div>
        </div>

        <!-- Section 1: Menu Utama Pemohon -->
        <div class="mb-16">
            <!-- Main Card Wrapper -->
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <!-- Section Title -->
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Menu Utama Pemohon</h2>

                <!-- Cards Row -->
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Card 1: Profil Lembaga -->
                    <div class="flex-1 rounded-lg border border-gray-200 p-8" style="min-width: 280px;">
                        <div class="flex items-start mb-4">
                            <div class="w-10 h-10 bg-[#faeae8] rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Profil Lembaga</h3>
                        <p class="text-sm text-gray-600 mb-6 leading-relaxed">Lengkapi data dan dokumen umum lembaga sebelum mengajukan izin.</p>
                        <div class="mt-auto">
                            <a href="{{ route('profil-lembaga') }}" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center" style="white-space: nowrap;">
                                Lengkapi Data
                                <svg class="w-4 h-4 ml-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Card 2: Pengajuan Izin -->
                    <div class="flex-1 rounded-lg border border-gray-200 p-8" style="min-width: 280px;">
                        <div class="flex items-start mb-4">
                            <div class="w-10 h-10 bg-[#faeae8] rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Pengajuan Izin</h3>
                        <p class="text-sm text-gray-600 mb-6 leading-relaxed">Ajukan izin operasional dengan memilih jalur dan mengunggah persyaratan.</p>
                        <div class="mt-auto">
                            <a href="{{ route('pengajuan-izin') }}" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center" style="white-space: nowrap;">
                                Ajukan Perizinan
                                <svg class="w-4 h-4 ml-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Card 3: Riwayat Permohonan -->
                    <div class="flex-1 rounded-lg border border-gray-200 p-8" style="min-width: 280px;">
                        <div class="flex items-start mb-4">
                            <div class="w-10 h-10 bg-[#faeae8] rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">Riwayat Permohonan</h3>
                        <p class="text-sm text-gray-600 mb-6 leading-relaxed">Lihat dan pantau status semua pengajuan izin Anda.</p>
                        <div class="mt-auto">
                            <a href="{{ route('pemohon.riwayat-pengajuan') }}" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center" style="white-space: nowrap;">
                                Riwayat Perizinan
                                <svg class="w-4 h-4 ml-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Section 2: Riwayat Pengajuan Izin -->
        <div>
            <!-- Main Card Wrapper -->
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                <!-- Section Title -->
                <div class="px-6 pt-6 pb-4 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900">Riwayat Pengajuan Izin</h2>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengajuan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Pendidikan</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jalur</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Empty state - no rows shown -->
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer with Pagination -->
                <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Showing 5 of 25 Results
                    </div>
                    <div class="flex items-center space-x-2">
                        <button disabled class="px-3 py-1.5 bg-gray-100 text-gray-400 rounded text-sm font-medium cursor-not-allowed">
                            ←
                        </button>
                        <button class="px-3 py-1.5 bg-red-600 text-white rounded text-sm font-medium">
                            1
                        </button>
                        <button disabled class="px-3 py-1.5 bg-gray-100 text-gray-400 rounded text-sm font-medium cursor-not-allowed">
                            →
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('components.pemohon-footer')
</body>
</html>
