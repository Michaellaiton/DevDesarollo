<?php

use App\Http\Controllers\CalendarController;
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


// Route::prefix('calendario')->group(function () {
//     Route::get('/', [CalendarController::class, 'index']);
//     Route::post('/', [CalendarController::class, 'store']);
//     Route::get('/{calendar}', [CalendarController::class, 'show']);
//     Route::put('/{calendar}', [CalendarController::class, 'update']);
//     Route::delete('/{calendar}', [CalendarController::class, 'destroy']);
// });
