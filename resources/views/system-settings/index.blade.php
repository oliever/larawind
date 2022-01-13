<x-app-layout title="Tables">
    <div class="container grid px-6 mx-auto">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <div x-data="setup()">
                    <ul class="flex items-center my-4">
                        <template x-for="(tab, index) in tabs" :key="index">
                            <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                                :class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
                                x-text="tab"></li>
                        </template>
                    </ul>

                    <div class="mx-auto">
                        <div x-show="activeTab===0">
                            <h1 class="mt-6 text-2xl py-4 font-semibold text-gray-700 dark:text-gray-200">Company Settings ({{auth()->user()->currentTeam->name}})</h1>
                            <livewire:system-settings.company-settings>
                        </div>
                        <div x-show="activeTab===1">
                            <h1 class="mt-6 text-2xl py-4 font-semibold text-gray-700 dark:text-gray-200">Field Labels</h1>
                            <livewire:system-settings.translations>
                        </div>
                        <div x-show="activeTab===2">
                            <h1 class="mt-6 text-2xl py-4 font-semibold text-gray-700 dark:text-gray-200">Affected Areas</h1>
                            <livewire:system-settings.affected-areas>
                        </div>
                        <div x-show="activeTab===3">
                            <h1 class="mt-6 text-2xl py-4 font-semibold text-gray-700 dark:text-gray-200">Departments</h1>
                            <livewire:system-settings.manage-departments>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        function setup() {
        return {
          activeTab: 0,
          tabs: [
              "Company Settings ({{auth()->user()->currentTeam->name}})",
              "Field Labels",
              "Affected Areas",
              "Departments",
          ]
        };
      };
    </script>
</x-app-layout>
