
<x-app-layout title="Dashboard">
    <div class="container grid mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <livewire:dashboard.top-stats/>

        <!--actual component start-->
        <div x-data="setup()">
            <ul class="flex justify-center items-center mb-4">
                <template x-for="(tab, index) in tabs" :key="index">
                    <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                        :class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
                        x-text="tab"></li>
                </template>
            </ul>

            <div class="mx-auto">
                <div x-show="activeTab===0">
                    <h2 class="text-center  text-2xl font-semibold text-gray-700 dark:text-gray-200 align-middle">
                        Kaizen Suggestions
                        <a href="{{route('kaizen.create')}}"><button class="px-3  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            + {{ __('New Kaizen Suggestion') }}</button></a>
                    </h2>
                    <div class="hidden md:block">
                        <livewire:dashboard.kaizen-table/>
                    </div>
                    <div class="md:hidden block">
                        <livewire:dashboard.mobile.kaizen-table/>
                    </div>

                    <div>

                </div>
                </div>
                <div x-show="activeTab===1">
                    <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-middle">
                        Kaizen Projects
                        <a href="{{route('project.create')}}"> <button class="px-3  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            + {{ __('New Kaizen Project') }}</button></a>
                    </h2 >
                    <livewire:dashboard.project-table/>
                    <div>

                </div>
                </div>
            </div>

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


</x-app-layout>
