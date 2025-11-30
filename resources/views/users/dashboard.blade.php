@extends('layouts.master_user')

@section('contents')
@if(!auth()->user()->is_active)
<div class="bg-[#FF9F4329] text-[#FF9F43] p-4 rounded-xl">
    <div class="flex gap-4">
        <svg width="40" height="40" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="40" height="40" rx="6" fill="white"/>
            <path d="M15.1667 10.5833C15.1667 9.57081 15.9875 8.75 17 8.75C18.0125 8.75 18.8333 9.57081 18.8333 10.5833C20.9785 11.5977 22.3888 13.7131 22.5 16.0833V18.8333C22.6399 19.9891 23.3203 21.0097 24.3333 21.5833H9.66667C10.6797 21.0097 11.3601 19.9891 11.5 18.8333V16.0833C11.6113 13.7131 13.0215 11.5977 15.1667 10.5833" stroke="#FF9F43" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14.25 21.5833V22.4999C14.25 24.0187 15.4812 25.2499 17 25.2499C18.5188 25.2499 19.75 24.0187 19.75 22.4999V21.5833" stroke="#FF9F43" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div>
            <h1 class="text-xl font-semibold">Akun dalam Proses Verifikasi</h1>
            <p>Data registrasi Anda sedang diperiksa oleh Kanwil Kementerian Agama. Anda belum dapat mengajukan permohonan izin sampai proses verifikasi selesai.</p>
        </div>
    </div>
</div>
@endif

<div class="w-full mt-5 mx-auto bg-white rounded-xl shadow-lg border border-[#E6E7E8]">
    
    <div class="p-4 border-b border-[#E6E7E8]">
        <h2 class="text-xl font-semibold text-gray-900">
            Menu Utama Pemohon
        </h2>
    </div>

    <div class="p-4">
        <p class="text-gray-700 text-base">
            Ini adalah isi dari card. Border pemisah ada tepat di atas teks ini.
        </p>
    </div>
</div>

<div class="w-full mt-5 mx-auto bg-white rounded-xl shadow-lg border border-[#E6E7E8]">
    
    <div class="p-4 border-b border-[#E6E7E8]">
        <h2 class="text-xl font-semibold text-gray-900">
            Riwayat Pengajuan Izin
        </h2>
    </div>

    <div class="p-4">
        <p class="text-gray-700 text-base">
            Ini adalah isi dari card. Border pemisah ada tepat di atas teks ini.
        </p>
    </div>
</div>
@endsection