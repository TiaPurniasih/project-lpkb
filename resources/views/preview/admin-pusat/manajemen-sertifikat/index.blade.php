@extends('preview.admin-pusat.layouts.app')

@section('title', 'Manajemen Sertifikat')

@section('content')
    @php
        $certificates = [
            ['no' => 1, 'id' => 'IZN-2025-0012', 'nama' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '-', 'status' => 'Draft'],
            ['no' => 2, 'id' => 'IZN-2025-0012', 'nama' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '-', 'status' => 'Draft'],
            ['no' => 3, 'id' => 'IZN-2025-0012', 'nama' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '-', 'status' => 'Draft'],
            ['no' => 4, 'id' => 'IZN-2025-0012', 'nama' => 'Sikkha Vihara Paramita', 'jenis' => 'Non Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '10 Agustus 2025', 'status' => 'Final'],
            ['no' => 5, 'id' => 'IZN-2025-0012', 'nama' => 'Sikkha Vihara Paramita', 'jenis' => 'Non Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '10 Agustus 2025', 'status' => 'Final'],
            ['no' => 6, 'id' => 'IZN-2025-0012', 'nama' => 'Sikkha Vihara Paramita', 'jenis' => 'Non Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '10 Agustus 2025', 'status' => 'Final'],
            ['no' => 7, 'id' => 'IZN-2025-0012', 'nama' => 'Sikkha Vihara Paramita', 'jenis' => 'Non Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '10 Agustus 2025', 'status' => 'Final'],
            ['no' => 8, 'id' => 'IZN-2025-0012', 'nama' => 'Sikkha Vihara Paramita', 'jenis' => 'Non Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '10 Agustus 2025', 'status' => 'Final'],
            ['no' => 9, 'id' => 'IZN-2025-0012', 'nama' => 'Sikkha Vihara Paramita', 'jenis' => 'Non Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '10 Agustus 2025', 'status' => 'Final'],
            ['no' => 10, 'id' => 'IZN-2025-0012', 'nama' => 'Sikkha Vihara Paramita', 'jenis' => 'Non Formal', 'jalur' => 'Nawa Damasekha', 'terbit' => '10 Agustus 2025', 'status' => 'Final'],
        ];

        $statusStyles = [
            'Draft' => 'bg-gray-100 text-gray-600',
            'Final' => 'bg-[#E5F9EE] text-[#1C9A5A]',
        ];
    @endphp

    <section class="space-y-6" x-data="{ 
        uploadModalOpen: false,
        modalData: { nama: '', jenis: '', nomor: '' }
    }" @open-upload-modal.window="uploadModalOpen = true; modalData = $event.detail">
        <header class="space-y-2">
            <h1 class="text-2xl font-semibold text-gray-900">Manajemen Sertifikat</h1>
        </header>

        <div class="rounded-3xl bg-white p-6 shadow-sm space-y-6">
            <div
                class="flex flex-wrap items-end gap-3 border-b border-gray-100 pb-6">
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
                    <span class="mb-2 block text-xs font-semibold uppercase tracking-wide text-gray-500">Status</span>
                    <div class="relative">
                        <select class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-2.5 pr-10 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20 [&::-ms-expand]:hidden [-webkit-appearance:none] [-moz-appearance:none] [appearance:none]">
                            <option>Status (All)</option>
                            <option>Draft</option>
                            <option>Final</option>
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
                            <option>Non Formal</option>
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
                        <p class="text-sm text-gray-500">Kelola draft dan sertifikat final yang siap diunduh.</p>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm text-gray-700">
                        <thead>
                            <tr class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                <th class="py-3 pr-3">No</th>
                                <th class="py-3 pr-3">ID Pengajuan</th>
                                <th class="py-3 pr-3">Nama Lembaga</th>
                                <th class="py-3 pr-3">Jenis Lembaga</th>
                                <th class="py-3 pr-3">Jalur Pendidikan</th>
                                <th class="py-3 pr-3">Tgl Terbit</th>
                                <th class="py-3 pr-3">Status</th>
                                <th class="py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($certificates as $row)
                                <tr class="transition hover:bg-gray-50">
                                    <td class="py-3 pr-3 font-semibold text-[#1D4ED8]">{{ $row['no'] }}.</td>
                                    <td class="py-3 pr-3">{{ $row['id'] }}</td>
                                    <td class="py-3 pr-3">{{ $row['nama'] }}</td>
                                    <td class="py-3 pr-3">{{ $row['jenis'] }}</td>
                                    <td class="py-3 pr-3">{{ $row['jalur'] }}</td>
                                    <td class="py-3 pr-3 text-gray-600">{{ $row['terbit'] }}</td>
                                    <td class="py-3 pr-3">
                                        <span class="inline-flex rounded-full px-4 py-1 text-xs font-semibold {{ $statusStyles[$row['status']] ?? 'bg-gray-100 text-gray-600' }}">
                                            {{ $row['status'] }}
                                        </span>
                                    </td>
                                    <td class="py-3">
                                        <div class="flex justify-center">
                                            <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                                                <button type="button" @click="open = !open"
                                                    class="flex h-10 w-10 items-center justify-center rounded-2xl border border-gray-200 text-gray-600 transition hover:border-[#EE4D37] hover:text-[#EE4D37]">
                                                    <span class="sr-only">Buka menu tindakan</span>
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg>
                                                </button>
                                                <div x-cloak x-show="open"
                                                    class="absolute right-0 z-10 mt-3 w-48 rounded-2xl border border-gray-100 bg-white p-2 text-left shadow-lg">
                                                    @if($row['status'] === 'Draft')
                                                        <button type="button"
                                                            class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-[#EE4D37] transition hover:bg-[#FFF5F2]">
                                                            Download Draft
                                                        </button>
                                                        <button type="button"
                                                            @click="open = false; $dispatch('open-upload-modal', { nama: '{{ $row['nama'] }}', jenis: '{{ $row['jenis'] }} - {{ $row['jalur'] }}', nomor: '{{ $row['id'] }}' })"
                                                            class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50">
                                                            Upload Sertifikat
                                                        </button>
                                                    @else
                                                        <button type="button"
                                                            class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-[#EE4D37] transition hover:bg-[#FFF5F2]">
                                                            Download Sertifikat
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-3 pt-4">
                    <p class="text-sm text-gray-500">Showing 10 of 512 Results</p>
                    <div class="flex items-center gap-2">
                        <button type="button"
                            class="flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 text-gray-500 transition hover:bg-gray-50"
                            aria-label="Previous page">
                            &larr;
                        </button>
                        <button type="button" class="flex h-9 min-w-[36px] items-center justify-center rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600">1</button>
                        <button type="button" class="flex h-9 min-w-[36px] items-center justify-center rounded-xl border border-gray-200 bg-[#EE4D37] text-sm font-semibold text-white">2</button>
                        <button type="button" class="flex h-9 min-w-[36px] items-center justify-center rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600">3</button>
                        <button type="button"
                            class="flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 text-gray-500 transition hover:bg-gray-50"
                            aria-label="Next page">
                            &rarr;
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Certificate Modal -->
        <div x-cloak x-show="uploadModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" @click.self="uploadModalOpen = false"
            @keydown.escape.window="uploadModalOpen = false">
            <div x-show="uploadModalOpen" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full max-w-2xl rounded-3xl bg-white p-8 shadow-xl">
                <!-- Close Button -->
                <button type="button" @click="uploadModalOpen = false"
                    class="absolute right-6 top-6 text-gray-400 transition hover:text-gray-600">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>

                <!-- Modal Title -->
                <h2 class="mb-6 text-2xl font-semibold text-gray-900">Unggah Sertifikat</h2>

                <!-- Read-only Information -->
                <div class="mb-6 space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <span class="text-sm font-medium text-gray-500">Nama Lembaga</span>
                        <span class="text-sm font-semibold text-gray-900" x-text="modalData.nama || '-'"></span>
                    </div>
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <span class="text-sm font-medium text-gray-500">Jenis Pendidikan</span>
                        <span class="text-sm font-semibold text-gray-900" x-text="modalData.jenis || '-'"></span>
                    </div>
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <span class="text-sm font-medium text-gray-500">Nomor Sertifikat</span>
                        <span class="text-sm font-semibold text-gray-900" x-text="modalData.nomor || '-'"></span>
                    </div>
                </div>

                <!-- File Upload Section -->
                <div class="mb-6">
                    <label class="mb-2 block text-sm font-medium text-gray-700">Unggah Sertifikat</label>
                    <label
                        class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 p-12 text-center transition hover:border-[#EE4D37] hover:bg-gray-100">
                        <input type="file" class="hidden" accept=".pdf,.jpg,.jpeg,.png" />
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="mb-3 text-gray-400">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <p class="text-sm font-medium text-gray-900">Drop files here or click to upload.</p>
                    </label>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-3">
                    <button type="button" @click="uploadModalOpen = false"
                        class="rounded-2xl border-2 border-[#EE4D37] bg-white px-6 py-2.5 text-sm font-semibold text-[#EE4D37] transition hover:bg-[#FFF5F2]">
                        Batalkan
                    </button>
                    <button type="button"
                        class="rounded-2xl bg-[#EE4D37] px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#d24432]">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

