<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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


// Route::middleware('auth:sanctum')->get('students', [StudentController::class, 'index']);
// //Route::get('students', [StudentController::class, 'index']);

// Route::middleware('auth:sanctum')->get('students/{id}', [StudentController::class, 'show']);
// // Route::get('students/{id}', [StudentController::class, 'show']);

// Route::middleware('auth:sanctum')->post('students', [StudentController::class, 'store']);
// // Route::post('students', [StudentController::class, 'store']);

// Route::middleware('auth:sanctum')->put('students/{id}', [StudentController::class, 'update']);
// // Route::put('students/{id}', [StudentController::class, 'update']);

// Route::middleware('auth:sanctum')->delete('students/{id}', [StudentController::class, 'destroy']);
// // Route::delete('students/{id}', [StudentController::class, 'destroy']);

// Route::middleware('auth:sanctum')->get('students/search/{city}', [StudentController::class, 'searchcity']);
// // Route::get('students/search/{city}', [StudentController::class, 'searchcity']);

// Public Login and Registration
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

// Protected
Route::middleware(['auth:sanctum'])->group(function(){

    Route::post('students', [StudentController::class, 'store']);
    Route::put('students/{id}', [StudentController::class, 'update']);
    Route::delete('students/{id}', [StudentController::class, 'destroy']);
    Route::post('logout/{id}', [userController::class, 'logout']);

});

// Public
Route::get('students', [StudentController::class, 'index']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::get('students/search/{city}', [StudentController::class, 'searchcity']);
