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
     'client_id' => 7,
     'redirect_uri' => 'http://localhost:4200/callback',
     'response_type' => 'code',
     'scope' => '',
    ]);

return redirect ('http://127.0.0.1:8000/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request){
$http= new GuzzleHttp\Client;
$response = $http->post('http://127.0.0.1:8000/oauth/token',[
    'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 7 ,
            'client_secret' => 'Nog2JOZSXmDXWh3oz6StcvM3eBV26Ziy1DCU09OC' ,
            'redirect_uri' => 'http://localhost:4200/callback',
            'code' => $request->code,
        ],
    ]);

return json_decode((string) $response->getBody(), true);
});
