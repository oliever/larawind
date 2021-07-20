<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full table-fixed text-gray-700 dark:text-gray-400">
            <thead>
            <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                <th class="w-2/3">Solutions</th>
                <th class="w-1/9">Who</th>
                <th class="w-1/9">When</th>
                <th class="w-1/9">Done</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($solutions as $index => $solution)
                <tr class="text-gray-700 dark:text-gray-400">
                        <td> <input
                            name="solutions[{{$index}}][description]"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Solution"
                            wire:model="solutions.{{$index}}.description" /></td>
                        <td><input
                            name="solutions[{{$index}}][findings]"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Who"
                            wire:model="solutions.{{$index}}.findings" /></td>
                            <td><input
                                name="solutions[{{$index}}][findings]"
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="When"
                                wire:model="solutions.{{$index}}.findings" /></td>
                        <td>
                            <div class="relative ml-4 text-gray-500 focus-within:text-purple-600">
                                <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                wire:model="solutions.{{$index}}.done" />
<!--
                             <button wire:click.prevent="removeSolution({{$index}})" class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-r-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                X
                            </button>
                        -->
                            <button wire:click.prevent="removeSolution({{$index}})"
                            class="float-right flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Remove">
                                X
                            </button></div>


                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    wire:click.prevent="addSolution">+ Add Solution</button>
            </div>
        </div>
    </div>



</div>
