<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

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

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@index')->name('register');
Route::post('/register', function (Request $request) {
    return app()->make(\App\Http\Controllers\Auth\RegisterController::class)->registerUser($request);
})->name('registerUser');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::post('/admin/save', [App\Http\Controllers\HomeController::class, 'save'])->name('save');
Route::resource('admin/organization', 'App\Http\Controllers\Backend\OrganizationController')->middleware('auth');
Route::resource('admin/client', 'App\Http\Controllers\Backend\ClientController')->middleware('auth');

Route::get('admin/client/{clientId}/bank-card', 'App\Http\Controllers\Backend\BankCardController@index')->middleware('auth');
Route::post('admin/client/{clientId}/bank-card', 'App\Http\Controllers\Backend\BankCardController@store')->middleware('auth');
Route::get('admin/client/{clientId}/id-card', 'App\Http\Controllers\Backend\IdCardController@index')->middleware('auth');
Route::post('admin/client/{clientId}/id-card', 'App\Http\Controllers\Backend\IdCardController@store')->middleware('auth');

Route::get('admin/questionChat', 'App\Http\Controllers\Backend\QuestionChatController@index')->name('questionChat.page')->middleware('auth');
Route::get('admin/questionChat/{id}', 'App\Http\Controllers\Backend\QuestionChatController@show')->name('questionChat.show')->middleware('auth');
Route::delete('admin/questionChat/{id}/delete', 'App\Http\Controllers\Backend\QuestionChatController@destroy')->name('questionChat.delete')->middleware('auth');
Route::get('admin/questionChat/{id}/edit', 'App\Http\Controllers\Backend\QuestionChatController@edit')->middleware('auth')->name('questionChat.edit')->middleware('auth');
Route::patch('admin/questionChat/{id}/edit', 'App\Http\Controllers\Backend\QuestionChatController@update')->middleware('auth')->name('questionChat.update')->middleware('auth');


Route::get('admin/organization/{organizationId}/route', 'App\Http\Controllers\Backend\RouteController@index')->middleware('auth')->name('organization.route.index')->middleware('auth');
Route::get('admin/organization/{organizationId}/route/create', 'App\Http\Controllers\Backend\RouteController@create')->middleware('auth')->name('organization.route.create')->middleware('auth');
Route::post('admin/organization/{organizationId}/route/create', 'App\Http\Controllers\Backend\RouteController@store')->middleware('auth')->name('organization.route.store')->middleware('auth');
Route::get('admin/organization/{organizationId}/route/{id}', 'App\Http\Controllers\Backend\RouteController@show')->middleware('auth')->name('organization.route.show')->middleware('auth');
Route::get('admin/organization/{organizationId}/route/{id}/edit', 'App\Http\Controllers\Backend\RouteController@edit')->middleware('auth')->name('organization.route.edit')->middleware('auth');
Route::patch('admin/organization/{organizationId}/route/{id}/edit', 'App\Http\Controllers\Backend\RouteController@update')->middleware('auth')->name('organization.route.update')->middleware('auth');
Route::delete('admin/organization/{organizationId}/route/{id}/delete', 'App\Http\Controllers\Backend\RouteController@destroy')->middleware('auth')->name('organization.route.destroy')->middleware('auth');

Route::get('admin/organization/{organizationId}/route/{routeId}/passenger', 'App\Http\Controllers\Backend\RoutePassengerController@index')->middleware('auth')->name('route.passenger.index')->middleware('auth');
Route::get('admin/organization/{organizationId}/route/{routeId}/passenger/{id}', 'App\Http\Controllers\Backend\RoutePassengerController@show')->middleware('auth')->name('route.passenger.show')->middleware('auth');
