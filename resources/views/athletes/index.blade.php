<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Athletes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center sm:px-6 lg:px-8 lg:pt-6">
                    <div>
                        @auth
                            <a class="inline-block text-center text-gray-900 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="{{route('dashboard')}}">Back to Dashboard</a>
                        @else
                            <a class="invisible text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="#">Back to Dashboard</a>
                        @endauth

                    </div>
                    <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
                        All Athletes
                    </h2>
                    <div>
                        @auth
                            <a class="inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="{{route('athletes.create')}}">Create new Athlete</a>
                        @else
                            <a class="invisible inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="#">Create new Athlete</a>
                        @endauth
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full sm:table-fixed lg:table-auto">
                        <thead class="dark:bg-gray-900 border-solid border-2 border-gray-900">
                            <tr>
                                <th>ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Country</th>
                                <th>Gold Medals</th>
                                <th>Silver Medals</th>
                                <th>Bronze Medals</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($athletes as $athlete)
                                <tr class="border-solid border-2 border-gray-900">
                                    <td>{{$athlete->id}}</td>
                                    <td>{{$athlete->lname}}</td>
                                    <td>{{$athlete->fname}}</td>
                                    <td>{{$athlete->country}}</td>
                                    <td>{{$athlete->gold}}</td>
                                    <td>{{$athlete->silver}}</td>
                                    <td>{{$athlete->bronze}}</td>
                                    <td><a class="underline text-sky-400"
                                            href="{{route('athletes.show', $athlete)}}">Details</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>