@extends('preview.admin-pusat.layouts.app')

@section('title', 'Riwayat Pengajuan Izin')

@section('content')
    @php
        $histories = [
            ['name' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Selesai'],
            ['name' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Selesai'],
            ['name' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Ditolak'],
            ['name' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Ditolak'],
            ['name' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Ditolak'],
            ['name' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Selesai'],
            ['name' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Selesai'],
            ['name' => 'SMP Muda Maitri', 'jenis' => 'Formal', 'jalur' => 'Muda Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Selesai'],
            ['name' => 'SMP Muda Maitri', 'jenis' => 'Formal', 'jalur' => 'Muda Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Selesai'],
            ['name' => 'Vihara Bodhi', 'jenis' => 'Formal', 'jalur' => 'Nawa Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Selesai'],
            ['name' => 'SMP Muda Maitri', 'jenis' => 'Formal', 'jalur' => 'Muda Dhammasekha', 'tanggal' => '10 Agustus 2025', 'status' => 'Selesai'],
        ];

        $statusColors = [
            'Selesai' => 'bg-[#E5F9EE] text-[#1C9A5A]',
            'Ditolak' => 'bg-[#FDECEC] text-[#E04B3D]',
        ];
    @endphp

    <section class="space-y-6">
        <header>
            <p class="text-sm uppercase tracking-[0.2em] text-gray-400">Pengajuan Perizinan</p>
            <h1 class="text-2xl font-semibold text-gray-900">Riwayat Pengajuan Izin</h1>
        </header>

        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                <div>
                    <p class="text-sm font-semibold text-gray-900">List Pengajuan Izin</p>
                </div>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100 text-left text-sm text-gray-600">
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
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($histories as $index => $history)
                            <tr>
                                <td class="py-4 font-semibold">
                                    <a href="{{ route('admin-pusat.pengajuan-perizinan.show', ['submission' => $index + 1]) }}"
                                        class="text-[#1D4ED8] hover:text-[#EE4D37]">
                                        {{ $index + 1 }}.
                                    </a>
                                </td>
                                <td class="py-4">
                                    <a href="{{ route('admin-pusat.pengajuan-perizinan.show', ['submission' => $index + 1]) }}"
                                        class="font-semibold text-gray-900 hover:text-[#EE4D37]">
                                        {{ $history['name'] }}
                                    </a>
                                </td>
                                <td class="py-4">{{ $history['jenis'] }}</td>
                                <td class="py-4">{{ $history['jalur'] }}</td>
                                <td class="py-4">{{ $history['tanggal'] }}</td>
                                <td class="py-4">
                                    <span
                                        class="inline-flex rounded-full px-4 py-1 text-xs font-semibold {{ $statusColors[$history['status']] ?? 'bg-gray-100 text-gray-600' }}">
                                        {{ $history['status'] }}
                                    </span>
                                </td>
                                <td class="py-4 text-center">
                                    <a href="{{ route('admin-pusat.pengajuan-perizinan.show', ['submission' => $index + 1]) }}"
                                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 text-gray-500 transition hover:border-[#EE4D37] hover:text-[#EE4D37]">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="3" />
                                            <path d="M2.5 12s3.5-6.5 9.5-6.5 9.5 6.5 9.5 6.5-3.5 6.5-9.5 6.5-9.5-6.5-9.5-6.5Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex flex-wrap items-center justify-between gap-4 border-t border-gray-100 pt-4 text-sm text-gray-500">
                <p>Showing 10 of 512 Results</p>
                <div class="flex items-center gap-2">
                    <button type="button" class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-200 text-gray-400">
                        –
                    </button>
                    <span class="flex h-8 min-w-[36px] items-center justify-center rounded-full bg-[#EE4D37] px-3 text-sm font-semibold text-white">1</span>
                    <button type="button" class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-200 text-gray-400">
                        +
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

