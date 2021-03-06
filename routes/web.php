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
    return view('home');
});

Route::get('/passport', 'PassportController@index')->name('passport.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
$query = http_build_query([
     'client_id' => 1,
     'redirect_uri' => 'http://localhost:4200/callback',
     'response_type' => 'code',
     'scope' => '',
    ]);

return redirect ('http://127.0.0.1:8000/oauth/authorize?'.$query);
});
