<div>

    <div class="w-full max-w-lg mx-auto p-8">
        <div class="bg-white rounded-lg shadow-lg p-6">

            <form wire:submit.prevent="attachUser()">
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-4 sm:col-span-1">
                        <label for="user" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Select User') }}</label>
                        <select wire:model="user"  id="user" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>{{ __('Select a user') }}</option>
                            @foreach($users as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-span-4 sm:col-span-1">
                        <label for="user" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Tipo de acesso') }}</label>
                        <select wire:model="role"  id="user" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>{{ __('Select the role') }}</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->description }}</option>
                            @endforeach
                        </select>

                    </div>

                </div>
                <div class="mt-8">
                    <button type="submit" class="w-full bg-green-500 hover:bg-blue-600 text-white font-medium py-3 rounded-lg focus:outline-none">Enroll User</button>
                </div>
            </form>
        </div>
    </div>


</div>
