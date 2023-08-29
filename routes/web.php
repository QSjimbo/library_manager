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

// 一覧
Route::get("library/index", "LibraryController@index");
// 貸し出しフォーム
Route::get("library/borrow", "LibraryController@borrowingForm");
// 貸し出し処理
Route::post("library/borrow", "LibraryController@borrow");
// 返却
Route::post("library/return", "LibraryController@returnBook");

