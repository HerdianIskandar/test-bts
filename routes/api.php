<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChecklistController;
use App\Http\Controllers\Api\TodoController;

// 
// Route auth
// 

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Route Checklist
    Route::get('/checklist', [ChecklistController::class, 'index']);
    Route::post('/checklist', [ChecklistController::class, 'store']);
    Route::get('/checklist/{checklist:id}', [ChecklistController::class, 'show']);
    // Route::patch('/checklist/{checklist:id}', [ChecklistController::class, 'update']);
    Route::delete('/checklist/{checklist:id}', [ChecklistController::class, 'destroy']);

    // Route Todo
    // Route::get('/checklist/{todo:checklist_id}/item', [TodoController::class, 'index']);
    Route::post('/checklist/{checklist:id}/item', [TodoController::class, 'store']);
    // Route::get('/checklist/{todo:checklist_id}/item/{todo:id}}', [TodoController::class, 'show']);
    // Route::patch('/checklist/{checklist:id}', [TodoController::class, 'update']);
    // Route::delete('/checklist/{checklist:id}', [TodoController::class, 'destroy']);
});
