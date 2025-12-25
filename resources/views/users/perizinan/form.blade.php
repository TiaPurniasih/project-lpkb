@extends('layouts.master_user')

@section('contents')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-900">{{$form['title']}}</h1>
    <div class="flex items-center text-sm text-gray-500">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        <a href="{{  route('user.dashboard') }}" class="hover:text-gray-700">Home</a>
        <span class="mx-2">></span>
        <span>Pengajuan Perizinan</span>
        <span class="mx-2">></span>
        <span>{{$form['title']}}</span>
    </div>
</div>

@php
    $forms = sipkbForm($form['fields']);
    $doc_type = config('siopkb.file_section');
    $required_sign = '<span class="text-red-600">*</span>';
    $step_index = 0;

    $profile = auth()->user()->detail;
@endphp

<form id="izinForm" method="POST" action="{{ route('user.perizinan.submit') }}" enctype="multipart/form-data">
    <input type="hidden" name="type" value="{{ $params['type'] }}">
    <input type="hidden" name="form" value="{{ $params['form'] }}">
    @csrf

    @foreach ($forms as $pages)
    <div class="page-step {{ $step_index > 0 ? 'hidden' : '' }}" data-step="{{ $step_index }}">
        @foreach ($pages as $gkey => $section)
        @php
            $title_group = str_replace('-', ' ', $gkey);
        @endphp
        <div class="mb-8">
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ ucwords($title_group)}}</h2>
                
                @if(!in_array($gkey, $doc_type))
                <div class="grid grid-cols-2 gap-6">
                @endif
                    @foreach ($section as $group_item)
                    <div class="space-y-6">
                        @foreach ($group_item as $item)
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">{{ $item['label'] }} {!! $item['required']? $required_sign : '' !!}</label>
                            
                            @if($item['type'] == 'text')
                            <input  type="text" 
                                    name="{{ $item['name'] }}"
                                    placeholder="{{ $item['placeholder'] }}" 
                                    value="{{ $profile->{$item['name']} }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                    {{ ($item['required'] ? 'required' : '' )}}>

                            @elseif($item['type'] == 'date')
                            <div class="relative">
                                <input type="text" 
                                    placeholder="{{ $item['placeholder'] }}" 
                                    name="{{ $item['name'] }}"
                                    value="{{ $profile->{$item['name']} }}"
                                    class="w-full px-4 py-2.5 pr-10 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                    {{ ($item['required'] ? 'required' : '' )}}>
                                <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>

                            @elseif($item['type'] == 'select')
                            <div class="relative">
                                <select 
                                name="{{ $item['name'] }}" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent appearance-none pr-10" 
                                {{ ($item['required'] ? 'required' : '' )}}>
                                <option value="" disabled selected class="text-gray-400">Pilih...</option>
                                @if($item['options'])
                                @foreach ($item['options'] as $option)
                                    @php
                                    $option_val = explode('|', $option);    
                                    @endphp
                                <option value="{{ $option_val[0] }}" {{ ($option_val[0] == $profile->{$item['name']} ? 'selected' : '') }}>{{ $option_val[1] }}</option>
                                @endforeach
                                @endif
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>

                        @elseif($item['type'] == 'file')
                        <div class="relative">
                            <input type="file" 
                                    name="{{ $item['name'] }}" 
                                    id="{{ $item['name'] }}" 
                                    accept=".pdf,.jpg,.jpeg,.png" 
                                    class="hidden file-input"
                                    data-file-label="file-{{$item['name']}}"
                                    >
                            <label for="{{ $item['name'] }}" class="cursor-pointer">
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center bg-white hover:border-gray-400 transition-colors">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <p id="file-{{$item['name']}}" class="text-sm text-gray-500 mt-2 hidden"></p>
                                </div>
                            </label>
                        </div>
                        @elseif($item['type'] == 'textarea')
                        <textarea rows="4" 
                                name="{{ $item['name'] }}" 
                                id="{{ $item['name'] }}" 
                                placeholder="{{ $item['placeholder'] }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                {{ ($item['required'] ? 'required' : '' )}}
                                >{{ $profile->{$item['name']} }}</textarea>

                        @elseif($item['type'] == 'custom_address')
                            @include('users.components.address-area', ['address_type' => $item['name'], 'profile'=>$profile ])
                        @else
                            {{ $item['type'] }}
                        @endif
                        </div>
                        @endforeach
                    </div>
                    @endforeach

                @if(!in_array($gkey, $doc_type))
                </div>
                @endif
            </div>
        </div>
        @endforeach
        
        <div class="mb-8">
            <div class="bg-white rounded-lg border border-gray-200 p-6">
                <div class="space-y-6">
                    <div class="flex justify-between space-x-4 pt-4">
                        @if ($step_index > 0)
                        <button type="button" class="btn-back px-6 py-2 border border-gray-400 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            < Kembali
                        </button>
                        @else
                        <a href="{{ route('pengajuan-izin') }}" class="px-6 py-2 border border-red-600 text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                            Batalkan
                        </a>
                        @endif
                        
                        <div>
                            @if ($step_index < count($forms) - 1)
                            <button type="button" class="btn-next px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                Lanjutkan >
                            </button>
                            @else
                            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                Kirim Pengajuan
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @php $step_index++; @endphp
    @endforeach

