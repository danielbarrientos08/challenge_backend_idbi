<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\NoteController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login',[AuthController::class,'login']);
Route::post('/users/register',[UserController::class,'registerUser']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/groups',[GroupController::class,'listGroups']);
    Route::post('/groups/{id}/join',[GroupController::class,'joinGroup']);
    Route::get('/groups/{id}/notes',[GroupController::class,'listNotes']);
    Route::post('/notes/register',[NoteController::class,'registerNote']);

});




