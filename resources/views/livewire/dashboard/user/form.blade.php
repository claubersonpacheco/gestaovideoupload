<div>
    <!--form-->
    <form wire:submit.prevent="{{ $action }}">
        <!-- Grid -->



        @if (Auth::user()->can(['master', 'manager'], $data))
            <div class="grid gap-6 mb-6 md:grid-cols-5">
                <div class="col-span-2">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Username') }}</label>
                    <input wire:model="form.username" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username"  />
                    <x-input-error class="mt-2" :messages="$errors->get('form.username')" />
                </div>
            </div>
        @else
            <div class="grid gap-6 mb-6 md:grid-cols-5">
                <div class="col-span-2">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Username') }}</label>
                    <input type="text" value="{{ $data->username }}" disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
            </div>
        @endif

        <div class="grid gap-6 mb-6 md:grid-cols-5">

            <div class="col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Name') }}</label>
                <input wire:model="form.name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John"  />
                <x-input-error class="mt-2" :messages="$errors->get('form.name')" />

            </div>
            <div class="col-span-2">
                <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Last Name') }}</label>
                <input wire:model="form.lastname" type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <x-input-error class="mt-2" :messages="$errors->get('form.lastname')" />
            </div>
            <div>
                <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Birth day') }}</label>
                <input wire:model="form.birthday"
                       type="date"
                       id="birthday"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <x-input-error class="mt-2" :messages="$errors->get('form.birthday')" />
            </div>
            <div x-data="{ mobile : @entangle('form.mobile')}">
                <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Mobile') }}</label>
                <input wire:model="form.mobile"
                       x-model="mobile"
                       x-on:input="mobile = mobile.replace(/\D/g, '').replace(/(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3')"
                       type="tel" id="mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(99) 99999-9999"  />
                <x-input-error class="mt-2" :messages="$errors->get('form.mobile')" />
            </div>
            <div x-data="{ phone :@entangle('form.phone')}">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Phone') }}</label>
                <input wire:model="form.phone"
                       x-model="phone"
                       x-on:input="phone = phone.replace(/\D/g, '').replace(/(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3')"
                       type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(99) 99999-9999"  />
                <x-input-error class="mt-2" :messages="$errors->get('form.phone')" />
            </div>
            <div>
                <label for="rg" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rg</label>
                <input wire:model="form.rg" type="text" id="rg" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" />
                <x-input-error class="mt-2" :messages="$errors->get('form.rg')" />
            </div>
            <div x-data="{ cpf : @entangle('form.cpf') }">
                <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Cpf') }}</label>
                <input wire:model="form.cpf"
                       x-model="cpf"
                       x-on:input="cpf = cpf.replace(/\D/g, '').replace(/(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4')"
                       type="tel" id="cpf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999.999.999-99"  />
                <x-input-error class="mt-2" :messages="$errors->get('form.cpf')" />
            </div>
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-5">
            <div class="col-span-2">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Address') }}</label>
                <input wire:model="form.address" type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  />
                <x-input-error class="mt-2" :messages="$errors->get('form.address')" />
            </div>
            <div class="">
                <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Number') }}</label>
                <input wire:model="form.number" type="text" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  />
                <x-input-error class="mt-2" :messages="$errors->get('form.number')" />
            </div>

            <div class="col-span-2">
                <label for="district" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('District') }}</label>
                <input wire:model="form.district" type="text" id="district" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  />
                <x-input-error class="mt-2" :messages="$errors->get('form.district')" />
            </div>
            <div class="col-span-2">
                <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('City') }}</label>
                <input wire:model="form.city" type="text" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  />
                <x-input-error class="mt-2" :messages="$errors->get('form.city')" />
            </div>
            <div x-data="{ postalcode : @entangle('form.postalcode')}">
                <label for="postalcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Code Postal') }}</label>
                <input wire:model="form.postalcode"
                       x-model="postalcode"
                       x-on:input="postalcode = postalcode.replace(/\D/g, '').replace(/(\d{2})(\d{3})(\d{3}).*/, '$1.$2-$3')"
                       type="text" id="postalcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="99.999-999"  />
                <x-input-error class="mt-2" :messages="$errors->get('form.postalcode')" />
            </div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Email') }}</label>
            <input wire:model="form.email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com"  />
            <x-input-error class="mt-2" :messages="$errors->get('form.email')" />
        </div>
        <div class="grid gap-6 md:grid-cols-5">
            <div class="mb-6 col-span-2">
                <label for="graduation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Graduation') }}</label>
                <input wire:model="form.graduation" type="text" id="graduation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ex: Direito, Pedagogia, Medicina"  />
                <x-input-error class="mt-2" :messages="$errors->get('form.graduation')" />
            </div>
            <div>
                <label for="statusgraduation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Status Graduation') }}</label>
                <select wire:model="form.graduationstatus"  id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>{{ __('Choose a status') }}</option>
                    <option value="1">{{ __('Complete')}}</option>
                    <option value="2">{{ __('Incomplete') }}</option>
                    <option value="3">{{ __('In progress') }}</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('form.graduationstatus')" />
            </div>

            <div class="mb-6 col-span-2">
                <label for="graduationarea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Works in the undergraduate area') }}</label>
                <select wire:model="form.graduationarea"  id="graduationarea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>{{ __('Choose') }}</option>
                    <option value="1">{{ __('Yes')}}</option>
                    <option value="0">{{ __('No') }}</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('graduationarea')" />
            </div>
            <div class="mb-6 col-span-3">
                <label for="posgraduation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Pos Graduation') }}</label>
                <textarea wire:model="form.posgraduation" id="posgraduation" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Ex: Especialização, Pós-Graduação, Mestrado, Doutorado, Pós-doutorado / Completo / Incompleto / Em Curso')}}"></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('posgraduation')" />
            </div>
            <div class="mb-6 col-span-2">
                <label for="profesion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Profesion') }}</label>
                <input wire:model="form.profesion" type="text" id="profesion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  />
                <x-input-error class="mt-2" :messages="$errors->get('profesion')" />
            </div>

            <div class="mb-6 col-span-2">
                <label for="recomendation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('How did you find out about the course?') }}</label>
                <select wire:model="form.recomendation"  id="recomendation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>{{ __('Choose') }}</option>
                    <option value="1">{{ __('Indication')}}</option>
                    <option value="2">{{ __('Site da Sociedade de Psicanalise do Brasil(SPB)') }}</option>
                    <option value="3">{{ __('Site do Instituto de Inteligência') }}</option>
                    <option value="4">{{ __('Instagram') }}</option>
                    <option value="5">{{ __('Facebook') }}</option>
                    <option value="6">{{ __('Rede X (Twitter)') }}</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('form.recomendation')" />
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-5">

            <div class="mb-6 col-span-5">
                <label for="observation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Observation') }}</label>
                <textarea wire:model="form.observation" id="observation" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('form.observation')" />
            </div>

        </div>

        <div class="mt-5 flex justify-end gap-x-2">
            <button type="button" wire:click="cancel" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                {{ __('Cancel') }}
            </button>
            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                {{ __('Save') }}
            </button>
        </div>
    </form>
    <!--endform-->
</div>
