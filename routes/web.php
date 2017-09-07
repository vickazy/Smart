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
// Home
// Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

// Admin
Route::get('/ppdb/admin', ['uses' => 'AdminController@index', 'as' => 'getAdmin']);

// PPDB
Route::get('/ppdb/register', ['uses' => 'PpdbController@getRegister', 'as' => 'getPpdb']);
Route::post('/ppdb/register', ['uses' => 'PpdbController@postRegister', 'as' => 'postPpdb']);
Route::get('/ppdb/download/', ['uses' => 'PpdbController@downloadRegister', 'as' => 'downloadRegister']);
Route::get('/ppdb/download/peserta/{id}', ['uses' => 'PpdbController@downloadPdf', 'as' => 'downloadPdf']);
