@extends('layouts.cms.master')

@section('contents')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Data Pengajuan Izin`}">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div class="">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90 mb-1" x-text="pageName"></h2> 
            <p class="text-sm text-gray-500">Tinjau informasi lengkap lembaga sebelum melakukan tindakan.</p>
        </div>
        <nav>
            <ol class="flex items-center gap-1.5">
                <li>
                    <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                        href="index.html">
                        Home
                        <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </li>
                <li class="text-sm text-gray-800 dark:text-white/90" x-text="pageName"></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->

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

    $forms = json_decode($permit->form);

    $docs = [];
    $photos = [];
    $others = [];

    foreach ($forms as $key => $value) {
        if (str_starts_with($key, 'docs_')) {
            $docs[$key] = $value;
        } elseif (str_starts_with($key, 'photo_')) {
            $photos[$key] = $value;
        } else {
            $others[$key] = $value;
        }
    }

@endphp

<section x-data="{ tab: 'profil', actionOpen: false }" class="space-y-6">
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

                <!-- LEFT: STATUS INFO -->
                <div class="flex flex-col gap-2">
                    <span class="text-xs text-gray-500">
                        Diajukan pada {{$permit->created_at->format('d F Y')}}
                    </span>

                   @php
                        $status = $permit->status;
                        $states = config('siopkb.state');
                        $colors = config('siopkb.state_color');
                    @endphp

                    <div class="flex items-center gap-3">
                        @foreach ($states as $key => $label)
                            @if ((string) $key === (string) $status)

                                <span
                                    class="inline-flex items-center rounded-full px-4 py-1 text-xs font-semibold
                                    {{ $colors[$key] ?? 'bg-gray-100 text-gray-500' }}">
                                    {{ $label }}
                                </span>

                            @endif
                        @endforeach
                    </div>

                </div>
                <form action="{{ route('cms.manage.permit.status') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $permit->uuid }}" name="uuid">
                    <div class="flex items-center gap-3">
                        <!-- Status -->
                        <select
                            name="state"
                            class="rounded-xl border border-gray-200 px-4 py-2 text-sm text-gray-700
                                focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">

                            @foreach (config('siopkb.state') as $sval => $status)
                                <option
                                    value="{{ $sval }}"
                                    @selected((string) $permit->status === (string) $sval)>
                                    {{ $status }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Notes / Keterangan -->
                        <input
                            type="text"
                            name="notes"
                            placeholder="Keterangan (opsional)"
                            class="w-64 rounded-xl border border-gray-200 px-4 py-2 text-sm text-gray-700
                                placeholder-gray-400 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" />

                        <!-- Submit -->
                        <button
                            type="submit"
                            class="inline-flex items-center rounded-xl bg-[#EE4D37] px-5 py-2
                                text-sm font-semibold text-white transition hover:bg-[#D94430]">
                            Ubah
                        </button>

                    </div>

                </form>


            </div>

            <div class="mt-8 grid gap-6 md:grid-cols-2">
                @foreach ($others as $label => $content)
                @php
                $field = getForm($permit->type, $permit->form_type, $label);
                @endphp
                <div>
                    <p class="text-sm text-gray-500">{{$field['label']}}</p>
                    <p class="mt-2 rounded-2xl border border-gray-100 bg-gray-50 px-4 py-3 text-gray-900">
                        @if(in_array($label, ['province', 'city','district']))
                        @php
                            $data = explode('|', $content);
                            if(isset($data[1])){
                                echo $data[1];
                            }
                        @endphp
                        @else
                        {{ $content }}
                        @endif
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        <div x-cloak x-show="tab === 'dokumen'" x-transition>
           
            <div class="mt-8 space-y-8">
                @foreach ($docs as $key => $doc)
                    @php
                    $alias = config('siopkb.file_aliases.'.$key);
                    @endphp
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">{{ $alias }} <span class="text-red-500">*</span></h3>
                        <a href="{{ asset('storage/'.$doc) }}" download="true">

                        <div class="mt-3 flex items-center gap-3 rounded-2xl border border-gray-100 p-4">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FFF5F2] text-[#EE4D37]">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $alias}}</p>
                                </div>
                            </div>
                        </a>
                        <p class="mt-2 text-xs text-gray-400">file (pdf) maks 2 MB</p>
                    </div>
                @endforeach

                @foreach ($photos as $key => $photo)
                @php
                $alias = config('siopkb.file_aliases.'.$key);
                @endphp
                <div>
                    <h3 class="text-base font-semibold text-gray-900 mb-4">{{$alias}}</h3>
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
                @endforeach

            </div>
        </div>

        <div x-cloak x-show="tab === 'riwayat'" x-transition>
            <div class="rounded-3xl ">
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
                            @foreach ($permit->history as $index => $record)
                                <tr>
                                    <td class="py-3 font-semibold text-[#1D4ED8]">{{ $index + 1 }}.</td>
                                    <td class="py-3">{{ $record->created_at }}</td>
                                    <td class="py-3">{{ $record->user->name }}</td>
                                    <td class="py-3">{{ $record->notes }}</td>
                                    <td class="py-3">
                                        <span class="inline-flex rounded-full px-4 py-1 text-xs font-semibold {{ config('siopkb.state_color.'.$record->new_status) }}">
                                            {{ config('siopkb.state.'.$record->new_status) }}
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

