<div class="container grid px-6 mx-auto" x-data="{isSearchUserModalOpen:  @entangle('isSearchUserModalOpen'),isSearchLocationModalOpen:  @entangle('isSearchLocationModalOpen'),}">
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

    {{-- <x-kaizen.session-message /> --}}

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


        <div class="grid gap-6 mb-8 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2">
            {{-- Left Column: Users Details --}}
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
                <p class="text-gray-600 dark:text-gray-400">
                    <label class="block text-sm" >
                        <span class="mb-2 text-gray-700 dark:text-gray-400">Project Leader/Manager</span>
                        <div wire:ignore class="mt-1 mb-4">
                            <select id="project.manager_id" wire:model="project.manager_id"
                                    class="select2x block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    >
                                <option value="0" style="font-style: italic">Select Project Leader/Manager</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- @error('product.categories')
                        <div class="text-sm text-red-500 ml-1">
                            {{ $message }}
                        </div>
                        @enderror --}}
                    </label>

                    <label class="block text-sm" >
                        <span class="text-gray-700 dark:text-gray-400">Sponsor</span>
                        <div wire:ignore class="mt-1 mb-4">
                            <select {{-- id="categories" --}} id="project.sponsor_id" wire:model="project.sponsor_id"
                                    class="select2x block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    >
                                <option value="0" style="font-style: italic">Select Sponsor</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>

                    <label class="block text-sm" >
                        <span class="text-gray-700 dark:text-gray-400">Champion</span>
                        <div wire:ignore class="mt-1 mb-4">
                            <select {{-- id="categories" --}} id="project.champion_id" wire:model="project.champion_id"
                                    class="select2x block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    >
                                <option value="0" style="font-style: italic">Select Champion</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Primary Team
                        </span>
                        {{-- <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.primary_team"
                            name="project.primary_team"
                            placeholder="Primary Team" /> --}}
                        <div class="">
                            <label class="block text-sm"><livewire:employees-checkbox :selectedEmployees="$members"> </label>
                        </div>
                    </label>

                    <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-2">
                        @if (auth()->user()->currentTeam->id == 1)
                            <label class="mb-4 block text-sm">
                                <div class="" >
                                    <label class="block text-sm"><livewire:locations-checkbox :selectedLocations="$selectedLocations"></label>
                                </div>
                            </label>
                        @else
                        <label class="mb-4 block text-sm">
                            <div class="" >
                                <label class="block text-sm"><livewire:departments-checkbox :kaizen="$project"></label>
                            </div>
                        </label>
                        @endif
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
                    </div>


                    <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-2">

                        <label class="mb-4 block text-sm">
                            <div class="" >
                                <label class="block text-sm"><livewire:affected-areas-checkbox :kaizen="$project"></label>
                            </div>
                        </label>
                        <label class="mb-4 block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Other Affected Area
                            </span>
                            <input class="required block w-full  text-xs dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    wire:model="project.other_affected_area"
                                    name="project.other_affected_area"
                                    placeholder="Other Affected Area" />
                        </label>

                    </div>
                </p>
            </div>{{-- END Left Column: Users Details --}}

            {{-- Right Column: Project figures --}}
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
                <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-2">
                    <label class="mb-4 block text-sm">
                        <span class=" text-gray-700 dark:text-gray-400">
                            Identified Loss
                        </span>
                        <input class="cleave-money block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.loss"
                            name="project.loss"
                            placeholder="Identified Loss"/>
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Available Budget
                        </span>
                        <input class="cleave-money required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.budget" name="project.budget"  />
                    </label>
                </div>

                <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-2">
                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Potential Hours
                        </span>
                        <input type="number" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.hours" name="project.hours"/>
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Potential Savings
                        </span>
                        <input class="cleave-money required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.savings" name="project.savings" />
                    </label>
                </div>

                <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-2">
                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Material Savings (Dollar)
                        </span>
                        <input class="cleave-money required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.material_savings_dollar" name="project.material_savings_dollar" />
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Machine Hour Savings
                        </span>
                        <input type="number" class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.machine_hours_savings" name="project.machine_hours_savings"/>
                    </label>
                </div>

                <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-2">
                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Other Savings (Name)
                        </span>
                        <input class="required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.other_savings_name" name="project.other_savings_name"/>
                    </label>

                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Other Savings (Dollar)
                        </span>
                        <input class="cleave-money required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.other_savings_dollar" name="project.other_savings_dollar" />
                    </label>
                </div>

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
                            wire:model="project.end" name="project.end">
                    </label>
                </div>

                <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-2">
                    <label class="mb-4 block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Status
                        </span>
                        <select
                        wire:model="project.status"
                        id="project.status"
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

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-md dark:bg-gray-800" ><!--card-->
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                    Project Approval
                </h4>

                <label class="block text-sm" >
                    <span class="text-gray-700 dark:text-gray-400">Approving Project Leader/Manager</span>
                    <div wire:ignore class="mt-1 mb-4" >
                        <select id="project.approved_manager_id" wire:model="project.approved_manager_id"
                                class="select2x block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                >
                            <option value="0" style="font-style: italic">Select Approving Project Leader/Manager</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </label>

                <label class="block text-sm" >
                    <span class="text-gray-700 dark:text-gray-400">Approving Sponsor</span>
                    <div wire:ignore class="mt-1 mb-4">
                        <select id="project.approved_sponsor_id" wire:model="project.approved_sponsor_id"
                                class="select2x block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                >
                            <option value="0" style="font-style: italic">Select Approving Sponsor</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </label>

                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Approving Champion</span>
                    <div wire:ignore class="mt-1 mb-4" >
                        <select   id="project.approved_champion_id" wire:model="project.approved_champion_id"
                                class="select2x block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                >
                            <option value="0" style="font-style: italic">Select Approving Champion</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </label>

            </div>

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
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
                        <label class="block text-sm" >
                            <span class="text-gray-700 dark:text-gray-400">Validated By</span>
                            <div wire:ignore class="mt-1 mb-4" >
                                <select   id="project.hours_actual_validated_id" wire:model="project.hours_actual_validated_id"
                                        class="select2x block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        >
                                    <option value="0" style="font-style: italic">Select Hours Saved Validator</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </label>
                    </div>

                    <div>
                        <span class="text-gray-700 dark:text-gray-400">
                            Dollar Savings
                        </span>
                        <input class="cleave-money required block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            wire:model="project.savings_actual" name="project.savings_actual"/>
                    </div>
                    <div>
                        <label class="block text-sm" >
                            <span class="text-gray-700 dark:text-gray-400">Validated By</span>
                            <div wire:ignore class="mt-1 mb-4" >
                                <select   id="project.savings_actual_validated_id" wire:model="project.savings_actual_validated_id"
                                        class="select2x block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        >
                                    <option value="0" style="font-style: italic">Select Dollar Savings Validator</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </label>

                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center mb-8">
            <button wire:click="submitProject" class="ml-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                {{ __('Save Kaizen Project') }}
            </button>
            <x-action-message on="saved">
                <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
                    <input type="checkbox" class="hidden" id="footertoast">

                    {{-- <label class="close cursor-pointer flex items-start justify-between w-full p-2 bg-green-500 h-24 rounded shadow-lg text-white" title="close" for="footertoast">
                      Kaizen Project Saved.

                      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                      </svg>
                    </label> --}}
                    <x-kaizen.session-message />
                  </div>

            </x-action-message>
       </div>

    </form>

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
                <!-- Modal description -->
                <p class="text-sm text-gray-700 dark:text-gray-400">
                </p>
            </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button wire:click="closeSearchUserModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
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
    /*
    flatpickr('#due', {
        defaultDate: new Date().fp_incr(1),
    }); */


    document.querySelectorAll('.cleave-money').forEach(function(el) {
        new Cleave(el, {
            prefix: '$ ',
            numeral: true,
            numeralThousandGroupStyle: 'thousand'
        });
    });

    $(document).ready(function() {
        //$('#manager_id').select2();
        /* $('#manager_id').select2({
            theme: "dark-adminlte"
        }); */

        /* $('#savings_actual_validated_id').select2({
            width: '100%'
        }); */
        /* $('#manager_id').on('change', function (e) {
            var data = $('#manager_id').select2("val");
            @this.set('project.manager_id', data);
        }); */
    });

    /* $( "#dropdown" ).select2({
        theme: "dark-adminlte"
    }); */

    /* function select2Alpine() {
        console.log($(this.$refs.select));
        console.log($( "#project.manager_id" ));

        this.select2 = $( "#manager_id" ).select2();
        this.select2.on("select2:select", (event) => {
            this.selectedCity = event.target.value;
            $( "#h_manager_id" ).val(event.target.value);
        });
        this.$watch("selectedCity", (value) => {
            this.select2.val(value).trigger("change");
        });

        this.select2 = $( "#sponsor_id" ).select2();
        this.select2.on("select2:select", (event) => {
            this.selectedCity = event.target.value;
        });
        this.$watch("selectedCity", (value) => {
            this.select2.val(value).trigger("change");
        });
    } */

    //var selectid ="project.manager_id";
    document.querySelectorAll('.select2').forEach(function(el) {
        console.log(el.id);
        initSelect2(el.id);
    });

    jQuery(document).ready(function(){
        jQuery('body').css({position: 'fixed', width: '100%'});
});

function initSelect2(id){
    document.addEventListener("livewire:load", () => {
          /* let el = $('.select2') */

          let el = $('select[id="'+id+'"]')
          initSelect()
          Livewire.hook('message.processed', (message, component) => {
            initSelect()
          })
          el.on('change', function (e) {
            @this.set(id, el.select2("val"))
          })

          function initSelect () {
            el.select2({
              placeholder: '{{__('Select employee')}}',
              allowClear: false,
              width: '100%',
              closeOnSelect: false,
              //theme: "dark-adminlte"
            })
          }

        })
}






</script>


