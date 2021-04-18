<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/', [TasksController::class, 'index'])->name('tasks.index');
// Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
// Route::get('/', 'TasksController@index');

Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');

Route::patch('/tasks/{id}', [TasksController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/{id}', [TasksController::class, 'delete'])->name('tasks.delete');
