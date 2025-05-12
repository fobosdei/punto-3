// routes/api.php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Project routes
Route::get('projects', [ProjectController::class, 'index']);
Route::post('projects', [ProjectController::class, 'store']);
Route::get('projects/{project}', [ProjectController::class, 'show']);
Route::put('projects/{project}', [ProjectController::class, 'update']);
Route::delete('projects/{project}', [ProjectController::class, 'destroy']);

// Task routes
Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks', [TaskController::class, 'store']);
Route::get('tasks/{task}', [TaskController::class, 'show']);
Route::put('tasks/{task}', [TaskController::class, 'update']);
Route::delete('tasks/{task}', [TaskController::class, 'destroy']);
