@extends('layouts.cms.master')

@section('contents')
<section class="space-y-6">
    <header class="space-y-2 flex justify-between">
        <h1 class="text-2xl font-semibold text-gray-900">Form Config</h1>
        <div class="relative">
            <button id="addBtn"
                class="inline-flex items-center rounded-2xl bg-[#EE4D37] px-5 py-2.5 text-sm font-semibold text-white">
                + Tambah Konfigurasi
            </button>

            <div id="addMenu" class="hidden absolute right-0 mt-2 w-40 rounded-xl bg-white shadow">
                <a href="{{ route('cms.setting.forms.form', 'formal') }}"
                class="block px-4 py-2 hover:bg-gray-100">Formal</a>
                <a href="{{ route('cms.setting.forms.form', 'nonformal') }}"
                class="block px-4 py-2 hover:bg-gray-100">Nonformal</a>
            </div>
        </div>
    </header>

    <div class="rounded-3xl bg-white p-6 shadow-sm space-y-6">
        <div class="flex flex-wrap items-end gap-3 border-b border-gray-100 pb-6">
            <label class="flex-1">
                <input type="search" d="search" placeholder="Cari nama formsCon" class="rounded-2xl border border-gray-200 bg-white px-4 py-2.5 w-full border-none bg-transparent text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-0" />
            </label>
        </div>
        <div class="space-y-4">
            <div>
                <p class="text-lg font-semibold text-gray-900">List Formulir Konfigurasi</p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm text-gray-700 " id="formsCon-table">
                    <thead>
                        <tr class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                            <th class="py-3 pr-3">No</th>
                            <th class="py-3 pr-3">Tipe</th>
                            <th class="py-3 pr-3">Nama Formulir</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="formsCon-table-body" class="divide-y divide-gray-100 dark:divide-gray-800">
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
    const formsConTable = new AjaxTable({
        url: "{{ route('cms.setting.forms.datatable') }}",
        tbody: '#formsCon-table-body',
        pagination: '#formsCon-pagination',
        columns: [
            'no',
            'type',
            'code',
            'action'
        ]
    });

    formsConTable.fetch();

    $('#search').on('keyup', function () {
        formsConTable.setSearch(this.value);
    });
    $('#per-page').on('change', function () {
        formsConTable.setPerPage(this.value);
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
        formsConTable.setCat(role);

    });

    $(document).ready(function (){
        $('#addBtn').on('click', function () {
            console.log('here');
            $('#addMenu').toggleClass('hidden');
        });
    })

</script>


@endsection