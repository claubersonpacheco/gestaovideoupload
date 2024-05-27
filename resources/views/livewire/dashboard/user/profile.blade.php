<div>
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">

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
                                   href="javascript:function(history)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                    </svg>

                                    {{ __('Return') }}
                                </a>
                            </div>
                        </div>

                    </header>

                    <!-- End Page Heading -->

                    {{--imagem--}}
                    <div class="grid sm:grid-cols-12 gap-2 sm:gap-6 pb-10">

                        <div class="sm:col-span-3">
                            <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                {{ __('Photo') }}
                            </label>
                        </div>
                        <!-- End Col -->
                        <div class="sm:col-span-9">
                            <div class="sm:flex">

                                @if($data->photo)
                                    <div class="relative inline-block">
                                        <img class="inline-block size-[80px] rounded-full" src="{{ asset('storage/images/user/'.$data->photo) }}" alt="{{ $data->name }}">
                                        <span wire:click="deletePhoto({{ $data->id }})" class="absolute bottom-0 end-0 block size-3.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </span>
                                    </div>

                                @else

                                    <div class="relative inline-block">



                                        <svg class="inline-block size-[80px] rounded-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                        <button wire:click="$dispatch('openModal', { component: 'dashboard.user.photo', arguments: { user: {{ $data->id }} }  })" >

                                            <span class="absolute bottom-0 end-0 block size-3.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </span>

                                        </button>

                                    </div>

                                @endif


                            </div>

                        </div>
                        <!-- End Col -->

                        <!--end row-->
                    </div>
                    {{--end image--}}

                    <livewire:dashboard.user.form :form="$form" :action="$action" :data="$data" :title="$title"/>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Card Section -->
        </div>
    </div>
</div>
