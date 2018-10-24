<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'ItemsController@index');                         // home
Route::controller('auth', 'Auth\AuthController');                 // login logout register
Route::get('regi/{id}', 'ItemsController@create');                // セルフコーチングワーク登録ページ
Route::post('items/store/{id}', 'ItemsController@store');         // regi INSERT処理
Route::get('mypage/{id}', 'ItemsController@show');                // mypage
Route::post('store/{id}','ItemsController@mystore');              // mypage INSERT処理
Route::post('rank_update/{id}','ItemsController@rank_update');    // mypage rank UPDATE処理
Route::post('update/{id}','ItemsController@update');              // mypage done UPDATE処理
Route::get('done/{id}', 'ItemsController@done');                  // 達成ページ
Route::post('giveup/{id}', 'ItemsController@destroy');            // mypage give up UPDATE処理
Route::get('giveup/{id}', 'ItemsController@giveup');              // give upページ
Route::get('users', 'UsersController@index');                     // user一覧ページ
Route::get('show/{id}', 'UsersController@show');                  // show ユーザー詳細ページ
Route::get('todo/{id}', 'TodoItemsController@index');             // todoページ
Route::post('todo/store/{item_id}', 'TodoItemsController@store'); // todo INSERT処理
Route::post('todo/destroy/{id}','TodoItemsController@destroy');   // todo DELETE処理
Route::get('image/edit', 'UsersController@edit');                 // 画像ページ
Route::post('image/upload', 'UsersController@update');            // 画像upload処理
