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

	Route::get('/{language}/{file}', 'KeysController@index')->name('keys.index');

	Route::get('/{language}/{file}/create', 'KeysController@create')->name('keys.create');
	
	Route::get('/{language}/{file}/{key}/edit', 'KeysController@edit')->name('keys.edit');

	Route::patch('/{language}/{file}/{key}', 'KeysController@update')->name('keys.update');

	Route::post('/{language}/{file}/keys', 'KeysController@store')->name('keys.store');

	Route::get('/', 'LocalizationController@index')->name('index');

	Route::get('/languages', 'LanguagesController@index')->name('languages.index');

	Route::get('/{language}', 'FilesController@index')->name('files.index');

});
