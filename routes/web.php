<?php

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

use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'])->group(function () 
    {
        Route::get('/dashboard', [TasksController::class, 'index']
        )->name('dashboard');

        Route::get('/task', [TasksController::class, 'add']
        )->name('add');

        Route::post('/task', [TasksController::class, 'create']);

        Route::get('/task/{task}', [TasksController::class, 'show']
        )->name('show');

        Route::get('/task/{task}/edit', [TasksController::class, 'edit']);

        Route::post('/task/{task}/update', [TasksController::class, 'update']);
    }
);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         $tasks = App\Models\Task::all();
//         return view('dashboard', compact('tasks'));
//     })->name('dashboard');
//     Route::get('/dashboard/task{task}', function ($id) {
//         $task = DB::table('tasks')->find($id);
//         dd($task);
//         return view('dashboard', compact('task'));
//     })->name('dashboard');
// });
