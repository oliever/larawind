<div>
    <label class="flex items-center dark:text-gray-400">

        <input type="checkbox" wire:model="selectAll" value="1" id="select-all_checkbox" class="inline-block mr-2"/>
        <label for="select-all_checkbox">All Process Steps</label>

    </label>
    <div class="flex flex-col mb-4" x-data="{show: false}">
        <button href="#" x-on:click.prevent="show = !show"
            class="relative z-10 border border-gray-200 rounded px-4 py-2 bg-white flex justify-between items-center dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <span class="inline-block text-gray-700 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-700">{{ $label }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="stroke-current inline-block w-4 h-4 transform transition duration-150"
                x-bind:class="{ 'rotate-180': show }">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div x-show.transition="show"  @click.away="show = !show" @keydown.escape="show = !show"
            class="relative z-20 -mt-1 flex flex-col w-full px-4 py-4 whitespace-nowrap border border-gray-200 rounded text-gray-700 dark:text-gray-400 bg-white dark:border-gray-600 dark:bg-gray-700">
            @foreach($processSteps as $processStep)

                <div>
                    <input type="checkbox" wire:model="selected" value="{{ $processStep->id }}"
                    id="select-processStep_{{ $processStep->id }}" class="inline-block mr-2 ml-4"/>
                    <label for="select-processStep_{{ $processStep->id }}">{{ $processStep->name }}</label>
                </div>
            @endforeach
        </div>
        @error('selected')
            <div class="text-sm text-red-500 ml-1">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
