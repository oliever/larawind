<div x-data="{photo:@entangle('photo')}">
    @if ($photos)
        <div class="grid gap-2 mb-6 md:grid-cols-1 xl:grid-cols-2">
                @foreach ($photos as $addedPhoto)
                <img class="mt-4" width="300" src="{{ $addedPhoto->temporaryUrl() }}">
                @endforeach
        </div>
    @endif
    <form wire:submit.prevent="save" >
        <div class="flex flex-col items-center">
            <label
                class="w-64 flex flex-col items-center rounded-md shadow-md
                cursor-pointer bg-purple-600  hover:bg-purple-700 text-white  ease-linear transition-all duration-150 ">
                <div class="inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                      </svg>
                    <span class="pl-2 text-base leading-normal">Select a Photo</span>
                </div>

                <input type='file' class="hidden" wire:model="photo" accept="image/*"/>
                <div wire:loading wire:target="photo">Loading...</div>
            </label>
            @if ($photo)
            <span>
                <img x-show="photo" class="mt-4" width="150" src="{{ $photo->temporaryUrl() }}">
            </span>
            @endif

            @error('photo') <span class="error">{{ $message }}</span> @enderror
            <br>
            <button  x-show="photo" type="submit" class = 'ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'>
                {{ __('Add this photo') }}
            </button>
        </div>
    </form>


</div>

