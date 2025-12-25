@extends('layouts.master_user')

@section('contents')
<!-- Page Header with Breadcrumbs -->
<div class="flex justify-between items-center mb-8 flex-shrink-0">
    <h1 class="text-3xl font-bold text-gray-900 flex-shrink-0">Riwayat Pengajuan Izin</h1>
    <div class="flex items-center text-sm text-gray-500">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        <a href="{{ route('user.dashboard') }}" class="hover:text-gray-700">Home</a>
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
                    <th class="px-6 py-4 text-left font-medium">Kode</th>
                    <th class="px-6 py-4 text-left font-medium">Tanggal Pengajuan</th>
                    <th class="px-6 py-4 text-left font-medium">Jenis Pendidikan</th>
                    <th class="px-6 py-4 text-left font-medium">Jalur</th>
                    <th class="px-6 py-4 text-left font-medium">Status</th>
                    <th class="px-6 py-4 text-left font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $apps)
                <tr class="border-t border-gray-100 text-gray-700">
                    <td class="px-6 py-6">{{$apps->code}}</td>
                    <td class="px-6 py-6">{{$apps->created_at->format('d F j')}}</td>
                    <td class="px-6 py-6">{{ ucfirst($apps->type) }}</td>
                    <td class="px-6 py-6">{{ ucfirst(str_replace('-', ' ', $apps->form_type)) }}</td>
                    <td class="px-6 py-6">
                         @if($apps->status == 0)
                            <label class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                Ditinjau
                            </label>
                            @elseif($apps->status == 1)
                            <label class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500 text-white">
                                Diproses lebih lanjut
                            </label>
                            @elseif($apps->status == 2)
                            <label class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500 text-white">
                                Disetujui Pusat
                            </label>
                            @elseif($apps->status == 3)
                            <label class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-white">
                                Ditolak
                            </label>
                            @elseif($apps->status == 5)
                             <label class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-white">
                                Dibatalkan
                            </label>
                            @endif
                        <span class="">
                            
                        </span>
                    </td>
                    <td class="px-6 py-6">
                        <a href="{{ route('user.profile.history.detail', ['uid'=>$apps->uuid]) }}" class="inline-flex w-10 h-10 rounded-full border border-gray-200 items-center justify-center hover:bg-gray-50">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection