@extends('layouts.master_user')

@section('contents')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Pengajuan Izin</h1>
    <div class="flex items-center text-sm text-gray-500">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        <a href="{{  route('user.dashboard') }}" class="hover:text-gray-700">Home</a>
        <span class="mx-2">></span>
        <span>Pengajuan Perizinan</span>
    </div>
</div>

<!-- Main Card -->
<div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
    <!-- Title and Subtitle -->
    <p class="text-lg text-gray-600 mb-6">Pilih Jalur Pendidikan</p>

    <!-- Segmented Control: Formal and Nonformal -->
   <div class="inline-flex border border-red-600 rounded-lg overflow-hidden mb-8" role="group">
        @foreach (config('siopkb.form_type') as $key => $form)
            <button 
                class="tab-btn px-6 py-2 font-medium border-r focus:outline-none  {{ $loop->first ? 'active bg-red-600 text-white' : 'bg-white text-red-600' }}" data-target="{{ $key }}">
                {{ ucfirst($key) }}
            </button>
        @endforeach
    </div>

    {{-- Contoh card --}}
    @foreach (config('siopkb.form_type') as $key => $forms)
    <div id="{{$key}}" class="tab-card grid grid-cols-1 md:grid-cols-3 gap-6 {{ !$loop->first ? 'hidden' : '' }}">
        {{-- Formal cards --}}
        @foreach ($forms as $form)
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="flex items-start mb-4">
                    <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg text-gray-900 mb-3">{{ $form['title'] }}</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                    {{$form['description']}}
                </p>
                <a href="{{ route('user.perizinan.form', [$key, $form['code']]) }}" class="text-sm font-medium text-red-600 hover:text-red-700 inline-flex items-center">
                    Ajukan Perizinan
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        @endforeach
    </div>
    @endforeach
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    $('.tab-btn').on('click', function() {
        let target = $(this).data('target');
        $('.tab-btn')
            .removeClass('bg-red-600 text-white active')
            .addClass('bg-white text-red-600');

        $(this)
            .removeClass('bg-white text-red-600')
            .addClass('bg-red-600 text-white active');
        $('.tab-card').addClass('hidden');
        $('#' + target).removeClass('hidden');
    });

});
</script>
@endsection