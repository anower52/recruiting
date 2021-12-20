<?php

use App\Http\Controllers\AgentController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
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

