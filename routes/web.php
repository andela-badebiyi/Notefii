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

Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/dashboard', 'HomeController@dashboard')->name('home');
Route::get('/logout' , 'Auth\LoginController@logout')->name('logout');
Route::get('/create', function() {
    return view('create');
})->name('create');
Route::get('/view/{id}/{slug?}', 'NoteController@view')->name('show');
Route::get('/edit/{id}/{slug?}', 'NoteController@edit')->name('edit');
Route::get('/trashed', 'NoteController@showTrashed')->name('trashed');
Route::get('/shared', 'NoteController@showShared')->name('shared');
Route::post('/store', 'NoteController@store')->name('store');
Route::post('/update/{id}', 'NoteController@update')->name('update');
Route::post('/delete', 'NoteController@delete')->name('delete');
Route::post('/permanentDelete', 'NoteController@permanentDelete')->name('permanent-delete');
Route::post('/restore/{id}', 'NoteController@restore')->name('restore');
Route::post('/share/{note_id}', 'NoteController@shareNote')->name('share');
