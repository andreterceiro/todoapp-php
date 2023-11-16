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
Route::post('/tasks/save', function () {
    return (new TasksController)->save();
});

// Need to change to POST
Route::post('/tasks/saveAll', function () {
    return (new TasksController)->saveAll();
});

/*
function (Request $request) {
    $data = $request->json()->all();
});
*/