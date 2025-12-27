@extends('preview.admin-pusat.layouts.app')

@section('title', 'List Pengajuan Izin')

@section('content')
    @php
        $submissions = [
            ['no' => 1, 'name' => 'Vihara Bodhi', 'jenis' => 'Mula Dhammasekha', 'jalur' => 'Formal', 'tanggal' => '10 Agustus 2025', 'status' => 'Menunggu'],
            ['no' => 2, 'name' => 'Dhammasekha', 'jenis' => 'Sikkhapana', 'jalur' => 'Nonformal', 'tanggal' => '10 Agustus 2025', 'status' => 'Menunggu'],
            ['no' => 3, 'name' => 'Dhammasekha', 'jenis' => 'Sikkhapana', 'jalur' => 'Nonformal', 'tanggal' => '10 Agustus 2025', 'status' => 'Menunggu'],
            ['no' => 4, 'name' => 'Dhammasekha', 'jenis' => 'Sikkhapana', 'jalur' => 'Nonformal', 'tanggal' => '10 Agustus 2025', 'status' => 'Ditolak'],
            ['no' => 5, 'name' => 'Dhammasekha', 'jenis' => 'Sikkhapana', 'jalur' => 'Nonformal', 'tanggal' => '10 Agustus 2025', 'status' => 'Selesai'],
        ];
    @endphp

    <section class="space-y-6">
        <header>
            <p class="text-sm uppercase tracking-[0.2em] text-gray-400">Pengajuan Perizinan</p>
            <h1 class="text-2xl font-semibold text-gray-900">List Pengajuan Izin</h1>
        </header>

        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <div class="flex flex-wrap items-end gap-3 border-b border-gray-100 pb-6">
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

            <div class="space-y-4">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="text-lg font-semibold text-gray-900">List Pengajuan Izin</p>
                        <p class="text-sm text-gray-500">Kelola pengajuan perizinan lembaga pendidikan.</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100 text-left text-sm">
                    <thead>
                        <tr class="text-xs font-semibold uppercase text-gray-400">
                            <th class="py-3">No</th>
                            <th class="py-3">Nama Lembaga</th>
                            <th class="py-3">Jenis Lembaga</th>
                            <th class="py-3">Jalur Pendidikan</th>
                            <th class="py-3">Tgl Pengajuan</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-600">
                        @foreach ($submissions as $submission)
                            <tr class="hover:bg-gray-50">
                                <td class="py-4 font-semibold text-gray-900">{{ $submission['no'] }}.</td>
                                <td class="py-4 text-sm font-medium text-gray-900">{{ $submission['name'] }}</td>
                                <td class="py-4 text-sm">{{ $submission['jenis'] }}</td>
                                <td class="py-4 text-sm">{{ $submission['jalur'] }}</td>
                                <td class="py-4 text-sm">{{ $submission['tanggal'] }}</td>
                                <td class="py-4">
                                    @php
                                        $statusColor = match ($submission['status']) {
                                            'Menunggu' => 'bg-[#FFF1E7] text-[#F26B38]',
                                            'Ditolak' => 'bg-[#FDECEC] text-[#E54545]',
                                            'Selesai' => 'bg-[#E8F7EF] text-[#1C9A5A]',
                                            default => 'bg-gray-100 text-gray-600',
                                        };
                                    @endphp
                                    <span class="inline-flex rounded-full px-4 py-1 text-xs font-semibold {{ $statusColor }}">
                                        {{ $submission['status'] }}
                                    </span>
                                </td>
                                <td class="py-4 text-center">
                                    <a href="{{ route('admin-pusat.pengajuan-perizinan.show', ['submission' => $submission['no']]) }}"
                                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 text-gray-500 transition hover:border-[#EE4D37] hover:text-[#EE4D37]">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="3" />
                                            <path d="M2.5 12s3.5-6.5 9.5-6.5S21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-3 pt-4">
                    <p class="text-sm text-gray-500">Showing {{ count($submissions) }} results</p>
                    <div class="flex items-center gap-2">
                        <button type="button"
                            class="flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 text-gray-500 transition hover:bg-gray-50"
                            aria-label="Previous page">
                            &larr;
                        </button>
                        <button type="button" class="flex h-9 min-w-[36px] items-center justify-center rounded-xl border border-gray-200 bg-[#EE4D37] text-sm font-semibold text-white">1</button>
                        <button type="button" class="flex h-9 min-w-[36px] items-center justify-center rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600">2</button>
                        <button type="button"
                            class="flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 text-gray-500 transition hover:bg-gray-50"
                            aria-label="Next page">
                            &rarr;
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

