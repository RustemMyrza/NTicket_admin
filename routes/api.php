<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ParsingDataTypeController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/consultationRequest', [ApiController::class, 'requestApi'])->name('requestApi');
Route::post('/questionRequest', [ApiController::class, 'chatHelpApi'])->name('chatHelpApi');