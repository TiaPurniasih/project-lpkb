<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title', 'Dashboard Admin Pusat')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ sidebarOpen: false }" class="bg-[#F8F8F8] text-gray-900 antialiased">
    <div class="flex min-h-screen">
        @include('admin-pusat.components.sidebar')

        <div class="flex min-h-screen flex-1 flex-col">
            <div x-show="sidebarOpen" x-transition.opacity
                class="fixed inset-0 z-30 bg-gray-900/40 lg:hidden"
                @click="sidebarOpen = false"></div>

            @include('admin-pusat.components.header')

            <main class="flex-1 px-4 py-6 md:px-10 md:py-10">
                @yield('content')
            </main>

            @include('admin-pusat.components.footer')
        </div>
    </div>
</body>

</html>

