<div class="h-screen w-full  flex  flex-col p-2">
    @foreach ($kaizens as $kaizen)
    
        <div class="text-gray-100 shadow-lg shadow-gray-300 w-full md:w-96  bg-gradient-to-br from-gray-600 to-gray-400 p-4 rounded relative max-w-[24rem] mt-4">
        <a href="{{route('kaizen.show', $kaizen->id)}}">    
        <p class="text-lg">Kaizen Name: <span class="font-bold underline">{{ $kaizen->name }}</span></p>
            <div class="grid gap-6 mb-8 grid-cols-2">
                <div>
                    <p class="my-1 text-sm">
                        Members:
                        @foreach ($kaizen->members()->get() as $member)
                        <p class="font-bold">{{$member->name}}</p>
                        @endforeach
                    </p>
                </div>
                @if ( settingsValue('dashboard_kaizen_column_location') == "1" )
                    <div>
                        <p class="my-1 text-sm">
                            Locations:
                            @if ($kaizen->all_locations)
                                <p class="text-sm font-bold">All Stores</p>
                            @else
                            @foreach ($kaizen->locations()->get() as $location)
                                <p class="text-xs font-bold">{{$location->name}}</p>
                            @endforeach
                            @endif
                        </p>
                    </div>
                @endif
                @if ( settingsValue('dashboard_kaizen_column_department') == "1")
                    <div>
                        <p class="my-1 text-sm">
                            Departments:
                            @foreach ($kaizen->departments()->get() as $department)
                                <p class="text-xs font-bold">{{$department->name}}</p>
                            @endforeach
                        </p>
                    </div>
                @endif
            </div>
            <div class="grid gap-6 mb-8 grid-cols-3">
                @if ( settingsValue('dashboard_kaizen_column_head_office_input') == "1" )
                    <div class="">Head Office Input: <strong>
                        @if ($kaizen->head_office_input)
                                    Yes
                                @else
                                    No
                                @endif
                            </strong>
                    </div>
                @endif
                @if ( settingsValue('dashboard_kaizen_column_handle_at_location') == "1" )
                    <div class="">Handle at {{ t('kaizen_general','location') }}: <strong>
                        @if ($kaizen->head_office_input)
                                    Yes
                                @else
                                    No
                                @endif
                            </strong>
                    </div>
                @endif
            </div>

            
            <span class="text-lg font-extrabold absolute right-4 bottom-4">
                <div>
                    @if ($kaizen->rapid)
                        Rapid Kaizen
                    @else
                        Just Do It Kaizen
                    @endif
                </div>
               
            </span>
            </a>
        </div>
    
    @endforeach
</div>
