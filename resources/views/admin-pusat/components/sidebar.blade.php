@php
    $menuItems = [
        [
            'label' => 'Dashboard',
            'href' => route('admin-pusat.dashboard'),
            'icon' => '<rect x="3" y="3" width="7" height="7" /><rect x="14" y="3" width="7" height="7" /><rect x="14" y="14" width="7" height="7" /><rect x="3" y="14" width="7" height="7" />',
            'active' => request()->routeIs('admin-pusat.dashboard'),
        ],
        [
            'label' => 'Pengajuan Perizinan',
            'href' => '#',
            'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>',
            'active' => request()->routeIs('admin-pusat.pengajuan-perizinan.*'),
            'expandable' => true,
            'children' => [
                [
                    'label' => 'List Pengajuan Izin',
                    'href' => route('admin-pusat.pengajuan-perizinan.index'),
                    'active' => request()->routeIs('admin-pusat.pengajuan-perizinan.index'),
                ],
                [
                    'label' => 'Riwayat Pengajuan Izin',
                    'href' => route('admin-pusat.pengajuan-perizinan.history'),
                    'active' => request()->routeIs('admin-pusat.pengajuan-perizinan.history'),
                ],
            ],
        ],
        [
            'label' => 'Manajemen Sertifikat',
            'href' => route('admin-pusat.manajemen-sertifikat.index'),
            'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>',
            'active' => request()->routeIs('admin-pusat.manajemen-sertifikat.index'),
        ],
        [
            'label' => 'Manajemen Kanwil',
            'href' => route('admin-pusat.manajemen-kanwil.index'),
            'icon' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>',
            'active' => request()->routeIs('admin-pusat.manajemen-kanwil.index'),
        ],
        [
            'label' => 'Pengaturan',
            'href' => route('admin-pusat.pengaturan.index'),
            'icon' => '<circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>',
            'active' => request()->routeIs('admin-pusat.pengaturan.index'),
        ],
    ];
@endphp

<aside x-cloak
    class="fixed inset-y-0 left-0 z-40 flex flex-col bg-white shadow-sm transition-transform duration-300 ease-out lg:static lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
    <!-- Logo Section -->
    <div class="border-b p-6">
        <div class="flex items-center gap-2">
            <div class="flex h-10 w-10 items-center justify-center rounded bg-red-500 text-lg font-bold text-white">
                S
            </div>
            <div>
                <h1 class="font-bold text-gray-800">SIOPKB</h1>
                <p class="text-xs text-gray-500">Sistem Izin Operasional Pendidikan Keagamaan Buddha</p>
            </div>
        </div>
    </div>

    <!-- Menu Section -->
    <nav class="flex-1 p-4">
        <p class="mb-3 px-3 text-xs text-gray-500">MENU</p>
        
        @foreach ($menuItems as $item)
            @php
                $isExpandable = $item['expandable'] ?? false;
                $children = $item['children'] ?? [];
            @endphp

            @if ($isExpandable)
                @php
                    $parentActive = $item['active'] ?? false;
                @endphp
                <div class="mb-2" x-data="{ open: @json($parentActive) }">
                    <button type="button"
                        class="flex w-full items-center justify-between rounded-2xl px-3 py-3 text-sm font-medium transition"
                        :class="open ? 'bg-red-50 text-red-500' : 'text-gray-700 hover:bg-gray-50'"
                        @click="open = !open">
                        <div class="flex items-center gap-3">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                {!! $item['icon'] !!}
                            </svg>
                            <span>{{ $item['label'] }}</span>
                        </div>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            :class="open ? 'text-red-500 rotate-180 transition' : 'text-gray-400 transition'">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>

                    <div x-cloak x-show="open" x-transition
                        class="mt-2 space-y-2 rounded-2xl bg-[#FFE9E2]/60 p-3">
                        @foreach ($children as $child)
                            @php $childActive = $child['active'] ?? false; @endphp
                            <a href="{{ $child['href'] }}"
                                class="block rounded-2xl px-4 py-2 text-sm font-medium transition {{ $childActive ? 'bg-white text-[#D84B42]' : 'text-gray-700 hover:bg-white hover:text-[#D84B42]' }}">
                                {{ $child['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <a href="{{ $item['href'] }}" class="mb-1 flex items-center gap-3 rounded-lg px-3 py-3 {{ $item['active'] ? 'bg-red-50 text-red-500' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        {!! $item['icon'] !!}
                    </svg>
                    <span class="{{ $item['active'] ? 'font-medium' : '' }}">{{ $item['label'] }}</span>
                </a>
            @endif
        @endforeach
    </nav>
</aside>
