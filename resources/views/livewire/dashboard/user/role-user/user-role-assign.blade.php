<div>

    <div class="w-full max-w-lg mx-auto p-8">
        <div class="bg-white rounded-lg shadow-lg p-6">

            <form wire:submit.prevent="assignRole()">
                <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-4 sm:col-span-1">
                        <label for="permssions" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Select Role') }}</label>
                        <select wire:model="name"  id="permission" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>{{ __('Choose a Role') }}</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                    </div>

                </div>
                <div class="mt-8">
                    <button type="submit" class="w-full bg-green-500 hover:bg-blue-600 text-white font-medium py-3 rounded-lg focus:outline-none">Add Permission</button>
                </div>
            </form>
        </div>
    </div>


</div>
