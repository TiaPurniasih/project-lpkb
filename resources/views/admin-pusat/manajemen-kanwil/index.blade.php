@extends('admin-pusat.layouts.app')

@section('title', 'Manajemen Kanwil')

@section('content')
    @php
        $wilayahList = [
            [
                'no' => 1,
                'nama' => 'Kanwil Jawa Barat',
                'provinsi' => 'Jawa Barat',
                'email' => 'kanwil.jabar@kemenag.go.id',
                'status' => 'Aktif',
            ],
            [
                'no' => 2,
                'nama' => 'Kanwil Jawa Barat',
                'provinsi' => 'Jawa Tengah',
                'email' => 'kanwil.jateng@kemenag.go.id',
                'status' => 'Non-Aktif',
            ],
        ];

        $statusStyles = [
            'Aktif' => 'bg-[#E5F9EE] text-[#1C9A5A]',
            'Non-Aktif' => 'bg-[#FEECEC] text-[#E03131]',
        ];
    @endphp

    <section class="space-y-6">
        <header class="space-y-2">
            <h1 class="text-2xl font-semibold text-gray-900">Manajemen Kanwil</h1>
        </header>

        <div class="rounded-3xl bg-white p-6 shadow-sm space-y-6">
            <div class="flex flex-wrap items-end gap-3 border-b border-gray-100 pb-6">
                <label class="flex-1">
                    <span class="mb-2 block text-xs font-semibold uppercase tracking-wide text-gray-500">Cari nama kanwil</span>
                    <div class="flex items-center gap-2 rounded-2xl border border-gray-200 bg-white px-4 py-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="search" placeholder="Cari nama kanwil" class="w-full border-none bg-transparent text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-0" />
                    </div>
                </label>

                <a href="{{ route('admin-pusat.manajemen-kanwil.create') }}"
                    class="inline-flex items-center justify-center rounded-2xl bg-[#EE4D37] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#d24432]">
                    + Tambah Kanwil
                </a>
            </div>

            <div class="space-y-4">
                <div>
                    <p class="text-lg font-semibold text-gray-900">List Kantor Wilayah</p>
                    <p class="text-sm text-gray-500">Perbarui data kanwil dan kelola akses mereka.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm text-gray-700">
                        <thead>
                            <tr class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                <th class="py-3 pr-3">No</th>
                                <th class="py-3 pr-3">Nama Kanwil</th>
                                <th class="py-3 pr-3">Provinsi</th>
                                <th class="py-3 pr-3">Email</th>
                                <th class="py-3 pr-3">Status</th>
                                <th class="py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($wilayahList as $row)
                                <tr class="transition hover:bg-gray-50">
                                    <td class="py-3 pr-3 font-semibold text-[#1D4ED8]">{{ $row['no'] }}.</td>
                                    <td class="py-3 pr-3">{{ $row['nama'] }}</td>
                                    <td class="py-3 pr-3">{{ $row['provinsi'] }}</td>
                                    <td class="py-3 pr-3">{{ $row['email'] }}</td>
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
                                                    <button type="button"
                                                        class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-[#EE4D37] transition hover:bg-[#FFF5F2]">
                                                        Edit Data
                                                    </button>
                                                    <button type="button"
                                                        class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50">
                                                        Nonaktifkan Akun
                                                    </button>
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
                        <button type="button"
                            class="flex h-9 min-w-[36px] items-center justify-center rounded-xl border border-gray-200 bg-[#EE4D37] text-sm font-semibold text-white">1</button>
                        <button type="button"
                            class="flex h-9 min-w-[36px] items-center justify-center rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600">2</button>
                        <button type="button"
                            class="flex h-9 min-w-[36px] items-center justify-center rounded-xl border border-gray-200 bg-white text-sm font-semibold text-gray-600">3</button>
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

