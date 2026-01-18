@extends('layouts.cms.master')

@section('contents')
<section class="space-y-6">
    <header class="space-y-2 flex justify-between">
        <h1 class="text-2xl font-semibold text-gray-900">Add Form Config</h1>
    </header>

      {{-- Form --}}
    <form method="POST"
          action="{{ route('cms.setting.forms.store') }}"
          class="space-y-6 rounded-3xl bg-white p-6 shadow-sm">

        @csrf

        {{-- hidden --}}
        <input type="hidden" name="id" value="{{ $config->id ?? '' }}">
        <input type="hidden" name="category" value="{{ $category }}">

        {{-- BASIC INFO --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Form Title --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Formulir
                </label>
                <input type="text"
                       name="form_title"
                       value="{{ old('form_title', $config->form_title) }}"
                       required
                       class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#EE4D37] focus:ring-[#EE4D37]/20"
                       placeholder="Contoh: Nava Dhammasekha">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Kategori Formulir
                </label>
                @if($category)
                <input type="text" class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm" name="category" value="{{ $category }}" readonly>
                @else
                <select name="category" id="category" class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm">
                    <option value="formal" {{ ($config->category == 'formal' ? 'selected'  : '' )}}>Formal</option>
                    <option value="nonformal" {{ ($config->category == 'nonformal' ? 'selected'  : '' )}}>Non Formal</option>
                </select>
                @endif


            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Grup Kode Formulir
                </label>
                <input type="text"
                       name="form_code"
                       value="{{ old('form_code', $type) }}"
                       required
                       class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm focus:border-[#EE4D37] focus:ring-[#EE4D37]/20"
                       placeholder="Contoh: nava_dhammasekha">
            </div>

            {{-- Codex --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Codex
                </label>
                <input type="text"
                       name="codex"
                       value="{{ old('codex', $config->codex) }}"
                       class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm"
                       placeholder="FL-NVDMSK">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama field
                </label>
                <input type="text"
                       name="field_name"
                       value="{{ $config->field_name }}"
                       class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm"
                       placeholder="Contoh: title_name">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Text label
                </label>
                <input type="text"
                       name="field_label"
                       value="{{ $config->field_label }}"
                       class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm"
                       placeholder="Contoh: Judul Input">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Placeholder
                </label>
                <input type="text"
                       name="placeholder"
                       value="{{ $config->placeholder }}"
                       class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm"
                       placeholder="Contoh: Placeholder">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Page Location
                </label>
                <input type="number"
                       name="page"
                       value="{{ $config->page }}"
                       class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm"
                       placeholder="Contoh: 1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Page Location
                </label>
                
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Tipe Data
                </label>
                <select name="field_type" id="field_type" class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-s">
                    <option value="text" {{ $config->field_type == 'text' ? 'selected' : '' }}>Text</option>
                    <option value="textarea" {{ $config->field_type == 'textarea'? 'selected' : ''  }}>Textarea</option>
                    <option value="date" {{ $config->field_type == 'date' ? 'selected' : ''  }}>Tanggal</option>
                    <option value="file" {{ $config->field_type == 'file' ? 'selected' : '' }}>File</option>
                    <option value="custom_address" {{ $config->field_type == 'custom_address' ? 'selected' : '' }}>Kolom Alamat</option>
                </select>
            </div>

            {{-- File Count --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Tipe File
                </label>
                <input type="number"
                       name="file_count"
                       min="0"
                       value="{{ old('file_count', $config->file_count ?? 0) }}"
                       class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm">
            </div>

            {{-- Active --}}
            <div class="flex items-center gap-3 mt-6">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       {{ old('is_active', $config->is_active ?? true) ? 'checked' : '' }}
                       class="rounded border-gray-300 text-[#EE4D37] focus:ring-[#EE4D37]">
                <label class="text-sm text-gray-700">
                    Aktifkan Form
                </label>
            </div>

        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Deskripsi
            </label>
            <textarea name="description"
                      rows="4"
                      class="w-full rounded-2xl border border-gray-200 px-4 py-2.5 text-sm"
                      placeholder="Deskripsi singkat tentang formulir">
                {{ old('description', $config->description) }}
            </textarea>
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
            <a href="{{ route('cms.setting.forms') }}"
               class="rounded-2xl border border-gray-200 px-5 py-2.5 text-sm text-gray-600 hover:bg-gray-50">
                Batal
            </a>

            <button type="submit"
                    class="rounded-2xl bg-[#EE4D37] px-6 py-2.5 text-sm font-semibold text-white hover:bg-[#d24432]">
                {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Konfigurasi' }}
            </button>
        </div>

    </form>


</section>
@endsection