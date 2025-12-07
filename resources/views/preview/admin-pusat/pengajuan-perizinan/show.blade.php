@extends('admin-pusat.layouts.app')

@section('title', 'Detail Pengajuan Izin')

@section('content')
    @php
        $submission = [
            'status_label' => 'Menunggu Kanwil',
            'status_date' => 'Disetujui 5 September 2025',
            'penanggung_jawab' => 'Alexandra Dewi',
            'badan_penyelenggara' => 'Pendidikan Buddha Jakarta',
            'nama_lembaga' => 'Kelas Buddha Jakarta',
            'telepon' => '089643016331',
            'kepala_lembaga' => 'Alexandra Dewi',
            'tanggal_berdiri' => '10 Januari 2004',
            'jalur_pendidikan' => 'Formal',
            'jenis_pendidikan' => 'Nava Dhammasekha',
            'alamat' => 'Jl. Kaji Besar Timur, Jakarta 11110 Indonesia',
        ];
        $historyRecords = [
            ['tanggal' => '13 Agustus 2025', 'pengguna' => 'Admin Pusat', 'keterangan' => '-', 'status' => 'Disetujui Pusat'],
            ['tanggal' => '12 Agustus 2025', 'pengguna' => 'Admin Pusat', 'keterangan' => '-', 'status' => 'Menunggu Pusat'],
            ['tanggal' => '11 Agustus 2025', 'pengguna' => 'Admin Kanwil', 'keterangan' => 'Foto Sarana Blur', 'status' => 'Revisi Kanwil'],
            ['tanggal' => '10 Agustus 2025', 'pengguna' => 'Pemohon', 'keterangan' => '-', 'status' => 'Menunggu Kanwil'],
        ];

        $statusBadgeClasses = [
            'Disetujui Pusat' => 'bg-[#E5F9EE] text-[#1C9A5A]',
            'Menunggu Pusat' => 'bg-[#FFF1E7] text-[#F26B38]',
            'Revisi Kanwil' => 'bg-[#E3F4FF] text-[#1980C3]',
            'Menunggu Kanwil' => 'bg-[#FFF6E4] text-[#D38A27]',
        ];
    @endphp

    <section x-data="{ tab: 'profil', actionOpen: false }" class="space-y-6">
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <span class="text-gray-400">List Pengajuan Izin</span>
            <svg width="12" height="12" viewBox="0 0 24 24" class="text-gray-300">
                <path d="m9 18 6-6-6-6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" fill="none" />
            </svg>
            <span class="text-gray-900 font-medium">Detail Pengajuan Izin</span>
        </div>

        <div class="flex flex-col gap-2">
            <h1 class="text-2xl font-semibold text-gray-900">Detail Pengajuan Izin</h1>
            <p class="text-sm text-gray-500">Tinjau informasi lengkap lembaga sebelum melakukan tindakan.</p>
        </div>

        <div class="flex flex-wrap gap-2">
            <button type="button" @click="tab = 'profil'"
                :class="tab === 'profil' ? 'bg-[#EE4D37] text-white' : 'bg-white text-gray-600 hover:bg-gray-50'"
                class="rounded-t-2xl px-6 py-3 text-sm font-semibold shadow-sm transition">
                Profil Lembaga
            </button>
            <button type="button" @click="tab = 'dokumen'"
                :class="tab === 'dokumen' ? 'bg-[#EE4D37] text-white' : 'bg-white text-gray-600 hover:bg-gray-50'"
                class="rounded-t-2xl px-6 py-3 text-sm font-semibold shadow-sm transition">
                Dokumen Persyaratan
            </button>
            <button type="button" @click="tab = 'riwayat'"
                :class="tab === 'riwayat' ? 'bg-[#EE4D37] text-white' : 'bg-white text-gray-600 hover:bg-gray-50'"
                class="rounded-t-2xl px-6 py-3 text-sm font-semibold shadow-sm transition">
                Riwayat
            </button>
        </div>

        <div class="rounded-3xl bg-white p-8 shadow-sm">
            <div x-show="tab === 'profil'" x-transition>
                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 pb-6">
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                        <span>{{ $submission['status_date'] }}</span>
                        <span class="inline-flex rounded-full bg-[#FFF1E7] px-4 py-1 text-xs font-semibold text-[#F26B38]">
                            {{ $submission['status_label'] }}
                        </span>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                            <button type="button" @click="open = !open"
                                class="inline-flex items-center gap-2 rounded-2xl border border-[#1C9A5A] px-5 py-2 text-sm font-semibold text-[#1C9A5A] transition hover:bg-[#E8F7EF]">
                                Action
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div x-cloak x-show="open"
                                class="absolute right-0 z-10 mt-3 w-44 rounded-2xl border border-gray-100 bg-white p-2 shadow-lg">
                                <button type="button"
                                    class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-[#EE4D37] transition hover:bg-[#FFF5F2]">
                                    Revisi
                                </button>
                                <button type="button"
                                    class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50">
                                    Tolak
                                </button>
                            </div>
                        </div>
                        <button type="button"
                            class="inline-flex items-center gap-2 rounded-2xl bg-[#1C9A5A] px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-[#168247]">
                            Setujui
                        </button>
                    </div>
                </div>

                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <div>
                        <p class="text-sm text-gray-500">Nama Penanggung Jawab</p>
                        <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                            {{ $submission['penanggung_jawab'] }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nama Badan Penyelenggara</p>
                        <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                            {{ $submission['badan_penyelenggara'] }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nama Lembaga Pendidikan</p>
                        <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                            {{ $submission['nama_lembaga'] }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nomor Telepon Lembaga</p>
                        <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                            {{ $submission['telepon'] }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nama Kepala Lembaga</p>
                        <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                            {{ $submission['kepala_lembaga'] }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Tanggal Berdiri</p>
                        <div class="mt-2 flex items-center justify-between rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3">
                            <span class="text-gray-900">{{ $submission['tanggal_berdiri'] }}</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" x2="16" y1="2" y2="6"></line>
                                <line x1="8" x2="8" y1="2" y2="6"></line>
                                <line x1="3" x2="21" y1="10" y2="10"></line>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Jalur Pendidikan</p>
                        <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                            {{ $submission['jalur_pendidikan'] }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Jenis Pendidikan Buddha</p>
                        <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                            {{ $submission['jenis_pendidikan'] }}
                        </p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Alamat Lengkap Badan Penyelenggara</p>
                        <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                            {{ $submission['alamat'] }}
                        </p>
                    </div>
                </div>

                <div class="mt-10 space-y-10">
                    <section class="space-y-8">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Dokumen Penyelenggara</h3>
                            <p class="mt-1 text-sm text-gray-500">Akta Notaris diganti dengan Tanda Daftar Yayasan/Perkumpulan dari
                                Kementerian Agama</p>
                            <div class="mt-4 flex items-center gap-3 rounded-2xl border border-gray-100 p-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#FFF5F2] text-[#EE4D37]">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Akta Notaris.pdf</p>
                                    <p class="text-xs text-gray-500">PDF • 1.2 MB</p>
                                </div>
                                <button type="button" class="text-sm font-semibold text-[#EE4D37]">Lihat</button>
                            </div>
                            <p class="mt-2 text-xs text-gray-400">Format file (pdf/png/jpg) maksimal 2 MB</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">AD/ART</h3>
                            <div class="mt-4 flex items-center gap-3 rounded-2xl border border-gray-100 p-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#FFF5F2] text-[#EE4D37]">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">AD-ART.pdf</p>
                                    <p class="text-xs text-gray-500">PDF • 960 KB</p>
                                </div>
                                <button type="button" class="text-sm font-semibold text-[#EE4D37]">Lihat</button>
                            </div>
                            <p class="mt-2 text-xs text-gray-400">Format file (pdf/png/jpg) maksimal 2 MB</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Alamat Lembaga</h3>
                            <div class="mt-4 grid gap-6 md:grid-cols-2">
                                <div>
                                    <p class="text-sm text-gray-500">Provinsi</p>
                                    <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">DKI
                                        Jakarta</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Kabupaten/Kota</p>
                                    <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                                        Jakarta Pusat</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Kecamatan</p>
                                    <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                                        Gambir</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Kelurahan</p>
                                    <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                                        Petojo Utara</p>
                                </div>
                                <div class="md:col-span-2">
                                    <p class="text-sm text-gray-500">Alamat Lengkap Lembaga</p>
                                    <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                                        Jl. Kaji Besar Timur, Jakarta 11110 Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="space-y-8">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Sarana & Foto</h3>
                            <div class="mt-4 grid gap-6 md:grid-cols-3">
                                @foreach (['Foto Sarpras', 'Foto Gedung Depan', 'Foto Papan Nama'] as $label)
                                    <div>
                                        <p class="text-sm text-gray-500">{{ $label }}</p>
                                        <div class="mt-3 rounded-2xl border border-gray-100 bg-gray-50 p-3">
                                            <div class="flex h-28 items-center justify-center rounded-xl bg-white text-gray-400">
                                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                                    <circle cx="9" cy="9" r="2" />
                                                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mt-2 text-xs text-gray-400">file (jpg/png) maks 2 MB</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Rekening Lembaga</h3>
                            <div class="mt-4 grid gap-6 md:grid-cols-3">
                                <div>
                                    <p class="text-sm text-gray-500">Bank</p>
                                    <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                                        BCA</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Nomor Rekening</p>
                                    <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                                        566998777
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Cabang Bank</p>
                                    <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                                        Jakarta Pusat</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-500">Foto Buku Rekening</p>
                                <div class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 p-3">
                                    <div class="flex h-32 items-center justify-center rounded-xl bg-white text-gray-400">
                                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="3" width="18" height="18" rx="2" />
                                            <path d="M7 3v18" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="mt-2 text-xs text-gray-400">file (jpg/png) maks 2 MB</p>
                            </div>
                        </div>
                    </section>

                    <section class="rounded-3xl border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900">Riwayat Pengajuan</h3>
                        <div class="mt-4 overflow-x-auto">
                            <table class="min-w-full text-left text-sm text-gray-600">
                                <thead>
                                    <tr class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                        <th class="py-3">No</th>
                                        <th class="py-3">Tanggal</th>
                                        <th class="py-3">Pengguna</th>
                                        <th class="py-3">Keterangan</th>
                                        <th class="py-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach ($historyRecords as $index => $record)
                                        <tr>
                                            <td class="py-3 font-semibold text-[#1D4ED8]">{{ $index + 1 }}.</td>
                                            <td class="py-3">{{ $record['tanggal'] }}</td>
                                            <td class="py-3">{{ $record['pengguna'] }}</td>
                                            <td class="py-3">{{ $record['keterangan'] }}</td>
                                            <td class="py-3">
                                                <span class="inline-flex rounded-full px-4 py-1 text-xs font-semibold {{ $statusBadgeClasses[$record['status']] ?? 'bg-gray-100 text-gray-600' }}">
                                                    {{ $record['status'] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>

            <div x-cloak x-show="tab === 'dokumen'" x-transition>
                <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 pb-6">
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                        <span>{{ $submission['status_date'] }}</span>
                        <span class="inline-flex rounded-full bg-[#FFF1E7] px-4 py-1 text-xs font-semibold text-[#F26B38]">
                            {{ $submission['status_label'] }}
                        </span>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                            <button type="button" @click="open = !open"
                                class="inline-flex items-center gap-2 rounded-2xl border border-[#1C9A5A] px-5 py-2 text-sm font-semibold text-[#1C9A5A] transition hover:bg-[#E8F7EF]">
                                Action
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>
                            <div x-cloak x-show="open"
                                class="absolute right-0 z-10 mt-3 w-44 rounded-2xl border border-gray-100 bg-white p-2 shadow-lg">
                                <button type="button"
                                    class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-[#EE4D37] transition hover:bg-[#FFF5F2]">
                                    Revisi
                                </button>
                                <button type="button"
                                    class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50">
                                    Tolak
                                </button>
                            </div>
                        </div>
                        <button type="button"
                            class="inline-flex items-center gap-2 rounded-2xl bg-[#1C9A5A] px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-[#168247]">
                            Setujui
                        </button>
                    </div>
                </div>

                <div class="mt-8 space-y-8">
                    @php
                        $documents = [
                            ['label' => 'SK Pengurus Organisasi', 'filename' => 'SK Pengurus Organisasi.pdf'],
                            ['label' => 'SK Struktur Manajemen & Personalia', 'filename' => 'SK Struktur Manajemen & Personalia.pdf'],
                            ['label' => 'Surat Kesanggupan Pembiayaan (1 thn)', 'filename' => 'Surat Kesanggupan Pembiayaan (1 thn).pdf'],
                            ['label' => 'Dokumen Kurikulum', 'filename' => 'Dokumen Kurikulum.pdf'],
                            ['label' => 'Rencana Induk Pengembangan (RIP)', 'filename' => 'Rencana Induk Pengembangan (RIP).pdf'],
                            ['label' => 'Daftar Calon Guru + CV + Ijazah (File Jadi Satu)', 'filename' => 'Daftar Calon Guru + CV + Ijazah (File Jadi Satu).pdf'],
                            ['label' => 'SK Pengangkatan Kepala Sekolah + CV (File Jadi Satu)', 'filename' => 'SK Pengangkatan Kepala Sekolah + CV (File Jadi Satu).pdf'],
                            ['label' => 'Daftar Tenaga Kependidikan + CV + Ijazah (File Jadi Satu)', 'filename' => 'Daftar Tenaga Kependidikan + CV + Ijazah (File Jadi Satu).pdf'],
                            ['label' => 'Daftar Sarana & Prasarana', 'filename' => 'Daftar Sarana & Prasarana.pdf'],
                        ];
                    @endphp

                    @foreach ($documents as $doc)
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">{{ $doc['label'] }} <span class="text-red-500">*</span></h3>
                            <div class="mt-3 flex items-center gap-3 rounded-2xl border border-gray-100 p-4">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FFF5F2] text-[#EE4D37]">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $doc['filename'] }}</p>
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-gray-400">file (pdf) maks 2 MB</p>
                        </div>
                    @endforeach

                    <div>
                        <h3 class="text-base font-semibold text-gray-900 mb-4">Foto Sarana & Prasarana</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="rounded-2xl border border-gray-100 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=400&h=300&fit=crop" alt="Foto Sarana" class="w-full h-32 object-cover" />
                            </div>
                            <div class="rounded-2xl border border-gray-100 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=400&h=300&fit=crop" alt="Foto Sarana" class="w-full h-32 object-cover" />
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-400">file (jpg|png) maks 2 MB</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Sertifikat/Surat Kepemilikan Lahan <span class="text-red-500">*</span></h3>
                        <div class="mt-3 flex items-center gap-3 rounded-2xl border border-gray-100 p-4">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FFF5F2] text-[#EE4D37]">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Sertifikat/Surat Kepemilikan Lahan.pdf</p>
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-400">file (pdf) maks 2 MB</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-900">Dokumen Studi Kelayakan <span class="text-red-500">*</span></h3>
                        <div class="mt-3 flex items-center gap-3 rounded-2xl border border-gray-100 p-4">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FFF5F2] text-[#EE4D37]">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Dokumen Studi Kelayakan.pdf</p>
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-400">file (pdf) maks 2 MB</p>
                    </div>
                </div>
            </div>

            <div x-cloak x-show="tab === 'riwayat'" x-transition>
                <div class="rounded-3xl border border-gray-100 p-6">
                    <h3 class="text-lg font-semibold text-gray-900">Riwayat Pengajuan</h3>
                    <div class="mt-4 overflow-x-auto">
                        <table class="min-w-full text-left text-sm text-gray-600">
                            <thead>
                                <tr class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                    <th class="py-3">No</th>
                                    <th class="py-3">Tanggal</th>
                                    <th class="py-3">Pengguna</th>
                                    <th class="py-3">Keterangan</th>
                                    <th class="py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($historyRecords as $index => $record)
                                    <tr>
                                        <td class="py-3 font-semibold text-[#1D4ED8]">{{ $index + 1 }}.</td>
                                        <td class="py-3">{{ $record['tanggal'] }}</td>
                                        <td class="py-3">{{ $record['pengguna'] }}</td>
                                        <td class="py-3">{{ $record['keterangan'] }}</td>
                                        <td class="py-3">
                                            <span class="inline-flex rounded-full px-4 py-1 text-xs font-semibold {{ $statusBadgeClasses[$record['status']] ?? 'bg-gray-100 text-gray-600' }}">
                                                {{ $record['status'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

