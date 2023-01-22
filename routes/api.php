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
Route::get('/partners', [\App\Http\Controllers\ApiController::class, 'partners']);
Route::get('/news', [\App\Http\Controllers\ApiController::class, 'news']);
Route::get('/main-news', [\App\Http\Controllers\ApiController::class, 'mainNews']);
Route::get('/news-mobile', [\App\Http\Controllers\ApiController::class, 'newsMobile']);
Route::get('/technologies', [\App\Http\Controllers\ApiController::class, 'technologies']);
Route::get('/technologies-mobile', [\App\Http\Controllers\ApiController::class, 'technologiesMobile']);

Route::get('/news-by-id', [\App\Http\Controllers\ApiController::class, 'newsById']);
Route::get('/partners-by-id', [\App\Http\Controllers\ApiController::class, 'partnerById']);
Route::get('/technology-by-id', [\App\Http\Controllers\ApiController::class, 'technologyById']);
Route::get('/service-by-id', [\App\Http\Controllers\ApiController::class, 'serviceById']);
Route::get('/analytics-by-id', [\App\Http\Controllers\ApiController::class, 'analyticsById']);

Route::get('/opinions', [\App\Http\Controllers\ApiController::class, 'opinions']);
Route::get('/opinions-mobile', [\App\Http\Controllers\ApiController::class, 'opinionsMobile']);
Route::get('/opinion-by-id', [\App\Http\Controllers\ApiController::class, 'opinionById']);

Route::get('/search', [\App\Http\Controllers\ApiController::class, 'search']);
