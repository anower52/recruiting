@extends('layouts.app')

@section('title', 'Edit CV')

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
                                    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                        {{ $passportInfo->name }}
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
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
            <div class="max-w-6xl mx-auto">
                <!-- Content goes here -->
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="hidden bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6"></div>
                </div>

                @if($passportInfo)
                    <div class="space-y-6 bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <!-- Profile dropdown -->
                            <div class="relative float-right">
                                <div>
                                    <button type="button"
                                            class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none lg:p-2 lg:rounded-md lg:hover:bg-gray-50"
                                            id="action-menu" aria-expanded="false" aria-haspopup="true">

                                    <span class="ml-3 text-gray-700 text-sm font-medium lg:block">
                                    <span class="sr-only">Open business menu for </span> Actions
                                </span>
                                        <!-- Heroicon name: solid/chevron-down -->
                                        <svg class="flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </div>

                                <div id="ActionDiv"
                                     class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10"
                                     role="menu" aria-orientation="vertical" aria-labelledby="action-menu">

                                    <a href="{{ route('passport.edit', $passportInfo->id) }}"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Edit
                                        CV</a>

                                    <a href="#"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 business-archive delete_confirm"
                                       role="menuitem" onclick="deletePassport({{ $passportInfo->id }})">Delete CV</a>
                                </div>
                                <script>
                                    document.getElementById('action-menu').onclick = function () {
                                        document.getElementById("ActionDiv").classList.toggle("hidden");
                                    }

                                    const resultAction = document.getElementById("ActionDiv");
                                    window.addEventListener('click', event => {
                                        if (event.target.parentElement.id !== "action-menu") {
                                            resultAction.classList.add("hidden")
                                        }
                                    })
                                </script>
                            </div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                CV Information
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                This information is to be considered privileged and confidential.
                            </p>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                            <table class="min-w-full divide-y divide-gray-300">
                                <tbody class="bg-white divide-y divide-gray-200">

                                <!-- Passport Id -->
                                <tr class="bg-white w-full">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500 w-1/3">
                                        Id #
                                    </td>
                                    @if(!empty($passportInfo->reference_number))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            {{ $passportInfo->reference_number }}
                                        </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <!-- Name -->
                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Name
                                    </td>
                                    @if(!empty($passportInfo->name))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{$passportInfo->name}}</td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Phone Number
                                    </td>
                                    @if(!empty($passportInfo->phone_number))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{$passportInfo->phone_number}}</td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Gender
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        @if ($passportInfo->gender == 0)
                                            Male
                                        @elseif($passportInfo->gender == 1)
                                            Female
                                        @elseif($passportInfo->gender == 3)
                                            3rd Gender
                                        @endif
                                    </td>
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Religion
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        @if ($passportInfo->religion == 0)
                                            Muslim
                                        @elseif($passportInfo->religion == 1)
                                            Hinduism
                                        @elseif($passportInfo->religion == 2)
                                            Christianity
                                        @elseif($passportInfo->religion == 3)
                                            Buddhism
                                        @elseif($passportInfo->religion == 4)
                                            Others
                                        @endif
                                    </td>
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Date of Birth
                                    </td>
                                    @if(!empty($passportInfo->date_of_birth))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{$passportInfo->date_of_birth}}</td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Place of Birth
                                    </td>
                                    @if(!empty($passportInfo->place_of_birth))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{$passportInfo->place_of_birth}}</td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Birth Country
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        @if ($passportInfo->birth_country == 0)
                                            Bangladesh
                                        @elseif($passportInfo->birth_country == 1)
                                            India
                                        @elseif($passportInfo->birth_country == 2)
                                            Others
                                        @endif
                                    </td>
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Height
                                    </td>
                                    @if(!empty($passportInfo->height))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{$passportInfo->height}}</td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Weight
                                    </td>
                                    @if(!empty($passportInfo->weight))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{$passportInfo->weight}}</td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Education
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        @if ($passportInfo->education == 0)
                                            PSC
                                        @elseif($passportInfo->education == 1)
                                            JSC
                                        @elseif($passportInfo->education == 2)
                                            SSC
                                        @elseif($passportInfo->education == 3)
                                            HSC
                                        @elseif($passportInfo->education == 3)
                                            Hons
                                        @elseif($passportInfo->education == 4)
                                            Others
                                        @endif
                                    </td>
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Profession
                                    </td>
                                    @if(!empty($passportInfo->profession))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{$passportInfo->profession}}</td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Salary
                                    </td>
                                    @if(!empty($passportInfo->salary))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{$passportInfo->salary}}</td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Personal Image
                                    </td>
                                    @if(!empty($passportInfo->personal_image))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500"><img
                                                src="{{ url('storage/personal-photos/'.$passportInfo->personal_image) }}"
                                                id="personalPhoto"
                                                class="relative focus:ring-blue-500 focus:border-blue-500 block shadow-sm sm:text-sm border-gray-300">
                                        </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        NID Number
                                    </td>
                                    @if(!empty($passportInfo->nid_number))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->nid_number }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Passport Number
                                    </td>
                                    @if(!empty($passportInfo->passport_number))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->passport_number }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Passport Image
                                    </td>
                                    @if(!empty($passportInfo->passport_image))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->passport_image }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Expired Date
                                    </td>
                                    @if(!empty($passportInfo->passport_expired_date))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->passport_expired_date }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Experience Country
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        @if ($passportInfo->experience_country == 0)
                                            Saudi
                                        @elseif($passportInfo->experience_country == 1)
                                            Qatar
                                        @elseif($passportInfo->experience_country == 2)
                                            Kuwait
                                        @elseif($passportInfo->experience_country == 3)
                                            Dubai
                                        @endif
                                    </td>
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Expired Years
                                    </td>
                                    @if(!empty($passportInfo->experience_years))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->experience_years }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Father Name
                                    </td>
                                    @if(!empty($passportInfo->father_name))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->father_name }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Family Mobile Number
                                    </td>
                                    @if(!empty($passportInfo->family_mobile_number))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->family_mobile_number }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Visa Check office
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">@if ($passportInfo->visa_check_of == 1)
                                            <span class="text-green-500 font-bold">Yes</span>
                                        @else
                                            <span class="text-red-500 font-bold">No</span>
                                        @endif</td>
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Visa Office
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        @if ($passportInfo->visa_office == 0)
                                            Saudi
                                        @elseif($passportInfo->visa_office == 1)
                                            Qatar
                                        @elseif($passportInfo->visa_office == 2)
                                            Kuwait
                                        @elseif($passportInfo->visa_office == 3)
                                            Dubai
                                        @endif
                                    </td>
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Visa Country
                                    </td>
                                    @if(!empty($passportInfo->visa_country))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->visa_country }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <!-- Is TTC -->
                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        TTC
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500"> @if($passportInfo->ttc == 1)
                                            <span class="text-green-500 font-bold">Yes</span>
                                        @else
                                            <span class="text-red-500 font-bold">No</span>
                                    @endif
                                </tr>

                                <!-- Is MC -->
                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Medical Report
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500"> @if($passportInfo->medical_report == 1)
                                            <span class="text-green-500 font-bold">Yes</span>
                                        @else
                                            <span class="text-red-500 font-bold">No</span>
                                    @endif
                                </tr>

                                <!-- Is PC -->
                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Police Report
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500"> @if($passportInfo->police_report == 1)
                                            <span class="text-green-500 font-bold">Yes</span>
                                        @else
                                            <span class="text-red-500 font-bold">No</span>
                                    @endif
                                </tr>


                                <!-- Is Mofa -->
                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Mofa
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">@if ($passportInfo->mofa == 1)
                                            <span class="text-green-500 font-bold">Yes</span>
                                        @else
                                            <span class="text-red-500 font-bold">No</span>
                                        @endif</td>
                                </tr>

                                <!-- Is Mofa -->
                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Embassy
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">@if ($passportInfo->embassy == 1)
                                            <span class="text-green-500 font-bold">Yes</span>
                                        @else
                                            <span class="text-red-500 font-bold">No</span>
                                        @endif</td>
                                </tr>

                                <!-- Is Finger -->
                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Finger
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">@if ($passportInfo->finger == 1)
                                            <span class="text-green-500 font-bold">Yes</span>
                                        @else
                                            <span class="text-red-500 font-bold">No</span>
                                        @endif</td>
                                </tr>

                                <!-- Is Finger -->
                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Man Power
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">@if ($passportInfo->man_power == 1)
                                            <span class="text-green-500 font-bold">Yes</span>
                                        @else
                                            <span class="text-red-500 font-bold">No</span>
                                        @endif</td>
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Work Area
                                    </td>
                                    @if(!empty($passportInfo->work_area))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->work_area }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Agent
                                    </td>
                                    @if(!empty($passportInfo->agent_id))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->agent_id }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <!-- Is Ticket -->
                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Ticket
                                    </td>
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">@if ($passportInfo->ticket == 1)
                                            <span class="text-green-500 font-bold">Yes</span>
                                        @else
                                            <span class="text-red-500 font-bold">No</span>
                                        @endif</td>
                                </tr>


                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Fly Date
                                    </td>
                                    @if(!empty($passportInfo->fly_date))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->fly_date }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Fly Date
                                    </td>
                                    @if(!empty($passportInfo->fly_time))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">{{ $passportInfo->fly_time }} </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr class="bg-white">
                                    <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                        Passport Image
                                    </td>
                                    @if(!empty($passportInfo->passport_image))
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500"><img
                                                src="{{ url('storage/passport-photos/'.$passportInfo->passport_image) }}"
                                                id="personalPhoto"
                                                class="relative focus:ring-blue-500 focus:border-blue-500 block shadow-sm sm:text-sm border-gray-300 h-60">
                                        </td>
                                    @else
                                        <td class="px-2 sm:px-6 py-4 text-left md:text-left text-sm text-gray-500">
                                            <strong class="text-red-500">Not Set</strong>
                                        </td>
                                    @endif
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <h2 class="max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8"
                        style="text-align-last: center">
                        No information associated with this product found!
                    </h2>
                @endif

            </div>
        </div>
    </main>

    {{--       ------Delete CV script-------------------- --}}
    <script>
        function deletePassport(cv_id) {
            let url = "{{ route('passport.delete', [':cv_id']) }}".replace(':cv_id', cv_id);
            Swal.fire({
                title: 'Please confirm',
                text: "Are you sure you want to delete this CV?",
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
    {{--       ------Delete Cv script-------------------- --}}

@endsection