</form>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // --- Current Step Tracker ---
        let currentStep = 0;
        const totalSteps = $('.page-step').length;
        const $steps = $('.page-step');

        // --- Fungsi untuk menangani tampilan file yang dipilih ---
        $('.file-input').on('change', function() {
            const fileName = $(this).val().split('\\').pop();
            const labelId = $(this).data('file-label');
            const $label = $('#' + labelId);

            if (fileName) {
                $label.text(`File dipilih: ${fileName}`).removeClass('hidden');
            } else {
                $label.addClass('hidden').text('');
            }
        });

        // --- Fungsi Validasi Langkah Saat Ini ---
        function validateCurrentStep() {
            let isValid = true;
            const $currentSection = $steps.eq(currentStep);

            // Cari semua input, select, textarea dengan atribut 'required'
            $currentSection.find('[required]').each(function() {
                const $input = $(this);
                let value = $input.val();

                // Tambahkan validasi khusus untuk input file (jika diperlukan)
                if ($input.is('input[type="file"]') && $input[0].files.length === 0) {
                     // Asumsi file tidak wajib jika form edit, tapi kita beri validasi dasar
                     // Untuk formulir baru, ini adalah validasi yang baik.
                     if ($input.attr('required')) {
                        isValid = false;
                        $input.closest('.relative').find('label div').addClass('border-red-500').removeClass('border-gray-300');
                     }
                } else if (!value || value.trim() === "") {
                    isValid = false;
                    $input.addClass('border-red-500').removeClass('border-gray-300');
                } else {
                    $input.removeClass('border-red-500').addClass('border-gray-300');
                    if ($input.is('input[type="file"]')) {
                        $input.closest('.relative').find('label div').removeClass('border-red-500').addClass('border-gray-300');
                    }
                }
            });

            if (!isValid) {
                alert('Mohon lengkapi semua bidang wajib (*) di halaman ini sebelum melanjutkan.');
            }

            return isValid;
        }

        // --- Handler Tombol Lanjutkan (Next) ---
        $(document).on('click', '.btn-next', function() {
            if (validateCurrentStep()) {
                // Sembunyikan langkah saat ini
                $steps.eq(currentStep).addClass('hidden');
                
                // Pindah ke langkah berikutnya
                currentStep++;
                
                // Tampilkan langkah berikutnya
                if (currentStep < totalSteps) {
                    $steps.eq(currentStep).removeClass('hidden');
                    $('html, body').animate({ scrollTop: 0 }, 'slow'); // Gulir ke atas
                }
            }
        });

        // --- Handler Tombol Kembali (Back) ---
        $(document).on('click', '.btn-back', function() {
            if (currentStep > 0) {
                // Sembunyikan langkah saat ini
                $steps.eq(currentStep).addClass('hidden');
                
                // Pindah ke langkah sebelumnya
                currentStep--;
                
                // Tampilkan langkah sebelumnya
                $steps.eq(currentStep).removeClass('hidden');
                $('html, body').animate({ scrollTop: 0 }, 'slow'); // Gulir ke atas
            }
        });
    });

    function resetSelect(names) {
        names.forEach(function (name) {
            $('select[name=' + name + ']').html('<option value="">Pilih</option>');
        });
    }
</script>
@endsection