<!doctype html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title', 'Dashboard CMS')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

</head>

<body x-data="{ sidebarOpen: false }" class="bg-[#F8F8F8] text-gray-900 antialiased">
    <div class="flex min-h-screen">
        @include('layouts.cms.sidebar')

        <div class="flex min-h-screen flex-1 flex-col">
            <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-30 bg-gray-900/40 lg:hidden" @click="sidebarOpen = false"></div>

            @include('layouts.cms.header')

            <main class="flex-1 px-2 py-4 md:px-6 md:py-4">
                @yield('contents')
            </main>

            @include('layouts.cms.footer')

        </div>
    </div>

    @yield('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    container: 'my-swal'
                }
            });
        @endif
    
        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    container: 'my-swal'
                }
            });
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: @json($error),
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    customClass: {
                        container: 'my-swal'
                    }
                });
            @endforeach
        @endif
    </script>
</body>

</html>

