<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Athletes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex text-center justify-between items-center sm:px-6 lg:px-8 lg:pt-6">
                    <div class="flex-1 text-left">
                        <a class="inline-block text-gray-900 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            href="{{route('athletes.index')}}">Back to Athletes</a>
                    </div>
                    <div class="flex-1">
                        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{$athlete->lname}} {{$athlete->fname}}
                        </h2>
                    </div>
                    <div class="flex-1 text-right">
                        @auth
                            <a class="inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="{{route('athletes.edit', $athlete->id)}}">Edit Athlete</a>
                            <a class="inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="{{route('athletes.trash', $athlete->id)}}">Delete Athlete</a>
                        @else
                            <a class="invisible inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="#">Edit Athlete</a>
                            <a class="invisible inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="#">Delete Athlete</a>
                        @endauth
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col items-center">
                        <h3 class="w-3/6 text-xl">Info:</h3>
                        <table class="w-3/6 sm:table-fixed lg:table-auto text-center my-4">
                            <tr class="border-solid border-2 border-gray-900">
                                <th class="dark:bg-gray-900">Last Name:</th>
                                <td>{{$athlete->lname}}</td>
                            </tr>
                            <tr class="border-solid border-2 border-gray-900">
                                <th class="dark:bg-gray-900">First Name:</th>
                                <td>{{$athlete->fname}}</td>
                            </tr>
                            <tr class="border-solid border-2 border-gray-900">
                                <th class="dark:bg-gray-900">Country Name:</th>
                                <td>{{$athlete->country}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="flex flex-col items-center">
                        <h3 class="w-3/6 text-xl">Medals:</h3>
                        <table class="w-3/6 sm:table-fixed lg:table-auto self-center my-4">
                            <thead class="dark:bg-gray-900 border-solid border-2 border-gray-900">
                                <tr>
                                    <th class="w-1/3">Gold Medals</th>
                                    <th class="w-1/3">Silver Medals</th>
                                    <th class="w-1/3">Bronze Medals</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr class="border-solid border-2 border-gray-900">
                                    <td class="border-solid border-2 border-gray-900 w-1/3">{{$athlete->gold}}</td>
                                    <td class="border-solid border-2 border-gray-900 w-1/3">{{$athlete->silver}}</td>
                                    <td class="border-solid border-2 border-gray-900 w-1/3">{{$athlete->bronze}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-col items-center">
                        <h3 class="w-3/6 text-xl">Participating Sports:</h3>
                        <table class="w-3/6 sm:table-fixed lg:table-auto self-center my-4">
                            <thead class="dark:bg-gray-900 border-solid border-2 border-gray-900">
                                <tr>
                                    <th>Division</th>
                                    <th>Name</th>
                                    <th>Sport</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($sports) < 1)
                                    <tr class="border-solid border-2 border-gray-900">
                                        <td class="border-solid border-2 border-gray-900 w-1/3">&nbsp;</td>
                                        <td class="border-solid border-2 border-gray-900 w-1/3">&nbsp;</td>
                                        <td class="border-solid border-2 border-gray-900 w-1/3">&nbsp;</td>
                                    </tr>
                                @else
                                    @foreach ($sports as $sport)
                                        <tr class="border-solid border-2 border-gray-900">
                                            <td class="border-solid border-2 border-gray-900 w-1/3">{{$sport->division}}</td>
                                            <td class="border-solid border-2 border-gray-900 w-1/3">{{$sport->name}}</td>
                                            <td class="border-solid border-2 border-gray-900 w-1/3">{{$sport->sport}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>