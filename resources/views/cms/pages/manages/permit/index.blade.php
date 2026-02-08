@extends('layouts.cms.master')

@section('contents')
<!-- Breadcrumb Start -->
<div x-data="{ pageName: `List Pengajuan Izin`}">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div class="">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90 mb-1" x-text="pageName"></h2> 
            <p class="text-sm text-gray-500">Kelola pengajuan perizinan lembaga pendidikan.</p>

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

<div class="space-y-5 sm:space-y-6">
    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="p-5 border-t border-gray-100 dark:border-gray-800 sm:p-6">
            <form id="filter-form">
                <div class="flex flex-left items-end gap-3 border-b border-gray-100 pb-6">

                    <!-- Search -->
                    <label class="w-2/5">
                        <span class="mb-2 block text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Cari nama lembaga
                        </span>
                        <input
                            id="search"
                            type="search"
                            placeholder="Cari nama lembaga"
                            class="rounded-2xl border border-gray-200 bg-white px-2 py-2 w-full text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-0"
                        />
                    </label>

                    <!-- Province -->
                    <label class="w-1/5">
                        <span class="mb-2 block text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Provinsi
                        </span>
                        <select
                            id="province"
                            class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-700">
                            <option value="">Semua Provinsi</option>
                            @foreach ($wilayah as $province)
                                <option value="{{ $province->code }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </label>

                    <!-- Type -->
                    <label class="w-1/5">
                        <span class="mb-2 block text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Jenis Izin
                        </span>
                        <select
                            id="type"
                            class="w-full rounded-2xl border border-gray-200 bg-white px-4 py-2.5 text-sm text-gray-700">
                            <option value="">Semua</option>
                            <option value="formal">Formal</option>
                            <option value="nonformal">Nonformal</option>
                        </select>
                    </label>

                    <button type="submit" class="hidden">Cari</button>
                </div>
            </form>

            <div class="max-w-full overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100 text-left text-sm" id="">
                    <thead>
                        <tr class="text-xs font-semibold uppercase text-gray-400">
                            <th class="py-3">No</th>
                            <th class="py-3">Nama Lembaga</th>
                            <th class="py-3">Jenis Lembaga</th>
                            <th class="py-3">Jalur Pendidikan</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Tgl Pengajuan</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-600" id="permit-table-body">
                    
                    </tbody>
                </table>
                <div class="flex items-center">
                    <label class="pt-4 mr-2">
                        <div class="relative">
                            <select id="per-page" class="w-[100px] rounded-2xl border border-gray-200 bg-white px-2 py-2 pr-10 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20 [&::-ms-expand]:hidden [-webkit-appearance:none] [-moz-appearance:none] [appearance:none]">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </label>
                    <div id="permit-pagination" class="w-full"></div>
                </div>
            </div>
            
        </div>

        
    </div>
</section>
@endsection


@section('js')
<link href="https://cdn.datatables.net/2.0.0/css/dataTables.tailwindcss.css" rel="stylesheet" />
<script src="{{ asset('/js/ajax-table.js') }}"></script>
<script>
    const permitTable = new AjaxTable({
        url: "{{ route('cms.manage.permit.datatable') }}",
        tbody: '#permit-table-body',
        pagination: '#permit-pagination',
        columns: [
            'no',
            'institution_name',
            'type',
            'form_type',
            'state',
            'created_at',
            'action'
        ]
    });

    permitTable.fetch();

    $('#filter-form').on('submit', function (e) {
        e.preventDefault();
    });

    let searchTimeout;

    $('#search').on('keyup', function () {
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(() => {
            permitTable.setParam('search', this.value);
        }, 400);
    });

    $('#province').on('change', function () {
        permitTable.setParam('province', this.value);
    });

    $('#type').on('change', function () {
        permitTable.setParam('type', this.value);
    });


    $('#per-page').on('change', function () {
        permitTable.setPerPage(this.value);
    });
    $('.category').on('click', function () {
        const role = $(this).data('role');

        // reset semua button
        $('.category')
            .removeClass('category-active bg-[#EE4D37] text-white border-[#EE4D37]')
            .addClass('category-default bg-white text-gray-600 border-gray-200');

        // aktifkan button yang diklik
        $(this)
            .removeClass('category-default bg-white text-gray-600 border-gray-200')
            .addClass('category-active bg-[#EE4D37] text-white border-[#EE4D37]');

        // kirim filter ke table
        permitTable.setCat(role);
    });

</script>


@endsection