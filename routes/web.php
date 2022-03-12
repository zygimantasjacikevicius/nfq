<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('project_index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('project_create');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('project_store');
Route::delete('/projects/delete/{project}', [ProjectController::class, 'destroy'])->name('project_delete');
Route::get('/projects/edit/{project}', [ProjectController::class, 'edit'])->name('project_edit');
Route::put('/projects/update/{project}', [ProjectController::class, 'update'])->name('project_update');
Route::get('/projects/show/{project}', [ProjectController::class, 'show'])->name('project_show');


Route::post('/students/store', [StudentController::class, 'store'])->name('student_store');
Route::delete('/students/delete/{student}', [StudentController::class, 'destroy'])->name('student_delete');
