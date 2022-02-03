<x-app-layout title="Dashboard">
    <livewire:dashboard.top-stats/>

    <div class="container grid">

        <!--actual component start-->
        <div x-data="setup()">
            <ul class="flex justify-center items-center my-4">
                <template x-for="(tab, index) in tabs" :key="index">
                    <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                        :class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
                        x-text="tab"></li>
                </template>
            </ul>

            <div class=" text-center mx-auto">
                <div x-show="activeTab===0">
                    <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-middle">
                        Kaizen Suggestions
                        <a href="{{route('kaizen.create')}}"><button class="px-3  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            + {{ __('New Kaizen Suggestion') }}</button></a>
                    </h2>


                    <livewire:dashboard.kaizen-table/>

                    <livewire:kaizen.posted-kaizens-datatable/>
                    <div>

                </div>
                </div>
                <div x-show="activeTab===1">
                    <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-middle">
                        Kaizen Projects
                        <a href="{{route('project.create')}}"> <button class="px-3  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            + {{ __('New Kaizen Project') }}</button></a>
                    </h2 >
                    <livewire:project.posted-projects-datatable/>
                    {{-- <livewire:kaizens/> --}}
                    <div>

                </div>
                </div>
            </div>

            {{-- <ul class="flex justify-center items-center my-4">
                <template x-for="(tab, index) in tabs" :key="index">
                    <li class="cursor-pointer py-3 px-4 rounded transition"
                        :class="activeTab===index ? 'bg-green-500 text-white' : ' text-gray-500'" @click="activeTab = index"
                        x-text="tab"></li>
                </template>
            </ul> --}}

            {{-- <div class="flex gap-4 justify-center border-t p-4">
                <button
                    class="py-2 px-4 border rounded-md border-blue-600 text-blue-600 cursor-pointer uppercase text-sm font-bold hover:bg-blue-500 hover:text-white hover:shadow"
                    @click="activeTab--" x-show="activeTab>0"
                    >Back</button>
                <button
                    class="py-2 px-4 border rounded-md border-blue-600 text-blue-600 cursor-pointer uppercase text-sm font-bold hover:bg-blue-500 hover:text-white hover:shadow"
                    @click="activeTab++" x-show="activeTab<tabs.length-1"
                    >Next</button>
            </div> --}}
        </div>
        <!--actual component end-->
    </div>

    <script>
        function setup() {
        return {
          activeTab: 0,
          tabs: [
              "Kaizen Suggestions",
              "Kaizen Projects",
          ]
        };
      };
    </script>
    {{--
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
    </div> --}}

    <style>
         [x-cloak] { display: none !important; }
    </style>
</x-app-layout>
