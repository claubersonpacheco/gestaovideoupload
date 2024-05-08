<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ setting()->name  }} - {{ $title ?? 'Dashboard' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="bg-gray-50 dark:bg-slate-900">
    <!-- ========== HEADER ========== -->
    @include('layouts.header')
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    @livewire('dashboard.sidebar.index')

    <!-- Content -->
   <main>


       <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
       {{ $slot }}
       </div>
   </main>
    <!-- End Content -->

    @livewire('wire-elements-modal')



  </body>
</html>
