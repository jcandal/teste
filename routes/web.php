<?php

use Illuminate\Support\Facades\Route;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::resource('user','UserController');
Route::get('dataTableUser', 'UserController@dataTable')->name('dataTableUser');

Route::get('/home', function() {
    Toastr::info('Que bom em reve-lo Usuário', 'Login');
    return view('home');
})->name('home')->middleware('auth');

Route::get('/', function () {
    return view('auth.login');
});
