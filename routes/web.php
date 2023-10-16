<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::prefix('tasks')->group(function () {
    Route::get('/{userId}/', [TaskController::class, 'index']);
    Route::post('/{userId}/', [TaskController::class, 'store']);
    Route::get('/{userId}/{task}', [TaskController::class, 'show']);
    Route::put('/{userId}/{task}', [TaskController::class, 'update']);
    Route::delete('/{userId}/{task}', [TaskController::class, 'destroy']);
});