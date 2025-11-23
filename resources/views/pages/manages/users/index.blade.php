@extends('layouts.app')

@section('contents')
<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <!-- Breadcrumb Start -->
    <div x-data="{ pageName: `Pengaturan User`}">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>
                <a href="{{ route('manage.users.form') }}" class="ml-3 inline-flex items-center gap-2 px-2 py-2 rounded-full text-sm font-medium text-white transition bg-brand-500 shadow-theme-xs hover:bg-brand-600">
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
                <!-- ====== Table Six Start -->
                    <div class="max-w-full overflow-x-auto">
                        <table class="min-w-full" id="users-table" >
                            
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
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                               
                            </tbody>
                        </table>
                    </div>
                <!-- ====== Table Six End -->
            </div>
        </div>
    </div>
</div>
 
@endsection

@section('js')
<link href="https://cdn.datatables.net/2.0.0/css/dataTables.tailwindcss.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.tailwindcss.js"></script>
<script>
$(document).ready(function(){
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('manage.users.datatable') }}",
        columns: [
            // { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable:false, searchable:false, className: 'text-right'  },
        ],
        initComplete: function () {
            let searchInput = $('#users-table_filter input');
            searchInput
                .addClass('border placeholder-gray-500 ml-2 px-3 py-2 rounded-lg border-gray-200 focus:border-gray-500 focus:ring focus:ring-gray-500 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 dark:placeholder-gray-400');
        },
        dom: '<"flex flex-col md:flex-row items-center justify-between gap-4 mb-4"lf>rt<"flex flex-col md:flex-row items-center justify-between gap-4 mt-4"ip>',
        buttons: [
            {
                text: '➕ Add User',
                className: 'ml-3 inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700',
                action: function () {
                    window.location.href = "{{ route('manage.users.form') }}";
                }
            }
        ],
    });
});
</script>

@endsection