<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\PassportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');

//agents
Route::get('/agents', [AgentController::class, 'index'])->name('agents');
Route::post('/agent/store', [AgentController::class, 'store'])->name('agent.store');
Route::post('/agent/update', [AgentController::class, 'update'])->name('agent.update');
Route::get('/agent/delete/{agent_id}', [AgentController::class, 'delete'])->name('agent.delete');

//cv
Route::get('/cv', [PassportController::class, 'index'])->name('passport');
Route::get('/cv/create', [PassportController::class, 'create'])->name('passport.create');
Route::post('/cv/store', [PassportController::class, 'store'])->name('passport.store');
Route::get('/cv/edit/{cv_id}', [PassportController::class, 'edit'])->name('passport.edit');
Route::post('/cv/update/{cv_id}', [PassportController::class, 'update'])->name('passport.update');
Route::get('/cv/view/{cv_id}', [PassportController::class, 'show'])->name('passport.show');
Route::get('/cv/delete/{cv_id}', [PassportController::class, 'delete'])->name('passport.delete');

//ttc
Route::get('/ttc', [PassportController::class, 'ttc'])->name('passport.ttc');
Route::get('/ttc/status/update', [PassportController::class, 'changeTtcStatus'])->name('passport.ttc.status');

//ms
Route::get('/medical-status', [PassportController::class, 'medicalStatus'])->name('passport.medical');
Route::get('/medical/status/update', [PassportController::class, 'changeMedicalStatus'])->name('passport.medical.status');

//Mofa
Route::get('/mofa', [PassportController::class, 'mofaStatus'])->name('passport.mofa');
Route::get('/mofa/status/update', [PassportController::class, 'changeMofaStatus'])->name('passport.mofa.status');

//Embassy
Route::get('/embassy', [PassportController::class, 'embassyStatus'])->name('passport.embassy');
Route::get('/embassy/status/update', [PassportController::class, 'changeEmbassyStatus'])->name('passport.embassy.status');

//Finger
Route::get('/finger', [PassportController::class, 'fingerStatus'])->name('passport.finger');
Route::get('/finger/status/update', [PassportController::class, 'changeFingerStatus'])->name('passport.finger.status');

//ManPower
Route::get('/man-power', [PassportController::class, 'manPowerStatus'])->name('passport.man.power');
Route::get('/man-power/status/update', [PassportController::class, 'changeManPowerStatus'])->name('passport.man.power.status');

//Ticket
Route::get('/ticket', [PassportController::class, 'ticketStatus'])->name('passport.ticket');
Route::get('/ticket/status/update', [PassportController::class, 'changeTicketStatus'])->name('passport.ticket.status');

//Search
Route::get('/all/search', [PassportController::class, 'search'])->name('passport.search');
Route::get('/agent/search', [AgentController::class, 'search'])->name('agent.search');

