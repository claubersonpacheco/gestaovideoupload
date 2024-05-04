<div>
<!--Breadcrumb-->
<ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
    <li class="inline-flex items-center">
        <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="{{ route('dashboard.index') }}">
            Home
        </a>
        <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
    </li>
    <li class="inline-flex items-center">
        <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="{{ route('videos.index') }}">
            Videos
            <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>
    </li>
    <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200" aria-current="page">
        Show
    </li>
</ol>
<!--end Breadcrumb-->

<!-- Card Section -->
<div class="max-w-full  py-5 sm:px-6 lg:px-1 lg:py-7 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">

        <!-- Page Heading -->
        <header class="mb-10 px-0 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
            <div>
                <p class="mb-2 text-sm font-semibold text-blue-600">Video</p>
                <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">{{ __('Show Video') }}</h1>
            </div>
            <div>
                <div class="inline-flex gap-x-2">
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                       href="{{ route('videos.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>

                        Return
                    </a>
                </div>
            </div>
        </header>

        <!-- End Page Heading -->



        <div class="grid gap-2 md:flex justify-normal items-center">

            <div class="md:w-1/2 sm:w-full mb-4">
                    <div class="relative" style="padding-top: 56.25%">
                        <iframe class="absolute inset-0 w-full h-full aspect-video" src="{{ $video->file_path }}?autoplay=false&loop=false&muted=false&preload=true&responsive=true" loading="lazy" allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;" allowfullscreen="true"></iframe>
                    </div>
            </div>


            <div class="md:w-1/2 sm:w-full mb-4">
                    <!-- Card -->
                <div class="block rounded-lg bg-white dark:bg-neutral-700 text-center">

                    <!-- Card body -->
                    <div class="p-6">

                        <!-- Text -->
                        <label for="embed">Copie o código Embed</label>
                        <textarea id="embed" rows="8" class="w-full block rounded-lg border-gray-300 border-2 dark:border-none dark:bg-neutral-600 py-[9px] px-3 pr-4 text-sm focus:border-blue-400 focus:ring-1 focus:ring-blue-400 focus:outline-none"><iframe src="{{ $video->file_path }}?autoplay=false&loop=false&muted=false&preload=true&responsive=true" loading="lazy" style="border:0;min-height:360px;width:100%;" allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;" allowfullscreen="true"></iframe></textarea>



                        <!-- Button -->
                        <button onclick="copyToClipboard()"
                           class="mt-3 inline-block rounded bg-blue-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-blue-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                            Copiar
                        </button>

                    </div>

                </div>
            <!-- Card -->
            </div>

            </div>
    </div>
</div>

</div>

<script>

    const embed = document.querySelector('textarea')

    function copyToClipboard(){
        window.navigator.clipboard.writeText(embed.value).then(() => {
            alert('Embed Copiado')
        })
    }

</script>
