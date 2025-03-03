<x-app-layout title="Tables">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Users List <a href="{{route('users.create')}}"> <button class="px-3  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                + {{ __('New User') }}
            </button></a>
        </h2>


        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                        <th class="px-4 py-3">
                            ID
                        </th>
                        <th class="px-4 py-3">   Name
                        </th>
                        <th class="px-4 py-3">    Email
                        </th>
                        <th class="px-4 py-3">   Email Verified At
                        </th>
                        <th class="px-4 py-3">   Roles
                        </th>
                        <th class="px-4 py-3">
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    @foreach ($users as $user)
                        <tr>
                            <td class="px-4 py-3">
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $user->id }}
                                </p>
                            </td>

                            <td class="px-4 py-3">
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $user->name }}
                                </p>
                            </td>

                            <td class="px-4 py-3">
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $user->email }}
                                </p>
                            </td>

                            <td class="px-4 py-3">
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $user->email_verified_at }}
                                </p>
                            </td>

                            <td class="px-4 py-3">    @foreach ($user->roles as $role)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $role->title }}
                                    </span>
                                @endforeach
                            </td>

                            <td class="px-4 py-3">    <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                <form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
