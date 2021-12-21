<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\passport;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $totalPassports = passport::count();
        $totalAgents = Agent::count();
        return view('dashboard', compact('totalPassports', 'totalAgents'));
    }
}
