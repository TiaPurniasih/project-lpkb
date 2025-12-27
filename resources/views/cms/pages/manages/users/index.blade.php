@extends('layouts.cms.master')

@section('contents')
<!-- <div class="px-4 mx-auto max-w-(--breakpoint-2xl) md:p-6"> -->
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Pengaturan User`}">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>
                <a href="{{ route('cms.manage.users.form') }}" class="ml-3 inline-flex items-center gap-2 px-2 py-2 rounded-full text-sm font-medium text-white transition bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                </a>
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
                <div class="flex justify-between items-end gap-3 border-b border-gray-100 pb-6">
                    <label class="w-3/5">
                        <input type="text" id="search" placeholder="Cari" class="rounded-2xl border border-gray-200 bg-white px-2 py-2 w-full  bg-transparent text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-0" />
                    </label>

                    <div class="flex items-end gap-2">
                        <button
                            data-role=""
                            class="category  category-active bg-[#EE4D37] text-white border-[#EE4D37] rounded-xl px-4 py-2 text-sm font-semibold">
                            Semua
                        </button>

                        <button
                            data-role="80"
                            class="category category-default rounded-xl px-4 py-2 text-sm font-semibold">
                            Administrator
                        </button>

                        <button
                            data-role="50"
                            class="category category-default rounded-xl px-4 py-2 text-sm font-semibold">
                            Kanwil
                        </button>

                        <button
                            data-role="10"
                            class="category category-default rounded-xl px-4 py-2 text-sm font-semibold">
                            Umum
                        </button>
                    </div>
                </div>
                <!-- ====== Table Six Start -->
                <div class="max-w-full overflow-x-auto">
                    <table class="w-full" id="users-table" >
                        
                        <thead>
                            <tr class="border-b border-gray-100 dark:border-gray-800">
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                            Nama
                                        </p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                            Alamat Email
                                        </p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                            Status
                                        </p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                            Status Lembaga
                                        </p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                            Mendaftar pada
                                        </p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex justify-center ">
                                        <p class="font-medium  text-gray-500 text-theme-xs dark:text-gray-400">
                                            Aksi
                                        </p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="users-table-body" class="divide-y divide-gray-100 dark:divide-gray-800">
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
                        <div id="users-pagination" class="w-full"></div>
                    </div>

                </div>
                <!-- ====== Table Six End -->
            </div>
        </div>
    </div>
<!-- </div> -->
 
@endsection

@section('js')
<link href="https://cdn.datatables.net/2.0.0/css/dataTables.tailwindcss.css" rel="stylesheet" />
<script src="{{ asset('/js/ajax-table.js') }}"></script>
<script>
    const usersTable = new AjaxTable({
        url: "{{ route('cms.manage.users.datatable') }}",
        tbody: '#users-table-body',
        pagination: '#users-pagination',
        columns: [
            'name',
            'email',
            'is_active',
            'organization',
            'created_at',
            'action'
        ]
    });

    usersTable.fetch();

    $('#search').on('keyup', function () {
        usersTable.setSearch(this.value);
    });
    $('#per-page').on('change', function () {
        usersTable.setPerPage(this.value);
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
        usersTable.setCat(role);
    });

    </script>


@endsection