<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;


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
    return (new TasksController)->ping();
});

Route::get('/tasks/getAll', function () {
    return (new TasksController)->getAll();
});

Route::get('/tasks/get/{id}', function ($id) {
    return (new TasksController)->get($id);
});

Route::get('/tasks/getNewId', function () {
    return (new TasksController)->getNewId();
});

Route::get('/tasks/delete/{id}', function ($id) {
    return (new TasksController)->delete($id);
});

// Need to change to POST
Route::get('/tasks/saveNewTask/{task}', function ($task) {
    return (new TasksController)->saveNewTask($task);
});

// Need to change to POST
Route::get('/tasks/saveAll/{tasks}', function ($tasks) {
    return (new TasksController)->saveAll($tasks);
});

/*
function (Request $request) {
    $data = $request->json()->all();
});
*/