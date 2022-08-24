<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
use HasTranslations;
    protected $translatable = ['name_class'];
    protected $table = 'classrooms';
    protected $fillable=['name_class','grade_id'];
    public $timestamps = true;

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

}