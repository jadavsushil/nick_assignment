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

Route::resource('/post', PostController::class)->only(['index', 'store']);
Route::post('/subscribe-a-website', [subscribeController::class, 'subscribeAWebsite']);
