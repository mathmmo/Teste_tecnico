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

Route::get('/types', ['as' => 'type.index', 'uses' => 'TypesController@index']);
Route::get('/refund', ['as' => 'refund.index', 'uses' => 'RefundsController@index']);
Route::get('/pending', ['as' => 'refund.pending', 'uses' => 'RefundsController@pending']);
Route::get('/aproved', ['as' => 'refund.aproved', 'uses' => 'RefundsController@aproved']);
Route::get('/detail', ['as' => 'refund.detail', 'uses' => 'RefundsController@detail']);
