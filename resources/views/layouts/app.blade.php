<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">




        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="./node_modules/preline/dist/preline.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <div id="docs-sidebar" class="hs-overlay [--auto-close:sm] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-800 dark:border-neutral-700">
            @include('layouts.sidebar')
            </div>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            })
            @if(Session::has('message'))
            var type = "{{Session::get('alert-type')}}";
            switch (type) {
            case 'info':
            Toast.fire({
            icon: 'info',
            title: "{{ Session::get('message') }}"
            })
            break;
            case 'success':
            Toast.fire({
            icon: 'success',
            title: "{{ Session::get('message') }}"
            })
            break;
            case 'warning':
            Toast.fire({
            icon: 'warning',
            title: "{{ Session::get('message') }}"
            })
            break;
            case 'error':
            Toast.fire({
            icon: 'error',
            title: "{{ Session::get('message') }}"
            })
            break;
            case 'dialog_error':
            Swal.fire({
            icon: 'error',
            title: "Ooops",
            text: "{{ Session::get('message') }}",
            timer: 3000
            })
            break;
            }
            @endif
            @if ($errors->any())
            @php $list = null; @endphp
            @foreach($errors->all() as $error)
            @php $list .= '<li>'.$error.'</li>'; @endphp
            @endforeach
            Swal.fire({
            type: 'error',
            title: "Ooops",
            html: "<ul>{!! $list !!}</ul>",
            })
            @endif
        </script>
    </body>
</html>
