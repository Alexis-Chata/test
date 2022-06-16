<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

    $response = Http::contentType("text/html; charset=utf-8")->bodyFormat('none')->post('http://aprendiendo.jademlearning.com/login/index.php', [
        'form_params' => [
            'client_id' => 'test_id',
            'secret' => 'test_secret',
        ]
    ])->json();
    return $response;

    // $client = new Client();
    // $res = $client->request('POST', 'http://aprendiendo.jademlearning.com/login/index.php', [
    //     'form_params' => [
    //         'client_id' => 'test_id',
    //         'secret' => 'test_secret',
    //     ]
    // ]);
    // return $res->getStatusCode();


    // $http = new Client();
    // $response = $http->post('http://aprendiendo.jademlearning.com/login/index.php', [
    //     'form_params' => [
    //         'username' =>  '48073100',
    //         'password' =>  '48073100',
    //     ],
    // ]);
    // return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
