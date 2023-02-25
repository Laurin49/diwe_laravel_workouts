<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkItemController;
use App\Http\Controllers\WorkoutController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('workouts', WorkoutController::class);
Route::resource('categories', CategoryController::class);
Route::resource('exercises', ExerciseController::class);
Route::resource('workitems', WorkItemController::class);
// Route::get('/workitems', [WorkItemController::class, 'index'])->name('workitems.index');
// Route::get('/workitems/create', [WorkItemController::class, 'create'])->name('workitems.create');
// Route::post('/workitems', [WorkItemController::class, 'store'])->name('workitems.store');
// Route::get('/workitems/edit/workout/{workout_id}/exercise/{exercise_id}', [WorkItemController::class, 'edit'])->name('workitems.edit');
// Route::put('/workitems/update/workout/{workout_id}/exercise/{exercise_id}', [WorkItemController::class, 'update'])->name('workitems.update');

require __DIR__.'/auth.php';
