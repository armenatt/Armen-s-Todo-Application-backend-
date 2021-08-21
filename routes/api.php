<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::get('/todos', [TodoController::class, 'index']);
Route::get('/todos/{id}', [TodoController::class, 'getTodosById']);

Route::middleware(['auth:sanctum', 'scope.user'])->group(function () {
    Route::post('/todos', [TodoController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/todos/{id}', [TodoController::class, 'update']);

});


