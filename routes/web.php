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
Route::get('/blank/{id}', 'HomeController@track');

Auth::routes();
Route::get('/home/sent', 'HomeController@sent')->name('home');
Route::post('/mail/send', 'HomeController@send')->name('mail.send');
Route::get('/mail/drafts', 'HomeController@drafts')->name('mail.drafts');
Route::get('/mail/trash', 'HomeController@trash')->name('mail.trash');
Route::get('/mail/received', 'HomeController@received')->name('mail.received');
Route::get('/mail/create/{id?}', 'HomeController@create')->name('mail.create');
Route::get('/mail/read/{id}', 'HomeController@read')->name('mail.read');