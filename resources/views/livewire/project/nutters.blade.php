<div class="container grid px-6 mx-auto" x-data="">
    <div class="flex justify-between mb-8">
        <div>
            @if ($project->posted)
                <h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Kaizen Project #{{$project->id}}
                </h2 >
                <span class="mb-6 text-gray-700 dark:text-gray-400"">Submitted: {{\Carbon\Carbon::parse($project->posted)->format('F j, Y, g:i a');}}</span>
            @elseif ($project->id)
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Kaizen Project #{{$project->id}} (Draft)
                </h2>
            @else
                <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    New Kaizen Project
                </h2>
            @endif
        </div>
        <div class="mt-8">
            @if ($project->posted)
            <a href="/project/pdf/{{$project->id}}" target="_blank">
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

    <x-kaizen.session-message />

    <form wire:submit.prevent="">
        @csrf
        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            General Info
        </h4>
        <div class="px-4 py-2 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
            <div class="gap-2 mb-2">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Description
                </h4>
                <label class="block text-sm">
                    <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="project.description"
                        name="project.description"
                        placeholder="Project Description" />
                </label>
                @error('project.description')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div class="grid gap-6 mb-8 md:grid-cols-1 xl:grid-cols-2">
            {{-- Left Column: Users Details --}}
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"><!--card-->
                <p class="text-gray-600 dark:text-gray-400">
                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Project Leader/Manager
                        </span>
                        <select
                        wire:model="project.leader_id"
                        id="project.leader_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach

                        </select>
                        @error('project.leader_id')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Sponsor
                        </span>
                        <select
                        wire:model="project.sponsor_id"
                        id="project.sponsor_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach

                        </select>
                        @error('project.sponsor_id')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Champion
                        </span>
                        <select
                        wire:model="project.champion_id"
                        id="project.champion_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach

                        </select>
                        @error('project.champion_id')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Primary Team
                        </span>
                        <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.primary_team"
                            name="project.primary_team"
                            placeholder="Primary Team" />
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Store/Location
                        </span>
                        <select
                        wire:model="project.location_id"
                        id="project.location_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                            @foreach($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach

                        </select>
                        @error('project.location_id')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Capex/Non Capex
                        </span>
                        <select
                        wire:model="project.capex"
                        id="project.capex"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option></option>
                            <option value="1">Capex</option>
                            <option value="0">Non-Capex</option>
                        </select>
                        @error('project.capex')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </label>
                </p>
            </div>{{-- END Left Column: Users Details --}}

            {{-- Right Column: Project figures --}}
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"><!--card-->
                <label class="mb-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Identified Loss
                    </span>
                    <input type="number" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="project.loss" name="project.loss"/>
                </label>

                <label class="mb-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Available Budget
                    </span>
                    <input type="number" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="project.budget" name="project."/>
                </label>

                <label class="mb-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Potential Hours
                    </span>
                    <input type="number" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="project.hours" name="project."/>
                </label>

                <label class="mb-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Potential Savings
                    </span>
                    <input type="number" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="project.savings" name="project."/>
                </label>

                <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-2">
                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Start Date
                        </span>
                        <input type="date" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.start" name="project."/>
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            End Date
                        </span>
                        <input type="date" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.end" name="project."/>
                    </label>
                </div>

                <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-2">
                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Status
                        </span>
                        <select
                        wire:model="project.capex"
                        id="project.capex"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="Not started">Not started</option>
                            <option value="Planned to start">Planned to start</option>
                            <option value="In progress">In progress</option>
                            <option value="Delayed">Delayed</option>
                            <option value="On hold">On hold</option>
                            <option value="Completed">Completed</option>
                            <option value="Abandoned">Abandoned</option>
                        </select>
                        @error('project.capex')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Completion Percentage
                        </span>
                        <select
                    wire:model="project.completion"
                    id="project.completion"
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
                    </label>
                </div>

            </div>{{-- END Right Column: Project figures --}}

        </div>{{-- END xl:grid-cols-2 --}}

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
                            wire:model="project.other_affected_area"
                            name="project.other_affected_area"
                            placeholder="Other Affected Area" />
                </div>
            </div>

        </div><!--Affected Aread-->

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Primary Metric
            </h4>
            <label class="block mt-4 text-sm">
                <textarea wire:model="project.metric" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Primary Metric"></textarea>
            </label>
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Deliverables
            </h4>
            <label class="block mt-4 text-sm">
                <textarea wire:model="project.deliverables" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Deliverables"></textarea>
            </label>
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Scope
            </h4>
            <label class="block mt-4 text-sm">
                <textarea wire:model="project.scope" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Scope"></textarea>
            </label>
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Major Risks
            </h4>
            <label class="block mt-4 text-sm">
                <textarea wire:model="project.risks" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Major Risks"></textarea>
            </label>
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                Comments
            </h4>
            <label class="block mt-4 text-sm">
                <textarea wire:model="project.comments" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Comments"></textarea>
            </label>
        </div>{{-- Project Information --}}

        <div class="grid gap-6 mb-8 md:grid-cols-1 xl:grid-cols-2">
            {{-- Left Column: Users Details --}}

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"><!--card-->
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Project Approval
                </h4>
                <label class="mb-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Project Manager
                    </span>
                    <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="project.approved_manager" name="project.approved_manager"/>
                </label>

                <label class="mb-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Project Sponsor
                    </span>
                    <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="project.approved_sponsor" name="project.approved_sponsor"/>
                </label>

                <label class="mb-4 block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Project Champion
                    </span>
                    <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        wire:model="project.approved_champion" name="project.approved_champion"/>
                </label>
            </div>

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"><!--card-->
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Actual Savings
                </h4>
                <div class="grid gap-6 mb-8 grid-cols-2">
                    <div>
                        <span class="text-gray-700 dark:text-gray-400">
                            Hours Saved
                        </span>
                        <input type="number" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.hours_actual" name="project.hours_actual"/>
                    </div>
                    <div>
                        <span class="text-gray-700 dark:text-gray-400">
                            Validated By
                        </span>
                        <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.hours_actual_validated" name="project.hours_actual_validated"/>
                    </div>

                    <div>
                        <span class="text-gray-700 dark:text-gray-400">
                            Dollar Savings
                        </span>
                        <input type="number" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.savings_actual" name="project.savings_actual"/>
                    </div>
                    <div>
                        <span class="text-gray-700 dark:text-gray-400">
                            Validated By
                        </span>
                        <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.savings_actual_validated" name="project.savings_actual_validated"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mb-8">
            @if ($project->posted)
            <button wire:click="submitProject"  class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('Update') }}
            </button>


            @else
            <button wire:click="saveAsDraft" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('Save as Draft') }}
            </button>

            <button wire:click="submitProject" class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('Save Kaizen Project') }}
            </button>
            @endif



            <x-action-message class="ml-3 mt-2 text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" on="saved">
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


