<x-app-layout title="Employees">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Employees

        </h2>


        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                @livewire('employees.employees')

            </div>
        </div>
    </div>
</x-app-layout>
