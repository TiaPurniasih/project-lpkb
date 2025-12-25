<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
         @yield('title', 'LPKB')
    </title>
    <link rel="icon" href="favicon.ico">
    @vite(['resources/css/app.css', 'resources/js/app.js']) 

    <style>
        .my-swal {
            z-index: 99999 !important;
        }
    </style>
</head>

<body x-data="{ sidebarOpen: false }" class="bg-[#F8F8F8] text-gray-900 antialiased">
    <div class="flex min-h-screen">
        @include('layouts.sidebar_admin')


        <div class="flex min-h-screen flex-1 flex-col">
            <div x-show="sidebarOpen" x-transition.opacity
                class="fixed inset-0 z-30 bg-gray-900/40 lg:hidden"
                @click="sidebarOpen = false"></div>

            @include('layouts.header_admin')


            <main class="flex-1 px-4 py-6 md:px-10 md:py-10">
                @yield('content')
            </main>

            @include('layouts.footer_admin')

            <!-- ===== Page Wrapper End ===== -->

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

        </div>
    </div>
</body>

</html>