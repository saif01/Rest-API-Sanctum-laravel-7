<?php

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
    return view('welcome');
});

Route::get('/ad', 'AdCheck@index');

Route::get('/sms', 'OracleData@smsData');

// Route::get('/dump-auto', function()
// {
//     \Artisan::call('dump-autoload');
//      echo 'dump-autoload complete';
// });
