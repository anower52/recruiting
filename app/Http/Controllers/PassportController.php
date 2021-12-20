<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\passport;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function index()
    {
        $passports = passport::orderByDesc('id')->paginate(10);

        return view('recruiting.passport.index', compact('passports'));
    }

    public function create()
    {
        $agents = Agent::orderBy('first_name')->get();

        return view('recruiting.passport.create', compact('agents'));
    }

    public function store(Request $request)
    {

        $reference = passport::latest()->first() ? passport::latest()->first()->reference_number + 1 : 1000;
        $passport = new passport();
        $passport->reference_number = $reference;
        $passport->name = $request->name;
        $passport->phone_number = $request->phone_number;
        $passport->gender = $request->gender;
        $passport->religion = $request->religion;
        $passport->date_of_birth = $request->date_of_birth;
        $passport->place_of_birth = $request->place_of_birth;
        $passport->birth_country = $request->birth_country;
        $passport->height = $request->height;
        $passport->weight = $request->weight;
        $passport->education = $request->education;
        $passport->profession = $request->profession;
        $passport->salary = $request->salary;

        if ($request->personal_image) {
            $imageName = time() . '.' . $request->personal_image->extension();
            $personal_image = $request->personal_image->storeAs('personal-photos', $imageName);

            $passport->personal_image = $personal_image;
        }

        if ($request->passport_image) {
            $imageName = time() . '.' . $request->passport_image->extension();
            $passport_image = $request->passport_image->storeAs('passport-photos', $imageName);

            $passport->passport_image = $passport_image;
        }
        $passport->nid_number = $request->nid_number;
        $passport->passport_number = $request->passport_number;
        $passport->passport_expired_date = $request->passport_expired_date;
        $passport->experience_country = $request->experience_country;
        $passport->experience_years = $request->experience_years;
        $passport->father_name = $request->father_name;
        $passport->family_mobile_number = $request->family_mobile_number;
        $passport->visa_check_of = $request->visa_check_of;
        $passport->visa_office = $request->visa_office;
        $passport->visa_country = $request->visa_country;
        $passport->ttc = $request->ttc;
        $passport->medical_report = $request->medical_report;
        $passport->police_report = $request->police_report;
        $passport->mofa = $request->mofa;
        $passport->embassy = $request->embassy;
        $passport->finger = $request->finger;
        $passport->man_power = $request->man_power;
        $passport->work_area = $request->work_area;
        $passport->agent_id = $request->agent;
        $passport->ticket = $request->ticket;
        $passport->fly_date = $request->fly_date;
        $passport->fly_time = $request->fly_time;
        $passport->save();

        alert()->success('Success', 'New CV added successfully.');

        return back();
    }
}
