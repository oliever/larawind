<div class="w-full mb-8 mt-8 overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3 w-2">ID</th>
                    <th class="px-4 py-3 w-6">Description</th>
                    <th class="px-4 py-3 w-6">Members</th>
                    <th class="px-4 py-3 w-6">Locations</th>
                    <th class="px-4 py-3 w-2">Completion</th>
                    <th class="px-4 py-3">Posted</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y text-left dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($projects as $project)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3"><p class="">{{ $project->id }}</p></td>

                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">
                                        <a href="{{route('project.show', $project->id)}}" class="underline">{{ $project->description }}</a>
                                        </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center text-sm">
                                <div>
                                    @foreach ($project->members()->get() as $member)

                                        <p class="text-xs">{{$member->name}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="ml-2 flex items-center text-sm">
                                <div>
                                    @if ($project->all_locations)
                                        <p class="text-sm">All Stores</p>
                                    @else
                                    @foreach ($project->locations()->get() as $location)
                                        <p class="text-xs">{{$location->name}}</p>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $project->completion }} %
                        </td>
                        <td class="px-4 py-3 text-xs">
                            {{ \Carbon\Carbon::parse($project->posted)->format('M j, Y') }}
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $projects->links() }}
</div>
