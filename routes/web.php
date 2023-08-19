<?php

use Illuminate\Support\Facades\Route;

use App\Models\Task;
use Illuminate\Http\Request;

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
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});
/**
 * Add A New Task
 */
Route::post('/task', [App\Http\Controllers\TaskController::class, 'postData'])->name('post.Data');
Route::delete('/task/{id}', [App\Http\Controllers\TaskController::class, 'deleteTask'])->name('delete.Task');

/**
 * Delete An Existing Task
 */