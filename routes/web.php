<?php

use App\Http\Controllers\SportController;
use App\Http\Controllers\AthleteController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('sports', SportController::class)->middleware(['auth', 'verified']);
Route::get('sports', [SportController::class, 'index'])->name('sports.index');
Route::get('sports/{sport}', [SportController::class, 'show'])->name('sports.show');

Route::get('sports/trash/{id}', [SportController::class, 'trash'])->name('sports.trash');
Route::get('sports/trashed/', [SportController::class, 'trashed'])->name('sports.trashed');
Route::get('sports/restore/{id}', [SportController::class, 'trash'])->name('sports.restore');

Route::resource('athletes', AthleteController::class)->middleware(['auth', 'verified']);
Route::get('athletes', [AthleteController::class, 'index'])->name('athletes.index');
Route::get('athletes/{athlete}', [AthleteController::class, 'show'])->name('athletes.show');

Route::get('athletes/trash/{id}', [AthleteController::class, 'trash'])->name('athletes.trash');
Route::get('athletes/trashed/', [AthleteController::class, 'trashed'])->name('athletes.trashed');
Route::get('athletes/restore/{id}', [AthleteController::class, 'trash'])->name('athletes.restore');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
