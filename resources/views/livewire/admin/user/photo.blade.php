<div>
            <form wire:submit.prevent="updatePhoto">
            <div class="absolute top-2 end-2">
                <button wire:click="resetInput()" type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            <div class="p-4 sm:p-10 overflow-y-auto">
                <div class="mb-6 text-center">
                    <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                        {{ __('Find Image') }}
                    </h3>
                    <p class="text-gray-500">
                        Busque uma imagem de até 2 mb
                    </p>
                </div>

                <div class="space-y-4">


                    <!-- Card -->
                    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                        <label for="hs-preline-communication" class="flex p-4 md:p-5">
                      <span class="flex me-5">

                        <span class="ms-5">
                           @if($photo)
                                <div class="inline-block">
                                    <img class="inline-block w-full"  src="{{ $photo->temporaryUrl() }}" alt="Image Description">
                                </div>

                            @else


                            @endif
                        </span>
                      </span>



                           </label>


                            <!-- Grid -->
                            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

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

                                            <input wire:model="photo" id="{{$rand }}" type="file" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" >

                                            <!-- Progress Bar -->
                                            <div x-show="uploading">
                                                <progress max="100" x-bind:value="progress"></progress>
                                            </div>
                                        </div>

                                    </div>
                                    <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                                </div>
                                <!-- End Col -->



                                <!--end row-->
                            </div>
                            <!-- End Grid -->



                    </div>
                    <!-- End Card -->
                </div>
            </div>

            <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                <button wire:click="resetInput()"  type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800" data-hs-overlay="#hs-notifications">
                    Cancel
                </button>
                <button type="submit"  class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    {{ __('Save') }}
                </button>
            </div>
            </form>

</div>

