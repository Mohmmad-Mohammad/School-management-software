<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['name_section'];
    protected $fillable=['name_section','grade_id','class_id'];

    protected $table = 'sections';
    public $timestamps = true;

    public function My_classs()
    {
        return $this->belongsTo('App\Models\Classroom', 'class_id');
    }


    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade','grade_id');
    }
}