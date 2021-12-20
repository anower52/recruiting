<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::orderByDesc('id')->paginate(10);

        return view('recruiting.agents.index', compact('agents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $agent = new Agent();
        $agent->first_name = $request->first_name;
        $agent->last_name = $request->last_name;
        $agent->phone_number = $request->phone_number;
        $agent->district = $request->district;
        $agent->created_by = Auth::user()->id;
        $agent->save();

        alert()->success('Success','New agent added successfully.');
        return back();
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $agent = Agent::find($request->agentId);
        $agent->first_name = $request->first_name;
        $agent->last_name = $request->last_name;
        $agent->phone_number = $request->phone_number;
        $agent->district = $request->district;
        $agent->updated_by = Auth::user()->id;
        $agent->update();

        alert()->success('Success','Agent information updated successfully.');

        return back();
    }

    public function delete($agent_id)
    {
        $agent = Agent::find($agent_id);
        $agent->delete();

        alert()->success('Success','Agent deleted successfully.');

        return back();
    }
}
