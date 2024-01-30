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
        Route::get('user', ['as' => 'user.bank', 'uses' => 'App\Http\Controllers\ProvincesController@getUserPermissions']);
    });

    Route::group(['prefix' => 'city'], function () {
        Route::get('list', ['as' => 'city.list', 'uses' => 'App\Http\Controllers\CityController@index']);
        Route::get('create', ['as' => 'city.create', 'uses' => 'App\Http\Controllers\CityController@create']);
        Route::post('save', ['as' => 'city.save', 'uses' => 'App\Http\Controllers\CityController@store']);
        Route::get('edit/{id}', ['as' => 'city.edit', 'uses' => 'App\Http\Controllers\CityController@edit']);
        Route::post('update', ['as' => 'city.update', 'uses' => 'App\Http\Controllers\CityController@update']);
        Route::get('delete/{id}', ['as' => 'city.delete', 'uses' => 'App\Http\Controllers\CityController@destroy']);
        Route::post('show/{id}', ['as' => 'city.show', 'uses' => 'App\Http\Controllers\CityController@show']);
        Route::get('search', ['as' => 'city.search', 'uses' => 'App\Http\Controllers\CityController@search']);
        Route::get('user', ['as' => 'user.city', 'uses' => 'App\Http\Controllers\CityController@getUserPermissions']);
    });

    Route::group(['prefix' => 'area'], function () {
        Route::get('list', ['as' => 'area.list', 'uses' => 'App\Http\Controllers\AreaController@index']);
        Route::get('create', ['as' => 'area.create', 'uses' => 'App\Http\Controllers\AreaController@create']);
        Route::post('save', ['as' => 'area.save', 'uses' => 'App\Http\Controllers\AreaController@store']);
        Route::get('edit/{id}', ['as' => 'area.edit', 'uses' => 'App\Http\Controllers\AreaController@edit']);
        Route::post('update', ['as' => 'area.update', 'uses' => 'App\Http\Controllers\AreaController@update']);
        Route::get('delete/{id}', ['as' => 'area.delete', 'uses' => 'App\Http\Controllers\AreaController@destroy']);
        Route::post('show/{id}', ['as' => 'area.show', 'uses' => 'App\Http\Controllers\AreaController@show']);
        Route::get('search', ['as' => 'area.search', 'uses' => 'App\Http\Controllers\AreaController@search']);
        Route::get('user', ['as' => 'user.area', 'uses' => 'App\Http\Controllers\AreaController@getUserPermissions']);
    });
});
