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
                <div class="overflow-x-auto">
                    <form method="POST" action="{{ route('admin.clients.store') }}">
                        @csrf
                        <div>
                            <div class="border-b border-white/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="name" class="block text-sm font-medium leading-6 text-white">Name</label>
                                        <div class="mt-2">
                                            <input required placeholder="Client Pvt. Ltd." id="name" name="name" type="text" autocomplete="name" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
                                        <div class="mt-2">
                                            <input required placeholder="director@client.com" id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
                                        <div class="mt-2">
                                            <input required placeholder="top-secret-12345" id="password" name="password" type="password" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-white">Confirm password</label>
                                        <div class="mt-2">
                                            <input required placeholder="top-secret-12345" id="password" name="password_confirmation" type="password" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b border-white/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="url" class="block text-sm font-medium leading-6 text-white">URL</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">{{ env('APP_URL') }}/</span>
                                                <input type="text" name="url" id="url" autocomplete="url" class="flex-1 border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm sm:leading-6" placeholder="url-of-client">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-start gap-x-6">
                            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                            <a href="{{ url(route('admin.clients.index')) }}" class="text-sm font-semibold leading-6 text-white">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
