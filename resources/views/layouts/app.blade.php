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

<body  
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
            darkMode = JSON.parse(localStorage.getItem('darkMode'));
            $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}">
    
    <!-- ===== Preloader Start ===== -->
    <div x-show="loaded"
        x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 500)})"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-brand-500 border-t-transparent"></div>
    </div>
    <!-- ===== Preloader End ===== -->

    <div class="flex h-screen overflow-hidden">
        @include('layouts.navigation')

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">

            <!-- Small Device Overlay Start -->
            <div @click="sidebarToggle = false" :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
                class="fixed w-full h-screen z-9 bg-gray-900/50"></div>
            <!-- Small Device Overlay End -->
            @include('layouts.header')

            <!-- ===== Main Content Start ===== -->
            <main> 
                @yield('contents')
            </main>
            <!-- ===== Main Content End ===== -->

        </div>
        <!-- ===== Content Area End ===== -->
    </div>

    <!-- ===== Page Wrapper End ===== -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

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