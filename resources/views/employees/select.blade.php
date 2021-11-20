<x-guest-layout title="Select Employee">
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="container grid px-6 mx-auto">
                <div class="flex justify-between">
                    <div><h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Select Employee
                    </h2></div>

                    <div><h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Location: {{ $locationLocked->name }}
                    </h2></div></div>


                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3 w-1/4">Name</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $employee->name }}
                                            </p>
                                        </td>
                                        <td class="px-4 py-3">

                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                <form class="inline-block" action="{{ route('employees.select', $employee) }}" method="POST" onsubmit="return confirm('Select {{$employee->name}}?');">
                                                    <input type="hidden" name="_method" value="POST">
                                                    <input type="hidden" name="current_route" value="{{$request['current_route']}}">
                                                    <input type="hidden" name="employee_id" value="{{$employee->id}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" value="Select" class="cursor-pointer flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                </form>
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
