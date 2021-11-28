<x-app-layout title="Tables">



    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Employees
            @if(auth()->user()->level == "headoffice_manager" || auth()->user()->level == "store_manager")
                <a href="{{route('employees.create')}}"> <button class="px-3  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    + {{ __('New Employee') }}
                </button></a>
            @endif
        </h2>


        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                @livewire('employees.employees')

            </div>
        </div>
    </div>
</x-app-layout>
