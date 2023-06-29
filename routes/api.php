<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonkeyController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('monkey')->group(function () {
    Route::get('/getRecord', [MonkeyController::class, 'getRecord']);
    Route::post('/saveRecord', [MonkeyController::class, 'saveRecord']);
    Route::put('/editRecord/{id}', [MonkeyController::class, 'editRecord']);
    Route::delete('/deleteRecord', [MonkeyController::class, 'deleteRecord']);
});
