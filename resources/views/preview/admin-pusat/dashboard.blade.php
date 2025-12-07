@extends('admin-pusat.layouts.app')

@section('title', 'Dashboard Admin Pusat')

@section('content')
    @php
        $permits = [
            ['no' => 1, 'name' => 'Vihara Bodhi', 'education' => 'Mula Dhammasekha', 'type' => 'Formal', 'province' => 'Jawa Tengah', 'date' => '10 Agustus 2025', 'status' => 'Menunggu'],
            ['no' => 2, 'name' => 'Dhammasekha', 'education' => 'Sikkaphana', 'type' => 'Nonformal', 'province' => 'Jawa Tengah', 'date' => '10 Agustus 2025', 'status' => 'Menunggu'],
            ['no' => 3, 'name' => 'Dhammasekha', 'education' => 'Sikkaphana', 'type' => 'Nonformal', 'province' => 'Jawa Tengah', 'date' => '10 Agustus 2025', 'status' => 'Menunggu'],
            ['no' => 4, 'name' => 'Dhammasekha', 'education' => 'Sikkaphana', 'type' => 'Nonformal', 'province' => 'Jawa Tengah', 'date' => '10 Agustus 2025', 'status' => 'Menunggu'],
            ['no' => 5, 'name' => 'Dhammasekha', 'education' => 'Sikkaphana', 'type' => 'Nonformal', 'province' => 'Jawa Tengah', 'date' => '10 Agustus 2025', 'status' => 'Menunggu'],
        ];
    @endphp

    <!-- Stats Cards -->
    <div class="mb-8 grid grid-cols-4 gap-6">
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="mb-2 text-sm text-gray-600">Total Pengajuan</h3>
            <p class="text-4xl font-bold text-gray-800">230</p>
            <p class="mt-1 text-xs text-gray-500">Lembaga</p>
        </div>
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="mb-2 text-sm text-gray-600">Menunggu Verifikasi</h3>
            <p class="text-4xl font-bold text-gray-800">120</p>
            <p class="mt-1 text-xs text-gray-500">Lembaga</p>
        </div>
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="mb-2 text-sm text-gray-600">Ditolak</h3>
            <p class="text-4xl font-bold text-gray-800">30</p>
            <p class="mt-1 text-xs text-gray-500">Lembaga</p>
        </div>
        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="mb-2 text-sm text-gray-600">Selesai</h3>
            <p class="text-4xl font-bold text-gray-800">80</p>
            <p class="mt-1 text-xs text-gray-500">Lembaga</p>
        </div>
    </div>

    <!-- Recent Permits Section -->
    <div class="rounded-lg bg-white shadow-sm">
        <div class="border-b p-6">
            <div class="flex flex-wrap items-end gap-3">
                <label class="flex-1">
                    <span class="mb-2 block text-xs font-semibold uppercase tracking-wide text-gray-500">Cari nama lembaga</span>
                    <div class="flex items-center gap-2 rounded-2xl border border-gray-200 bg-white px-4 py-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="search" placeholder="Cari nama lembaga" class="w-full border-none bg-transparent text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-0" />
                    </div>
                </label>

                <label class="flex-1">
                    <span class="mb-2 block text-xs font-semibold uppercase tracking-wide text-gray-500">Provinsi</span>
                    <div class="relative">
                        <select class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-2.5 pr-10 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20 [&::-ms-expand]:hidden [-webkit-appearance:none] [-moz-appearance:none] [appearance:none]">
                            <option>Provinsi (All)</option>
                            <option>Jawa Tengah</option>
                            <option>Jawa Barat</option>
                            <option>Jawa Timur</option>
                        </select>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="pointer-events-none absolute inset-y-0 right-4 my-auto text-gray-400">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </label>

                <label class="flex-1">
                    <span class="mb-2 block text-xs font-semibold uppercase tracking-wide text-gray-500">Jenis Lembaga</span>
                    <div class="relative">
                        <select class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-2.5 pr-10 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20 [&::-ms-expand]:hidden [-webkit-appearance:none] [-moz-appearance:none] [appearance:none]">
                            <option>Jenis Lembaga (All)</option>
                            <option>Formal</option>
                            <option>Nonformal</option>
                        </select>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="pointer-events-none absolute inset-y-0 right-4 my-auto text-gray-400">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </label>

                <div class="flex items-end gap-3">
                    <span class="mb-2 block text-xs font-semibold uppercase tracking-wide text-transparent">Placeholder</span>
                    <div class="flex items-center gap-3">
                        <button type="button" class="text-sm font-semibold text-gray-500 hover:text-gray-900">Reset</button>
                        <button type="button"
                            class="inline-flex items-center gap-2 rounded-2xl bg-[#EE4D37] px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#d24432]">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                <line x1="4" y1="21" x2="4" y2="14"></line>
                                <line x1="10" y1="21" x2="10" y2="3"></line>
                                <line x1="16" y1="21" x2="16" y2="8"></line>
                                <line x1="22" y1="21" x2="22" y2="12"></line>
                            </svg>
                            Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="border-b bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase text-gray-600">No</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase text-gray-600">Nama Lembaga</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase text-gray-600">Jenis Pendidikan</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase text-gray-600">Jalur</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase text-gray-600">Provinsi</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase text-gray-600">Tgl Pengajuan</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase text-gray-600">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($permits as $permit)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $permit['no'] }}.</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $permit['name'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $permit['education'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $permit['type'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $permit['province'] }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $permit['date'] }}</td>
                            <td class="px-6 py-4">
                                <span class="rounded-full bg-orange-100 px-3 py-1 text-xs font-medium text-orange-600">
                                    {{ $permit['status'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-blue-500 hover:text-blue-700">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between border-t px-6 py-4">
            <p class="text-sm text-gray-600">Showing 5 of 5 Results</p>
            <div class="flex gap-2">
                <button class="rounded px-3 py-1 text-sm text-gray-500 hover:bg-gray-100">‹</button>
                <button class="rounded bg-red-500 px-3 py-1 text-sm text-white">1</button>
                <button class="rounded px-3 py-1 text-sm text-gray-500 hover:bg-gray-100">›</button>
            </div>
        </div>
    </div>
@endsection
