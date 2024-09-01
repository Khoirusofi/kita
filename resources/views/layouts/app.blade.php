<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://font.googleapos.com" />
    <link href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-['Poppins'] text-gray-900 antialiased">
    <div class="min-h-screen bg-gray-100">
        {{-- @include('layouts.navigation') --}}

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        @include('components.footer')
    </div>

    <!-- Back to top button -->
    <a href="#"
        class="scrollup px-2 py-2 bg-gray-600 text-white rounded-md font-medium text-sm hover:bg-gray-900 transition duration-300 transform hover:-translate-y-1 fixed right-10 bottom-10 inline-flex z-10 opacity-0 pointer-events-none"
        id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>

    <!-- scrollbar -->
    <style>
        ::-webkit-scrollbar {
            width: 0.4rem;
            background: #fff;
        }

        ::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 0.3rem;
        }
    </style>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

</html>
