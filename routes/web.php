<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DataExportController;




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
    return view('index');
});


Route::get('/users', [UsersController::class, 'getUsers'])->name('users.usersindex');
Route::get('/users/create', [UsersController::class, 'addUserview'])->name('users.createview');
Route::get('/users/export', [DataExportController::class, 'fileExport'])->name('users.export');
Route::post('/users/import', [DataExportController::class, 'fileImport'])->name('users.import');
Route::post('/users/create', [UsersController::class, 'addUser'])->name('users.create');

Route::get('/users/{id}', [UsersController::class, 'getOneUser'])->name('users.show');
Route::post('/users/{id}/update', [UsersController::class, 'updateUser'])->name('users.edit');
Route::get('/users/{id}/delete', [UsersController::class, 'deleteUser'])->name('users.delete');

