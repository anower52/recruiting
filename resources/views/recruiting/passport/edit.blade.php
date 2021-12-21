@extends('layouts.app')

@section('title', 'Edit CV')

@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css"
    />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <main class="flex-1 relative pb-8 z-0 overflow-y-auto">
        <div class="bg-white shadow">
            <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                <div class="py-6 flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center">
                            <div>
                                <div class="flex items-center">
                                    <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                        {{ $passport->name }}
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
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="space-y-6">
                            <div class="bg-white px-4 py-5 sm:rounded-lg sm:p-6">
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-span-1">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Cv
                                            Information</h3>
                                        <p class="mt-1 text-sm text-gray-500">Please enter the CV information
                                            for
                                            your user.</p>
                                    </div>
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <form action="{{ route('passport.update', $passport->id) }}" id="update_cv"
                                              method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="grid grid-cols-3 gap-6">

                                                <div class="col-span-6 sm:col-span-2">
                                                    <label for="name" class="block text-sm font-medium text-gray-700">Passenger
                                                        Name <span class="text-red-500">*</span></label>
                                                    <input type="text" name="name" id="name" autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->name }}"
                                                           required>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="phone_number"
                                                           class="block text-sm font-medium text-gray-700">Phone Number
                                                        <span class="text-red-500">*</span></label>
                                                    <input type="text" name="phone_number" id="phone_number"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->phone_number }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="gender"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                                    <select id="gender" name="gender" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                            required>
                                                        <option value="" selected>Select</option>
                                                        <option
                                                            value="0" {{ $passport->gender == 0 ? 'selected' : '' }}>
                                                            Male
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->gender == 1 ? 'selected' : '' }}>
                                                            Female
                                                        </option>
                                                        <option
                                                            value="2" {{ $passport->gender == 2 ? 'selected' : '' }}>3rd
                                                            Gender
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="religion"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Religion</label>
                                                    <select id="religion" name="religion" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                            required>
                                                        <option value="" selected>Select</option>
                                                        <option
                                                            value="0" {{ $passport->religion == 0 ? 'selected' : '' }}>
                                                            Muslim
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->religion == 1 ? 'selected' : '' }}>
                                                            Hinduism
                                                        </option>
                                                        <option
                                                            value="2" {{ $passport->religion == 2 ? 'selected' : '' }}>
                                                            Christianity
                                                        </option>
                                                        <option
                                                            value="3" {{ $passport->religion == 3 ? 'selected' : '' }}>
                                                            Buddhism
                                                        </option>
                                                        <option
                                                            value="4" {{ $passport->religion == 4 ? 'selected' : '' }}>
                                                            Others
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="date_of_birth"
                                                           class="block text-sm font-medium text-gray-700">Date of Birth
                                                        <span class="text-red-500">*</span></label>
                                                    <input type="text" name="date_of_birth" id="date_of_birth"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->date_of_birth }}"
                                                           required>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="place_of_birth"
                                                           class="block text-sm font-medium text-gray-700">Place of
                                                        Birth</label>
                                                    <input type="text" name="place_of_birth" id="place_of_birth"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->place_of_birth }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="birth_country"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Birth
                                                        Country</label>
                                                    <select id="birth_country" name="birth_country" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Select</option>
                                                        <option
                                                            value="0" {{ $passport->birth_country == 0 ? 'selected' : '' }}>
                                                            Bangladesh
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->birth_country == 1 ? 'selected' : '' }}>
                                                            India
                                                        </option>
                                                        <option
                                                            value="2" {{ $passport->birth_country == 2 ? 'selected' : '' }}>
                                                            Others
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="height" class="block text-sm font-medium text-gray-700">Height
                                                        (Inc)</label>
                                                    <input type="text" name="height" id="height" autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->height }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight
                                                        (Kg)</label>
                                                    <input type="text" name="weight" id="weight" autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->weight }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="education"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Education</label>
                                                    <select id="education" name="education" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Select</option>
                                                        <option
                                                            value="0" {{ $passport->education == 0 ? 'selected' : '' }}>
                                                            PSC
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->education == 1 ? 'selected' : '' }}>
                                                            JSC
                                                        </option>
                                                        <option
                                                            value="2" {{ $passport->education == 2 ? 'selected' : '' }}>
                                                            SSC
                                                        </option>
                                                        <option
                                                            value="3" {{ $passport->education == 3 ? 'selected' : '' }}>
                                                            HSC
                                                        </option>
                                                        <option
                                                            value="4" {{ $passport->education == 4 ? 'selected' : '' }}>
                                                            Hons
                                                        </option>
                                                        <option
                                                            value="5" {{ $passport->education == 5 ? 'selected' : '' }}>
                                                            Others
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="profession"
                                                           class="block text-sm font-medium text-gray-700">Profession</label>
                                                    <input type="text" name="profession" id="profession"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->profession }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                                                    <input type="text" name="salary" id="salary" autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->salary }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <div class="flex justify-between">
                                                        <label for="personal_image"
                                                               class="required block text-sm font-medium text-gray-700">Personal
                                                            Image</label>
                                                    </div>
                                                    <input type="file" name="personal_image" id="personal_image"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mt-2">
                                                    <p class="text-sm text-gray-400">Supported file types: jpg, jpeg,
                                                        png</p>
                                                </div>

                                                <div class="col-span-6 sm:col-span-2 relative"
                                                     id="personalPhotoDiv">
                                                    @if($passport->personal_image)
                                                        <img
                                                            src="{{ url('storage/personal-photos/'.$passport->personal_image) }}"
                                                            id="personalPhoto"
                                                            class="relative focus:ring-blue-500 focus:border-blue-500 block shadow-sm sm:text-sm border-gray-300">

                                                        <span
                                                            class="absolute top-0 right-0 bg-gray-300 flex items-center cursor-pointer"
                                                            title="Remove background image."
                                                            onclick="removePersonalPhoto()">
                                        <svg class="fill-current text-black mx-auto font-bold w-4 h-4"
                                             xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                                    </span>
                                                    @else
                                                        <img src="https://via.placeholder.com/150x100"
                                                             id="existingBusinessLogo"
                                                             class="focus:ring-blue-500 focus:border-blue-500 block shadow-sm sm:text-sm border-gray-300 rounded-md mt-2 max-h-24">
                                                    @endif
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="nid_number"
                                                           class="block text-sm font-medium text-gray-700">NID
                                                        Number</label>
                                                    <input type="text" name="nid_number" id="nid_number"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->nid_number }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="passport_number"
                                                           class="block text-sm font-medium text-gray-700">Passport
                                                        Number</label>
                                                    <input type="text" name="passport_number" id="passport_number"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->passport_number }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <div class="flex justify-between">
                                                        <label for="passport_image"
                                                               class="required block text-sm font-medium text-gray-700">Passport
                                                            Image</label>
                                                    </div>
                                                    <input type="file" name="passport_image" id="passport_image"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md mt-2">
                                                    <p class="text-sm text-gray-400">Supported file types: jpg, jpeg,
                                                        png</p>
                                                </div>

                                                <div class="col-span-6 sm:col-span-2 relative"
                                                     id="passportPhotoDiv">
                                                    @if($passport->passport_image)
                                                        <img
                                                            src="{{ url('storage/passport-photos/'.$passport->passport_image) }}"
                                                            id="passportPhoto"
                                                            class="relative focus:ring-blue-500 focus:border-blue-500 block shadow-sm sm:text-sm border-gray-300 h-60 w-48">

                                                        <span
                                                            class="absolute top-0 right-0 bg-gray-300 flex items-center cursor-pointer"
                                                            title="Remove background image."
                                                            onclick="removePassportPhoto()">
                                        <svg class="fill-current text-black mx-auto font-bold w-4 h-4"
                                             xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                                    </span>
                                                    @else
                                                        <img src="https://via.placeholder.com/150x100"
                                                             id="passportPhoto"
                                                             class="focus:ring-blue-500 focus:border-blue-500 block shadow-sm sm:text-sm border-gray-300 rounded-md mt-2 max-h-24">
                                                    @endif
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="passport_expired_date"
                                                           class="block text-sm font-medium text-gray-700">Passport
                                                        Expired Date</label>
                                                    <input type="text" name="passport_expired_date"
                                                           id="passport_expired_date"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->passport_expired_date }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="experience_country"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Experience
                                                        Country</label>
                                                    <select id="experience_country" name="experience_country"
                                                            autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Select</option>
                                                        <option
                                                            value="0" {{ $passport->experience_country == 0 ? 'selected' : '' }}>
                                                            Saudi
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->experience_country == 1 ? 'selected' : '' }}>
                                                            Qatar
                                                        </option>
                                                        <option
                                                            value="2" {{ $passport->experience_country == 2 ? 'selected' : '' }}>
                                                            Kuwait
                                                        </option>
                                                        <option
                                                            value="3" {{ $passport->experience_country == 3 ? 'selected' : '' }}>
                                                            Dubai
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="experience_years"
                                                           class="block text-sm font-medium text-gray-700">Experience
                                                        Years</label>
                                                    <input type="number" name="experience_years" id="experience_years"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->experience_years }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="father_name"
                                                           class="block text-sm font-medium text-gray-700">Father
                                                        Name</label>
                                                    <input type="text" name="father_name" id="father_name"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->father_name }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="family_mobile_number"
                                                           class="block text-sm font-medium text-gray-700">Family Mobile
                                                        Number</label>
                                                    <input type="number" name="family_mobile_number"
                                                           id="family_mobile_number"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->family_mobile_number }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="visa_check_of"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Visa
                                                        Check office</label>
                                                    <select id="visa_check_of" name="visa_check_of" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option
                                                            value="0" {{ $passport->visa_check_of == 0 ? 'selected' : '' }}>
                                                            No
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->visa_check_of == 1 ? 'selected' : '' }}>
                                                            Yes
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="visa_office"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Visa
                                                        Office</label>
                                                    <select id="visa_office" name="visa_office" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Select</option>
                                                        <option
                                                            value="0" {{ $passport->visa_office == 0 ? 'selected' : '' }}>
                                                            Saudi
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->visa_office == 1 ? 'selected' : '' }}>
                                                            Qatar
                                                        </option>
                                                        <option
                                                            value="2" {{ $passport->visa_office == 2 ? 'selected' : '' }}>
                                                            kuwait
                                                        </option>
                                                        <option
                                                            value="3" {{ $passport->visa_office == 3 ? 'selected' : '' }}>
                                                            Dubai
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="visa_country"
                                                           class="block text-sm font-medium text-gray-700">Visa
                                                        Country</label>
                                                    <input type="text" name="visa_country" id="visa_country"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->visa_country }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="ttc"
                                                           class="block text-sm font-medium text-gray-700 mb-1">TTC</label>
                                                    <select id="ttc" name="ttc" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" {{ $passport->ttc == 0 ? 'selected' : '' }}>
                                                            No
                                                        </option>
                                                        <option value="1" {{ $passport->ttc == 1 ? 'selected' : '' }}>
                                                            Yes
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="medical_report"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Medical
                                                        Report</label>
                                                    <select id="medical_report" name="medical_report" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option
                                                            value="0" {{ $passport->medical_report == 0 ? 'selected' : '' }}>
                                                            No
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->medical_report == 1 ? 'selected' : '' }}>
                                                            Yes
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="police_report"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Police
                                                        Report</label>
                                                    <select id="police_report" name="police_report" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option
                                                            value="0" {{ $passport->police_report == 0 ? 'selected' : '' }}>
                                                            No
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->police_report == 1 ? 'selected' : '' }}>
                                                            Yes
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="mofa"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Mofa</label>
                                                    <select id="mofa" name="mofa" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" {{ $passport->mofa == 0 ? 'selected' : '' }}>
                                                            No
                                                        </option>
                                                        <option value="1" {{ $passport->mofa == 1 ? 'selected' : '' }}>
                                                            Yes
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="embassy"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Embassy</label>
                                                    <select id="embassy" name="embassy" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option
                                                            value="0" {{ $passport->embassy == 0 ? 'selected' : '' }}>No
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->embassy == 1 ? 'selected' : '' }}>
                                                            Yes
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="finger"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Finger</label>
                                                    <select id="finger" name="finger" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option
                                                            value="0" {{ $passport->finger == 0 ? 'selected' : '' }}>No
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->finger == 1 ? 'selected' : '' }}>Yes
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="man_power"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Man
                                                        Power</label>
                                                    <select id="man_power" name="man_power" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option
                                                            value="0" {{ $passport->man_power == 0 ? 'selected' : '' }}>
                                                            No
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->man_power == 1 ? 'selected' : '' }}>
                                                            Yes
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="work_area"
                                                           class="block text-sm font-medium text-gray-700">Work
                                                        Area</label>
                                                    <input type="text" name="work_area" id="work_area"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->work_area }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="agent"
                                                           class="block text-sm font-medium text-gray-700">Agent</label>

                                                    <select id="agent" name="agent" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Choose or search agent</option>
                                                        @foreach($agents as $agent)
                                                            <option
                                                                value="{{ $agent->id }}" {{ $passport->agent_id == $agent->id ? 'selected' : '' }}>{{ $agent->first_name. ' ' .$agent->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="ticket"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Ticket</label>
                                                    <select id="ticket" name="ticket" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option
                                                            value="0" {{ $passport->ticket == 0 ? 'selected' : '' }}>No
                                                        </option>
                                                        <option
                                                            value="1" {{ $passport->ticket == 1 ? 'selected' : '' }}>Yes
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="fly_date"
                                                           class="block text-sm font-medium text-gray-700">Fly
                                                        Date</label>
                                                    <input type="text" name="fly_date" id="fly_date"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->fly_date }}">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="fly_date"
                                                           class="block text-sm font-medium text-gray-700">Fly
                                                        Time</label>
                                                    <input type="text" name="fly_time" id="fly_time"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           value="{{ $passport->fly_time }}">
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end px-4 sm:px-6">
                                <a href="{{ route('passport') }}" type="button"
                                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Cancel
                                </a>
                                <button form="update_cv" type="submit"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Update CV
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(function () {
            $("#date_of_birth").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "c-60:c+0",
                validateOnBlur: false
            });

            $("#fly_date").datepicker({
                changeMonth: true,
                changeYear: true,
                validateOnBlur: false
            });

            $("#fly_time").timepicker({
                'step': 5,
                'timeFormat': 'h:i A',
            });

            $("#passport_expired_date").datepicker({
                changeMonth: true,
                changeYear: true,
                validateOnBlur: false
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#agent').select2({
                width: '100%'
            });
        });

        function removePersonalPhoto() {
            document.getElementById('personalPhotoDiv').innerHTML = '';
            // document.getElementById('personalPhoto').value = 1;
        }

        function removePassportPhoto() {
            document.getElementById('passportPhotoDiv').innerHTML = '';
            // document.getElementById('passportPhoto').value = 1;
        }
    </script>
    <style type="text/css">
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            border: 1px solid #D1D5DB;
            height: 38px !important;
        }

        .select2-selection__arrow {
            height: 34px !important;
        }
    </style>
@endsection
