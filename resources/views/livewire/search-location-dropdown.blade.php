<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input
        wire:model.debounce.500ms="search"
        type="text"
        class=" pl-8 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Search (Press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
    >
    <div class="px-3 py-3 text-xs text-gray-500 bg-white dark:bg-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700" wire:loading>
        Loading...
    </div>
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    @if (strlen($search) >= 2)
        <div
            class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-1"
            x-show.transition.opacity="isOpen"
        >
            @if ($searchResults->count() > 0)
                <ul class="bg-white dark:bg-gray-600">
                    @foreach ($searchResults as $result)
                        <li class="border-b border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-300">
                            <a wire:click="$emit('locationSelected', {{ $result['id'] }})"
                                href="#" class="block hover:bg-gray-100 dark:hover:bg-gray-700 px-3 py-3 items-center transition ease-in-out duration-150"
                                @if ($loop->last) @keydown.tab="isOpen = false" @endif
                            >

                            <span class="ml-4">{{ $result['name'] }}</span>
                        </a>
                        </li>
                    @endforeach

                </ul>
            @else
                <div class="px-3 py-3 text-gray-700 bg-white dark:bg-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">No results for "{{ $search }}"</div>
            @endif

        </div>
    @endif
</div>
