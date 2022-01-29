<x-app-layout title="New Employee">
    <div class="container grid px-6 mx-auto max-w-4xl" x-data="{isRapid:false}">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create Employee
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
            <form method="post" action="{{ route('employees.store') }}">
                @csrf

                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Name
                    </span>
                    <input type="text" name="name" id="name" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ old('name', '') }}" />
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                </label>

                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        {{ t('kaizen_general','location') }}{{-- store --}}
                    </span>
                    <select name="location_id" id="location_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value=""><i>Select {{ t('kaizen_general','location') }}</i> </option>
                        @foreach ($stores as $store)
                            <option
                            @if ($location && $location->id == $store->id)
                                selected
                            @endif
                            value="{{$store->id}}">{{$store->name}}</option>
                        @endforeach
                    </select>
                    @error('location_id')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block text-sm mb-4">
                    <span class="text-gray-700 dark:text-gray-400">
                        Employee Level
                    </span>
                    <select name="level" id="level" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="location_staff">{{ t('kaizen_general','location') }} Staff</option>
                        {{-- <option value="location_manager">Store Manager</option> --}}
                    </select>
                    @error('level')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </label>

                <div class="flex items-center justify-end px-4 py-3 ">
                <button wire:click="submitKaizen" class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    {{ __('Save') }}
                </button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
