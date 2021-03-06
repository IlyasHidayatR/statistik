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
    return view('index');
});

Route::get('/mahasiswa', 'MahasiswaController@index');
Route::delete('/mahasiswa/{NIM}', 'MahasiswaController@destroy');
Route::get('/mahasiswa/edit/{NIM}', 'MahasiswaController@edit');
Route::put('/mahasiswa/edit/{NIM}', 'MahasiswaController@update');
Route::get('/mahasiswa/create', 'MahasiswaController@create');
Route::post('/mahasiswa', 'MahasiswaController@store');

