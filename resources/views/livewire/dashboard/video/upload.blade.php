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
                Upload
        </li>
    </ol>
    <!--end Breadcrumb-->
    <!-- Card Section -->
    <div class="max-w-full  py-5 sm:px-6 lg:px-1 lg:py-7 mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">


            <!-- Page Heading -->
            <header>
                <p class="mb-2 text-sm font-semibold text-blue-600"> Upload Video</p>
                <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">Video: {{ $name }} </h1>
                <hr class="mt-5 mb-10">
            </header>

            <!-- End Page Heading -->
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <form

                x-on:submit.prevent="submit"

                x-data="{

                        uploader : null,
                        progress: 0,

                        cancel () {
                            this.uploader.abort()

                            $nextTick( () => {
                                 this.uploader = null
                                 this.progress = 0
                            })
                        },

                        submit() {
                            const file = $refs.file.files[0]

                            if(!file){
                                return
                            }
                            this.uploader = createUpload({
                                file : file,
                                endpoint : '{{ route('livewire.upload') }}',
                                method: 'post',
                                headers : {
                                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                                },
                                chunkSize : 50 * 1024,
                            })

                            this.uploader.on('progress', (progress) => {
                                this.progress = progress.detail
                            })

                            this.uploader.on('chunkSuccess', (response) => {
                                if(!response.detail.response.body){
                                    return
                                }

                                $wire.call('handleSuccess', file.name, JSON.parse(response.detail.response.body).file)
                            })

                            this.uploader.on('success', () => {
                                this.uploader = null
                                this.progress = 0
                            })

                        }
                    }"
            >
                <!-- Grid -->
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">


                    <div class="sm:col-span-3">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                            Escolha um video (Extensão MP4)
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="name" type="file" id="file" x-ref="file"   class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Name">


                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('form.name')" />
                    </div>
                    <!-- End Col -->

                </div>
                <!-- End Grid -->

                <template x-if="uploader">
                    <div class="space-y-1 mt-8">
                        <div class="bg-gray-100 shadow-inner h-3 rounded overflow-hidden">
                            <div class="bg-blue-500 h-full transition-all duration-200" x-bind:style="{ width: `${progress}%` }"></div>
                        </div>

                        <div class="flex items-center space-x-3 text-sm">
                            <button type="button" class="text-blue-500" x-on:click="!uploader.paused ? uploader.pause() : uploader.resume()" x-text="!uploader.paused ? `Pause` : `Resume`">Pause</button>
                            <button type="button" class="text-blue-500" x-on:click="cancel">Cancel</button>
                        </div>
                    </div>
                </template>

                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button" wire:click="cancel" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        Cancel
                    </button>
                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        Save
                    </button>
                </div>
            </form>


            <div class="sm:col-span-3 space-y-4 mt-6">

                <livewire:dashboard.video.listen-websocket :videoid="$id"/>

            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</div>


