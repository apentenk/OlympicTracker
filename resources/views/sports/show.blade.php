<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Sports
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex text-center justify-between items-center sm:px-6 lg:px-8 lg:pt-6">
                    <div class="flex-1 text-left">
                        <a class="inline-block text-gray-900 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            href="{{route('sports.index')}}">Back to Sports</a>
                    </div>
                    <div class="flex-1">
                        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{$sport->division}} {{$sport->name}} {{$sport->sport}}
                        </h2>
                    </div>
                    <div class="flex-1 text-right">
                        @auth
                            <a class="inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="{{route('sports.edit', $sport->id)}}">Edit Sport</a>
                            <a class="inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="{{route('sports.trash', $sport->id)}}">Delete Sport</a>
                        @else
                            <a class="invisible inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="#">Edit Sport</a>
                            <a class="invisible inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                href="#">Delete Sport</a>
                        @endauth
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col items-center">
                        <h3 class="w-3/6 text-xl">Participating Athletes:</h3>
                        <table class="w-3/6 sm:table-fixed lg:table-auto self-center my-4">
                            <thead class="dark:bg-gray-900 border-solid border-2 border-gray-900">
                                <tr>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if(count($athletes) < 1)
                                    <tr class="border-solid border-2 border-gray-900">
                                        <td class="border-solid border-2 border-gray-900 w-1/3">&nbsp;</td>
                                        <td class="border-solid border-2 border-gray-900 w-1/3">&nbsp;</td>
                                        <td class="border-solid border-2 border-gray-900 w-1/3">&nbsp;</td>
                                    </tr>
                                @else
                                    @foreach ($athletes as $athlete)
                                        <tr class="border-solid border-2 border-gray-900">
                                            <td class="border-solid border-2 border-gray-900 w-1/3">{{$athlete->lname}}</td>
                                            <td class="border-solid border-2 border-gray-900 w-1/3">{{$athlete->fname}}</td>
                                            <td class="border-solid border-2 border-gray-900 w-1/3">{{$athlete->country}}</td>
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