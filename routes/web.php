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


        Route::resource('Teachers', 'TeacherController');
        Route::resource('Students', 'StudentController');
        Route::resource('online_classes', 'OnlineClasseController');
        Route::resource('Graduated', 'GraduatedController');
        Route::resource('Promotion', 'PromotionController');
        Route::resource('Fees_Invoices', 'FeesInvoicesController');
        Route::resource('Fees', 'FeesController');
        Route::resource('receipt_students', 'ReceiptStudentsController');
        Route::resource('ProcessingFee', 'ProcessingFeeController');
        Route::resource('Payment_students', 'PaymentController');
        Route::resource('Attendance', 'AttendanceController');
        Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
    Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
    Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
    Route::post('Promotion.edit/{id}', 'PromotionController@edit')->name('Promotion.edit');


});
Route::get('Show_attachment/{studentsname}/{filename}', 'StudentController@Show_attachment')->name('Show_attachment');
Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');