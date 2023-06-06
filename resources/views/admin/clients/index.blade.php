<x-admin.layout>
    <x-slot name="header" class="">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Clients') }}
            </h2>
            <a
                href="{{ route('admin.clients.create') }}"
                class="p-2 px-4 -mb-4 rounded-lg bg-indigo-500 place-content-center text-center text-sm font-semibold text-white">Add Client</a>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-1 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Name</th>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">URL</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Email</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Created</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800">
                            @foreach ($clients as $client)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{ $client->name }}</td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{ $client->url }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $client->email }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ Carbon\Carbon::parse($client->created_at)->format('F j, Y') }}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="#" class="text-indigo-400 hover:text-indigo-300">Edit<span class="sr-only">{{ $client->name }}</span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
