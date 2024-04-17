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
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500" href="#">
                Set Up
                <svg class="flex-shrink-0 mx-2 overflow-visible h-4 w-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </a>
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
                    <p class="mb-2 text-sm font-semibold text-blue-600">SetUp</p>
                    <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Settings</h1>

                </div>
                <div>
                    <div class="inline-flex gap-x-2">


                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                           href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                            </svg>

                            Dashboard
                        </a>
                    </div>
                </div>

            </header>

            <!-- End Page Heading -->

            <form wire:submit.prevent="save" >
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                    <div class="sm:col-span-3">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            {{ __('Logo') }}
                        </label>
                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-9">
                        <div class="sm:flex">



                            @if($data->logo)
                                <img class="w-1/2 rounded-md" src="{{ asset('storage/images/logo/'.$data->logo) }}" alt="{{ $data->name }}">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                            @endif


                        </div>

                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-3">
                        <label for="logo" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            {{ __('Buscar imagem') }}
                        </label>
                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <div
                                x-data="{ uploading: false, progress: 0 }"
                                x-on:livewire-upload-start="uploading = true"
                                x-on:livewire-upload-finish="uploading = false"
                                x-on:livewire-upload-cancel="uploading = false"
                                x-on:livewire-upload-error="uploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >

                                <input id="logo" wire:model="form.logo" type="file" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" >

                                <!-- Progress Bar -->
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>

                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('form.logo')" />
                    </div>
                    <!-- End Col -->


                    <div class="sm:col-span-3">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            {{ __('Name') }}
                        </label>
                    </div>
                    <!-- End Col -->
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="name" wire:model="form.name" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="">

                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('form.name')" />
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-12 border-b">
                        <h2 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Stream</h2>

                    </div>



                    <div class="sm:col-span-3">
                        <label for="collection" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            {{ __('Stream Library Id') }}
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="name" wire:model="form.streamLibraryId" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="">

                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('form.streamLibraryId')" />
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="collection" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            {{__('Stream Api Key')}}
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <input id="collection" wire:model="form.streamApiKey" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="">
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('form.streamApiKey')" />
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="description" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            {{ __('Stream User Api Key') }}
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <input id="collection" wire:model="form.streamUserApiKey" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="">
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('form.streamUserApiKey')" />
                    <!-- End Col -->

                    <div class="sm:col-span-12 border-b">
                        <h2 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Moodle</h2>

                    </div>



                    <div class="sm:col-span-3">
                        <label for="moodleToken" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            {{ __('Moodle Token') }}
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="moodleToken" wire:model="form.moodleToken" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="">

                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('form.moodleToken')" />
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="moodleUrl" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            {{__('Moodle Url')}}
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <input id="moodleUrl" wire:model="form.moodleUrl" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="">
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('form.moodleUrl')" />
                    <!-- End Col -->




                </div>
                <!-- End Grid -->

                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button" wire:click="cancel" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        Save
                    </button>
                </div>
            </form>

        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</div>
