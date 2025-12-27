<div class="inline-flex items-center shadow-theme-xs">
    {{-- View --}}
    <a href="{{ route('cms.manage.users.view', $user->id) }}"
       class="-ml-px inline-flex items-center gap-2 px-3 py-3 text-sm font-medium
              border border-solid ring-dark-500 rounded-l-lg
              hover:bg-brand-500 hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
             viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2.062 12.348a1 1 0 0 1 0-.696
                     10.75 10.75 0 0 1 19.876 0
                     1 1 0 0 1 0 .696
                     10.75 10.75 0 0 1-19.876 0"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
    </a>

    {{-- Edit --}}
    <a href="{{ route('cms.manage.users.form', $user->id) }}"
       class="-ml-px inline-flex items-center gap-2 px-3 py-3 text-sm font-medium
              border border-solid ring-dark-500
              hover:bg-brand-500 hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
             viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
            <path d="M18.375 2.625a1 1 0 0 1 3 3
                     l-9.013 9.014a2 2 0 0 1-.853.505
                     l-2.873.84a.5.5 0 0 1-.62-.62
                     l.84-2.873a2 2 0 0 1 .506-.852z"/>
        </svg>
    </a>

    {{-- Delete (Native Laravel) --}}
    <form action="{{ route('cms.manage.users.destroy', $user->id) }}"
          method="POST"
          onsubmit="return confirm('Yakin ingin menghapus user ini?')"
          class="-ml-px">
        @csrf
        @method('DELETE')

        <button type="submit"
            class="inline-flex items-center gap-2 px-3 py-3 text-sm font-medium
                   border border-solid ring-dark-500 rounded-r-lg
                   hover:bg-red-500 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                <path d="M3 6h18"/>
                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
            </svg>
        </button>
    </form>
</div>
