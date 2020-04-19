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

Route::get('login', 'AuthController@redirectToProvider')->name('login');
Route::get('auth/callback', 'AuthController@handleProviderCallback');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('projects', 'ProjectController@index')->name('projects');
Route::get('projects/new', 'ProjectController@create')->name('createProject');
Route::post('projects/store', 'ProjectController@store')->name('storeProject');
Route::get('project/{id}', 'ProjectController@show')->name('showProject');
