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
//     return view('excel');
// });

Route::get('/excel','StudentController@excel');
Route::get('/pdf','StudentController@pdf');
Route::get('/email','StudentController@email');


Route::get('/student','StudentController@index');
Route::post('/addstudents','StudentController@store');


Route::get('/delete_click/{id}','StudentController@delete');

Route::put('updatedata/{id}','StudentController@update');