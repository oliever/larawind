<x-app-layout title="Select Company">
    <div class="container grid px-6 mx-auto">
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="overflow-x-auto w-60">
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Select Company
                </h2>
                @foreach ($teams as $team)
                <form method="POST" action="/current-team">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- Hidden Team ID -->
                <input type="hidden" name="team_id" value="{{$team->id}}">

                <li class="flex">
                    <a class="inline-flex items-center w-full px-2 py-1 text-sm text-gray-600 dark:text-gray-400 font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#"
                    onclick="event.preventDefault(); this.closest('form').submit();">

                        <svg class="w-5 h-5 mr-2  text-green-400 " fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{$team->name}}</span>
                    </a>
                </li>
            </form>
                @endforeach
                <
            </div>
        </div>
    </div>
</x-app-layout>
