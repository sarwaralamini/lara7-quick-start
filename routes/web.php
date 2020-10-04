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

/* User Profile */
Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile', 'ProfileController@create')->name('profile-create');
Route::post('profile-update', 'ProfileController@update')->name('profile-update');
Route::post('profile-image-update', 'ProfileController@profleImageUpdate')->name('profile-image-update');
Route::post('profile-social-update', 'ProfileController@profleSocialUpdate')->name('profile-social-update');

/* Password */
Route::get('security/password', 'ProfileController@password')->name('password');
Route::post('security/password/update', 'ProfileController@passwordUpdate')->name('password-update');

/* Settings */
Route::get('settings', 'SettingController@index')->name('settings');
Route::post('settings', 'SettingController@create')->name('settings-create');
Route::post('settings-update', 'SettingController@update')->name('settings-update');
Route::post('settings-image-update', 'SettingController@settingsImageUpdate')->name('settings-image-update');

/* Blank Page Route */
Route::get('/blank', 'HomeController@blank')->name('blank');
