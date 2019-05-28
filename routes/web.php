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
Route::get('send', 'HomeController@sendNotification');
Route::get('email-test','HomeController@sendMail');
Route::get('generate-pdf','HomeController@generatePDF');
Route::post('/upload', 'TestingController@index');
Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', 'MyController@importExportView');
Route::post('import', 'MyController@import')->name('import');
Route::get('test',function ()
{
	fcm()
    ->to('alauddin020@gmail.com') // $recipients must an array
    ->data([
        'title' => 'Test FCM',
        'body' => 'This is a test of FCM',
    ])
    ->send();
});



Route::get('/money', 'TestingController@money');
