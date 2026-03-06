<?php

use Illuminate\Support\Facades\Route;

use App\Models\ClassSession;

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



Route::get('/admin/class-sessions/{classSession}/students', function (App\Models\ClassSession $classSession) {
    return view('filament.class-students', [
        'classSession' => $classSession,
        'students' => $classSession->students,
    ]);
})->name('filament.class-sessions.students');