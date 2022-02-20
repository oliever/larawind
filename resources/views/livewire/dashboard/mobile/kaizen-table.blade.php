<div class="h-screen w-full  flex  flex-col p-2">
    @foreach ($kaizens as $kaizen)
    
        <div class="text-gray-100 shadow-lg shadow-gray-300 w-full md:w-96 h-52 bg-gradient-to-br from-gray-600 to-gray-400 p-4 rounded relative max-w-[24rem] mt-4">
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
            </div>

            <span class="text-lg font-extrabold absolute right-4 bottom-4">
                @if ($kaizen->rapid)
                Rapid Kaizen
                @else
                Just Do It Kaizen
                @endif
            </span>
            </a>
        </div>
    
    @endforeach
</div>
