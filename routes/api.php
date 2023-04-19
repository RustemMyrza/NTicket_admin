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

Route::get('/get-header', [ApiController::class, 'header'])->name('header');
Route::get('/get-footer', [ApiController::class, 'footer'])->name('footer');
Route::get('/home-page', [ApiController::class, 'homePage'])->name('home-page');
Route::get('/about', [ApiController::class, 'about'])->name('about');
Route::get('/services', [ApiController::class, 'services'])->name('services');
Route::get('/analytics', [ApiController::class, 'analytics'])->name('analytics');
Route::get('/contacts', [ApiController::class, 'contacts'])->name('contacts');
Route::post('/feedback', [ApiController::class, 'feedback'])->name('feedback');
Route::get('/partners', [ApiController::class, 'partners']);
Route::get('/news', [ApiController::class, 'news']);
Route::get('/main-news', [ApiController::class, 'mainNews']);
Route::get('/news-mobile', [ApiController::class, 'newsMobile']);
Route::get('/technologies', [ApiController::class, 'technologies']);
Route::get('/technologies-mobile', [ApiController::class, 'technologiesMobile']);

Route::get('/news-by-id', [ApiController::class, 'newsById']);
Route::get('/partners-by-id', [ApiController::class, 'partnerById']);
Route::get('/technology-by-id', [ApiController::class, 'technologyById']);
Route::get('/service-by-id', [ApiController::class, 'serviceById']);
Route::get('/analytics-by-id', [ApiController::class, 'analyticsById']);

Route::get('/opinions', [ApiController::class, 'opinions']);
Route::get('/opinions-mobile', [ApiController::class, 'opinionsMobile']);
Route::get('/opinion-by-id', [ApiController::class, 'opinionById']);

Route::get('/search', [ApiController::class, 'search']);

Route::prefix('v1')->group(function (): void {
    Route::prefix('/parsing')->group(function (): void {
        Route::post('/{type}', [ParsingDataTypeController::class, 'store']);

        Route::get('/{type}', [ParsingDataTypeController::class, 'index']);

        Route::get('/table/{type}', [ParsingDataTypeController::class, 'table']);
        Route::post('/chart/{type}', [ParsingDataTypeController::class, 'chartStore']);
        Route::get('/chart/{type}', [ParsingDataTypeController::class, 'chart']);

        Route::get('/type-chart/{type}', [ParsingDataTypeController::class, 'typeChart']);
        Route::get('/countries/all', [ParsingDataTypeController::class, 'countries']);

        Route::get('/new-type-chart/{type}', [ParsingDataTypeController::class, 'newTypeChart']);
    });
});
