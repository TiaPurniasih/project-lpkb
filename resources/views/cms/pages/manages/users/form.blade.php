@extends('layouts.cms.master')

@section('contents')
@php
use App\Models\User;
@endphp
<section class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-3">
        <div>
            @if($user->id)
            <h1 class="text-2xl font-semibold text-gray-900">Ubah User</h1>
            @else
            <h1 class="text-2xl font-semibold text-gray-900">Tambah User</h1>
            @endif
        </div>
        <nav class="text-sm text-gray-500">
            <a href="{{ route('cms.manage.users') }}" class="text-gray-400 hover:text-gray-600">
                Manajemen User
            </a>
            <span class="mx-2 text-gray-300">›</span>
            @if($user->id)
            <span class="font-medium text-gray-900">Ubah User</span>
            @else
            <span class="font-medium text-gray-900">Tambah User</span>
            @endif
        </nav>
    </div>

    <div class="rounded-3xl bg-white p-6 shadow-sm">
        <!-- Tabs -->
        <div class="w-full">
            <!-- Tab Header -->
            <div class="flex gap-x-6 border-b border-gray-200">
                <button class="tab-btn mr-3 pb-3 text-sm font-medium text-[#EE4D37] border-b-2 border-[#EE4D37]" data-tab="tab1">
                    Info Akun
                </button>
                @if($user->hasLevel(User::ROLE_USER) || $user->hasLevel(User::ROLE_KANWIL) )
                <button class="tab-btn pb-3 text-sm font-medium text-gray-500" data-tab="tab2">
                    @if($user->hasLevel(User::ROLE_USER))
                    Info Lembaga
                    @elseif($user->hasLevel(User::ROLE_KANWIL))
                    Info Kanwil
                    @endif
                </button>
                @endif
            
            </div>


            <!-- Tab Content -->
            <div class="mt-4">
                <div id="tab1" class="tab-content">
                    <h2 class="text-base font-semibold text-gray-900">Informasi Akun</h2>
                    <form action="{{ route('cms.manage.users.store') }}" method="POST" class="mt-6 space-y-6">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        @csrf
                        <div class="grid gap-6">
                            <label class="space-y-2">
                                <span class="text-sm font-medium text-gray-700">Nama <span class="text-red-500">*</span></span>
                                <div class="relative">
                                    <input type="text" placeholder="Nama" name="name" value="{{ $user->name }}" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                                </div>
                            </label>
                            <label class="space-y-2">
                                <span class="text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></span>
                                <div class="relative">
                                    <input type="text" placeholder="Masukkan Email" name="email" value="{{ $user->email }}" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                                </div>
                            </label>
                            <label class="space-y-2">
                                <span class="text-sm font-medium text-gray-700">Phone <span class="text-red-500">*</span></span>
                                <div class="relative">
                                    <input type="text" placeholder="Masukkan Phone" name="phone" value="{{ $user->phone }}" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                                </div>
                            </label>
                            <label class="space-y-2">
                                <span class="text-sm font-medium text-gray-700">Password {{ (!$user->id ? '<span class="text-red-500">*</span>' : '') }}</span>
                                <div class="relative">
                                    <input type="password" placeholder="********" name="password" value="" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                                </div>
                            </label>
                            <label class="space-y-2">
                                <span class="text-sm font-medium text-gray-700">Role <span class="text-red-500">*</span></span>
                                <div class="relative">
                                    @if ($user->id)
                                    @php
                                    $roleName = '';
                                        if($user->role_level == 100){
                                            $roleName = 'Super Admin';
                                        }elseif($user->role_level == 80){
                                            $roleName = 'Administrator';
                                        }elseif($user->role_level == 50){
                                            $roleName = 'Kanwil (Moderator)';
                                        }elseif($user->role_level == 10){
                                            $roleName = 'Umum';
                                        }
                                    
                                    @endphp
                                    <input type="text" name="role_level" value="{{ $roleName }}" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20" readonly>
                                    @else
                                    <select name="role_level" id="role_level" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                                        <option value="10" {{ ($user->role_level == 10 ? 'selected' : '')  }}>Umum</option>
                                        <option value="50" {{ ($user->role_level == 50 ? 'selected' : '')  }}>Kanwil</option>
                                        <option value="80" {{ ($user->role_level == 80 ? 'selected' : '')  }}>Admin</option>
                                        <option value="100" {{ ($user->role_level == 100 ? 'selected' : '')  }}>Super Admin</option>
                                    </select>
                                    @endif

                                    <small class="text-gray-400">Role hanya bisa diset SATU KALI, dan tidak bisa diubah setelahnya</small>
                                </div>
                            </label>
                            <div 
                                x-data="{ active: {{ $user->is_active ? 'true' : 'false' }} }"
                                class="space-y-2">
                                <span class="text-sm font-medium text-gray-700">
                                    Status Akun <span class="text-red-500">*</span>
                                </span>

                                <div class="flex items-center gap-3">
                                    <!-- Toggle -->
                                    <button
                                        type="button"
                                        @click="active = !active"
                                        class="flex h-7 w-12 items-center rounded-full p-1 transition-colors duration-300"
                                        :class="active ? 'bg-[#EE4D37] justify-end' : 'bg-gray-200 justify-start'"
                                    >
                                        <span class="h-5 w-5 rounded-full bg-white transition-transform duration-300"></span>
                                    </button>

                                    <!-- Text -->
                                    <span 
                                        class="text-sm font-medium"
                                        :class="active ? 'text-[#EE4D37]' : 'text-gray-500'"
                                        x-text="active ? 'Active' : 'Inactive'"
                                    ></span>

                                    <!-- Hidden input -->
                                    <input type="hidden" name="is_active" :value="active ? 1 : 0">
                                </div>
                            </div>


                            <label class="space-y-2 hidden" id="wilayah">
                                <span class="text-sm font-medium text-gray-700">Wilayah <span class="text-red-500">*</span></span>
                                <div class="relative">
                                    <select name="region" id="region" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                                        @foreach ($wilayah as $region)
                                        <option value="{{ $region->code }}">{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </label>
                        </div>
                        <!-- Jika kanwil -->

                        <div class="flex flex-wrap items-center justify-end gap-3 border-t border-gray-100 pt-6">
                            <a href="{{ route('cms.manage.users') }}"
                                class="inline-flex items-center justify-center rounded-2xl border border-[#EE4D37] px-6 py-2.5 text-sm font-semibold text-[#EE4D37] transition hover:bg-[#FFF5F2]">
                                Batalkan
                            </a>
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-2xl bg-[#EE4D37] px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#d24432]">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>

                <div id="tab2" class="tab-content hidden">
                    @if($user->hasLevel(User::ROLE_USER))
                    <h2 class="text-base font-semibold text-gray-900">Info Lembaga</h2>
                    <form action="{{ route('cms.manage.users.lembaga') }}" method="POST" class="mt-6 space-y-6">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        @csrf
                        <div class="grid gap-6">
                            <label class="space-y-2">
                                <span class="text-sm font-medium text-gray-700">Nama <span class="text-red-500">*</span></span>
                                <div class="relative">
                                    <input type="text" placeholder="Nama" name="name" value="{{ $user->name }}" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                                </div>
                            </label>
                        </div>
                        <p>Form modifikasi informasi yang terkait dengan tabel users_detail</p>
                        <p>controller perlu dikembangkan juga (belum ada handling)</p>

                    </form>
                    @elseif($user->hasLevel(User::ROLE_KANWIL))
                    <h2 class="text-base font-semibold text-gray-900">Info Kanwil</h2>
                    <form action="{{ route('cms.manage.users.kanwil') }}" method="POST" class="mt-6 space-y-6">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        @csrf
                        <div class="grid gap-6">
                            <label class="space-y-2">
                                <span class="text-sm font-medium text-gray-700">Nama <span class="text-red-500">*</span></span>
                                <div class="relative">
                                    <input type="text" placeholder="Nama" name="name" value="{{ $user->name }}" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                                </div>
                            </label>
                        </div>
                        <p>Form modifikasi informasi yang terkait dengan tabel users_detail</p>
                                                <p>controller perlu dikembangkan juga (belum ada handling)</p>

                    </form>
                    @endif

                </div>
            </div>
        </div>

       
    </div>

</section>
@endsection

@section('js')
<script>
$(document).ready(function () {

    function toggleWilayah(roleLevel) {
        if (roleLevel == 50) {
            $('#wilayah').removeClass('hidden');
        } else {
            $('#wilayah').addClass('hidden');
        }
    }

    // saat select berubah
    $('#role_level').on('change', function () {
        toggleWilayah($(this).val());
    });

    // saat halaman load (edit mode)
    const initialRole = '{{ $user->role_level }}';
    toggleWilayah(initialRole);


    $('.tab-btn').click(function () {
        let tab = $(this).data('tab');

        // reset tab button
        $('.tab-btn')
            .removeClass('text-[#EE4D37] border-b-2 border-[#EE4D37]')
            .addClass('text-gray-500');

        // active tab
        $(this)
            .addClass('text-[#EE4D37] border-b-2 border-[#EE4D37]')
            .removeClass('text-gray-500');

        // hide all content
        $('.tab-content').addClass('hidden');

        // show active content
        $('#' + tab).removeClass('hidden');
    });
});
</script>


@endsection