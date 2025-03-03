<x-app-layout title="Suggestion Form">
    <div class="container grid px-6 mx-auto" x-data="{isRapid:false}">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Employee
        </h2>

        <div>
            <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="post" action="{{ route('employees.update', $employee->id) }}">
                        @csrf
                        @method('put')
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                       value="{{ old('name', $employee->name) }}" />
                                <input type="hidden" name="location_id" id="location_id" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                       value="{{ old('location_id', $employee->location_id) }}" />
                                @error('name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
