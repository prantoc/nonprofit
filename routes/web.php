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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

Route::get('/', 'HomeController@index')->name('home');
Route::post('add-user', 'HomeController@addUser')->name('add-user');
Route::get('edit-user/{id}', 'HomeController@editUser')->name('edit-user');
Route::post('update-user/{id}', 'HomeController@updateUser')->name('update-user');
Route::get('delete-user/{id}', 'HomeController@deleteUser')->name('delete-user');


Route::get('/occasion', 'HomeController@occasion')->name('occasion');
Route::post('add-occasion', 'HomeController@addOccasion')->name('add-occasion');
Route::get('edit-occasion/{id}', 'HomeController@editOccasion')->name('edit-occasion');
Route::post('update-occasion/{id}', 'HomeController@updateOccasion')->name('update-occasion');
Route::get('delete-occasion/{id}', 'HomeController@deleteOccasion')->name('delete-occasion');


Route::post('add-occasion-amount', 'HomeController@addOccasionAmount')->name('add-occasion-amount');
Route::get('edit-occasion-amount/{id}', 'HomeController@editOccasionAmount')->name('edit-occasion-amount');
Route::post('update-occasion-amount/{id}', 'HomeController@updateOccasionAmount')->name('update-occasion-amount');
Route::get('delete-occasion-amount/{id}', 'HomeController@deleteOccasionAmount')->name('delete-occasion-amount');




Route::get('/investment', 'HomeController@investment')->name('investment');

Route::post('add-investment', 'HomeController@addInvestment')->name('add-investment');
Route::get('edit-investment/{id}', 'HomeController@editInvestment')->name('edit-investment');
Route::post('update-investment/{id}', 'HomeController@updateInvestment')->name('update-investment');
Route::get('delete-investment/{id}', 'HomeController@deleteInvestment')->name('delete-investment');

});
