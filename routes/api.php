<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\FeedBackController;

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

Route::group([
    'prefix' => 'auth'
], function(){
    Route::post('register', [AuthApiController::class, 'register']);
    Route::post('login', [AuthApiController::class, 'login']);
    // Route::get('dataEbook', [AuthApiController::class, 'dataEbook']);
    Route::get('dataEbook', [AuthApiController::class, 'dataEbook'], function () {
        $response = new Response();

        // Tambahkan header sesuai kebutuhan
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Content-Type', '*');

        return $response;
    });
    Route::group([
        'middleware' => 'auth:api'
    ], function(){
        Route::post('logout', [AuthApiController::class, 'logout']);
        Route::get('feedback', [FeedBackController::class, 'index']);
        Route::post('create_feedback', [FeedBackController::class, 'store']);
    });
});
