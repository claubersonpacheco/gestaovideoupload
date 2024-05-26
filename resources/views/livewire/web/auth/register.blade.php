<!-- Card -->
<div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-10 dark:border-neutral-700 bg-slate-100">
    <h2 class="text-4xl font-semibold text-gray-800 dark:text-neutral-200">
        {{ __("Register") }}
    </h2>
<form class="mt-10" wire:submit="save">
    <div class="grid gap-6 mb-6 md:grid-cols-5">

        <div class="col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Name') }}</label>
            <input wire:model="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />

        </div>
        <div class="col-span-2">
            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Last Name') }}</label>
            <input wire:model="lastname" type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
        </div>
        <div>
            <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Birth day') }}</label>
            <input wire:model="birthday" type="date" id="birthday" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
        </div>
        <div x-data="{ phone :''}">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Phone') }}</label>
            <input wire:model="phone"
                   x-model="phone"
                   x-on:input="phone = phone.replace(/\D/g, '').replace(/(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3')"
                   type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(99) 99999-9999"  />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div x-data="{ mobile :''}">
            <label for="mobile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Phone') }}</label>
            <input wire:model="mobile"
                   x-model="mobile"
                   x-on:input="mobile = mobile.replace(/\D/g, '').replace(/(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3')"
                   type="tel" id="mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(99) 99999-9999"  />
            <x-input-error class="mt-2" :messages="$errors->get('mobile')" />
        </div>
        <div>
            <label for="rg" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rg</label>
            <input wire:model="rg" type="text" id="rg" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
            <x-input-error class="mt-2" :messages="$errors->get('rg')" />
        </div>
        <div x-data="{ cpf :''}">
            <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Cpf') }}</label>
            <input wire:model="cpf"
                   x-model="cpf"
                   x-on:input="cpf = cpf.replace(/\D/g, '').replace(/(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4')"
                   type="tel" id="cpf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999.999.999-99"  />
            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
        </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-5">
        <div class="col-span-2">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Address') }}</label>
            <input wire:model="address" type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <div class="">
            <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Number') }}</label>
            <input wire:model="number" type="text" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
            <x-input-error class="mt-2" :messages="$errors->get('number')" />
        </div>

        <div class="col-span-2">
            <label for="district" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('District') }}</label>
            <input wire:model="district" type="text" id="district" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
            <x-input-error class="mt-2" :messages="$errors->get('district')" />
        </div>
        <div class="col-span-2">
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('City') }}</label>
            <input wire:model="city" type="text" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"   />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>
        <div x-data="{ postalcode :''}">
            <label for="postalcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Code Postal') }}</label>
            <input wire:model="postalcode"
                   x-model="postalcode"
                   x-on:input="postalcode = postalcode.replace(/\D/g, '').replace(/(\d{2})(\d{3})(\d{3}).*/, '$1.$2-$3')"
                   type="text" id="postalcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="99.999-999"  />
            <x-input-error class="mt-2" :messages="$errors->get('postalcode')" />
        </div>
    </div>
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Email') }}</label>
        <input wire:model="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="john.doe@company.com"  />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>
    <div class="grid gap-6 md:grid-cols-5">
        <div class="mb-6 col-span-2">
            <label for="graduation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Graduation') }}</label>
            <input wire:model="graduation" type="text" id="graduation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ex: Direito, Pedagogia, Medicina"  />
            <x-input-error class="mt-2" :messages="$errors->get('graduation')" />
        </div>
        <div>
            <label for="statusgraduation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Status Graduation') }}</label>
            <select wire:model="graduationstatus"  id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>{{ __('Choose a status') }}</option>
                <option value="1">{{ __('Complete')}}</option>
                <option value="2">{{ __('Incomplete') }}</option>
                <option value="3">{{ __('In progress') }}</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('graduationstatus')" />
        </div>

        <div class="mb-6 col-span-2">
            <label for="graduationarea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Works in the undergraduate area') }}</label>
            <select wire:model="graduationarea"  id="graduationarea" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>{{ __('Choose') }}</option>
                <option value="1">{{ __('Yes')}}</option>
                <option value="0">{{ __('No') }}</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('graduationarea')" />
        </div>
        <div class="mb-6 col-span-3">
            <label for="posgraduation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Pos Graduation') }}</label>
            <textarea wire:model="posgraduation" id="posgraduation" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Ex: Especialização, Pós-Graduação, Mestrado, Doutorado, Pós-doutorado / Completo / Incompleto / Em Curso')}}"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('posgraduation')" />
        </div>
        <div class="mb-6 col-span-2">
            <label for="profesion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Profesion') }}</label>
            <input wire:model="profesion" type="text" id="profesion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  />
            <x-input-error class="mt-2" :messages="$errors->get('profesion')" />
        </div>

        <div class="mb-6 col-span-2">
            <label for="recomendation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('How did you find out about the course?') }}</label>
            <select wire:model="recomendation"  id="recomendation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>{{ __('Choose') }}</option>
                <option value="1">{{ __('Indication')}}</option>
                <option value="2">{{ __('Site da Sociedade de Psicanalise do Brasil(SPB)') }}</option>
                <option value="2">{{ __('Site do Instituto de Inteligência') }}</option>
                <option value="2">{{ __('Instagram') }}</option>
                <option value="2">{{ __('Facebook') }}</option>
                <option value="2">{{ __('Rede X (Twitter)') }}</option>
            </select>
        </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-3">
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Password') }}</label>
            <input wire:model="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••"  />
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>
        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Confirm Password') }}</label>
            <input wire:model="password_confirmation" type="password" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••"  />
            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
        </div>
    </div>
    <div class="flex items-start mb-6">
        <div class="flex items-center h-5">
            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"  />
        </div>
        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
        <x-input-error class="mt-2" :messages="$errors->get('remember')" />
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-3">

        <div class="mt-6 grid col-start-2">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
       </div>
    </div>
</form>

</div>
<!-- End Card -->
