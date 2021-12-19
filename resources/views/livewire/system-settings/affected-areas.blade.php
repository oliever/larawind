<div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-96 table-fixed text-gray-700 dark:text-gray-400">
            <thead>
            <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                <th class="w-1/3 p-4">Name</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($affectedAreas as $index => $affectedArea)
                <tr class="text-gray-700 dark:text-gray-400">
                        <td>
                            <div class="relative text-gray-500 focus-within:text-purple-600">
                                <input name="affectedAreas[{{$index}}][name]" id="affectedAreas[{{$index}}][name]"
                                class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder=""
                                wire:model="affectedAreas.{{$index}}.name"/>
                            @if (isset($affectedAreas[$index]['id']))
                                <button wire:click.prevent="removeAffectedArea({{$index}})" class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-r-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            @else
                                <button wire:click.prevent="saveAffectedArea({{$index}})" class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-r-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </button>
                            @endif
                            </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    wire:click.prevent="addAffectedArea">+ Add Affected Area</button>
            </div>
        </div>
    </div>
    <x-action-message on="saved">
        <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
            <input type="checkbox" class="hidden" id="footertoast">

            <x-kaizen.session-message />
        </div>

    </x-action-message>



</div>
