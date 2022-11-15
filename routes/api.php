<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserNgoController;
use App\Http\Controllers\userTaskController;


// App/http/controllers/ all files 
// App/models
// database/migrations// database files
// routes/api.php 
// public/storage/ngoimage

//  http://localhost:8000/api/add-user for reference 

Route::post('/add-ngo', [NgoController::class,'store']);
Route::get('/get-ngo',[NgoController::class,'index']);
Route::get('/edit-ngo/{id}',[NgoController::class,'edit']);
Route::put('/update-ngo/{id}',[NgoController::class,'update']);
Route::delete('/delete-ngo/{id}',[NgoController::class,'destroy']);
Route::get('/get-ngo-detail/{id}',[NgoController::class,'ngo_detail']);
//
Route::post('/apply-as-volunteer', [userTaskController::class,'store']);
Route::get('/task-volunteer/{id}', [userTaskController::class,'index']);

// 

Route::post('/add-task', [TaskController::class,'store']);
Route::get('/get-task',[TaskController::class,'index']);
Route::get('/get-task-detail/{id}',[TaskController::class,'task_detail']);

///////////////////////////////////////////////////////////////
Route::post('/user-login', [UserNgoController::class,'login']);

Route::post('/add-user', [UserNgoController::class,'store']);
Route::get('/get-user',[UserNgoController::class,'index']);
Route::get('/edit-user/{id}',[UserNgoController::class,'edit']);
Route::put('/update-user/{id}',[UserNgoController::class,'update']);
Route::delete('/delete-user/{id}',[UserNgoController::class,'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
