<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DailyNoteController;
use Illuminate\Support\Facades\Route;

Route::resource('tasks', TaskController::class)->middleware(['auth']);
Route::resource('daily-notes', DailyNoteController::class)->middleware(['auth']);
Route::get('/tasks/calendar', [TaskController::class, 'calendar'])->middleware(['auth']);

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
    return redirect()->route('tasks.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('tasks.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/daily-reflections', [\App\Http\Controllers\DailyReflectionController::class, 'index'])->name('daily-reflections.index');
    Route::post('/daily-reflections', [\App\Http\Controllers\DailyReflectionController::class, 'store'])->name('daily-reflections.store');
    Route::get('/calendar', [\App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/api/calendar-events', [\App\Http\Controllers\CalendarController::class, 'apiEvents'])->name('calendar.api');
});

Route::get('/test-log', function () {
    \Log::info('Test log berhasil ditulis!');
    return 'Log sudah ditulis, cek storage/logs/laravel.log';
});

require __DIR__.'/auth.php';
