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
                            New Sport
                        </h2>
                    </div>
                    <div class="flex-1 text-right">

                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <form class=" w-3/6 mx-auto" action="{{ route('sports.store') }}" method="post">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <x-input-label for="name" class="font-bold text-xl">Name</x-input-label>
                                <x-text-input type="text" class="block mt-1 w-full" id="name" name="name" aria-
                                    describedby="name" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="sport" class="font-bold text-xl">Sport</x-input-label>
                                <x-text-input type="text" class="block mt-1 w-full" id="sport" name="sport" aria-
                                    describedby="sport" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="division" class="font-bold text-xl">Sports</x-input-label>
                                <select id="division" name="division" aria- describedby="division"
                                    class="self-center rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                                    <option class="text-xl text-gray-300" value="Men's">Men's</option>
                                    <option class="text-xl text-gray-300" value="Women's">Women's</option>
                                    <option class="text-xl text-gray-300" value="Mixed">Mixed</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class=" inline-block text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>