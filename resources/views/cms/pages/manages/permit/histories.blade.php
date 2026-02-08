@extends('layouts.cms.master')

@section('contents')
    <section class="space-y-6">
        <header>
            <p class="text-sm uppercase tracking-[0.2em] text-gray-400">Pengajuan Perizinan</p>
            <h1 class="text-2xl font-semibold text-gray-900">Riwayat Pengajuan Izin</h1>
        </header>

        <div class="rounded-3xl bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                <div>
                    <p class="text-sm font-semibold text-gray-900">List Pengajuan Izin</p>
                </div>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100 text-left text-sm text-gray-600">
                    <thead>
                        <tr class="text-xs font-semibold uppercase text-gray-400">
                            <th class="py-3">No</th>
                            <th class="py-3">Nama Lembaga</th>
                            <th class="py-3">Jenis Lembaga</th>
                            <th class="py-3">Jalur Pendidikan</th>
                            <th class="py-3">Tgl Pengajuan</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($histories as $index => $history)
                            <tr>
                                <td class="py-4 font-semibold">
                                    <a href="{{ route('cms.manage.permit.view', $history->permit_application_id) }}"
                                        class="text-[#1D4ED8] hover:text-[#EE4D37]">
                                        {{ $index + 1 }}.
                                    </a>
                                </td>
                                <td class="py-4">
                                    <a href="{{ route('cms.manage.permit.view', $history->permit_application_id) }}"
                                        class="font-semibold text-gray-900 hover:text-[#EE4D37]">
                                        {{ optional($history->application->user->detail)->institution_name }}
                                    </a>
                                </td>
                                <td class="py-4">{{ optional($history->application)->type }}</td>
                                <td class="py-4">{{ optional($history->application)->form_type }}</td>
                                <td class="py-4">{{ $history->created_at }}</td>
                                <td class="py-4">
                                    <span class="inline-flex rounded-full px-4 py-1 text-xs font-semibold {{ config('siopkb.state_color.'.$history->new_status) }}">
                                        {{ config('siopkb.state.'.$history->new_status) }}
                                    </span>
                                </td>
                                <td class="py-4 text-center">
                                    <a href="{{ route('cms.manage.permit.view', $history->permit_application_id) }}"
                                        class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 text-gray-500 transition hover:border-[#EE4D37] hover:text-[#EE4D37]">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="3" />
                                            <path d="M2.5 12s3.5-6.5 9.5-6.5 9.5 6.5 9.5 6.5-3.5 6.5-9.5 6.5-9.5-6.5-9.5-6.5Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex flex-wrap items-center justify-between gap-4 border-t border-gray-100 pt-4 text-sm text-gray-500">
                <p>Showing 10 of 512 Results</p>
                <div class="flex items-center gap-2">
                    <button type="button" class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-200 text-gray-400">
                        –
                    </button>
                    <span class="flex h-8 min-w-[36px] items-center justify-center rounded-full bg-[#EE4D37] px-3 text-sm font-semibold text-white">1</span>
                    <button type="button" class="flex h-8 w-8 items-center justify-center rounded-full border border-gray-200 text-gray-400">
                        +
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection