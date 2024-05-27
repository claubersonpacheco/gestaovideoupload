<div>
    <div class="w-full max-w-lg mx-auto p-8">
        <div class="bg-white rounded-lg shadow-lg p-6">

            <form action="https://ava.institutodeinteligencia.com.br/login/index.php" method="post">
                <div class="sm:col-span-3">
                    <label for="shortname" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                        {{ __('Email') }}
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <div class="sm:flex">
                        <input id="password" wire:model="username" name="username" value="{{ $username }}" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">

                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>


                <div class="sm:col-span-3">
                    <label for="shortname" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                        {{ __('Password') }}
                    </label>
                </div>
                <!-- End Col -->

                <div class="sm:col-span-9">
                    <div class="sm:flex">
                        <input id="password" wire:model="password" name="password" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Digite sua senha">

                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                </div>
                <!-- End Col -->
                <div class="mt-8">
                    <button type="submit" class="w-full bg-green-500 hover:bg-blue-600 text-white font-medium py-3 rounded-lg focus:outline-none">Confirmar senha</button>
                </div>
            </form>
        </div>
    </div>
</div>
