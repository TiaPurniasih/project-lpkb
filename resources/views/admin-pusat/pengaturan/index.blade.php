@extends('admin-pusat.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')
    <section class="space-y-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Pengaturan Website</h1>
            <p class="text-sm text-gray-500">Perbarui informasi dasar aplikasi agar tetap konsisten di seluruh platform.</p>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label for="judul" class="text-sm font-medium text-gray-700">Judul Aplikasi</label>
                    <input id="judul" type="text" placeholder="SIOPKB"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-800 placeholder:text-gray-400 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" />
                </div>
                <div class="space-y-2">
                    <label for="subjudul" class="text-sm font-medium text-gray-700">Sub Judul</label>
                    <input id="subjudul" type="text" placeholder="Sistem Izin Operasional Pendidikan Keagamaan Buddha"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-800 placeholder:text-gray-400 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" />
                </div>
                <div class="space-y-2">
                    <label for="copyright" class="text-sm font-medium text-gray-700">Copyright</label>
                    <input id="copyright" type="text" placeholder="2025 Sistem Izin Operasional Pendidikan Keagamaan Buddha"
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-800 placeholder:text-gray-400 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" />
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-2xl bg-[#EE4D37] px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#d24432]">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

