<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Admin as Admin;
 use App\Http\Controllers\Open as Open;
 use App\Http\Controllers\Admin\ProjectController;
 use App\Http\Controllers\Admin\TaskController;
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
    return view('layouts.layout');
    
});

//  Route::get('/open.projects',  function () {
//      ->name('open.projects.index');
//  }
Route::get('/projects', [Open\ProjectController::class, 'index'])
    ->name('open.projects.index');

 Route::group(['middleware' => ['role:student|teacher|admin']], function(){
    Route::get('admin/projects/{project}/delete', [Admin\ProjectController::class, 'delete'])
    ->name('projects.delete');
Route::resource('/admin/projects', Admin\ProjectController::class);

Route::get('admin/tasks/{task}/delete', [Admin\TaskController::class, 'delete'])
    ->name('tasks.delete');
Route::resource('/admin/tasks', Admin\TaskController::class);

 });

 

 Route::get('/dashboard', function(){
     return view('layouts.layout');
 })->middleware(['auth'])->name('layouts');


require __DIR__.'/auth.php';