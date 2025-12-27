@extends('layouts.cms.master')

@section('contents')
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
    <header class="space-y-2 flex justify-between">
        <h1 class="text-2xl font-semibold text-gray-900">Manajemen Kanwil</h1>
        <a href="{{ route('cms.manage.kanwil.form') }}"
                class="inline-flex items-center justify-center rounded-2xl bg-[#EE4D37] px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#d24432]">
                + Tambah Kanwil
            </a>
    </header>

    <div class="rounded-3xl bg-white p-6 shadow-sm space-y-6">
        <div class="flex flex-wrap items-end gap-3 border-b border-gray-100 pb-6">
            <label class="flex-1">
                <input type="search" d="search" placeholder="Cari nama kanwil" class="rounded-2xl border border-gray-200 bg-white px-4 py-2.5 w-full border-none bg-transparent text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-0" />
            </label>
        </div>

        <div class="space-y-4">
            <div>
                <p class="text-lg font-semibold text-gray-900">List Kantor Wilayah</p>
                <p class="text-sm text-gray-500">Perbarui data kanwil dan kelola akses mereka.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm text-gray-700 " id="kanwil-table">
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
                    <tbody id="kanwil-table-body" class="divide-y divide-gray-100 dark:divide-gray-800">
                    </tbody>
                </table>
            </div>

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
                <div id="users-pagination" class="w-full"></div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('js')
<link href="https://cdn.datatables.net/2.0.0/css/dataTables.tailwindcss.css" rel="stylesheet" />
<script src="{{ asset('/js/ajax-table.js') }}"></script>
<script>
    const kanwilTable = new AjaxTable({
        url: "{{ route('cms.manage.kanwil.datatable') }}",
        tbody: '#kanwil-table-body',
        pagination: '#kanwil-pagination',
        columns: [
            'no',
            'name',
            'province',
            'email',
            'is_active',
            'action'
        ]
    });

    kanwilTable.fetch();

    $('#search').on('keyup', function () {
        kanwilTable.setSearch(this.value);
    });
    $('#per-page').on('change', function () {
        kanwilTable.setPerPage(this.value);
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
        kanwilTable.setCat(role);
    });

    </script>


@endsection