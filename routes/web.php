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

Auth::routes();

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