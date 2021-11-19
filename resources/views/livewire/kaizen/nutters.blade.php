<div class="container grid px-6 mx-auto" x-data="{isJustDoIt:@entangle('isJustDoIt'), isRapid:@entangle('isRapid'),hasBeforeAfter:@entangle('hasBeforeAfter'),isHeadOfficeInput: @entangle('kaizen.head_office_input'), isSearchUserModalOpen:  @entangle('isSearchUserModalOpen'), selectedUsers:  @entangle('selectedUsers'), isSearchLocationModalOpen:  @entangle('isSearchLocationModalOpen'), selectedLocations:  @entangle('selectedLocations')}">
    <div class="flex justify-between mb-8">
        <div>
            @if ($kaizen->posted)
                <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Kaizen Suggestion #{{$kaizen->id}}
                </h2 >
                <span class="mb-6 text-gray-700 dark:text-gray-400"">Submitted: {{\Carbon\Carbon::parse($kaizen->posted)->format('F j, Y, g:i a');}}</span>
                <br>
                @if (!$kaizen->approved)
                    @if ($kaizen->rapid)
                        @if(auth()->user()->type == "headoffice")
                            <button wire:click="approve"
                                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                <span class="pr-2">Approve Kaizen</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </button>
                        @else
                        <button
                        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-gray-200 transition-colors duration-150 bg-gray-400 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-gray">
                        <span class="pr-2">Approve Kaizen</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </button>
                        @endif
                    @endif
                    @if ($kaizen->just_do_it)
                        @if(auth()->user()->type == "manager")
                        <button wire:click="approve"
                            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                            <span class="pr-2">Approve Kaizen</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </button>
                        @else
                            <button
                                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-gray-200 transition-colors duration-150 bg-gray-400 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-gray">
                                <span class="pr-2">Approve Kaizen</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </button>
                            @endif
                    @endif

                @else
                <span class="mb-6 text-gray-700 dark:text-gray-400"">Approved: {{\Carbon\Carbon::parse($kaizen->approved)->format('F j, Y, g:i a');}}</span>

                @endif
            @elseif ($kaizen->id)
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Kaizen Suggestion #{{$kaizen->id}} (Draft)
                </h2>
            @else
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    New Kaizen Suggestion
                </h2>
            @endif
        </div>

        <div class="mt-8">
            @if ($kaizen->posted)
            <a href="/kaizen/pdf/{{$kaizen->id}}" target="_blank">
                <button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span class="pr-2">Print</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                </button>
            </a>
            @endif
        </div>
    </div>

    {{-- <x-kaizen.session-message /> --}}

    <form wire:submit.prevent="">
        @csrf
        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            General Info
        </h4>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
            <div class="grid gap-2 mb-2 md:grid-cols-1 xl:grid-cols-2">
                {{-- column 1 --}}
                <div>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Kaizen Name</span>
                        <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="kaizen.name"
                            name="kaizen.name"
                            placeholder="Kaizen Name" />
                    </label>
                    @error('kaizen.name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- column 2 --}}
                <div class="grid gap-2 mb- grid-cols-2">
                    {{-- column 1 --}}
                    <label class="block text-sm ml-10">
                        <span class="text-gray-700 dark:text-gray-400">Date Assigned</span>
                        @if ($kaizen->date_assigned)
                        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">{{date('m/d/Y', strtotime($dateAssigned))}}</h4>
                        @else
                            <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                wire:model="dateAssigned" name="dateAssigned" type="date" />
                        @endif

                    </label>

                    {{-- column 2 --}}
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Completion
                        </span>
                        <select
                        wire:model="kaizen.completion"
                        id="kaizen.completion"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="0">0%</option>
                            <option value="15">15%</option>
                            <option value="30">30%</option>
                            <option value="45">45%</option>
                            <option value="60">60%</option>
                            <option value="75">75%</option>
                            <option value="90">90%</option>
                            <option value="100">100%</option>
                        </select>
                        @error('kaizen.completion')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
            </div>

            <div class="grid gap-2 md:grid-cols-2 xl:grid-cols-4">
                <div class="flex mt-2 text-sm ">
                    <label class="flex items-center dark:text-gray-400">
                        <input wire:model="isJustDoIt" @click="isJustDoIt=!isJustDoIt; isRapid=!isRapid" id="isJustDoIt" type="checkbox"
                                class="text-purple-600 form-checkbox focus:border-purple-400 outline-black focus:shadow-outline-purple dark:focus:shadow-outline-gray" style="border-color:purple" />
                        <span class="ml-2">
                            Just Do It
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input wire:model="isRapid" @click="isRapid=!isRapid; isJustDoIt=!isJustDoIt" id="isRapid" type="checkbox"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" style="border-color:purple"/>
                        <span class="ml-2">
                            Rapid Kaizen
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox"
                                wire:model="kaizen.head_office_input"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" style="border-color:purple"/>
                        <span class="ml-2">
                            Head Office Input
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox"
                                wire:model="kaizen.handled_at_location"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" style="border-color:purple"/>
                        <span class="ml-2">
                            Handled at Store Level
                        </span>
                    </label>
                </div>
            </div>

            <div class="grid  mb-2 justify-items-center  grid-cols-2">
                <div class="ml-8 mt-8 " style="width: 250px; ">
                    <span class="">&nbsp;</span>
                    <label class="block text-sm"><livewire:employees-checkbox :selectedEmployees="$members"> </label>
                </div>
                <div class="ml-8 mt-8" style="width: 250px;">
                    <label class="block text-sm"><livewire:locations-checkbox :selectedLocations="$selectedLocations"></label>
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
                                wire:model="selectedAfftectedAreas.{{$affectedArea->id}}" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" style="border-color:purple"/>
                            <span class="ml-2">
                                {{ $affectedArea->name }} {{-- ({{$affectedArea->id}}) --}}
                            </span>
                        </label>
                    </div>
                @endforeach
                <div class="flex mt-2 text-sm col-span-3">
                    <label class="flex pr-2 items-center dark:text-gray-400">
                        Other
                    </label>
                    <input class="required block w-full  text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="kaizen.other_affected_area"
                            name="kaizen.other_affected_area"
                            placeholder="Other Affected Area" />
                </div>
            </div>

        </div><!--Affected Aread-->

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 md:grid-cols-1 xl:grid-cols-3"><!--card-->
            <div class="grid gap-2 mb- md:grid-cols-1 xl:grid-cols-3">
                <div>
                    <span class="text-gray-700 dark:text-gray-400">Dollar Value</span>
                    <input class="cleave-money block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="kaizen.dollar_value"
                        name="kaizen.dollar_value"
                        placeholder="Dollar value"/>
                </div>
                <div>
                    <span class="text-gray-700 dark:text-gray-400">Savings</span>
                    <input class="cleave-money block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="kaizen.savings"
                        name="kaizen.savings"
                        placeholder="Savings"/>
                </div>
                <div>
                    <span class="text-gray-700 dark:text-gray-400">Hours Saved</span>
                    <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="kaizen.hours_saved"
                        name="kaizen.hours_saved"
                        placeholder="Hours Saved" type="number"/>
                </div>
            </div>


        </div>

        <div x-show="isHeadOfficeInput" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
            @if (auth()->user()->type == "headoffice")
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400"> Head Office Comment:</span>
                        <textarea wire:model="kaizen.head_office_comment" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder=" Head Office Comment"></textarea>
                    </label>
                </div>
            @else
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400"> <i>Head Office Comment:</i> </span>
                        <textarea wire:model="kaizen.head_office_comment" disabled class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder=" Head Office Comment"></textarea>
                    </label>
                </div>
            @endif

        </div>

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
            <div class="px-4 py-2 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
                <label class="block mt-4 mb-6 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Problem Description:</span>
                    <textarea wire:model="kaizen.rapid_problem" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Problem Description"></textarea>
                </label>

                <livewire:kaizen.rapid-causes :kaizen="$kaizen">
                <livewire:kaizen.rapid-solutions :kaizen="$kaizen">
            </div>
        </div>

        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Photos
        </h4>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 justify-center flex"><!--card-->
            {{-- <livewire:kaizen.upload-photos :kaizen="$kaizen"> --}}
            @livewire('kaizen.upload-photos',['kaizen'  => $kaizen, 'type'  => 'main'])
        </div>

        <div x-show="hasBeforeAfter" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
            <hr style="border-top: 1px dashed #444; padding: 10px">
            <h1 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300 text-center">
                Before and After Report
            </h1>
            <div class="grid gap-6 mb-8 md:grid-cols-1 xl:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"><!--card-->
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Before Photos
                    </h4>
                    <p class="text-gray-600 dark:text-gray-400">
                        @livewire('kaizen.upload-photos',['kaizen'  => $kaizen, 'type'  => 'main'])
                    </p>
                </div>
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"><!--card-->
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        After Photos
                    </h4>
                    <p>
                        @livewire('kaizen.upload-photos',['kaizen'  => $kaizen, 'type'  => 'after'])
                    </p>
                </div>
            </div>

            <div class="grid gap-6 mb-8 md:grid-cols-1 xl:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"><!--card-->
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        Before Comments
                    </h4>
                    <textarea wire:model="kaizen.comments_before" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Comments"></textarea>
                </div>
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"><!--card-->
                    <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                        After Comments
                    </h4>
                    <textarea wire:model="kaizen.comments_after" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Comments"></textarea>
                </div>
            </div>

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"><!--card-->
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Benefits
                </h4>
                <label class="block mt-4 text-sm">
                    <textarea wire:model="kaizen.benefits" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Quality/Cost/Efficiency/Delivery/Waste/Safety/Energy/Moral/Other"></textarea>
                </label>

                <div class="grid gap-6 mt-4 mb-8 md:grid-cols-1 xl:grid-cols-2">
                    <div>
                        <span class="text-gray-700 dark:text-gray-400">
                            Person Validating
                        </span>
                        <select
                        wire:model="kaizen.validating_user_id"
                        id="kaizen.validating_user_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                            @foreach(auth()->user()->currentTeam->allUsers() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <span class="text-gray-700 dark:text-gray-400">
                            Person Approving
                        </span>
                        <select
                        wire:model="kaizen.approving_user_id"
                        id="kaizen.approving_user_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                            @foreach(auth()->user()->currentTeam->allUsers() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mb-8">
            @if ($kaizen->posted)
            <button wire:click="submitKaizen"  class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('Update') }}
            </button>

            <button x-show="!hasBeforeAfter" wire:click="createBeforeAfter"  class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('Create Before and After Report') }}
            </button>
            @else
            {{-- <button wire:click="saveAsDraft" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('Save as Draft') }}
            </button> --}}

            <button wire:click="submitKaizen" class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('Save Suggestion Form') }}
            </button>
            @endif

            <x-action-message on="saved">
                <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
                    <input type="checkbox" class="hidden" id="footertoast">

                    <x-kaizen.session-message />
                  </div>

            </x-action-message>
       </div>

    </form>

    {{-- Search User Modal --}}
    {{-- <div x-show="isSearchUserModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div  x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2"  wire:keydown.escape="closeSearchUserModal" class="w-full px-6 py-4  bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" wire:click="closeSearchUserModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Search Team Member
                </p>
                <p class="text-sm text-gray-700 dark:text-gray-400">
                    <livewire:search-user-dropdown :selectedUsers="$selectedUsers">
                </p>
            </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button wire:click="closeSearchUserModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>

            </footer>
        </div>
    </div> --}}

    {{-- Search Location Modal --}}
    {{-- <div x-show="isSearchLocationModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
        <!-- Modal -->
        <div  x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2"  wire:keydown.escape="closeSearchLocationModal" class="w-full px-6 py-4  bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
            <header class="flex justify-end">
                <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" wire:click="closeSearchLocationModal">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Search Store
                </p>
                <p class="text-sm text-gray-700 dark:text-gray-400">
                    <livewire:search-location-dropdown :selectedLocations="$selectedLocations">
                </p>
            </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button wire:click="closeSearchLocationModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>

            </footer>
        </div>
    </div> --}}
</div>



@section('scripts')

@endsection

<script>
    flatpickr('#date', {
        defaultDate: 'today',

    });
    document.querySelectorAll('.cleave-money').forEach(function(el) {
        new Cleave(el, {
            prefix: '$ ',
            numeral: true,
            numeralThousandGroupStyle: 'thousand'
        });
    });
</script>


