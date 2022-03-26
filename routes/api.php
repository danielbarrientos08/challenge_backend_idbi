<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;

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

Route::post('/login',[AuthController::class,'login']);
Route::post('/users/register',[UserController::class,'registerUser']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/groups',[GroupController::class,'listGroups']);
    Route::post('/groups/{group_id}/join',[GroupController::class,'joinGroup']);
    Route::get('/groups/{group_id}/notes',[GroupController::class,'listNotes']);

});




