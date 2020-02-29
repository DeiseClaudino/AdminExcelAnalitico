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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('analytics')->group(function () {
    Route::get('/', 'RelatorioController@listRelatorio');
    Route::get('upload', 'RelatorioController@uploadExcel');
    Route::post('import', 'RelatorioController@import')->name('import');
    Route::get('/chart', 'RelatorioController@cadastradosChart');
});