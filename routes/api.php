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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

 Route::get('/get-header', [App\Http\Controllers\ApiController::class, 'header'])->name('header');
 Route::get('/get-footer', [App\Http\Controllers\ApiController::class, 'footer'])->name('footer');
 Route::get('/home-page', [App\Http\Controllers\ApiController::class, 'homePage'])->name('home-page');
 Route::get('/about', [App\Http\Controllers\ApiController::class, 'about'])->name('about');
 Route::get('/services', [App\Http\Controllers\ApiController::class, 'services'])->name('services');
 Route::get('/analytics', [App\Http\Controllers\ApiController::class, 'analytics'])->name('analytics');
 Route::get('/contacts', [App\Http\Controllers\ApiController::class, 'contacts'])->name('contacts');
 Route::post('/feedback', [App\Http\Controllers\ApiController::class, 'feedback'])->name('feedback');
