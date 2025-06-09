<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\LatestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompletedProgramController;
use App\Http\Controllers\ParticipationController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/complete/{id}', [AdminController::class, 'markCompleted'])->name('admin.complete');

// Role-based routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/add_program', [ProgramController::class, 'create'])->name('program.create');
Route::post('/add_program', [ProgramController::class, 'store'])->name('program.store');
Route::get('/programs/{id}/edit', [ProgramController::class, 'edit'])->name('programs.edit');
Route::put('/programs/{id}', [ProgramController::class, 'update'])->name('programs.update');
Route::get('/completed-programs', [CompletedProgramController::class, 'index'])->name('completedPrograms.index');
Route::delete('/completed-programs/{id}', [CompletedProgramController::class, 'destroy'])->name('completedPrograms.destroy');
Route::get('/admin/participants', [ParticipationController::class, 'index'])->name('participants.index');
Route::patch('/admin/participants/{id}/status', [ParticipationController::class, 'updateStatus'])->name('participants.updateStatus');
Route::get('/admin/participants/export', [ParticipationController::class, 'export'])->name('participants.export');

Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');

Route::get('/participate/{program}', [ParticipationController::class, 'create'])->name('participate.create');
Route::post('/participate', [ParticipationController::class, 'store'])->name('participate.store');
Route::get('/my-status', [ParticipationController::class, 'myStatus'])->name('participation.status');

Route::get('/latest-programs', [LatestController::class, 'index'])->name('latest.index');

Route::patch('/programs/{id}/toggle-registration', [ProgramController::class, 'toggleRegistration'])->name('programs.toggleRegistration');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard routes (replace with your actual routes)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->name('student.dashboard');

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});


// Route::get('/latest', function () {
//     return view('latest');
// })->name('latest');
