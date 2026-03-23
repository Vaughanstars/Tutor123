<?php

use Illuminate\Support\Facades\Route;

use App\Models\ClassSession;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/admin/class-sessions/{classSession}/students', function (App\Models\ClassSession $classSession) {
    return view('filament.class-students', [
        'classSession' => $classSession,
        'students' => $classSession->students,
    ]);
})->name('filament.class-sessions.students');

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/register', [StudentController::class, 'index'])->name('register');
Route::post('/students', [StudentController::class, 'store'])->name('student.store');
Route::get('/terms', [StudentController::class, 'terms'])->name('terms');