<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Ajax routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Ajax" middleware group. Enjoy building your Ajax!
|
*/
Route::get('/Get_classrooms/{id}', 'AjaxController@Get_classrooms');
Route::get('/Get_Sections/{id}', 'AjaxController@Get_Sections');