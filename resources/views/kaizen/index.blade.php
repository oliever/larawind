<x-app-layout title="Kaizen Projects">
    <div class="container grid px-6 mx-auto">
        <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-middle">
            Kaizens <a href="{{route('kaizen.create')}}"> <button class="px-3  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        + {{ __('New Kaizen Suggestion') }}
                    </button></a>
        </h2 >

        <h4 class="mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Kaizens Suggestions
        </h4>
        <livewire:kaizen.posted-kaizens-datatable/>

        <h4 class="mt-8 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Draft Kaizens Suggestions
        </h4>
        <livewire:kaizen.draft-kaizens-datatable/>
    </div>
</x-app-layout>
