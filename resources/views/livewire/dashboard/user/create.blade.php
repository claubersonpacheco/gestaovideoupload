<div>
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- Card Section -->
            <div class="max-w-full  py-5 sm:px-6 lg:px-1 lg:py-7 mx-auto">
                <!-- Card -->
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <!-- Page Heading -->
                    <header class="mb-10 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">


                        <div>
                            <p class="mb-2 text-sm font-semibold text-blue-600">{{ __('User') }}</p>
                            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">{{ __($title) }}</h1>

                        </div>
                        <div>
                            <div class="inline-flex gap-x-2">


                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                   href="{{ route('users.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                    </svg>

                                    {{ __('Return') }}
                                </a>
                            </div>
                        </div>

                    </header>

                    <!-- End Page Heading -->

                    <!--form-->
                    <livewire:dashboard.user.form :form="$form" :action="$action" :data="$data" :title="$title"/>
                    <!--endform-->

                </div>
                <!-- End Card -->
            </div>
            <!-- End Card Section -->
        </div>
    </div>
</div>
