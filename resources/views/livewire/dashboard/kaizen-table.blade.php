<div class="w-full mb-8 mt-8 overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3 w-2">ID</th>
                    <th class="px-4 py-3 w-6">Approved</th>
                    <th class="px-4 py-3 w-6">Name</th>
                    <th class="px-4 py-3 w-6">Members</th>
                    @if ( settingsValue('dashboard_kaizen_column_location') == "1" )<th class="px-4 py-3 w-6">{{ t('kaizen_general','location') }}</th>@endif
                    <th class="px-4 py-3 w-2">Completion</th>
                    <th class="px-4 py-3 w-2">Assigned</th>
                    @if ( settingsValue('dashboard_kaizen_column_head_office_input') == "1" )<th class="px-4 py-3 w-6">Head Office Input</th>@endif  
                    @if ( settingsValue('dashboard_kaizen_column_handle_at_location') == "1" )<th class="px-4 py-3 w-6">Handle at {{ t('kaizen_general','location') }}</th>@endif  
                    @if ( settingsValue('dashboard_kaizen_column_machine_center') == "1" )<th class="px-4 py-3 w-6">Machine Center</th>@endif  
                    @if ( settingsValue('dashboard_kaizen_column_department') == "1" )<th class="px-4 py-3 w-6">Department</th>@endif  
                   
                </tr>
            </thead>
            <tbody class="bg-white divide-y text-left dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($kaizens as $kaizen)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3"><p class="">{{ $kaizen->id }}</p></td>{{-- ID --}}
                        <td class="px-4 py-3">{{-- Approved --}}
                            @if ($kaizen->approved)
                                <x-icons.true-icon/>
                            @else
                                <x-icons.false-icon/>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{-- Name/Type --}}
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">
                                        <a href="{{route('kaizen.show', $kaizen->id)}}" class="underline">{{ $kaizen->name }}</a>
                                        </p>
                                    @if ($kaizen->rapid)
                                        <p class="text-xs">Rapid</p>
                                    @else
                                        <p class="text-xs">Just Do It</p>
                                    @endif

                                </div>
                            </div>
                        </td>
                        <td>{{-- Members --}}
                            <div class="flex items-center text-sm">
                                <div>
                                    @foreach ($kaizen->members()->get() as $member)

                                        <p class="text-xs">{{$member->name}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        @if ( settingsValue('dashboard_kaizen_column_location') == "1" )
                            <td>{{-- Locations --}}
                                <div class="ml-2 flex items-center text-sm">
                                    <div>
                                        @if ($kaizen->all_locations)
                                            <p class="text-sm">All Stores</p>
                                        @else
                                        @foreach ($kaizen->locations()->get() as $location)
                                            <p class="text-xs">{{$location->name}}</p>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </td>
                        @endif {{-- if ( settingsValue('dashboard_kaizen_column_location') == "1" ) --}}
                        <td class="px-4 py-3 text-sm">{{-- Completion --}}
                            {{ $kaizen->completion }} %
                        </td>
                        <td class="px-4 py-3 text-xs">{{-- Assigned --}}
                            {{ \Carbon\Carbon::parse($kaizen->date_assigned)->format('M j, Y') }}
                        </td>
                        @if ( settingsValue('dashboard_kaizen_column_head_office_input') == "1" )
                            <td class="px-4 py-3">{{-- Head Office Input --}}
                                @if ($kaizen->head_office_input)
                                    <x-icons.true-icon/>
                                @else
                                    <x-icons.false-icon/>
                                @endif
                            </td>
                        @endif
                        @if ( settingsValue('dashboard_kaizen_column_handle_at_location') == "1" )
                            <td class="px-4 py-3 w-2">{{-- Handle at Branch --}}
                                @if ($kaizen->handle_at_location)
                                    <x-icons.true-icon/>
                                @else
                                    <x-icons.false-icon/>
                                @endif
                            </td>
                        @endif
                        @if ( settingsValue('dashboard_kaizen_column_machine_center') == "1" )
                        
                        @endif  
                        @if ( settingsValue('dashboard_kaizen_column_department') == "1" )
                        
                        @endif  
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $kaizens->links() }}
</div>
