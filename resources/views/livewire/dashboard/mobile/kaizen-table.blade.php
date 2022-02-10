<div class="h-screen w-full  flex  flex-col p-2">
    @foreach ($kaizens as $kaizen)
    <div class="text-gray-100 shadow-lg shadow-gray-300 w-full md:w-96 h-52 bg-gradient-to-br from-gray-600 to-gray-400 p-4 rounded relative max-w-[24rem] mt-4">
        <p class="text-lg">Kaizen Name: <span class="font-bold">{{ $kaizen->name }}</span></p>
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
                    @foreach ($kaizen->locations()->get() as $location)
                    <p class="font-bold">{{$location->name}}</p>
                    @endforeach
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
    </div>
    @endforeach
</div>
