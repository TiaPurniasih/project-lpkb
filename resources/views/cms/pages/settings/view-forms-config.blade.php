@extends('layouts.cms.master')

@section('contents')
<section class="space-y-6">
    <header class="space-y-2 flex justify-between">
        <h1 class="text-2xl font-semibold text-gray-900">View Form Config</h1>
        <div class="relative">
            <a id="addBtn" href="{{ route('cms.setting.forms.form', [$category, $type]) }}"
                class="inline-flex items-center rounded-2xl bg-[#EE4D37] px-5 py-2.5 text-sm font-semibold text-white">
                + Tambah Konfigurasi
            </a>
        </div>
    </header>

    {{-- FORM INFO --}}
    @php
        $first = $configs->first();
    @endphp

    <div class="rounded-3xl bg-white p-6 shadow-sm space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <p class="text-xs text-gray-400">Category</p>
                <p class="font-semibold">{{ ucfirst($first->category) }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400">Form Code</p>
                <p class="font-semibold">{{ $first->form_code }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400">Codex</p>
                <p class="font-semibold">{{ $first->form_codex }}</p>
            </div>
        </div>

        @if($first->description)
            <div>
                <p class="text-xs text-gray-400">Description</p>
                <p class="text-gray-700">{{ $first->description }}</p>
            </div>
        @endif
    </div>

    {{-- FIELD LIST --}}
    <div class="space-y-6">
        @foreach($configs->groupBy('page') as $page => $pageFields)
            <div class="rounded-3xl bg-white p-6 shadow-sm space-y-4">
                <h2 class="text-lg font-semibold text-gray-900">
                    Page {{ $page }}
                </h2>

                @foreach($pageFields->groupBy('section') as $section => $fields)
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">
                            {{ str_replace('-', ' ', $section) }}
                        </h3>

                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm text-gray-700">
                                <thead>
                                    <tr class="text-xs uppercase text-gray-400 border-b">
                                        <th class="py-2 text-left">No</th>
                                        <th class="py-2 text-left">Type</th>
                                        <th class="py-2 text-left">Name</th>
                                        <th class="py-2 text-left">Label</th>
                                        <th class="py-2 text-center">Required</th>
                                        <th class="py-2 text-center">Active</th>
                                        <th class="py-2 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach($fields as $i => $field)
                                        <tr>
                                            <td class="py-2">{{ $i + 1 }}</td>
                                            <td class="py-2">
                                                <span class="rounded-lg bg-gray-100 px-2 py-1 text-xs">
                                                    {{ $field->field_type }}
                                                </span>
                                            </td>
                                            <td class="py-2">{{ $field->field_name }}</td>
                                            <td class="py-2">{{ $field->field_label }}</td>
                                            <td class="py-2 text-center">
                                                {!! $field->required
                                                    ? '<span class="text-green-600 font-semibold">Yes</span>'
                                                    : '<span class="text-gray-400">No</span>' !!}
                                            </td>
                                            <td class="py-2 text-center">
                                                {!! $field->active
                                                    ? '<span class="text-green-600 font-semibold">Active</span>'
                                                    : '<span class="text-red-500 font-semibold">Inactive</span>' !!}
                                            </td>
                                            <td class="py-2 text-center">
                                                <a href="{{ route('cms.setting.forms.form', [
                                                    'category' => $category,
                                                    'type'     => $type,
                                                    'id'       => $field->id
                                                ]) }}"
                                                class="inline-flex items-center gap-2 rounded-2xl bg-[#EE4D37] px-4 py-2 text-sm font-semibold text-white hover:bg-[#d24432]">
                                                    ✏️ Ubah Form
                                                </a>
                                            </td>

                                        </tr>

                                        {{-- OPTIONS (SELECT) --}}
                                        @if($field->field_type === 'select' && $field->options)
                                            <tr class="bg-gray-50">
                                                <td></td>
                                                <td colspan="5" class="py-2">
                                                    <div class="text-xs text-gray-500 space-y-1">
                                                        <p class="font-semibold">Options:</p>
                                                        <ul class="list-disc ml-5">
                                                            @if(is_array($field->options))
                                                                @foreach($field->options as $opt)
                                                                    <li>
                                                                        <strong>{{ $opt['value'] ?? '-' }}</strong>
                                                                        — {{ $opt['label'] ?? '-' }}
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

</section>
@endsection
