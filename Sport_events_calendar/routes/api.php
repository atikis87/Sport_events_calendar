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


Route::get('/events', [EventController::class, 'index']);
Route::prefix('/event')->group(function()
{
    Route::post('/store', [EventController::class, 'store' ]);
    Route::post('/{id}', [EventController::class, 'update' ]);
    Route::post('/{id}', [EventController::class, 'destroy' ]);
});





