<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TonerController;

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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'lang']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::get('logout', [TonerController::class, 'logout']);

    Route::get('{any}', [TonerController::class, 'index']);
    Route::get('components/{any}', [TonerController::class, 'components']);


});

Route::group(['middleware' => ['auth']], function () {
 Route::group(['prefix' => 'country'], function () {
        Route::get('list', ['as' => 'country.list', 'uses' => 'App\Http\Controllers\CountriesController@index']);
        Route::get('create', ['as' => 'country.create', 'uses' => 'App\Http\Controllers\CountriesController@create']);
        Route::post('save', ['as' => 'country.save', 'uses' => 'App\Http\Controllers\CountriesController@store']);
        Route::get('edit/{id}', ['as' => 'country.edit', 'uses' => 'App\Http\Controllers\CountriesController@edit']);
        Route::post('update', ['as' => 'country.update', 'uses' => 'App\Http\Controllers\CountriesController@update']);
        Route::get('delete/{id}', ['as' => 'country.delete', 'uses' => 'App\Http\Controllers\CountriesController@destroy']);
        Route::post('show/{id}', ['as' => 'country.show', 'uses' => 'App\Http\Controllers\CountriesController@show']);
        Route::get('search', ['as' => 'country.search', 'uses' => 'App\Http\Controllers\CountriesController@search']);
        Route::get('user', ['as' => 'user.bank', 'uses' => 'App\Http\Controllers\CountriesController@getUserPermissions']);
    });

    Route::group(['prefix' => 'province'], function () {
        Route::get('list', ['as' => 'province.list', 'uses' => 'App\Http\Controllers\ProvincesController@index']);
        Route::get('create', ['as' => 'province.create', 'uses' => 'App\Http\Controllers\ProvincesController@create']);
        Route::post('save', ['as' => 'province.save', 'uses' => 'App\Http\Controllers\ProvincesController@store']);
        Route::get('edit/{id}', ['as' => 'province.edit', 'uses' => 'App\Http\Controllers\ProvincesController@edit']);
        Route::post('update', ['as' => 'province.update', 'uses' => 'App\Http\Controllers\ProvincesController@update']);
        Route::get('delete/{id}', ['as' => 'province.delete', 'uses' => 'App\Http\Controllers\ProvincesController@destroy']);
        Route::post('show/{id}', ['as' => 'province.show', 'uses' => 'App\Http\Controllers\ProvincesController@show']);
        Route::get('search', ['as' => 'province.search', 'uses' => 'App\Http\Controllers\ProvincesController@search']);
        Route::get('user', ['as' => 'user.bank', 'uses' => 'App\Http\Controllers\CountriesController@getUserPermissions']);
    });
});
