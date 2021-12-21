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
            $request->personal_image->move(public_path('storage/personal-photos'), $imageName);

            $passport->personal_image = $imageName;
        }

        if ($request->passport_image) {
            $imageName = time() . '.' . $request->passport_image->extension();
            $request->passport_image->move(public_path('storage/passport-photos'), $imageName);

            $passport->passport_image = $imageName;
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

    public function edit($cv_id)
    {
        $passport = passport::find($cv_id);
        $agents = Agent::orderBy('first_name')->get();

        return view('recruiting.passport.edit', compact('passport', 'agents'));
    }

    public function update(Request $request, $id)
    {
        $passport = passport::find($id);
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
            $request->personal_image->move(public_path('storage/personal-photos'), $imageName);

            $passport->personal_image = $imageName;
        }

        if ($request->passport_image) {
            $imageName = time() . '.' . $request->passport_image->extension();
            $request->passport_image->move(public_path('storage/passport-photos'), $imageName);

            $passport->passport_image = $imageName;
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
        $passport->update();

        alert()->success('Success', 'New CV updated successfully.');

        return back();
    }

    public function show($id)
    {
        $passportInfo = passport::find($id);

        return view('recruiting.passport.view', compact('passportInfo'));
    }

    public function delete($cv_id)
    {
        passport::find($cv_id)->delete();

        alert()->success('Success', 'CV has been deleted successfully.');

        return redirect()->route('passport');
    }

    public function ttc()
    {
        $passports = passport::orderByDesc('id')->paginate(10);

        return view('recruiting.ttc', compact('passports'));
    }

    public function changeTtcStatus(Request $request)
    {
        $ttc = passport::find($request->status);
        $ttc->ttc = $request->statusValue;
        $ttc->update();

        return response()->json(['success' => 'TTC status changed successfully.']);
    }

    public function medicalStatus()
    {
        $passports = passport::orderByDesc('id')->paginate(10);

        return view('recruiting.medical', compact('passports'));
    }

    public function changeMedicalStatus(Request $request)
    {
        $status = passport::find($request->status);
        $status->medical_report = $request->statusValue;
        $status->update();

        return response()->json(['success' => 'Status changed successfully.']);
    }

    public function mofaStatus()
    {
        $passports = passport::orderByDesc('id')->paginate(10);

        return view('recruiting.mofa', compact('passports'));
    }

    public function changeMofaStatus(Request $request)
    {
        $status = passport::find($request->status);
        $status->mofa = $request->statusValue;
        $status->update();

        return response()->json(['success' => 'Status changed successfully.']);
    }

    public function embassyStatus()
    {
        $passports = passport::orderByDesc('id')->paginate(10);

        return view('recruiting.embassy', compact('passports'));
    }

    public function changeEmbassyStatus(Request $request)
    {
        $status = passport::find($request->status);
        $status->embassy = $request->statusValue;
        $status->update();

        return response()->json(['success' => 'Status changed successfully.']);
    }

    public function fingerStatus()
    {
        $passports = passport::orderByDesc('id')->paginate(10);

        return view('recruiting.finger', compact('passports'));
    }

    public function changeFingerStatus(Request $request)
    {
        $status = passport::find($request->status);
        $status->finger = $request->statusValue;
        $status->update();

        return response()->json(['success' => 'Status changed successfully.']);
    }

    public function manPowerStatus()
    {
        $passports = passport::orderByDesc('id')->paginate(10);

        return view('recruiting.man-power', compact('passports'));
    }

    public function changeManPowerStatus(Request $request)
    {
        $status = passport::find($request->status);
        $status->man_power = $request->statusValue;
        $status->update();

        return response()->json(['success' => 'Status changed successfully.']);
    }

    public function ticketStatus()
    {
        $passports = passport::orderByDesc('id')->paginate(10);

        return view('recruiting.ticket', compact('passports'));
    }

    public function changeTicketStatus(Request $request)
    {
        $status = passport::find($request->status);
        $status->ticket = $request->statusValue;
        $status->update();

        return response()->json(['success' => 'Status changed successfully.']);
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $passports = passport::where('name', 'like', '%' . $request->q . '%')->orWhere('reference_number', 'like', '%' . $request->q . '%')->orWhere('phone_number', 'like', '%' . $request->q . '%')->orderByDesc('id')->paginate(20);
        $passports->appends(['q' => $request->q]);
        if ($request->search_id == 'cv') {
            return view('recruiting.passport.index', compact('passports', 'search'));
        } elseif ($request->search_id == 'ttc') {
            return view('recruiting.ttc', compact('passports', 'search'));
        } elseif ($request->search_id == 'ms') {
            return view('recruiting.medical', compact('passports', 'search'));
        } elseif ($request->search_id == 'mofa') {
            return view('recruiting.mofa', compact('passports', 'search'));
        } elseif ($request->search_id == 'embassy') {
            return view('recruiting.embassy', compact('passports', 'search'));
        } elseif ($request->search_id == 'finger') {
            return view('recruiting.finger', compact('passports', 'search'));
        } elseif ($request->search_id == 'mp') {
            return view('recruiting.man-power', compact('passports', 'search'));
        } elseif ($request->search_id == 'ticket') {
            return view('recruiting.ticket', compact('passports', 'search'));
        }
    }
}
