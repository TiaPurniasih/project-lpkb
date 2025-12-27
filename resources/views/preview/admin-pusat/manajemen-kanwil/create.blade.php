@extends('preview.admin-pusat.layouts.app')

@section('title', 'Tambah Kanwil')

@section('content')
    <section class="space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Tambah Kanwil</h1>
                <p class="text-sm text-gray-500">Lengkapi data kantor wilayah untuk memberikan akses ke sistem.</p>
            </div>
            <nav class="text-sm text-gray-500">
                <a href="{{ route('admin-pusat.manajemen-kanwil.index') }}" class="text-gray-400 hover:text-gray-600">
                    Manajemen Kanwil
                </a>
                <span class="mx-2 text-gray-300">›</span>
                <span class="font-medium text-gray-900">Tambah Kanwil</span>
            </nav>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <h2 class="text-base font-semibold text-gray-900">Identitas Lembaga</h2>

            <form action="#" method="POST" class="mt-6 space-y-6">
                @csrf
                <div class="grid gap-6">
                    <label class="space-y-2">
                        <span class="text-sm font-medium text-gray-700">Provinsi <span class="text-red-500">*</span></span>
                        <div class="relative">
                            <select
                                class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                                <option>Pilih Provinsi</option>
                                <option>Jawa Barat</option>
                                <option>Jawa Tengah</option>
                                <option>DKI Jakarta</option>
                            </select>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="pointer-events-none absolute inset-y-0 right-4 my-auto text-gray-400">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </label>

                    <label class="space-y-2">
                        <span class="text-sm font-medium text-gray-700">Nama Kanwil <span class="text-red-500">*</span></span>
                        <input type="text" placeholder="Masukkan nama kanwil"
                            class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-700 placeholder-gray-400 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" />
                    </label>

                    <label class="space-y-2">
                        <span class="text-sm font-medium text-gray-700">Email Kanwil <span class="text-red-500">*</span></span>
                        <input type="email" placeholder="Masukkan email kanwil"
                            class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-700 placeholder-gray-400 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" />
                    </label>

                    <label class="space-y-2">
                        <span class="text-sm font-medium text-gray-700">Nomor WhatsApp <span class="text-red-500">*</span></span>
                        <input type="text" placeholder="Masukkan nomor whatsapp"
                            class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-700 placeholder-gray-400 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" />
                    </label>

                    <div class="space-y-2">
                        <span class="text-sm font-medium text-gray-700">Foto Profil</span>
                        <label
                            class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50 px-6 py-10 text-center text-sm text-gray-500 transition hover:border-[#EE4D37]/60 hover:bg-white">
                            <input type="file" class="hidden" />
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                                <path d="M12 5v14"></path>
                                <path d="M5 12h14"></path>
                            </svg>
                            <p class="text-sm font-medium text-gray-900">Drop files here or click to upload.</p>
                        </label>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <label class="space-y-2">
                            <span class="text-sm font-medium text-gray-700">Password <span class="text-red-500">*</span></span>
                            <input type="password" placeholder="Masukkan Password"
                                class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-700 placeholder-gray-400 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" />
                        </label>
                        <label class="space-y-2">
                            <span class="text-sm font-medium text-gray-700">Konfirmasi Password <span class="text-red-500">*</span></span>
                            <input type="password" placeholder="Konfirmasi Password"
                                class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm text-gray-700 placeholder-gray-400 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" />
                        </label>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-end gap-3 border-t border-gray-100 pt-6">
                    <a href="{{ route('admin-pusat.manajemen-kanwil.index') }}"
                        class="inline-flex items-center justify-center rounded-2xl border border-[#EE4D37] px-6 py-2.5 text-sm font-semibold text-[#EE4D37] transition hover:bg-[#FFF5F2]">
                        Batalkan
                    </a>
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-2xl bg-[#EE4D37] px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#d24432]">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

