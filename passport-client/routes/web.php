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
    return view('api');
});

Route::get('/forget-token', function() {

	session()->forget('api-token');
    return redirect('/');

});

Route::get('/redirect', function () {
    if (!env('API_CLIENT_ID') || !env('API_URL') || !env('API_CLIENT_SECRET')) {
        return "Please fill API fields in env file";
    }
    $query = http_build_query([
        'client_id' => env('API_CLIENT_ID'),
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect(env('API_URL').'/oauth/authorize?'.$query);
});

Route::get('/callback', function () {
    $http = new GuzzleHttp\Client;

    $response = $http->post(env('API_URL').'/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => env('API_CLIENT_ID'),
            'client_secret' => env('API_CLIENT_SECRET'),
            'code' => request()->code,
        ],
    ]);

    $apiResponse = json_decode((string) $response->getBody(), true);
    session(['api'=> $apiResponse]);
    session(['api-token'=> $apiResponse['access_token']]);
    return redirect('/');
});