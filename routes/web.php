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
})->name('welcome');



Route::get('/autocomplete', 'CategoryController@index');

Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');

Route::get('/delete-multiple-category', ['as'=>'category.multiple-delete','uses'=>'CategoryController@deleteMultiple']);
Route::get('file','FileController@create');
Route::post('file','FileController@store');

Route::get('/upload-image', 'UploadController@getUploadForm');
Route::post('/upload-image', 'UploadController@postUploadForm');

Route::get('multiple-file-upload', 'MultipleUploadController@index');

Route::post('multiple-file-upload/upload', 'MultipleUploadController@upload')->name('upload');


// Create image upload form
Route::get('/image-upload', 'FileUpload@createForm');

// Store image
Route::post('/image-upload', 'FileUpload@fileUpload')->name('imageUpload');

Route::get('/{id}/webbug.php', 'EmailController@track');
Route::get('/mail/test', 'EmailController@test')->name('test');
Route::post('/upload', 'CategoryController@upload')->name('upload');
Auth::routes(['verify' => true]);
Auth::routes();

Route::middleware(['verified'])->group(function(){
    Route::get('/mail/sent', 'EmailController@sent')->name('home');
    Route::get('/mail/movetrash/{id}/{isdel}', 'EmailController@softDelete')->name('mail.trash');
    Route::post('/mail/send', 'EmailController@send')->name('mail.send');
    Route::get('/mail/drafts', 'EmailController@drafts')->name('mail.drafts');
    Route::get('/mail/trash', 'EmailController@trash')->name('mail.trash');
    Route::get('/mail/inbox', 'EmailController@received')->name('mail.inbox');
    Route::get('/mail/create/{id?}', 'EmailController@create')->name('mail.create');
    Route::get('/mail/read/{id}', 'EmailController@read')->name('mail.read');
    Route::post('/mail/sent/delete', 'EmailController@sentDelete')->name('mail.sent.delete');
    Route::post('/mail/drafts/delete', 'EmailController@draftsDelete')->name('mail.drafts.delete');
    Route::post('/mail/trash/delete', 'EmailController@trashDelete')->name('mail.trash.delete');
    Route::get('/mail/report/{id}', 'EmailController@report')->name('mail.report');
    Route::post('/mail/search', 'EmailController@search')->name('mail.search');

    Route::get('/test/printable', 'EmailController@test')->name('mail.test');
    
    Route::get('/contact/index', 'ContactController@index')->name('contact.index');
    Route::get('/contact/create', 'ContactController@create')->name('contact.create');
    Route::post('/contact/store', 'ContactController@store')->name('contact.store');
    Route::get('/contact/edit/{id}', 'ContactController@edit')->name('contact.edit');
    Route::post('/contact/update/{id}', 'ContactController@upadate')->name('contact.update');
    Route::post('/contact/delete', 'ContactController@destroy')->name('contact.delete');

    Route::post('/mail/suggest', 'ContactController@destroy')->name('mail.suggest');
    
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
    Route::post('/profile/delete', 'ProfileController@delete')->name('profile.delete');

});
