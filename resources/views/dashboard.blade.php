<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <h2 class="font-semibold text-3xl text-center my-4 text-gray-800 dark:text-gray-200 leading-tight">
                            All Models
                        </h2>
                        <table class="w-full sm:table-fixed lg:table-auto">
                            <thead class="dark:bg-gray-900 border-solid border-2 border-gray-900">
                                <tr>
                                    <th>Name</th>
                                    <th>View All</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="border-solid border-2 border-gray-900">Sports</td>
                                    <td class="border-solid border-2 border-gray-900"><a class="underline text-sky-400" href="{{route('sports.index')}}">View</a></td>
                                </tr>
                                <tr>
                                    <td class="border-solid border-2 border-gray-900">Athletes</td>
                                    <td class="border-solid border-2 border-gray-900"><a class="underline text-sky-400" href="{{route('athletes.index')}}">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>