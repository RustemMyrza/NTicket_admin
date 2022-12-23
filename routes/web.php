<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
// admin@demo.com
// Dtnthievbn2021

Auth::routes([
    'register' => false,
    'reset'    =>  false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::post('/admin/save', [App\Http\Controllers\HomeController::class, 'save'])->name('save');
//Route::resource('admin/pages', 'App\Http\Controllers\Backend\PagesController');
Route::resource('admin/banner', 'App\Http\Controllers\Backend\BannerController');
// Route::resource('admin/block', 'App\Http\Controllers\Backend\BlockController');
Route::resource('admin/about-block', 'App\Http\Controllers\Backend\AboutBlockController');
// Route::resource('admin/market-analysis', 'App\Http\Controllers\Backend\MarketAnalysisController');
// Route::resource('admin/analytics-block', 'App\Http\Controllers\Backend\AnalyticsBlockController');
Route::resource('admin/contacts', 'App\Http\Controllers\Backend\ContactsController');
Route::resource('admin/purpose', 'App\Http\Controllers\Backend\PurposeController');
Route::resource('admin/news', 'App\Http\Controllers\Backend\NewsController');
Route::resource('admin/opinion', 'App\Http\Controllers\Backend\OpinionController');
Route::resource('admin/technology', 'App\Http\Controllers\Backend\TechnologyController');
Route::resource('admin/partner-blocks', 'App\Http\Controllers\Backend\PartnerBlockController');
Route::resource('admin/partner', 'App\Http\Controllers\Backend\PartnerController'); //nakat
Route::resource('admin/analytics', 'App\Http\Controllers\Backend\AnalyticsController');

Route::get('admin/news-seo/{id}', [\App\Http\Controllers\Backend\NewsController::class, 'seo'])->name('news-seo');
Route::post('admin/news-seo-store', [\App\Http\Controllers\Backend\NewsController::class, 'seoStore'])->name('news-seo-store');

Route::get('admin/analytics-seo/{id}', [\App\Http\Controllers\Backend\AnalyticsController::class, 'seo'])->name('analytics-seo');
Route::post('admin/analytics-seo-store', [\App\Http\Controllers\Backend\AnalyticsController::class, 'seoStore'])->name('analytics-seo-store');

Route::get('admin/technologies-seo/{id}', [\App\Http\Controllers\Backend\TechnologyController::class, 'seo'])->name('technologies-seo');
Route::post('admin/technologies-seo-store', [\App\Http\Controllers\Backend\TechnologyController::class, 'seoStore'])->name('technologies-seo-store');

Route::get('admin/opinions-seo/{id}', [\App\Http\Controllers\Backend\OpinionController::class, 'seo'])->name('opinions-seo');
Route::post('admin/opinions-seo-store', [\App\Http\Controllers\Backend\OpinionController::class, 'seoStore'])->name('opinions-seo-store');
