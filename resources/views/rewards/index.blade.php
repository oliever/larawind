<x-app-layout title="Rewards">



    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Rewards
        </h2>

        <h3>
            <strong>{{$selectedEmployee->name}}</strong>
        </h3>
        <span>{{$lastRewardTransaction->balance}} reward points</span>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <livewire:reward-transactions :selectedEmployees="$selectedEmployee">

                <livewire:rewards.reward-transactions-datatable :employee="$selectedEmployee"/>
            </div>
        </div>
    </div>
</x-app-layout>
