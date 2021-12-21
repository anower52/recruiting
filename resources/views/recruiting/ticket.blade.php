@extends('layouts.app')

@section('title', 'CV')

@section('content')
    <main class="flex-1 relative pb-8 z-0 overflow-y-auto">
        <!-- Page header -->
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div class="py-6 flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center">
                            <div>
                                <div class="flex items-center">
                                    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">Ticket
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                        <a href="{{ route('passport') }}" type="button"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Return to CV
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="sm:block">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col mt-2">
                        <div class="flex justify-end">
                            <div class="relative lg:mx-0">
                                <form action="{{ route('passport.search') }}" method="get">

                                    <button class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </button>
                                    <input type="hidden" name="search_id" value="ticket">
                                    <input name="q"
                                           class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600"
                                           type="text"
                                           placeholder="Search" @if(!empty($search)) value="{{ $search }}" @endif>
                                </form>
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
                                        Ticket
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Options
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($passports as $key => $passport)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">{{ $passport->reference_number }}</td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">{{ $passport->name }}</td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                            {{ $passport->phone_number }}
                                        </td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                            <label for="passportStatus{{$key}}"
                                                   class="flex items-center cursor-pointer">
                                                <div class="relative">
                                                    <input id="passportStatus{{$key}}"
                                                           onclick="ttcStatusChange(this)"
                                                           type="checkbox"
                                                           class="sr-only"
                                                           {{ $passport->ticket ? 'checked' : '' }} data-id="{{$passport->id}}"/>
                                                    <div
                                                        class="{{ $passport->ticket ? 'bg-blue-600' : 'bg-gray-200' }} relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                        role="switch" aria-checked="false"
                                                        id="toggle_back_{{$passport->id}}">
                                                        <span class="sr-only">Use setting</span>
                                                        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                        <span aria-hidden="true"
                                                              class="{{ $passport->ticket ? 'translate-x-5' : 'translate-x-0' }} pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"
                                                              id="toggle_dot_{{$passport->id}}"></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ route('passport.show', $passport->id) }}"
                                               class="text-indigo-600 hover:text-indigo-900 hover:underline mr-3">View</a>
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

    <script>
        function ttcStatusChange(source) {
            let status = source.dataset.id;
            let url = "{{ route('passport.ticket.status')}}";
            let statusValue = source.checked ? '1' : '0';
            let toggleDot = document.getElementById('toggle_dot_' + status);
            let toggleBack = document.getElementById('toggle_back_' + status);
            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                data: {'status': status, 'statusValue': statusValue},
                success: function (response) {
                    if (source.checked) {
                        toggleDot.classList.remove('translate-x-0');
                        toggleDot.classList.add('translate-x-5');
                        toggleBack.classList.remove('bg-gray-200');
                        toggleBack.classList.add('bg-blue-600');
                    } else {
                        toggleDot.classList.remove('translate-x-5');
                        toggleDot.classList.add('translate-x-0');
                        toggleBack.classList.remove('bg-blue-600');
                        toggleBack.classList.add('bg-gray-200');
                    }
                }
            });
        }
    </script>
@endsection
