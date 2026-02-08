@extends('layouts.cms.master')

@section('contents')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `Manajemen Sertifikat`}">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div class="">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90 mb-1" x-text="pageName"></h2> 
            <p>Kelola draft dan sertifikat final yang siap diunduh.</p>
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

<section class="space-y-6">
    <div class="rounded-3xl bg-white p-6 shadow-sm space-y-6">
        <div class="space-y-4">
            <div class="overflow-visible">

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
                        @foreach ($items as $key => $row)
                            <tr class="transition hover:bg-gray-50">
                                <td class="py-3 pr-3 font-semibold text-[#1D4ED8]">{{ $key+1 }}.</td>
                                <td class="py-3 pr-3">{{ $row->code }}</td>
                                <td class="py-3 pr-3">{{ optional($row->user->detail)->institution_name }}</td>
                                <td class="py-3 pr-3">{{ ucfirst($row->type) }}</td>
                                <td class="py-3 pr-3">{{ str_replace('-', ' ',  $row->form_type) }}</td>
                                <td class="py-3 pr-3 text-gray-600">{{ $row->published_at }}</td>
                                <td class="py-3 pr-3">
                                    @if($row->certificate_state == 1)
                                    <span class="inline-flex rounded-full px-4 py-1 text-xs font-semibold bg-[#E5F9EE] text-[#1C9A5A]">
                                        Final
                                    </span>
                                    @else
                                    <span class="inline-flex rounded-full px-4 py-1 text-xs font-semibold bg-gray-100 text-gray-600">
                                        Draft
                                    </span>
                                    @endif
                                </td>
                                <td class="py-3">
                                    <div class="flex justify-center">
                                        <div class="relative action-wrapper">
                                            <button type="button"
                                                class="btn-action-toggle flex h-10 w-10 items-center justify-center rounded-2xl border border-gray-200 text-gray-600 transition hover:border-[#EE4D37] hover:text-[#EE4D37]">
                                                <span class="sr-only">Buka menu tindakan</span>
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </button>

                                            <div
                                                class="action-menu absolute right-0 z-10 mt-3 w-48 hidden rounded-2xl border border-gray-100 bg-white p-2 text-left shadow-lg">
                                                
                                                @if($row->certificate_state != 1)
                                                    <!-- <button type="button"
                                                        class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-[#EE4D37] hover:bg-[#FFF5F2]">
                                                        Download Draft
                                                    </button> -->

                                                    <button type="button"
                                                        class="btn-upload-sertifikat flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50"
                                                        data-nama="{{ optional($row->user->detail)->institution_name }}"
                                                        data-jenis="{{ $row->type }} - {{ $row->form_type }}"
                                                        data-nomor="{{ $row->code }}"
                                                        data-id="{{ $row->id }}"
                                                        >
                                                        Upload Sertifikat
                                                    </button>
                                                @else
                                                    <a 
                                                        href="/storage/{{ $row->certificate_file }}" 
                                                        class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-sm font-medium text-[#EE4D37] hover:bg-[#FFF5F2]" download="1">
                                                        Download Sertifikat
                                                    </a>
</a>
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

            {{ $items->links('pagination.custom') }}

        </div>
    </div>

    <!-- Upload Certificate Modal -->
    <div id="uploadModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4">
        <form method="POST" action="{{  route('cms.manage.certificate.upload') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="" id="modalId">
            <div class="relative w-full max-w-2xl rounded-3xl bg-white p-8 shadow-xl">
                <!-- Close -->
                <button type="button" id="closeModal" class="absolute right-6 top-6 text-gray-400 hover:text-gray-600">✕</button>

                <h2 class="mb-6 text-2xl font-semibold text-gray-900">Unggah Sertifikat</h2>

                <!-- Info -->
                <div class="mb-6 space-y-4">
                    <div class="flex justify-between border-b pb-3">
                        <span class="text-sm text-gray-500">Nama Lembaga</span>
                        <span id="modalNama" class="text-sm font-semibold text-gray-900">-</span>
                    </div>
                    <div class="flex justify-between border-b pb-3">
                        <span class="text-sm text-gray-500">Jenis Pendidikan</span>
                        <span id="modalJenis" class="text-sm font-semibold text-gray-900">-</span>
                    </div>
                    <div class="flex justify-between border-b pb-3">
                        <span class="text-sm text-gray-500">Nomor Sertifikat</span>
                        <span id="modalNomor" class="text-sm font-semibold text-gray-900">-</span>
                    </div>
                </div>

                <!-- Upload -->
                <div class="mb-6">
                    <label class="mb-2 block text-sm font-medium text-gray-700">Unggah Sertifikat</label>
                    <label
                        class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 p-12 text-center transition hover:border-[#EE4D37] hover:bg-gray-100">
                        <input type="file" class="hidden" accept=".pdf,.jpg,.jpeg,.png" name="certificate"/>
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="mb-3 text-gray-400">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <p class="text-sm font-medium text-gray-900">Drop files here or click to upload.</p>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-3">
                    <button type="button" id="cancelModal"
                        class="rounded-2xl border-2 border-[#EE4D37] px-6 py-2 text-sm font-semibold text-[#EE4D37]">
                        Batalkan
                    </button>
                    <button type="submit"
                        class="rounded-2xl bg-[#EE4D37] px-6 py-2 text-sm font-semibold text-white">
                        Submit
                    </button>
                </div>
            </div>
        </form>
        
    </div>

</section>


@endsection


@section('js')
<script>
$(document).ready(function () {

    // klik tombol ⋮
    $(document).on('click', '.btn-action-toggle', function (e) {
        console.log('CLICKED');
        e.preventDefault();
        e.stopPropagation();

        const menu = $(this).siblings('.action-menu');

        // tutup menu lain
        $('.action-menu').not(menu).addClass('hidden');

        // toggle menu ini
        menu.toggleClass('hidden');
    });

    // klik di dalam menu → jangan tutup
    $(document).on('click', '.action-menu', function (e) {
        e.stopPropagation();
    });

    // klik upload → buka modal
    $(document).on('click', '.btn-upload-sertifikat', function (e) {
        e.preventDefault();
        e.stopPropagation();

        $('#modalNama').text($(this).data('nama'));
        $('#modalJenis').text($(this).data('jenis'));
        $('#modalNomor').text($(this).data('nomor'));
        $('#modalId').val($(this).data('id'));

        $('#uploadModal').removeClass('hidden').addClass('flex');
        $('.action-menu').addClass('hidden');
    });

    // klik DI LUAR action-wrapper saja → tutup
    $(document).on('click', '#closeModal, #cancelModal', function (e) {
        e.preventDefault();
        $('#uploadModal')
            .addClass('hidden')
            .removeClass('flex');
    });

    // klik backdrop hitam → tutup modal
    $(document).on('click', '#uploadModal', function (e) {
        if (e.target.id === 'uploadModal') {
            $('#uploadModal')
                .addClass('hidden')
                .removeClass('flex');
        }
    });

});
</script>



@endsection