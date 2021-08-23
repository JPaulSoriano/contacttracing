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

Auth::routes();



Route::resource('offices','OfficeController')->middleware('is_admin');
Route::resource('transactions','TransactionController')->middleware('is_admin');
Route::resource('appointments','AppointmentController')->middleware('auth');
Route::resource('users','UserController')->middleware('is_admin');
Route::get('admin/home', 'HomeController@adminhome')->name('adminhome')->middleware('is_admin');

Route::delete('/refuse/{appointment}', 'AppointmentController@refuse')->name('refuse')->middleware('auth');
Route::get('/approve/{appointment}', 'AppointmentController@approve')->name('approve')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/staffappointments', 'AppointmentController@staffindex')->name('staffindex')->middleware('auth');
Route::get('/scan', 'AppointmentController@scan')->name('scan')->middleware('auth');


Route::get('/qrcode/{id}', 'QRController@generateQrCode')->name('qrcode');
