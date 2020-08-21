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
Route::get('delete-user-passcheck/{id}', 'HomeController@deleteUPassCheck')->name('delete-user-passcheck');
Route::post('delete-user/{id}', 'HomeController@deleteUser')->name('delete-user');


Route::post('add-user-transaction', 'HomeController@addUserTransaction')->name('add-user-transaction');

Route::get('edit-user-transaction/{id}', 'HomeController@editUserTransaction')->name('edit-user-transaction');
Route::post('update-user-transaction/{id}', 'HomeController@updateUserTransaction')->name('update-user-transaction');
Route::get('delete-usertransaction-passcheck/{id}', 'HomeController@deleteUTPassCheck')->name('delete-usertransaction-passcheck');
Route::post('delete-user-transaction/{id}', 'HomeController@deleteUserTransaction')->name('delete-user-transaction');



Route::get('single-user/{id}', 'HomeController@singleUser')->name('single-user');
Route::post('single-user/{id}', 'HomeController@singleUserUpdate')->name('single-user-update');


Route::get('/occasion', 'HomeController@occasion')->name('occasion');
Route::post('add-occasion', 'HomeController@addOccasion')->name('add-occasion');
Route::get('edit-occasion/{id}', 'HomeController@editOccasion')->name('edit-occasion');
Route::post('update-occasion/{id}', 'HomeController@updateOccasion')->name('update-occasion');
Route::get('delete-occasion-passcheck/{id}', 'HomeController@deleteOPassCheck')->name('delete-occasion-passcheck');
Route::post('delete-occasion/{id}', 'HomeController@deleteOccasion')->name('delete-occasion');


Route::get('single-occasion/{id}', 'HomeController@singleOccasion')->name('single-occasion');


Route::post('add-occasion-amount', 'HomeController@addOccasionAmount')->name('add-occasion-amount');
Route::get('edit-occasion-amount/{id}', 'HomeController@editOccasionAmount')->name('edit-occasion-amount');
Route::post('update-occasion-amount/{id}', 'HomeController@updateOccasionAmount')->name('update-occasion-amount');
Route::get('delete-occasionamount-passcheck/{id}', 'HomeController@deleteOAPassCheck')->name('delete-occasionamount-passcheck');
Route::post('delete-occasion-amount/{id}', 'HomeController@deleteOccasionAmount')->name('delete-occasion-amount');




Route::get('/investment', 'HomeController@investment')->name('investment');

Route::post('add-investment', 'HomeController@addInvestment')->name('add-investment');
Route::get('edit-investment/{id}', 'HomeController@editInvestment')->name('edit-investment');
Route::post('update-investment/{id}', 'HomeController@updateInvestment')->name('update-investment');

Route::get('delete-investment-passcheck/{id}', 'HomeController@deleteINPassCheck')->name('delete-investment-passcheck');
Route::post('delete-investment/{id}', 'HomeController@deleteInvestment')->name('delete-investment');

});
