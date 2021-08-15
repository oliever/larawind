<div class="container grid px-6 mx-auto" x-data="{isJustDoIt:@entangle('isJustDoIt'), isRapid:@entangle('isRapid'), isModalOpen:false}">
    @if ($kaizen->to_project)
            <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                KAIZEN #{{$kaizen->id}}
            </h2 >
            <span class="mb-6 text-gray-700 dark:text-gray-400"">Submitted: {{\Carbon\Carbon::parse($kaizen->to_project)->format('F j, Y, g:i a');}}</span>
        @else
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                New KAIZEN
            </h2>
        @endif


    @if (session()->has('message'))
        <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
        href="#">
            <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <span> {{ session('message') }}</span>
            </div>
        {{-- <span>View more →</span> --}}
        </a>
    @endif

    <form wire:submit.prevent="">
        @csrf
        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            General Info
        </h4>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
            <div class="grid gap-2 mb- md:grid-cols-1 xl:grid-cols-3">
                <div class="gap-2 mb-2 col-span-2">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Name</span>
                        <input class="required block w-full mt-1 text-xl dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="kaizen.name"
                            name="kaizen.name"
                            placeholder="Name" />
                    </label>
                    @error('kaizen.name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid gap-2 mb-2 md:grid-cols-1 xl:grid-cols-1">

                    {{-- <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Date</span>
                        <!-- focus-within sets the color for the icon when input is focused -->
                        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                            <input
                            id="date" name="date" type="date"
                            name="kaizen.date"
                            defaulDate="minDate:Today" class="block w-full pr-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Date" />

                        </div>
                    </label>
                    @error('kaizen.date')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror --}}

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Store Name
                        </span>
                        <select
                        wire:model="kaizen.location_id"
                        id="kaizen.location_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                            @foreach($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach

                        </select>
                        @error('kaizen.location_id')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </label>

                </div>
            </div>
            <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-4">
                {{-- <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="kaizenType" value="justDoIt" />
                    <span class="ml-2">Just Do It Kaizen</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input @click="isRapid=!isRapid" type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="kaizenType" value="rapid" />
                    <span class="ml-2">Rapid Kaizen</span>
                </label> --}}


                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input wire:model="isJustDoIt" @click="isJustDoIt=!isJustDoIt" id="isJustDoIt" type="checkbox"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Just Do It
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input wire:model="isRapid" @click="isRapid=!isRapid" id="isRapid" type="checkbox"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Rapid Kaizen
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox"
                                wire:model="kaizen.head_office_input"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Head Office Input
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox"
                                wire:model="kaizen.handled_at_location"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Handled at Store Level
                        </span>
                    </label>
                </div>
            </div>
        </div>

        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Affected Areas
        </h4>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
            <div class="grid gap-2 mb-2 md:grid-cols-3 xl:grid-cols-6">
                @foreach($affectedAreas as $affectedArea)
                    <div class="flex mt-2 text-sm">
                        <label class="flex items-center dark:text-gray-400">
                            <input type="checkbox"
                                value="{{ $affectedArea->id }}"
                                wire:model="selectedAfftectedAreas.{{$affectedArea->id}}" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                            <span class="ml-2">
                                {{ $affectedArea->name }} {{-- ({{$affectedArea->id}}) --}}
                            </span>
                        </label>
                    </div>
                @endforeach
            </div>

        </div><!--Affected Aread-->

        <div x-show="isJustDoIt" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
                <div class="grid gap-2 mb-2 md:grid-cols-1 xl:grid-cols-2">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Reason For Kaizen:</span>
                        <textarea wire:model="kaizen.reason" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Reason For Kaizen"></textarea>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Problem:</span>
                        <textarea wire:model="kaizen.problem" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Problem"></textarea>
                    </label>
                </div>
                <div class="grid gap-2 mb-6 md:grid-cols-1 xl:grid-cols-2">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Causes:</span>
                        <textarea wire:model="kaizen.causes" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Causes"></textarea>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Solution:</span>
                        <textarea wire:model="kaizen.solution" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Solution"></textarea>
                    </label>
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Expected Results:</span>
                    <textarea wire:model="kaizen.expected_result" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Expected Results"></textarea>
                </label>
            </div>
        </div>

        <!--Rapid Kaizen Section-->
        <div x-show="isRapid" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
            <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Rapid Kaizen
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
                <div class="grid gap-2 mb-6 md:grid-cols-1 xl:grid-cols-2">
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Problem Description:</span>
                        <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Problem Description"></textarea>
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Problem Picture or Sketch (if required):</span>
                        <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Problem"></textarea>
                    </label>
                </div>

                <livewire:kaizen.rapid-causes :kaizen="$kaizen">

                @livewire('kaizen.solutions')
{{--
                <div class="mb-4">
                    <div class="grid gap-2 mb-2 sm:grid-cols-4 md:grid-cols-4 xl:grid-cols-4">
                        <span class="text-gray-700 dark:text-gray-400">Solutions</span>
                        <span class="text-gray-700 dark:text-gray-400">Who</span>
                        <span class="text-gray-700 dark:text-gray-400">When</span>
                        <span class="text-gray-700 dark:text-gray-400">Done</span>
                    </div>
                    <div class="grid gap-2 mb-2 sm:grid-cols-4 md:grid-cols-4 xl:grid-cols-4">
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Solution" />
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Who" />
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="When" />
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Done" />

                    </div>
                </div> --}}


            </div>
        </div>

        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Images
        </h4>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
                @livewire('kaizen.image-upload')
        </div>

        <div class="flex">
            @if ($kaizen->to_project)
            <button wire:click="submitKaizen" class = 'ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'>
                {{ __('Update') }}
            </button>
            @else
            <button wire:click="saveAsDraft" class = 'px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'>
                {{ __('Save as Draft') }}
            </button>

            <button wire:click="submitKaizen" class = 'ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple'>
                {{ __('Save as Project') }}
            </button>
            @endif



            <x-action-message class="ml-3 mt-2" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
       </div>

    </form>

    {{-- <div>
        <button @click="isModalOpen=true" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Open Modal
        </button>
    </div> --}}


</div>






    {{-- <input type="text" wire:model="name">
    @error('name') <span class="error">{{ $message }}</span> @enderror

    <input type="text" wire:model="email">
    @error('email') <span class="error">{{ $message }}</span> @enderror

    <button type="submit">Save Contact</button> --}}


@section('scripts')

@endsection

<script>
    flatpickr('#date', {
        defaultDate: 'today',

    });
    /*
    flatpickr('#due', {
        defaultDate: new Date().fp_incr(1),
    }); */
</script>


