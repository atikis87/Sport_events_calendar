<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PrimaryCategory;
use App\Http\Controllers\Teams;


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


Route::get('/events', [EventController::class, 'index']); 
Route::prefix('/event')->group(function()           
{
    Route::post('/store', [EventController::class, 'store' ]);//    /api/event/store/
    Route::post('/edit/{id}', [EventController::class, 'update' ]);//    /api/event/edit/ID
    Route::post('/delete/{id}', [EventController::class, 'destroy' ]);//    /api/event/delete/ID


});


Route::get('/primary-categories', [PrimaryCategory::class, 'index']); 
Route::prefix('/primaryCategory')->group(function()           
{

  

});



Route::get('/teams', [Teams::class, 'index']); 
Route::prefix('/team')->group(function()           
{

  

});



