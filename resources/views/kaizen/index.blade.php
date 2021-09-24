<x-app-layout title="Kaizen Suggestions">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-6">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 col-span-2">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Top Stores (Kaizen)
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        @foreach ($data['top_kaizen_stores'] as $top_kaizen_store)
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{$top_kaizen_store->name}}
                            </p>
                        @endforeach
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 col-span-2">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Top Stores (Projects)
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        @foreach ($data['top_project_stores'] as $top_project_store)
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                {{$top_project_store->name}}
                            </p>
                        @endforeach
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                      </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Kaizens Started
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        46
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                      </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Kaizens Completed
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        15
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container grid px-6 mx-auto">
        <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-middle">
            Kaizen Suggestions <a href="{{route('kaizen.create')}}"> <button class="px-3  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + {{ __('New Kaizen Suggestion') }}
            </button></a>
        </h2 >

        <h4 class="mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Kaizen Suggestions
        </h4>
        <livewire:kaizen.posted-kaizens-datatable/>



        <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-middle">
            Kaizen Projects <a href="{{route('project.create')}}"> <button class="px-3  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + {{ __('New Kaizen Project') }}
            </button></a>
        </h2 >

        <h4 class="mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Kaizen Projects
        </h4>
        <livewire:project.posted-projects-datatable/>
    </div>
    <hr style="border-top: 1px solid #444; margin-top: 20px">

    <div class="container grid px-6 mx-auto">
        <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-middle">
            Draft Items
        </h2 >
        <h4 class="mt-8 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Draft Kaizen Suggestions
        </h4>
        <livewire:kaizen.draft-kaizens-datatable/>

        <h4 class="mt-8 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Draft Kaizen Projects
        </h4>
        <livewire:project.draft-projects-datatable/>
    </div>
</x-app-layout>
