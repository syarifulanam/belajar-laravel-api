<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;


Route::post('/todos', [TodoController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/todos/{id}', [TodoController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->middleware('auth:sanctum');
Route::get('/todos', [TodoController::class, 'index'])->middleware('auth:sanctum');
Route::get('/todos/{id}', [TodoController::class, 'show']);
Route::apiResource('todos', TodoController::class);

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});
