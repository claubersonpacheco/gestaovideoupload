<div>

    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">

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
                        <div wire:loading>
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="12" r="3" opacity="1"><animate id="spinner_qYjJ" begin="0;spinner_t4KZ.end-0.25s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze"/></circle><circle cx="12" cy="12" r="3" opacity=".4"><animate begin="spinner_qYjJ.begin+0.15s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze"/></circle><circle cx="20" cy="12" r="3" opacity=".3"><animate id="spinner_t4KZ" begin="spinner_qYjJ.begin+0.3s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze"/></circle></svg><!-- SVG loading spinner -->
                        </div>
                    </button>
                </div>
            </form>

        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
        </div>
    </div>
</div>


