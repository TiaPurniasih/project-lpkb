@extends('layouts.app')

@section('contents')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <div x-data="{ pageName: `Pengaturan User`}">
            <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>

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


        <div class="space-y-5 sm:space-y-6">
            <div class="space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                        <form action="{{ route('manage.users.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="-mx-2.5 flex flex-wrap gap-5">
                                <div class="w-full px-2.5 xl:w-1/2">
                                    <label class="mb-4 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Nama
                                    </label>
                                    <input type="text" placeholder="Nama" name="name" value="{{ $user->name }}" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                </div>

                                <div class="w-full px-2.5">
                                    <label class="mb-4 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Email
                                    </label>
                                    <input type="email" name="email" placeholder="Masukkan email" value="{{ $user->email }}" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                </div>

                                <div class="w-full px-2.5">
                                    <label class="mb-4 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Kata sandi
                                    </label>
                                    <input type="password" name="password" placeholder="*******" value="" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                </div>

                                <div class="w-full px-2.5">
                                    <label class="mb-4 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                        Role
                                    </label>
                                    <select name="role_level" id="role_level" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                        <option value="10" {{ ($user->role_level == 10 ? 'selected' : '')  }}>ROLE_USER</option>
                                        <option value="50" {{ ($user->role_level == 50 ? 'selected' : '')  }}>ROLE_MODERATOR</option>
                                        <option value="80" {{ ($user->role_level == 80 ? 'selected' : '')  }}>ROLE_ADMIN</option>
                                        <option value="100" {{ ($user->role_level == 100 ? 'selected' : '')  }}>ROLE_SUPERADMIN</option>
                                    </select>
                                </div>

                              

                                <div class="w-full px-2.5">
                                    <button type="submit" class="bg-brand-500 hover:bg-brand-600 flex w-full items-center justify-center gap-2 rounded-lg p-3 text-sm font-medium text-white transition-colors">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection