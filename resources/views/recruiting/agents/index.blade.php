@extends('layouts.app')

@section('title', 'Agents')

@section('content')
    <main class="flex-1 relative pb-8 z-0 overflow-y-auto">
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div class="py-6 flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center">
                            <div>
                                <div class="flex items-center">
                                    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                        Agents
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                        <a href="#" type="button"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 h-10 my-auto add-agent-open-modal">
                            Add agent
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
                                <form action="{{ route('agent.search') }}" method="get">

                                    <button class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </button>
                                    <input name="q" class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600"
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
                                        Name
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Phone #
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Options
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($agents as $agent)
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">{{ $agent->first_name . ' ' . $agent->last_name}}</td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">{{ $agent->phone_number }}</td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                            {{ $agent->district }}
                                        </td>

                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-500">
                                            <a href="#"
                                               class="text-indigo-600 hover:text-indigo-900 hover:underline mr-3"
                                               onclick="EditAgentToggleModal({{ $agent }})">Edit</a>
                                            <a href="#"
                                               class="text-indigo-600 hover:text-indigo-900 hover:underline"
                                               onclick="deleteAgent({{ $agent->id }})">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500"
                                        colspan="5">
                                        No agent records found.
                                    </td>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $agents->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-------- Add Agent Modal----------------------}}
    <div
        class="add-agent-modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="add-agent-modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:w-6/12 mx-auto rounded shadow-lg z-50 overflow-y-auto"
             style="max-height: 95%">

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-4 overflow-y-auto">
                <!--Title-->
                <div class="flex justify-between items-center pb-3 mb-3">
                    <div>
                        <p class="text-xl font-medium">Add Agent</p>
                        <p class="mt-1 text-sm text-gray-500">Please enter agent information.</p>
                    </div>
                    <div class="add-agent-modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <form action="{{ route('agent.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col items-start w-full">
                        <div class="w-full">

                            <!-- First Name -->
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full">
                                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="first_name">
                                        First Name
                                    </label>
                                    <input name="first_name"
                                           class="appearance-none block w-full border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                           id="first_name" type="text" placeholder="First Name" autofocus
                                           autocomplete="off" value="{{ old('first_name') }}">
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full">
                                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="last_name">
                                        Last Name
                                    </label>
                                    <input name="last_name"
                                           class="appearance-none block w-full border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                           id="last_name" type="text" placeholder="Last Name" autofocus required
                                           autocomplete="off" value="{{ old('last_name') }}">
                                </div>
                            </div>

                            <!-- Mobile Phone # -->
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full">
                                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="phone_number">
                                        Mobile Phone Number
                                    </label>
                                    <input name="phone_number"
                                           class="appearance-none block w-full border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                           id="phone_number" type="text" placeholder="01230000000" autofocus
                                           autocomplete="off" value="{{ old('phone_number') }}">
                                </div>
                            </div>

                            <!-- Agent Name -->
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full">
                                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="name">
                                        District
                                    </label>
                                    <input name="district"
                                           class="appearance-none block w-full border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                           id="district" type="text" placeholder="Dhaka" autofocus
                                           autocomplete="off" value="{{ old('district') }}">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Footer-->
                    <div class="flex justify-end">
                        <button type="button"
                                class="add-agent-modal-close bg-gray-500 hover:bg-gray-700 text-white text-base font-semibold py-2 px-3 rounded mr-3">
                            Cancel
                        </button>
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold text-base py-2 px-4 rounded">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--------End Add Agent Modal----------------------}}

    {{-------- Edit Agent Modal----------------------}}
    <div
        class="edit-agent-modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="edit-agent-modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:w-6/12 mx-auto rounded shadow-lg z-50 overflow-y-auto"
             style="max-height: 95%">

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-4 overflow-y-auto">
                <!--Title-->
                <div class="flex justify-between items-center pb-3 mb-3">
                    <div>
                        <p class="text-xl font-medium">Edit Agent</p>
                        <p class="mt-1 text-sm text-gray-500">Please enter agent information.</p>
                    </div>
                    <div class="edit-agent-modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <form action="{{ route('agent.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col items-start w-full">
                        <div class="w-full">

                            <input type="hidden" name="agentId" id="agentId">

                            <!-- First Name -->
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full">
                                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="first_name">
                                        First Name
                                    </label>
                                    <input name="first_name"
                                           class="appearance-none block w-full border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                           id="agent_first_name" type="text" placeholder="First Name" autofocus
                                           autocomplete="off" value="{{ old('first_name') }}">
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full">
                                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="last_name">
                                        Last Name
                                    </label>
                                    <input name="last_name"
                                           class="appearance-none block w-full border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                           id="agent_last_name" type="text" placeholder="Last Name" autofocus required
                                           autocomplete="off" value="{{ old('last_name') }}">
                                </div>
                            </div>

                            <!-- Mobile Phone # -->
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full">
                                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="phone_number">
                                        Mobile Phone Number
                                    </label>
                                    <input name="phone_number"
                                           class="appearance-none block w-full border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                           id="agent_phone_number" type="text" placeholder="01230000000" autofocus
                                           autocomplete="off" value="{{ old('phone_number') }}">
                                </div>
                            </div>

                            <!-- Agent Name -->
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full">
                                    <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="name">
                                        District
                                    </label>
                                    <input name="district"
                                           class="appearance-none block w-full border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                           id="agent_district" type="text" placeholder="Dhaka" autofocus
                                           autocomplete="off" value="{{ old('district') }}">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Footer-->
                    <div class="flex justify-end">
                        <button type="button"
                                class="edit-agent-modal-close bg-gray-500 hover:bg-gray-700 text-white text-base font-semibold py-2 px-3 rounded mr-3">
                            Cancel
                        </button>
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold text-base py-2 px-4 rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--------End Edit Agent Modal----------------------}}

    {{-------Add Agent script----------------}}
    <script>
        let addAgentOpenModal = document.querySelectorAll('.add-agent-open-modal')
        for (let i = 0; i < addAgentOpenModal.length; i++) {
            addAgentOpenModal[i].addEventListener('click', function (event) {
                event.preventDefault()
                AddAgentToggleModal()
            })
        }
        const addAgentOverlay = document.querySelector('.add-agent-modal-overlay')
        addAgentOverlay.addEventListener('click', AddAgentToggleModal)
        let addAgentCloseModal = document.querySelectorAll('.add-agent-modal-close')
        for (let i = 0; i < addAgentCloseModal.length; i++) {
            addAgentCloseModal[i].addEventListener('click', AddAgentToggleModal)
        }
        document.onkeydown = function (evt) {
            evt = evt || window.event
            let isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                AddAgentToggleModal()
            }
        };

        function AddAgentToggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.add-agent-modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
    </script>
    {{-- ------End Add Agent Script----------------------}}
    {{-------Edit Agent script----------------}}
    <script>
        let editAgentOpenModal = document.querySelectorAll('.edit-agent-open-modal')
        for (let i = 0; i < editAgentOpenModal.length; i++) {
            editAgentOpenModal[i].addEventListener('click', function (event) {
                event.preventDefault()
                EditAgentToggleModal()
            })
        }
        const editAgentOverlay = document.querySelector('.edit-agent-modal-overlay')
        editAgentOverlay.addEventListener('click', EditAgentToggleModal)
        let editAgentCloseModal = document.querySelectorAll('.edit-agent-modal-close')
        for (let i = 0; i < editAgentCloseModal.length; i++) {
            editAgentCloseModal[i].addEventListener('click', EditAgentToggleModal)
        }
        document.onkeydown = function (evt) {
            evt = evt || window.event
            let isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                EditAgentToggleModal()
            }
        };

        function EditAgentToggleModal(agent) {
            if (agent) {
                document.getElementById('agentId').value = agent.id;
                document.getElementById('agent_first_name').value = agent.first_name;
                document.getElementById('agent_last_name').value = agent.last_name;
                document.getElementById('agent_phone_number').value = agent.phone_number;
                document.getElementById('agent_district').value = agent.district;
            }
            const body = document.querySelector('body')
            const modal = document.querySelector('.edit-agent-modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
    </script>
    {{-- ------End Edit Agent Script----------------------}}

    {{--   ------price archive script-------------------- --}}
    <script>
        function deleteAgent(agent_id) {
            let url = "{{ route('agent.delete', [':agent_id']) }}".replace(':agent_id', agent_id);
            Swal.fire({
                title: 'Please confirm',
                text: "Are you sure you want to delete this agent?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#10B981',
                confirmButtonText: 'Continue',
                cancelButtonColor: '#EF4444',
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
    {{--   ------End price archive script-------------------- --}}
@endsection
