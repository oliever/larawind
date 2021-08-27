<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full table-fixed text-gray-700 dark:text-gray-400">
            <thead>
            <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                <th class="w-1/3">Possible Causes of Problem</th>
                <th class="w-1/3">Findings</th>
                <th class="w-1/3">Root Cause</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($rapidCauses as $index => $rapidCause)
                <tr class="text-gray-700 dark:text-gray-400">
                        <td> {{-- {{$index}} --}}<input

                            name="rapidCauses[{{$index}}][description]"
                            id="rapidCauses[{{$index}}][description]"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Possible Causes of Problem."
                            wire:model="rapidCauses.{{$index}}.description" /></td>
                        <td><input
                            name="rapidCauses[{{$index}}][findings]"
                            id="rapidCauses[{{$index}}][findings]"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Findings"
                            wire:model="rapidCauses.{{$index}}.findings" /></td>
                        <td>
                            <div class="relative text-gray-500 focus-within:text-purple-600">
                            <input
                            name="rapidCauses[{{$index}}][root_cause]"
                            id="rapidCauses[{{$index}}][root_cause]"
                            class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Root Cause"
                            wire:model="rapidCauses.{{$index}}.root_cause" />
                            <button wire:click.prevent="removeRapidCause({{$index}})" class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-r-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                X
                            </button></div>


                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    wire:click.prevent="addRapidCause">+ Add Cause</button>
            </div>
        </div>
    </div>



</div>
