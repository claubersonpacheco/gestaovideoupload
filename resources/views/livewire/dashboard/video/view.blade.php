<div>
    <!--Breadcrumb-->
    <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="{{ route('dashboard') }}">
                Home
            </a>
            <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </li>
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="{{ route('videos') }}">
                Videos
                <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </a>
        </li>
        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
            View
        </li>
    </ol>
    <!--end Breadcrumb-->

    <!-- Card Section -->
    <div class="max-w-full  py-5 sm:px-6 lg:px-1 lg:py-7 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">

            <!-- Page Heading -->
            <header>
                <p class="mb-2 text-sm font-semibold text-blue-600">View Video</p>
                <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">{{ $video->name }}</h1>
                <hr class="mt-5 mb-10">
            </header>

            <!-- End Page Heading -->
                <div class="flex items-center inline-flex">
{{--                <video width="480" height="360" controls>--}}
{{--                    <source src="{{ route('getVideo', $video->id) }}" type="video/mp4">--}}
{{--                    Your browser does not support the video tag.--}}
{{--                </video>--}}


                    <iframe width="480" height="360" class="w-full aspect-video" src="https://iframe.mediadelivery.net/embed/203798/39943563-291a-42aa-9106-802733493a39?autoplay=false&loop=false&muted=false&preload=true&responsive=true"></iframe>
                </div>
        </div>
    </div>

</div>
