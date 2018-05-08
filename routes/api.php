<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('items', 'ItemController@index')->name('item.index');
Route::get('items/{item}', 'ItemController@show')->name('item.show');
Route::put('items/{item}', 'ItemController@update')->name('item.update');
Route::post('items', 'ItemController@store')->name('item.store');
Route::delete('items/{item}', 'ItemController@destroy')->name('item.destroy');

Route::get('wallets', 'WalletController@index')->name('wallet.index');
Route::get('wallets/{wallet}', 'WalletController@show')->name('wallet.show');
Route::put('wallets/{wallet}', 'WalletController@update')->name('wallet.update');
Route::post('wallets', 'WalletController@store')->name('wallet.store');
Route::delete('wallets/{wallet}', 'WalletController@destroy')->name('wallet.destroy');

Route::get('usersItems', 'UserItemController@index')->name('user_item.index');
Route::get('usersItems/{user_item}', 'UserItemController@show')->name('wallet.show');
Route::put('usersItems/{user_item}', 'UserItemController@update')->name('user_item.update');
Route::post('usersItems', 'UserItemController@store')->name('user_item.store');
Route::delete('usersItems/{user_item}', 'UserItemController@destroy')->name('user_item.destroy');
