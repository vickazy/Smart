<?php
use Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector;

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
Route::get('/ppdb/admin/login', ['uses' => 'AdminController@getLoginAdmin', 'as' => 'login', 'middleware' => 'guest']);
Route::post('/ppdb/admin/login', ['uses' => 'AdminController@postLoginAdmin', 'as' => 'postLoginAdmin']);
Route::get('/ppdb/admin/logout', ['uses' => 'AdminController@getLogout', 'as' => 'getLogout']);
Route::get('/ppdb/admin', ['uses' => 'AdminController@index', 'as' => 'getAdmin', 'middleware' => 'auth']);

// Siswa Terdaftar
Route::get('/ppdb/admin/data/siswa', ['uses' => 'SiswaController@getSiswa', 'as' => 'getSiswa']);
Route::get('/ppdb/admin/data/getDataSiswa', ['uses' => 'SiswaController@getDataSiswa', 'as' => 'getDataSiswa']);
Route::get('/ppdb/admin/data/siswa/{id}/detail', ['uses' => 'SiswaController@getSiswaDetail', 'as' => 'getSiswaDetail']);
Route::get('/ppdb/admin/data/siswa/{id}/edit', ['uses' => 'SiswaController@getSiswaEdit', 'as' => 'getSiswaEdit']);
Route::post('/ppdb/admin/data/siswa/{id}/update', ['uses' => 'SiswaController@postSiswaUpdate', 'as' => 'postSiswaUpdate']);
Route::get('/ppdb/admin/data/siswa/delete', ['uses' => 'SiswaController@getSiswaDelete', 'as' => 'getSiswaDelete']);
Route::post('/ppdb/admin/data/siswa/export/{type}', ['uses' => 'SiswaController@exportExcelSiswa', 'as' => 'exportExcelSiswa']);
Route::post('/ppdb/admin/data/siswa/pdf/export', ['uses' => 'SiswaController@exportPDFSiswa', 'as' => 'exportPDFSiswa']);


// PPDB
Route::get('/ppdb/register', ['uses' => 'PpdbController@getRegister', 'as' => 'getPpdb']);
Route::post('/ppdb/register', ['uses' => 'PpdbController@postRegister', 'as' => 'postPpdb']);
Route::get('/ppdb/download/', ['uses' => 'PpdbController@downloadRegister', 'as' => 'downloadRegister']);
Route::get('/ppdb/download/peserta/{id}', ['uses' => 'PpdbController@downloadPdf', 'as' => 'downloadPdf']);

// ppdb kota
Route::get('/ppdb/register/getKecamatan', ['uses' => 'SiswaController@getKecamatan', 'as' => 'getKecamatan']);
