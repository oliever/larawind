<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
    <table class="whitespace-no-wrap">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Field ID</th><th class="px-4 py-3">Field Label</th><th></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($translations as $index => $item)
                {{-- <tr>
                    <td class="px-4 py-3"><p class="text-xs text-gray-600 dark:text-gray-400" >{{ $t['field'] }}</p></td>
                    <td class="px-4 py-3"><p class="text-xs text-gray-600 dark:text-gray-400" >{{ $t['value'] }}</p></td>
                </tr> --}}
                <tr>
                    <td class="px-4 py-3" >
                        <p class="text-xs text-gray-600 dark:text-gray-400" >
                            {{ $item['field']}}
                        </p>
                    </td>
                    <td class="px-4 py-3" >
                        @if ($editedItemIndex === $index || $editedItemField === $index . '.value')
                            <input type="text"
                                @click.away="$wire.editedItemField === '{{ $index }}.value' ? $wire.saveItem({{ $index }}) : null"
                                wire:model.defer="translations.{{ $index }}.value"
                                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border w-full py-2 focus:outline-none focus:border-blue-400 {{ $errors->has('items.' . $index . '.value') ? 'border-red-500' : 'border-gray-400' }}"
                            />
                            @if ($errors->has('translations.' . $index . '.value'))
                                <div class="text-red-500">{{ $errors->first('translations.' . $index . '.value') }}</div>
                            @endif
                        @else
                            <div class="cursor-pointer" wire:click="editItemField({{ $index }}, 'value')">
                                <p class="text-xs text-gray-600 dark:text-gray-400" >
                                    {{ $item['value'] }}
                                </p>
                            </div>
                        @endif
                    </td>
                    <td class="px-4 py-3" >
                        @if($editedItemIndex === $index || (isset($editedItemField) && (int)(explode('.',$editedItemField)[0])===$index))
                            <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                    wire:click.prevent="saveItem({{$index}})">
                                Save
                            </button>
                        @else
                            <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                    wire:click.prevent="editItem({{$index}})">
                                Edit
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
