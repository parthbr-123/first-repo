<?php

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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('employees/', 'EmployeeController@show');

Route::get('employees/{id}', 'EmployeeController@show');
Route::get('employees_create', 'EmployeeController@create');
Route::get('employees_all', 'EmployeeController@allrecord');
Route::get('employees_delete/{id}', 'EmployeeController@delete');
Route::get('employees_update/{id}', 'EmployeeController@update');

Route::post('employees_store', 'EmployeeController@store');
Route::post('employees_updaterec/{id}', 'EmployeeController@updaterec');

#Route::get('employees/create', 'EmployeeController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
