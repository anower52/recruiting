@extends('layouts.app')

@section('title', 'CV')

@section('content')

    <main class="flex-1 relative pb-8 z-0 overflow-y-auto">
        <!-- Page header -->
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div class="py-6 flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                    <div class="flex-1 min-w-0">
                        <!-- Profile -->
                        <div class="flex items-center">
                            <div>
                                <div class="flex items-center">
                                    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                        Cv
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('passport.create') }}" type="button"
                       class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 h-10 my-auto">
                        Make CV
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-8">
            <div class="sm:block">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col mt-2">
                        <div class="flex justify-end">
                            <div class="relative lg:mx-0">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </span>
                                <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600"
                                       type="text"
                                       placeholder="Search">
                            </div>
                        </div>

                        <div
                            class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg mt-2">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Passenger Name
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Phone #
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date of birth
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Options
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($passports as $passport)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">{{ $passport->reference_number }}</td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">{{ $passport->name }}</td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                            {{ $passport->phone_number }}
                                        </td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                            {{ $passport->date_of_birth }}
                                        </td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                            <a href="#"
                                               class="text-indigo-600 hover:text-indigo-900 hover:underline mr-3">View</a>
                                            <a href="{{ route('passport.edit', $passport->id) }}"
                                               class="text-indigo-600 hover:text-indigo-900 hover:underline mr-3">Edit</a>
                                            <a href="#"
                                               class="text-indigo-600 hover:text-indigo-900 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500"
                                        colspan="5">
                                        No contest records found.
                                    </td>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $passports->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
