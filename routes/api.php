<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('employees', 'EmployeesController@index');
Route::get('employees/{id}', 'EmployeesController@show');
Route::post('employees/{employee}', 'EmployeesController@store');
Route::put('employees/{employee}', 'EmployeesController@update');
Route::delete('employees/{id}', 'EmployeesController@delete');
