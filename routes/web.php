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
    return view('contact_us_page');
})->name('contact_us_page');

Route::post('/contact_us_submit', 'ContactUSController@contactUsSubmit');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::post('/delete_contact_dtl/{id}', 'ContactUSController@deleteContactDtl');

