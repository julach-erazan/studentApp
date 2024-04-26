<?php

use App\Http\Controllers\StudentController;
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

Route::get('Students',[StudentController::class,'index'])->name('Student.Index');
Route::get('Students/Add-A-Student',[StudentController::class,'create'])->name('Student.Create');
Route::get('Students/{id}',[StudentController::class,'show'])->name('Student.Show');
Route::get('Students/Edit/{id}',[StudentController::class,'edit'])->name('Student.Edit');
Route::post('Students/Store',[StudentController::class,'store'])->name('Student.Store');
Route::post('Students/Update/{id}',[StudentController::class,'update'])->name('Student.Update');
Route::get('Students/Delete/{id}',[StudentController::class,'destroy'])->name('Student.Delete');
