@extends('layouts.cms.master')

@section('contents')

<section class="space-y-6">
    @php
    use App\Models\User;
    @endphp
    <div class="flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Detail User</h1>
        </div>
        <nav class="text-sm text-gray-500">
            <a href="{{ route('cms.manage.users') }}" class="text-gray-400 hover:text-gray-600">
                Manajemen User
            </a>
            <span class="mx-2 text-gray-300">›</span>
            <span class="font-medium text-gray-900">Detail User</span>
        </nav>
    </div>

    <div class="rounded-3xl bg-white p-6 shadow-sm">
        <h2 class="text-base font-semibold text-gray-900">Informasi Akun</h2>
        <table class="w-full  border-collapse">
            <colgroup>
                <col style="width:15%"></col>
                <col style="width:35%"></col>
                <col style="width:15%"></col>
                <col style="width:35%"></col>
            </colgroup>
            <tbody>
                <tr>
                    <td class="py-2 text-left text-sm font-medium">Nama</td>
                    <td class="py-2 text-left text-sm font-medium">{{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-left text-sm font-medium">Email</td>
                    <td class="py-2 text-left text-sm font-medium">{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-left text-sm font-medium">Phone</td>
                    <td class="py-2 text-left text-sm font-medium">{{ $user->phone }}</td>
                </tr>
                <tr>
                    <td class="py-2 text-left text-sm font-medium">Status</td>
                    <td class="py-2 text-left text-sm font-medium">
                        <form action="{{ route('cms.manage.users.status') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div 
                                x-data="{ active: {{ $user->is_active ? 'true' : 'false' }} }"
                                class="space-y-2 flex ">

                                <div class="flex items-center gap-3 mr-3">
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

                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-2xl bg-[#EE4D37] px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#d24432]">
                                    Ubah
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @if($user->hasLevel(User::ROLE_USER))
    <div class="rounded-3xl bg-white p-6 shadow-sm">
        <h2 class="text-base font-semibold text-gray-900">Informasi Lembaga</h2>
        <p>Perlu ditampilkan data terkait</p>

    </div>
    @elseif($user->hasLevel(User::ROLE_KANWIL))
    @endif

</section>


@endsection