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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/type', ['as' => 'type.index', 'uses' => 'TypesController@index']);
Route::post('/type', ['as' => 'type.index', 'uses' => 'TypesController@store']);
Route::get('/refund', ['as' => 'refund.index', 'uses' => 'RefundsController@index']);
Route::post('/refund', ['as' => 'refund.index', 'uses' => 'RefundsController@store']);
Route::get('/pending', ['as' => 'refund.pending', 'uses' => 'RefundsController@pending']);
Route::get('/aproved', ['as' => 'refund.aproved', 'uses' => 'RefundsController@aproved']);
Route::get('/detail/{id}', ['as' => 'refund.detail', 'uses' => 'RefundsController@detail']);
Route::get('/edit/{id}', ['as' => 'refund.edit', 'uses' => 'RefundsController@update']);

Route::resource('types' , 'TypesController');
Route::resource('refunds' , 'RefundsController');