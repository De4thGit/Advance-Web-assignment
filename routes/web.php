<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProgressReportController;

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    // Business Unit Routes
    Route::get('/business_units', [BusinessUnitController::class, 'index'])->name('business_units.index');
    Route::get('/business_units/create', [BusinessUnitController::class, 'create'])->name('business_units.create');
    Route::post('/business_units', [BusinessUnitController::class, 'store'])->name('business_units.store');
    Route::get('/business_units/{businessUnit}', [BusinessUnitController::class, 'show'])->name('business_units.show');
    Route::get('/business_units/{businessUnit}/edit', [BusinessUnitController::class, 'edit'])->name('business_units.edit');
    Route::patch('/business_units/{business_unit}', [BusinessUnitController::class, 'update'])->name('business_units.update');
    Route::delete('/business_units/{businessUnit}', [BusinessUnitController::class, 'destroy'])->name('business_units.destroy');

    // Project Routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Developer Routes
    Route::get('/developers', [DeveloperController::class, 'index'])->name('developers.index');
    Route::get('/developers/create', [DeveloperController::class, 'create'])->name('developers.create');
    Route::post('/developers', [DeveloperController::class, 'store'])->name('developers.store');
    Route::get('/developers/{developer}', [DeveloperController::class, 'show'])->name('developers.show');
    Route::get('/developers/{developer}/edit', [DeveloperController::class, 'edit'])->name('developers.edit');
    Route::put('/developers/{developer}', [DeveloperController::class, 'update'])->name('developers.update');
    Route::delete('/developers/{developer}', [DeveloperController::class, 'destroy'])->name('developers.destroy');

    // Progress Report Routes
    Route::get('/progress_reports', [ProgressReportController::class, 'index'])->name('progress_reports.index');
    Route::get('/progress_reports/create', [ProgressReportController::class, 'create'])->name('progress_reports.create');
    Route::post('/progress_reports', [ProgressReportController::class, 'store'])->name('progress_reports.store');
    Route::get('/progress_reports/{progressReport}', [ProgressReportController::class, 'show'])->name('progress_reports.show');
    Route::get('/progress_reports/{progressReport}/edit', [ProgressReportController::class, 'edit'])->name('progress_reports.edit');
    Route::put('/progress_reports/{progressReport}', [ProgressReportController::class, 'update'])->name('progress_reports.update');
    Route::delete('/progress_reports/{progressReport}', [ProgressReportController::class, 'destroy'])->name('progress_reports.destroy');
});

// Business Unit Route
Route::middleware(['auth', 'businessunit'])->group(function () {
    Route::get('/business_units/{businessUnit}', [BusinessUnitController::class, 'show'])->name('business_units.show');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
});

// Lead Developer Routes
Route::middleware(['auth', 'developer'])->group(function () {
    Route::get('/progress_reports', [ProgressReportController::class, 'index'])->name('progress_reports.index');
    Route::get('/progress_reports/create', [ProgressReportController::class, 'create'])->name('progress_reports.create');
    Route::post('/progress_reports', [ProgressReportController::class, 'store'])->name('progress_reports.store');
    Route::get('/progress_reports/{progressReport}', [ProgressReportController::class, 'show'])->name('progress_reports.show');
    Route::get('/progress_reports/{progressReport}/edit', [ProgressReportController::class, 'edit'])->name('progress_reports.edit');
    Route::put('/progress_reports/{progressReport}', [ProgressReportController::class, 'update'])->name('progress_reports.update');
    Route::delete('/progress_reports/{progressReport}', [ProgressReportController::class, 'destroy'])->name('progress_reports.destroy');
});

// Manager Routes
Route::middleware(['auth', 'manager'])->group(function () {
    Route::get('/developers', [DeveloperController::class, 'index'])->name('developers.index');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
});
