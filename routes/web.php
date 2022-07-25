<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Auth::routes();
Route::group(['middleware'=> ['guest']],function(){


Route::get('/', function () {
    return view('auth.login');

});
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){ //...
Route::get('/dashboard', 'HomeController@index')->name('home');

        Route::resource('grades', 'GradeController');


    Route::resource('Classroom', 'ClassroomController');
    Route::post('delete_all','ClassroomController@delete_all')->name('delete_all');
    Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');



    Route::resource('Section', 'SectionController');
    Route::get('/classes/{id}', 'SectionController@getclasses');

    Route::view('add_parent', 'livewire.show_Form');

});

