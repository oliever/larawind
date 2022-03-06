<x-app-layout title="Suggestion Form">
    <div class="container grid px-6 mx-auto" x-data="{isRapid:false}">
        <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit User Login
        </h2>

        <div class="max-w-sm px-4 py-6 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @csrf  
                @method('put')
                
                <label class="mt-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Email
                    </span>
                    <input class="disabled required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="email"
                        placeholder="Email" 
                        value="{{ old('email', $user->email) }}" />
                </label>
                @error('email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror

                 <label class="mt-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Name
                    </span>
                    <input class="disabled required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="name"
                        placeholder="Name" 
                        value="{{ old('name', $user->name) }}" />
                </label>
                @error('name')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
                
                <hr style="border-top: 1px dashed #444; dark:border-top: 1px dashed #000; margin: 20px 0px">

                 <label class="mt-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Password
                    </span>
                    <input class="disabled required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="password" type="password"
                        placeholder="Password" 
                        value="" />
                </label>
                @error('password')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror

                 <label class="mt-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Confirm Password
                    </span>
                    <input class="disabled required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="password_confirmation" type="password"
                        placeholder="Confirm Password" 
                        value="" />
                </label>
                @error('password_confirmation')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="flex items-center justify-end text-right sm:px-6 px-4 py-3">
                    <button class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        {{ __('Save') }}
                    </button>
                </div>
                
            </form>
        </div>

        
    </div>
</x-app-layout>
