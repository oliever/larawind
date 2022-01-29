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

        <div>
            <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="post" action="{{ route('employees.store') }}">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            @if(auth()->user()->level == "super_admin" || auth()->user()->level == "headoffice_admin")
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <label for="location_id" class="block font-medium text-sm text-gray-700">{{ t('kaizen_general','location') }}</label>
                                    <select name="location_id" id="location_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                        <option value=""><i>Select {{ t('kaizen_general','location') }}</i> </option>
                                        @foreach ($stores as $store)
                                            <option
                                            @if ($location && $location->id == $store->id)
                                                selected
                                            @endif
                                            value="{{$store->id}}">{{$store->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('level')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            @else
                            <input type="hidden" name="location_id" id="location_id" value="{{ $locationLocked->id }}" />
                            @endif
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                       value="{{ old('name', '') }}" />
                                @error('name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="level" class="block font-medium text-sm text-gray-700">Employee Level</label>
                                <select name="level" id="level" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                    <option value="location_staff">{{ t('kaizen_general','location') }} Staff</option>
                                    {{-- <option value="location_manager">Store Manager</option> --}}
                                </select>
                                @error('level')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                       value="{{ old('email', '') }}" />
                                @error('email')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div> --}}

                           {{--  <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                                <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('password')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            {{-- <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="roles" class="block font-medium text-sm text-gray-700">Roles</label>
                                <select name="roles[]" id="roles" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                    @foreach($roles as $id => $role)
                                        <option value="{{ $id }}"{{ in_array($id, old('roles', [])) ? ' selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
