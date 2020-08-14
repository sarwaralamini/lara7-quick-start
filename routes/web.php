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
/* Deactivated Default Auth Routes */
Auth::routes([
    'login' => false, // Registration Routes...
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

/* New Auth Route To Front Page */
Route::get('/','Auth\LoginController@showLoginForm')->name('login');
Route::post('/','Auth\LoginController@login');

/* Dashboard Route */
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

/* Blank Page Route */
Route::get('/blank', 'HomeController@blank')->name('blank');
