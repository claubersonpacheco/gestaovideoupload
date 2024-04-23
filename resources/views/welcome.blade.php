<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
    </head>

    <body class="dark:bg-neutral-900">
    <!-- ========== HEADER ========== -->
    <header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full py-7">
        <nav class="relative max-w-7xl w-full flex flex-wrap md:grid md:grid-cols-12 basis-full items-center px-4 md:px-6 md:px-8 mx-auto" aria-label="Global">
            <div class="md:col-span-3">
                @if(setting()->logo != null)
                <!-- Logo -->
                <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="{{ route('welcome') }}" aria-label="{{ setting()->name }}">
                    <img src="{{ asset('storage/images/logo/'. setting()->logo ) }}" alt="{{ setting()->name }}">
                </a>
                <!-- End Logo -->
                @else
                    <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="{{ route('welcome') }}" aria-label="{{ setting()->name }}">
                        {{ setting()->name }}
                    </a>
                @endif
            </div>

            <!-- Button Group -->
            <div class="flex items-center gap-x-2 ms-auto py-1 md:ps-6 md:order-3 md:col-span-3">

                @if (Route::has('login'))
                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-lime-400 text-black hover:bg-lime-500 transition disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-lime-500">
                                                Login
                                            </button>
                                        </a>
                                    @endauth
                                </div>
                            @endif

                <div class="md:hidden">
                    <button type="button" class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-neutral-700 dark:hover:bg-neutral-700" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- End Button Group -->

            <!-- Collapse -->
            <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6">
                <div class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0">
                    <div>
                        <a class="relative inline-block text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 dark:text-white" href="#" aria-current="page">Work</a>
                    </div>
                    <div>
                        <a class="inline-block text-black hover:text-gray-600 dark:text-white dark:hover:text-neutral-300" href="#">Services</a>
                    </div>
                    <div>
                        <a class="inline-block text-black hover:text-gray-600 dark:text-white dark:hover:text-neutral-300" href="#">About</a>
                    </div>
                    <div>
                        <a class="inline-block text-black hover:text-gray-600 dark:text-white dark:hover:text-neutral-300" href="#">Careers</a>
                    </div>
                    <div>
                        <a class="inline-block text-black hover:text-gray-600 dark:text-white dark:hover:text-neutral-300" href="#">Blog</a>
                    </div>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <!-- Slider -->
        <div class="flex flex-col px-4 lg:px-6 lg:px-8 items-center ">
            <div class="overflow-hidden sm:justify-center items-center pt-6 sm:pt-0 ">
                                <img class="object-cover h-screen" src="{{ asset('storage/images/01-destaque.jpg' ) }}" alt="">
            </div>
        </div>
        <!-- End Slider -->







    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- Required plugins -->
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>

    <!-- JS THIRD PARTY PLUGINS -->
    <!-- Google Analytics. Global site tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B73TDMXKF5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', '');
    </script>
    </body>
</html>
