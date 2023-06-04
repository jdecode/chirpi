<x-admin.layout>
    <x-slot name="header">

        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Add Client') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-1 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <form method="POST" action="{{ route('admin.clients.store') }}">
                        @csrf
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                                            <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                                            <input type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
                                            <input type="password" name="password" id="password" autocomplete="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                                        </div>
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring-gray-900 disabled:opacity-25 transition ease-in-out duration-150 mt-4">
                                            {{ __('Add Client') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
