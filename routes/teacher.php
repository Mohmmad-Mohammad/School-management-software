<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect',
        'localizationRedirect', 'localeViewPath',
        'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {
        $tea_id = auth()->user()->id;
        $ids = Teacher::findOrfail($tea_id)->Sections()->pluck('section_id');
        $data['count_section'] = $ids->count();
        $data['count_students'] = Student::where('section_id',$ids)->count();
        return view('pages.Teachers.dashboard.dashboard',$data);
    });
    Route::group(['namespace'=>'dashboard'],function () {

        Route::get('students','StudentController@index')->name('students.index');
        Route::get('sections','StudentController@sections')->name('sections');
        Route::get('attendance','StudentController@index')->name('attendance.index');
        Route::post('attendance','StudentController@attendance')->name('attendance');
        Route::get('attendance_report','StudentController@attendancereport')->name('attendance_report');
        Route::post('attendance_report','StudentController@attendanceSearch')->name('attendance.search');
        Route::resource('quizzes','QuizzController');
        Route::resource('questions', 'QuestionController');
        Route::resource('OnlineZoom', 'OnlineZoomClassesController');
        Route::get('indirect','OnlineZoomClassesController@indirectCreate')->name('indirect.teacher.Create');
        Route::post('indirect','OnlineZoomClassesController@storeIndirect')->name('indirect.teacher.storeIndirect');
        Route::get('profile', 'ProfileController@index')->name('profile.show');
        Route::post('profile/{id}', 'ProfileController@update')->name('profile.update');

    });
});