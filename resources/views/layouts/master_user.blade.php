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

<body class="bg-gray-50 min-h-screen flex flex-col">
    @include('layouts.header_user')

    <!-- ===== Main Content Start ===== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1">
        @yield('contents')
    </main>

    @include('layouts.footer_user')

    <!-- ===== Main Content End ===== -->

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