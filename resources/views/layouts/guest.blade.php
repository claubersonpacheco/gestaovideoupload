<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<main>
    <div class="flex flex-col min-h-screen max-w-6xl mx-auto p-4">
        <div class="grid md:grid-cols-5 items-center mb-10 mt-20">
            <div class="md:col-start-3 ">
                <div class="mt-5">
                    <a href="/">
                      <x-application-logo class="h-30 fill-current text-gray-500" />
                    </a>
                </div>
            </div>
        </div>

          {{ $slot }}


    </div>
</main>


{{--        <div class="min-h-screen flex  sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">--}}
{{--            <div class="mt-10">--}}
{{--                <a href="/">--}}
{{--                    <x-application-logo class="h-100 fill-current text-gray-500" />--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">--}}
{{--                {{ $slot }}--}}
{{--            </div>--}}
{{--        </div>--}}
</body>
</html>
