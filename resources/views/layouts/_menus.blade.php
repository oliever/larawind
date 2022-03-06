<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6   text-gray-800 dark:text-gray-200" href="/dashboard">
       <span class="text-md">{{ config('app.name') }}</span> | <span class="font-bold text-xl">{{ auth()->user()->currentTeam->name }}</span>
    </a>
    @if(auth()->user()->level == 'super_admin')
        <a class="text-xs underline" href="{{route('system-settings.change-team')}}">Change</a>
    @endif
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            {!! request()->routeIs('dashboard') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a data-turbolinks-action="replace"
            class="inline-flex items-center w-full text-sm {!! request()->routeIs('dashboard') ? 'font-semibold dark:text-gray-100' : 'dark:text-gray-400' !!} text-gray-800 transition-colors duration-150 hover:text-gray-800
             dark:hover:text-gray-200 "
            href="{{route('dashboard')}}">
                <svg class="w-5 h-5" ari a-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="ml-4">{{ __('Dashboard') }}</span>
            </a>
        </li>

        {{-- <li class="relative px-6 py-3">
            {!! request()->routeIs('kaizen.index') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a data-turbolinks-action="replace" href="{{route('kaizen.index')}}"
            class="inline-flex items-center w-full text-sm {!! request()->routeIs('kaizen.index') ? 'font-semibold dark:text-gray-100' : 'dark:text-gray-400' !!} text-gray-800 transition-colors duration-150 hover:text-gray-800
             dark:hover:text-gray-200 " >
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span class="ml-4">{{ __('Kaizen Projects') }}</span>
            </a>
        </li> --}}

        <li class="relative px-6 py-3">
            {!! request()->routeIs('kaizen.create') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a data-turbolinks-action="replace" href="{{route('kaizen.create')}}"
            class="inline-flex items-center w-full text-sm {!! request()->routeIs('kaizen.create') ? 'font-semibold dark:text-gray-100' : 'dark:text-gray-400' !!} text-gray-800 transition-colors duration-150 hover:text-gray-800
             dark:hover:text-gray-200 " >
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span class="ml-4">{{ __('New Kaizen Suggestion') }}</span>
            </a>
        </li>

        <li class="relative px-6 py-3">
            {!! request()->routeIs('project.create') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a data-turbolinks-action="replace" href="{{route('project.create')}}"
            class="inline-flex items-center w-full text-sm {!! request()->routeIs('project.create') ? 'font-semibold dark:text-gray-100' : 'dark:text-gray-400' !!} text-gray-800 transition-colors duration-150 hover:text-gray-800
             dark:hover:text-gray-200 " >
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                <span class="ml-4">{{ __('New Kaizen Project') }}</span>
            </a>
        </li>

        @if(auth()->user()->location_locked)
            @if(auth()->user()->shared && (auth()->user()->level == 'location_staff' || auth()->user()->level == 'headoffice_staff'))
                <li class="relative px-6 py-3">
                    <a data-turbolinks-action="replace"
                    class="inline-flex items-center w-full text-sm dark:text-gray-400 text-gray-800 transition-colors duration-150 hover:text-gray-800
                    dark:hover:text-gray-200 "
                    href="{{route('employees.select')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                        <span class="ml-4">{{ __('Change Employee') }}</span>
                    </a>
                </li>
            @else
                <li class="relative px-6 py-3">
                    {!! request()->routeIs('employees.index') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
                    <a data-turbolinks-action="replace"
                    class="inline-flex items-center w-full text-sm {!! request()->routeIs('employees.index') ? 'font-semibold dark:text-gray-100' : 'dark:text-gray-400' !!} text-gray-800 transition-colors duration-150 hover:text-gray-800
                    dark:hover:text-gray-200 "
                    href="{{route('employees.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                      </svg>
                        <span class="ml-4">{{ __('Employees') }}</span>
                    </a>
                </li>
            @endif
        @else
            
        @endif

        @if(auth()->user()->level != 'super_admin')
            <li class="relative px-6 py-3">
                {!! request()->routeIs('rewards.index') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
                <a data-turbolinks-action="replace" href="{{route('rewards.index')}}"
                class="inline-flex items-center w-full text-sm {!! request()->routeIs('rewards.index') ? 'font-semibold dark:text-gray-100' : 'dark:text-gray-400' !!} text-gray-800 transition-colors duration-150 hover:text-gray-800
                dark:hover:text-gray-200 " >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                </svg>
                    <span class="ml-4">{{ __('Rewards') }}</span>
                </a>
            </li>
        @endif

        @if(auth()->user()->level == 'super_admin')
            <li class="relative px-6 py-3">
                {!! request()->routeIs('users.index') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
                <a data-turbolinks-action="replace" href="{{route('users.index')}}"
                class="inline-flex items-center w-full text-sm {!! request()->routeIs('users.index') ? 'font-semibold dark:text-gray-100' : 'dark:text-gray-400' !!} text-gray-800 transition-colors duration-150 hover:text-gray-800
                dark:hover:text-gray-200 " >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                  </svg>
                    <span class="ml-4">{{ __('User Logins') }}</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm dark:text-gray-400 text-gray-800 transition-colors duration-150 hover:text-gray-800
                dark:hover:text-gray-200 "
                href="{{route('system-settings.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                </svg>
                    <span class="ml-4">{{ __('Company Settings') }}</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm dark:text-gray-400 text-gray-800 transition-colors duration-150 hover:text-gray-800
                dark:hover:text-gray-200 "
                href="{{route('system-settings.change-team')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                    <span class="ml-4">{{ __('Change Company') }}</span>
                </a>
            </li>
        @endif

    </ul>
</div>
