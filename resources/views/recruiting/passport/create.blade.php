@extends('layouts.app')

@section('title', 'CV')

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
                                        Create CV
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
                                        <form action="{{ route('passport.store') }}" id="create_cv" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="grid grid-cols-3 gap-6">

                                                <div class="col-span-6 sm:col-span-2">
                                                    <label for="name" class="block text-sm font-medium text-gray-700">Passenger
                                                        Name <span class="text-red-500">*</span></label>
                                                    <input type="text" name="name" id="name" autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           required>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="phone_number"
                                                           class="block text-sm font-medium text-gray-700">Phone Number
                                                        <span class="text-red-500">*</span></label>
                                                    <input type="text" name="phone_number" id="phone_number"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="gender"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                                    <select id="gender" name="gender" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                            required>
                                                        <option value="" selected>Select</option>
                                                        <option value="0">Male</option>
                                                        <option value="1">Female</option>
                                                        <option value="2">3rd Gender</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="religion"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Religion</label>
                                                    <select id="religion" name="religion" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                            required>
                                                        <option value="" selected>Select</option>
                                                        <option value="0">Muslim</option>
                                                        <option value="1">Hinduism</option>
                                                        <option value="2">Christianity</option>
                                                        <option value="3">Buddhism</option>
                                                        <option value="4">Others</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="date_of_birth"
                                                           class="block text-sm font-medium text-gray-700">Date of Birth
                                                        <span class="text-red-500">*</span></label>
                                                    <input type="text" name="date_of_birth" id="date_of_birth"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                           required>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="place_of_birth"
                                                           class="block text-sm font-medium text-gray-700">Place of
                                                        Birth</label>
                                                    <input type="text" name="place_of_birth" id="place_of_birth"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="birth_country"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Birth
                                                        Country</label>
                                                    <select id="birth_country" name="birth_country" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Select</option>
                                                        <option value="0">Bangladesh</option>
                                                        <option value="1">India</option>
                                                        <option value="4">Others</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="height" class="block text-sm font-medium text-gray-700">Height
                                                        (Inc)</label>
                                                    <input type="text" name="height" id="height" autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="weight" class="block text-sm font-medium text-gray-700">Weight
                                                        (Kg)</label>
                                                    <input type="text" name="weight" id="weight" autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="education"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Education</label>
                                                    <select id="education" name="education" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Select</option>
                                                        <option value="0">PSC</option>
                                                        <option value="1">JSC</option>
                                                        <option value="2">SSC</option>
                                                        <option value="3">HSC</option>
                                                        <option value="4">Hons</option>
                                                        <option value="5">Others</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="profession"
                                                           class="block text-sm font-medium text-gray-700">Profession</label>
                                                    <input type="text" name="profession" id="profession"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                                                    <input type="text" name="salary" id="salary" autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="nid_number"
                                                           class="block text-sm font-medium text-gray-700">NID
                                                        Number</label>
                                                    <input type="text" name="nid_number" id="nid_number"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="passport_number"
                                                           class="block text-sm font-medium text-gray-700">Passport
                                                        Number</label>
                                                    <input type="text" name="passport_number" id="passport_number"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="passport_expired_date"
                                                           class="block text-sm font-medium text-gray-700">Passport
                                                        Expired Date</label>
                                                    <input type="text" name="passport_expired_date"
                                                           id="passport_expired_date"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="experience_country"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Experience
                                                        Country</label>
                                                    <select id="experience_country" name="experience_country"
                                                            autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Select</option>
                                                        <option value="0">Saudi</option>
                                                        <option value="1">Katar</option>
                                                        <option value="2">kuwait</option>
                                                        <option value="3">Dubai</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="experience_years"
                                                           class="block text-sm font-medium text-gray-700">Experience
                                                        Years</label>
                                                    <input type="number" name="experience_years" id="experience_years"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="father_name"
                                                           class="block text-sm font-medium text-gray-700">Father Name</label>
                                                    <input type="text" name="father_name" id="father_name"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="family_mobile_number"
                                                           class="block text-sm font-medium text-gray-700">Family Mobile Number</label>
                                                    <input type="number" name="family_mobile_number" id="family_mobile_number"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="visa_check_of"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Visa
                                                        Check office</label>
                                                    <select id="visa_check_of" name="visa_check_of" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="visa_office"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Visa
                                                        Office</label>
                                                    <select id="visa_office" name="visa_office" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Select</option>
                                                        <option value="0">Saudi</option>
                                                        <option value="1">Katar</option>
                                                        <option value="2">kuwait</option>
                                                        <option value="3">Dubai</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="visa_country"
                                                           class="block text-sm font-medium text-gray-700">Visa
                                                        Country</label>
                                                    <input type="text" name="visa_country" id="visa_country"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="ttc"
                                                           class="block text-sm font-medium text-gray-700 mb-1">TTC</label>
                                                    <select id="ttc" name="ttc" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="medical_report"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Medical
                                                        Report</label>
                                                    <select id="medical_report" name="medical_report" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="police_report"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Police
                                                        Report</label>
                                                    <select id="police_report" name="police_report" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="mofa"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Mofa</label>
                                                    <select id="mofa" name="mofa" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="embassy"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Embassy</label>
                                                    <select id="embassy" name="embassy" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="finger"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Finger</label>
                                                    <select id="finger" name="finger" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="man_power"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Man
                                                        Power</label>
                                                    <select id="man_power" name="man_power" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="work_area"
                                                           class="block text-sm font-medium text-gray-700">Work
                                                        Area</label>
                                                    <input type="text" name="work_area" id="work_area"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="agent"
                                                           class="block text-sm font-medium text-gray-700">Agent</label>

                                                    <select id="agent" name="agent" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="" selected>Choose or search agent</option>
                                                        @foreach($agents as $agent)
                                                        <option
                                                            value="{{ $agent->id }}">{{ $agent->first_name. ' ' .$agent->last_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3 my-auto text-sm">
                                                    <label for="ticket"
                                                           class="block text-sm font-medium text-gray-700 mb-1">Ticket</label>
                                                    <select id="ticket" name="ticket" autocomplete="off"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="fly_date"
                                                           class="block text-sm font-medium text-gray-700">Fly
                                                        Date</label>
                                                    <input type="text" name="fly_date" id="fly_date"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="fly_date"
                                                           class="block text-sm font-medium text-gray-700">Fly
                                                        Time</label>
                                                    <input type="text" name="fly_time" id="fly_time"
                                                           autocomplete="off"
                                                           class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end px-4 sm:px-6">
                                <a href="" type="button"
                                   class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Cancel
                                </a>
                                <button form="create_cv" type="submit"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Add CV
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

    {{--    <script>--}}
    {{--        $(document).ready(function() {--}}
    {{--            $('#businessId').select2({--}}
    {{--                width: '100%' // need to override the changed default--}}
    {{--            });--}}
    {{--        });--}}

    {{--        function showOrHideExistingBusiness() {--}}
    {{--            let userRole = document.getElementById('userRole').value;--}}
    {{--            if(userRole == 2 || userRole == 3) {--}}
    {{--                document.getElementById('existing_business_div').classList.remove('hidden');--}}
    {{--            } else {--}}
    {{--                document.getElementById('existing_business_div').classList.add('hidden');--}}
    {{--            }--}}
    {{--        }--}}
    {{--    </script>--}}

    {{--    <style type="text/css">--}}
    {{--        .select2-selection__rendered {--}}
    {{--            line-height: 31px !important;--}}
    {{--        }--}}
    {{--        .select2-container .select2-selection--single {--}}
    {{--            border: 1px solid #D1D5DB;--}}
    {{--            height: 38px !important;--}}
    {{--            min-width: 100%;--}}
    {{--        }--}}
    {{--        .select2-selection__arrow {--}}
    {{--            height: 34px !important;--}}
    {{--        }--}}
    {{--    </style>--}}

@endsection
