<x-app-layout title="Suggestion Form">
    <div class="container grid px-6 mx-auto" x-data="{isRapid:false}">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Kaizen Continuous Improvement Suggestion Form
        </h2>

        <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
            General Info
        </h4>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
            <div class="grid gap-2 mb- md:grid-cols-1 xl:grid-cols-2">
                <div class="gap-2 mb-2">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Name</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Name" />
                    </label>
                </div>

                <div class="grid gap-2 mb-2 md:grid-cols-1 xl:grid-cols-2">

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Date</span>
                        <!-- focus-within sets the color for the icon when input is focused -->
                        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                            <input class="block w-full pr-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Date" />
                            <div class="absolute inset-y-0 right-0 flex items-center mr-3 pointer-events-none">
                                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>

                            </div>
                        </div>
                    </label>

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Store Name
                        </span>
                        <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option>Medicine Hat</option>
                            <option>Red Deer</option>
                        </select>
                    </label>

                </div>
            </div>
            <div class="grid gap-2 mb-2 md:grid-cols-2 xl:grid-cols-4">



                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Just Do It Kaizen
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input @click="isRapid=!isRapid" type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Rapid Kaizen
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Head Office Input
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
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
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            People
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Safety
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Cost/Buying
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            All Stores
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Policy / Procedure
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Pricing
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Warehouse
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Inventory
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Margin
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Technology
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Ordering
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Cost
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Head Office
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Receiving
                        </span>
                    </label>
                </div>
                <div class="flex mt-2 text-sm">
                    <label class="flex items-center dark:text-gray-400">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                        <span class="ml-2">
                            Other
                        </span>
                    </label>
                </div>
            </div>
        </div><!--Affected Aread-->

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"><!--card-->
            <div class="grid gap-2 mb-2 md:grid-cols-1 xl:grid-cols-2">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Reason For Kaizen:</span>
                    <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Reason For Kaizen"></textarea>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Problem:</span>
                    <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Problem"></textarea>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Causes</span>
                    <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Causes"></textarea>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Solution</span>
                    <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Solution"></textarea>
                </label>
            </div>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Expected Result</span>
                <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                rows="3" placeholder="Expected Result"></textarea>
            </label>
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

                @livewire('kaizen.rapid-causes')

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
    </div>
</div>
</x-app-layout>
