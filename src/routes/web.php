<?php

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

Route::group(['prefix' => 'localization', 'as' => 'localization.'], function () {

	Route::get('/{language}/{file}/keys/create', 'KeysController@create')->name('keys.create');
	Route::post('/{language}/{file}/keys', 'KeysController@store')->name('keys.store');

	Route::get('/', 'LocalizationController@index')->name('index');

	Route::get('/languages', 'LanguagesController@index')->name('languages.index');

	Route::get('/{language}', 'FilesController@index')->name('files.index');

	Route::get('/{language}/{file}', 'FilesController@show')->name('files.show');

	Route::get('/{language}/{file}/edit', 'FilesController@edit')->name('files.edit');

	Route::patch('/{language}/{file}', 'FilesController@update')->name('files.update');

});
