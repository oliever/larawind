<form wire:submit.prevent="">
    @csrf
    <div class="px-4 py-6 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            General
        </h4>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Company Name
            </span>
            <input class="disabled required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                wire:model="team.name"
                name="team.name"
                placeholder="Company Name" />
        </label>
        @error('team.name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="px-4 py-6 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Custom Section Positions
        </h4>

        <div class="grid gap-2 mb-2 md:grid-cols-1 xl:grid-cols-2">

            <label class="block text-sm pb-4  pr-4">
                <span class="text-gray-700 dark:text-gray-400">
                    Kaizen Suggestion Form{{-- {{ t('kaizen_general','completion') }} --}}
                </span>
                <select
                wire:model="customSectionPositionKaizen.value"
                id="customSectionPositionKaizen.value"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="hidden">Hidden</option>
                    <option value="before_reason">Before Reason</option>
                    <option value="after_reason">After Reason</option>
                </select>
                @error('customSectionPositionKaizen.value')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </label>

            <label class="block text-sm pb-4">
                <span class="text-gray-700 dark:text-gray-400">
                    Kaizen Project Form{{-- {{ t('kaizen_general','completion') }} --}}
                </span>
                <select
                wire:model="customSectionPositionProject.value"
                id="customSectionPositionProject.value"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="hidden">Hidden</option>
                    <option value="before_reason">Before Reason</option>
                    <option value="after_reason">After Reason</option>
                </select>
                @error('customSectionPositionProject.value')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </label>

        </div>
    </div>

    <div>
        <div class="flex justify-center mb-8">
            <button wire:click="save" class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('Save') }}
            </button>
        </div>
        <x-action-message on="saved">
            <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
                <input type="checkbox" class="hidden" id="footertoast">

                <x-kaizen.session-message />
            </div>

        </x-action-message>
    </div>
</form>
