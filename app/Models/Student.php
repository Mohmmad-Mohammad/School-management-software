<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class Student extends Authenticatable
{
    use SoftDeletes;

    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];

    // Relationship between students and types to fetch the name of the type in the students table
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    // Relationship between students and grades to fetch the name of the grade in the students table
    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

    // Relationship between students and classes to fetch the name of the class in the students table
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }

    // Relationship between students and departments to fetch the name of the department in the students table
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    // Relationship between students and images to fetch the name of the images in the students table
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    // Relationship between students and nationalities to fetch the name of the nationality in the nationalities table
    public function Nationality()
    {
        return $this->belongsTo('App\Models\Nationalitie', 'nationalitie_id');
    }

    // Relationship between students and parents to fetch the name of the father in the parents table
    public function myparent()
    {
        return $this->belongsTo('App\Models\MyParent', 'parent_id');
    }

    // Relationship between the student payment schedule and the student schedule to get the total payments and the balance
    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount', 'student_id');
    }

    // Relationship between the student schedule and the attendance and absence schedule
    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');
    }

}