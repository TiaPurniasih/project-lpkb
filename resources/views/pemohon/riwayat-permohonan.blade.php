<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengajuan Izin - SIOPKB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen ">
    @include('components.pemohon-header')

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1">
        <!-- Page Header with Breadcrumbs -->
        <div class="flex justify-between items-center mb-8 flex-shrink-0">
            <h1 class="text-3xl font-bold text-gray-900 flex-shrink-0">Riwayat Pengajuan Izin</h1>
            <div class="flex items-center text-sm text-gray-500">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <a href="{{ route('pemohon.dashboard') }}" class="hover:text-gray-700">Home</a>
                <span class="mx-2">></span>
                <span>Riwayat Pengajuan Izin</span>
            </div>
        </div>

        <!-- Riwayat Card -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm">
            <div class="px-6 py-5 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900">Riwayat Pengajuan Izin</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-[#f7f9fb] text-sm text-gray-500">
                        <tr>
                            <th class="px-6 py-4 text-left font-medium">No</th>
                            <th class="px-6 py-4 text-left font-medium">Tanggal Pengajuan</th>
                            <th class="px-6 py-4 text-left font-medium">Jenis Pendidikan</th>
                            <th class="px-6 py-4 text-left font-medium">Jalur</th>
                            <th class="px-6 py-4 text-left font-medium">Status</th>
                            <th class="px-6 py-4 text-left font-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-gray-100 text-gray-700">
                            <td class="px-6 py-6">1.</td>
                            <td class="px-6 py-6">5 September 2025</td>
                            <td class="px-6 py-6">Mula Dhammasekha</td>
                            <td class="px-6 py-6">Formal</td>
                            <td class="px-6 py-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500 text-white">
                                    Disetujui Pusat
                                </span>
                            </td>
                            <td class="px-6 py-6">
                                <a href="{{ route('pemohon.detail-permohonan') }}" class="inline-flex w-10 h-10 rounded-full border border-gray-200 items-center justify-center hover:bg-gray-50">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>

</html>

