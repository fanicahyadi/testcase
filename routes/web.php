<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Model\Items;
use App\Model\Rooms;
use App\Model\Category;
use App\Model\Users;
use App\Model\Staff;

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
Route::middleware('role:admin')->get('/dashboard', function(){
    return 'Dashboaard';
})->name('dashboard');
Route::get('/users', 'UserController@index')->name('users');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users/store', 'UserController@store')->name('users.store');
Route::post('/users/{id}/update', 'UserController@update')->name('users.update');
Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
Route::delete('/users/{id}/destroy', 'UserController@destroy')->name('users.destroy');

Route::get('/staffs', 'StaffController@index')->name('staffs');
Route::get('/staffs/create', 'StaffController@create')->name('staffs.create');
Route::post('/staffs/store', 'StaffController@store')->name('staffs.store');
Route::post('/staffs/{id}/update', 'StaffController@update')->name('staffs.update');
Route::get('/staffs/{id}/edit', 'StaffController@edit')->name('staffs.edit');
Route::delete('/staffs/{id}/destroy', 'StaffController@destroy')->name('staffs.destroy');

Route::get('/items', 'ItemController@index')->name('items');
Route::get('/items/create', 'ItemController@create')->name('items.create');
Route::post('/items/store', 'ItemController@store')->name('items.store');
Route::post('/items/{id}/update', 'ItemController@update')->name('items.update');
Route::get('/items/{id}/edit', 'ItemController@edit')->name('items.edit');
Route::delete('/items/{id}/destroy', 'ItemController@destroy')->name('items.destroy');

Route::get('/rooms', 'RoomController@index')->name('rooms');
Route::get('/rooms/create', 'RoomController@create')->name('rooms.create');
Route::post('/rooms/store', 'RoomController@store')->name('rooms.store');
Route::post('/rooms/{id}/update', 'RoomController@update')->name('rooms.update');
Route::get('/rooms/{id}/edit', 'RoomController@edit')->name('rooms.edit');
Route::delete('/rooms/{id}/destroy', 'RoomController@destroy')->name('rooms.destroy');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::post('/categories/store', 'CategoryController@store')->name('categories.store');
Route::post('/categories{id}//update', 'CategoryController@update')->name('categories.update');
Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
Route::delete('/categories/{id}/destroy', 'CategoryController@destroy')->name('categories.destroy');

Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');

// // CRUD
// Route::resource('items', 'ItemController');
// Route::resource('categories', 'CategoryController');
// Route::resource('rooms', 'RoomController');
// Route::resource('roles', 'RoleController');
// Route::resource('permissions', 'PermissionController');
// Route::resource('staffs', 'StaffController');
