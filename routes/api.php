<?php

use App\Http\Controllers\{PostController, subscribeController};
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

/**
 * This middleware not in use
 */
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('/post', PostController::class);
Route::post('/subscribe-a-website', [subscribeController::class, 'subscribeAWebsite']);
