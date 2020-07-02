<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware('has.role')->prefix('admin')->group(function(){
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('role-and-permission')->namespace('permissions')->group(function() {
        Route::get('roles', 'RoleController@index')->name('roles.index');
        Route::post('roles/create', 'RoleController@store')->name('roles.create');
        Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
        Route::put('roles/{role}/edit', 'RoleController@update');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
