<div x-data="{}">
    <x-kaizen.session-message /> 
    {{-- <div class="mb-4 px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
        Click "Edit", modify that line data and click "Save".
    </div> --}}
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 md:grid-cols-1 xl:grid-cols-3"><!--card-->
        <span class="text-gray-700 dark:text-gray-400 pr-4">{{ t('kaizen_general','location') }}</span>
        <select name="" id="" wire:model="selectedLocation" class="mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach

        </select>
        @if(auth()->user()->level == "super_admin" || auth()->user()->level == "headoffice_admin" || auth()->user()->level == "location_manager")
            <a href="{{route('employees.create')}}/{{$selectedLocation}}"> <button class="p-1 ml-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + {{ __('Add Employee') }}
            </button></a>
        @endif
    </div>


    <table class="w-full whitespace-no-wrap">
        <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">
                ID
            </th>
            <th class="px-4 py-3">   Name
            </th>
           
            <th class="px-4 py-3">   Level
            </th>
            <th class="px-4 py-3">   Status
            </th>
            @if (auth()->user()->currentTeam->id == 1)
                @if(auth()->user()->level == "super_admin" || auth()->user()->level == "ho_admin")
                    <th class="px-4 py-3">   {{ t('kaizen_general','location') }}</th>
                @endif
            @endif
            <th class="px-4 py-3">
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

        @foreach ($employees as $index => $employee)
            <tr >
                <td class="px-4 py-3" >
                    <p class="text-xs text-gray-600 dark:text-gray-400" >
                        {{ $employee['id'] }}
                    </p>
                </td>
                <td class="px-4 py-3" style="max-width: 100px">
                    @if ($editedEmployeeIndex === $index || $editedEmployeeField === $index . '.name')
                        <input type="text"
                            @click.away="$wire.editedEmployeeField === '{{ $index }}.name' ? $wire.saveEmployee({{ $index }}) : null"
                            wire:model.defer="employees.{{ $index }}.name" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border w-full py-2 focus:outline-none focus:border-blue-400 {{ $errors->has('employees.' . $index . '.name') ? 'border-red-500' : 'border-gray-400' }}"
                        />
                        @if ($errors->has('employees.' . $index . '.name'))
                            <div class="text-red-500">{{ $errors->first('employees.' . $index . '.name') }}</div>
                        @endif
                    @else
                        <div class="cursor-pointer" wire:click="editEmployeeField({{ $index }}, 'name')">
                            <p class="text-sm
                            @if($employee['status'] === 'active')
                            text-gray-600
                            @else
                            text-gray-300
                            @endif
                            dark:text-gray-400">
                                {{ $employee['name'] }}
                            </p>
                        </div>
                    @endif
                </td>
                
                {{-- <td>
                    <p class="text-xs text-gray-600 dark:text-gray-400" >
                        {{  str_replace('_', ' ', ucwords($employee['level'], "_")) }}

                        {{--
                        @if ($employee['level'] == 'super_admin')
                            Super Admin
                        @elseif ($employee['level'] == 'location_staff')
                            Store Staff
                        @elseif ($employee['level'] == 'location_manager')
                            Store Manager
                        @elseif ($employee['level'] == 'headoffice_staff')
                            Headoffice Staff
                        @elseif ($employee['level'] == 'headoffice_admin')
                            Headoffice Admin
                        @endif
                         
                    </p>
                </td> --}}
                <td class="px-4 py-3 ">
                    <select name="" id="" wire:model="employees.{{ $index }}.level" wire:change="changeLevel({{ $index }})" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @if(auth()->user()->level == 'super_admin')
                            <option value="super_admin" >Super Admin</option>
                        @endif
                        <option value="location_staff" >{{ t('kaizen_general','location') }} Staff</option>
                    </select>
                </td>
                <td class="px-4 py-3 ">
                    <select name="" id="" wire:model="employees.{{ $index }}.status" wire:change="changeStatus({{ $index }})" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="active" >Active</option>
                        <option value="inactive" >Inactive</option>
                    </select>
                </td>

                @if (auth()->user()->currentTeam->id == 1)
                    @if(auth()->user()->level == "super_admin" || auth()->user()->level == "ho_admin")
                        <td class="px-4 py-3" >
                            {{-- <p class="text-xs text-gray-600 dark:text-gray-400" >
                                {{ $employee->location->name; }}
                            </p> --}}
                            <a href="{{route('employees.change-location')}}/{{$employee->id}}"> <button class="p-1 ml-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                {{ __('Change ') }}{{ t('kaizen_general','location') }}
                            </button></a>
                            {{-- <select name="employees.{{ $index }}.location" id="employees.{{ $index }}.location" wire:model="employees.{{ $index }}.location" wire:change="changeLocation({{ $index }})" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($locations as $location)
                                    <option value="{{ $location->id }}"  @if("Red Deer" == $location->name)
                                        selected
                                    @endif>{{ $location->name }}</option>
                                @endforeach
                            </select> --}}
                        </td>
                    @endif
                @endif
                <td class="px-4 py-3">

                    {{-- @if($editedEmployeeIndex === $index || (isset($editedEmployeeField) && (int)(explode('.',$editedEmployeeField)[0])===$index))
                        <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                wire:click.prevent="saveEmployee({{$index}})">
                            Save
                        </button>
                    @else
                        <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                wire:click.prevent="editEmployee({{$index}})">
                            Edit
                        </button>
                    @endif --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <x-action-message on="saved">
        <div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
            <input type="checkbox" class="hidden" id="footertoast"><a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
            href="#">
                <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <span>{{ $lastSavedName }} Saved </span>
                </div>
            {{-- <span>View more →</span> --}}
            </a>
        </div>
    </x-action-message>
</div>
