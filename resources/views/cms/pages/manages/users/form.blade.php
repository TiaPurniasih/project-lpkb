@extends('layouts.cms.master')

@section('contents')

 <section class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Tambah User</h1>
            <p class="text-sm text-gray-500">Lengkapi data akun dibawah ini.</p>
        </div>
        <nav class="text-sm text-gray-500">
            <a href="{{ route('cms.manage.users') }}" class="text-gray-400 hover:text-gray-600">
                Manajemen User
            </a>
            <span class="mx-2 text-gray-300">›</span>
            <span class="font-medium text-gray-900">Tambah User</span>
        </nav>
    </div>

    <div class="rounded-3xl bg-white p-6 shadow-sm">
        <h2 class="text-base font-semibold text-gray-900">Identitas Lembaga</h2>

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
                        <input type="text" placeholder="Masukkan Nama" name="email" value="{{ $user->email }}" class="w-full appearance-none rounded-2xl border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 focus:border-[#EE4D37] focus:outline-none focus:ring-2 focus:ring-[#EE4D37]/20">
                    </div>
                </label>
                <label class="space-y-2">
                    <span class="text-sm font-medium text-gray-700">Password <span class="text-red-500">*</span></span>
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

});
</script>
@endsection