<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('technicians/{id}', [App\Http\Controllers\Api\TechnicianController::class , 'index']);


Route::get('technician/{id}', [App\Http\Controllers\Api\TechnicianController::class , 'filterTechnician']);

Route::put('update-preference/{id}', [App\Http\Controllers\Api\TechnicianController::class , 'updatePreference']);