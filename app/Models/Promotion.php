<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    protected $guarded=[];

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    // Relationship between promotions and grades to fetch the stage name in the promotions table
    public function f_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'from_grade');
    }

    // Relationship between promotions classes to fetch the name of the class in the promotions table
    public function f_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'from_Classroom');
    }

    // Relationship between promotions and academic departments to fetch the name of the department in the promotions table
    public function f_section()
    {
        return $this->belongsTo('App\Models\Section', 'from_section');
    }

    // Relationship between promotions and grades to fetch the stage name in the promotions table
    public function t_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'to_grade');
    }

    public function t_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'to_Classroom');
    }

    // Relationship between promotions classes to fetch the name of the class in the promotions table
    public function t_section()
    {
        return $this->belongsTo('App\Models\Section', 'to_section');
    }
}