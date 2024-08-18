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
                            Update Athlete
                        </h2>
                    </div>
                    <div class="flex-1 text-right">

                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <form class=" w-3/6 mx-auto" action="{{ route('athletes.update', $athlete->id)}}" method="post">
                        {{ method_field('PUT') }}
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
                                <x-input-label for="lname" class="font-bold text-xl">Last Name</x-input-label>
                                <x-text-input type="text" class="block mt-1 w-full" id="lname" name="lname" aria-
                                    describedby="lname" value="{{$athlete->lname}}"/>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="fname" class="font-bold text-xl">First Name</x-input-label>
                                <x-text-input type="text" class="block mt-1 w-full" id="fname" name="fname" aria-
                                    describedby="fname" value="{{$athlete->fname}}"/>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="country" class="font-bold text-xl">Country</x-input-label>
                                <x-text-input type="text" class="block mt-1 w-full" id="country" name="country" aria-
                                    describedby="country" value="{{$athlete->country}}"/>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="gold" class="font-bold text-xl">Gold Medals</x-input-label>
                                <x-text-input type="number" class="block mt-1 w-full" id="gold" name="gold" aria-
                                    describedby="gold" value="{{$athlete->gold}}"/>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="silver" class="font-bold text-xl">Silver Medals</x-input-label>
                                <x-text-input type="number" class="block mt-1 w-full" id="silver" name="silver" aria-
                                    describedby="silver" value="{{$athlete->silver}}"/>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="bronze" class="font-bold text-xl">Bronze Medals</x-input-label>
                                <x-text-input type="number" class="block mt-1 w-full" id="bronze" name="bronze" aria-
                                    describedby="bronze" value="{{$athlete->bronze}}"/>
                            </div>
                            <div class="mb-3">
                                <x-input-label for="sports[]" class="font-bold text-xl">Sports</x-input-label>
                                <div
                                    class="flex flex-wrap gap-x-4 dark:bg-gray-900 border border-gray-700 rounded-md py-2 px-4 ">
                                    @foreach ($all_sports as $current_sport)
                                        <div class="flex gap-x-2 my-2">
                                            <input type="checkbox" class="self-center rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" id="{{$current_sport->id}}" name="sports[]"
                                                value="{{$current_sport->id}}" {{in_array($current_sport['id'], $sports) ? 'checked=checked' : ''}}>
                                            <x-input-label for="{{$current_sport->id}}"
                                                class="font-bold text-xl">{{$current_sport->division}}
                                                {{$current_sport->name}} {{$current_sport->sport}}</x-input-label>
                                        </div>
                                    @endforeach
                                </div>
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