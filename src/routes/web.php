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

	Route::get('/', 'LanguagesController@index')->name('languages.index');

	Route::get('/{language}', 'LanguagesController@show')->name('languages.show');

	Route::get('/{language}/{file}', 'FilesController@show')->name('files.show');

	Route::get('/{language}/{file}/edit', 'FilesController@edit')->name('files.edit');

	Route::post('/{language}/{file}', 'FilesController@update')->name('files.update');

});
