<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Model\Items;
use App\Model\Rooms;
use App\Model\Category;
use App\Model\Users;
use App\Model\Staffs;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::get('/users/store', 'UserController@store')->name('users.store');
Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
Route::get('/users/{id}/destroy', 'UserController@destroy')->name('users.destroy');
Route::get('/staffs', 'StaffController@index')->name('staffs');
Route::get('/staffs/create', 'StaffController@create')->name('staffs.create');
Route::get('/staffs/store', 'StaffController@store')->name('staffs.store');
Route::get('/staffs/{id}/edit', 'StaffController@edit')->name('staffs.edit');
Route::get('/staffs/{id}/destroy', 'StaffController@destroy')->name('staffs.destroy');
Route::get('/items', 'ItemController@index')->name('items');
Route::get('/items/create', 'ItemController@create')->name('items.create');
Route::get('/items/store', 'ItemController@store')->name('items.store');
Route::get('/items/{id}/edit', 'ItemController@edit')->name('items.edit');
Route::get('/items/{id}/destroy', 'ItemController@destroy')->name('items.destroy');
Route::get('/rooms', 'RoomController@index')->name('rooms');
Route::get('/rooms/create', 'RoomController@create')->name('rooms.create');
Route::get('/rooms/store', 'RoomController@store')->name('rooms.store');
Route::get('/rooms/{id}/edit', 'RoomController@edit')->name('rooms.edit');
Route::get('/rooms/{id}/destroy', 'RoomController@destroy')->name('rooms.destroy');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/store', 'CategoryController@store')->name('categories.store');
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
Route::get('/categories/{id}/destroy', 'CategoryController@destroy')->name('categories.destroy');


// // CRUD
// Route::resource('items', 'ItemController');
// Route::resource('categories', 'CategoryController');
// Route::resource('rooms', 'RoomController');
// Route::resource('roles', 'RoleController');
// Route::resource('permissions', 'PermissionController');
// Route::resource('staffs', 'StaffController');
