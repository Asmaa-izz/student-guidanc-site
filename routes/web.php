<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowUpRecordsController;
use App\Http\Controllers\GuidanceSessionsController;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\VisitsRecordsController;
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

Auth::routes();



Route::middleware('auth:web')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/students', StudentsController::class);
    Route::resource('/teachers', TeachersController::class);
    Route::resource('/mentors', MentorsController::class);

    Route::get('/record', [RecordController::class, 'index'])->name('record.index');

    Route::get('/record-visits', [VisitsRecordsController::class, 'index'])->name('record-visits.index');
    Route::get('/students/{student}/record-visits/create', [VisitsRecordsController::class, 'create'])->name('record-visits.create');
    Route::post('/students/{student}/record-visits', [VisitsRecordsController::class, 'store'])->name('record-visits.store');
    Route::get('/students/{student}/record-visits/{visitsRecord}', [VisitsRecordsController::class, 'show'])->name('record-visits.show');

    Route::get('/record-follow-up', [FollowUpRecordsController::class, 'index'])->name('record-follow-up.index');
    Route::get('/students/{student}/record-follow-up/create', [FollowUpRecordsController::class, 'create'])->name('record-follow-up.create');
    Route::post('/students/{student}/record-follow-up', [FollowUpRecordsController::class, 'store'])->name('record-follow-up.store');
    Route::get('/students/{student}/record-follow-up/{followUpRecord}', [FollowUpRecordsController::class, 'show'])->name('record-follow-up.show');

    Route::get('/guidance-sessions', [GuidanceSessionsController::class, 'index'])->name('guidance-sessions.index');
    Route::get('/students/{student}/guidance-sessions/create', [GuidanceSessionsController::class, 'create'])->name('guidance-sessions.create');
    Route::post('/students/{student}/guidance-sessions', [GuidanceSessionsController::class, 'store'])->name('guidance-sessions.store');
    Route::get('/students/{student}/guidance-sessions/{guidanceSession}', [GuidanceSessionsController::class, 'show'])->name('guidance-sessions.show');
});
